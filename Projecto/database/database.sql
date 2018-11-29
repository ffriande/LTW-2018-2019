PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS story;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS channel;
DROP TABLE IF EXISTS subscription;
DROP TABLE IF EXISTS voteStory;
DROP TABLE IF EXISTS voteComment;
DROP TRIGGER IF EXISTS create_vote_story;
DROP TRIGGER IF EXISTS create_vote_comment;
DROP TRIGGER IF EXISTS create_subscription;


CREATE TABLE user (
  Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  Username VARCHAR NOT NULL,
  Password VARCHAR NOT NULL
);
 
CREATE TABLE story (    
    Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    Channel INTEGER,
    User INTEGER,
    title VARCHAR NOT NULL,
    Description VARCHAR NOT NULL,
    Date DATETIME NOT NULL,
    Karma INTEGER,
        FOREIGN KEY (Channel) REFERENCES channel(Id),
        FOREIGN KEY (User) REFERENCES user(Id)
);

CREATE TABLE comment (    
    Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    Story INTEGER,
    User INTEGER,
    Description VARCHAR NOT NULL,
    Date DATETIME NOT NULL,
    Karma INTEGER,
        FOREIGN KEY (Story) REFERENCES story(Id),
        FOREIGN KEY (User) REFERENCES user(Id)
);

CREATE TABLE channel (    
    Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    User INTEGER,
    Name VARCHAR NOT NULL,
    Subscriptions INTEGER,
        FOREIGN KEY (User) REFERENCES user(Id)
);

CREATE TABLE subscription (
    Id_User INTEGER NOT NULL,
    Id_Channel INTEGER NOT NULL,
        PRIMARY KEY (Id_User, Id_Channel),
        FOREIGN KEY (Id_User) REFERENCES user(Id),
        FOREIGN KEY (Id_Channel) REFERENCES channel(Id)
);

CREATE TABLE voteStory (
    Id_User INTEGER NOT NULL,
    Id_Story INTEGER NOT NULL,
    UpDown INTEGER,
    Date DATETIME NOT NULL,
        PRIMARY KEY (Id_User, Id_Story),
        FOREIGN KEY (Id_User) REFERENCES user(Id),
        FOREIGN KEY (Id_Story) REFERENCES story(Id)
);

CREATE TABLE voteComment (
    Id_User INTEGER NOT NULL,
    Id_Comment INTEGER NOT NULL,
    UpDown INTEGER,
    Date DATETIME NOT NULL,
        PRIMARY KEY (Id_User, Id_Comment),
        FOREIGN KEY (Id_User) REFERENCES user(Id),
        FOREIGN KEY (Id_Comment) REFERENCES comment(id)
);


CREATE TRIGGER create_vote_story AFTER INSERT ON voteStory
BEGIN
        UPDATE story SET Karma = (SELECT COUNT (*) FROM voteStory)
    WHERE
        story.Id = voteStory.Id_story;
END;

CREATE TRIGGER create_vote_comment AFTER INSERT ON voteComment
BEGIN
        UPDATE story SET Karma  = (SELECT COUNT (*) FROM comment)
    WHERE
        comment.Id = voteComment.Id_story;
END;

CREATE TRIGGER create_subscription AFTER INSERT ON subscription
BEGIN
        UPDATE channel SET Subscriptions = (SELECT COUNT (*) FROM subscription)
    WHERE  
        story.Id = subscription.Id_Story;
END;