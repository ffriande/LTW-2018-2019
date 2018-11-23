PRAGMA foreign_keys = ON;

CREATE TABLE user (
  Id INTEGER PRIMARY KEY AUTOINCREMENT,
  Username VARCHAR NOT NULL,
  Password VARCHAR NOT NULL
);
 
CREATE TABLE story (    
    Id INTEGER PRIMARY KEY AUTOINCREMENT,
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
    Id INTEGER PRIMARY KEY AUTOINCREMENT,
    Story INTEGER,
    User INTEGER,
    Description VARCHAR NOT NULL,
    Date DATETIME NOT NULL,
    Karma INTEGER,
        FOREIGN KEY (Story) REFERENCES story(Id),
        FOREIGN KEY (User) REFERENCES user(Id)
);

CREATE TABLE channel (    
    Id INTEGER PRIMARY KEY AUTOINCREMENT,
    User INTEGER,
    Name VARCHAR NOT NULL,
    Subscriptions INTEGER,
        FOREIGN KEY (User) REFERENCES user(Id)
);

CREATE TABLE subscription (
    Id_User INTEGER PRIMARY KEY,
    Id_Channel INTEGER PRIMARY KEY,
        FOREIGN KEY (Id_User) REFERENCES user(Id),
        FOREIGN KEY (Id_Channel) REFERENCES channel(Id)
);

CREATE TABLE voteStory (    
    Id_User INTEGER PRIMARY KEY,
    Id_Story INTEGER PRIMARY KEY,
    UpDown INTEGER,
    Date DATETIME NOT NULL,
        FOREIGN KEY Id_User REFERENCES user(Id),
        FOREIGN KEY Id_Story REFERENCES story(Id)
);

CREATE TABLE voteComment (
    Id_User INTEGER REFERENCES user(Id) PRIMARY KEY,
    Id_Comment INTEGER REFERENCES story(Id)PRIMARY KEY,
    UpDown INTEGER,
    Date DATETIME NOT NULL,
        FOREIGN KEY Id_User REFERENCES user(Id),
        FOREIGN KEY Id_Comment REFERENCES comment(id)
);

CREATE TRIGGER create_vote_story AFTER INSERT ON voteStory
BEGIN
        UPDATE story SET Karma IS COUNT(voteStory)
    WHERE
        story.Id == voteStory.Id_story;
END

CREATE TRIGGER create_vote_comment AFTER INSERT ON voteComment
BEGIN
        UPDATE story SET Karma IS COUNT(voteComment)
    WHERE
        comment.Id == voteComment.Id_story;
END

CREATE TRIGGER create_subscription AFTER INSERT ON subscription
BEGIN
        UPDATE channel SET subscriptions IS COUNT(subscription)
    WHERE  
        story.Id == subscription.Id_Story
END