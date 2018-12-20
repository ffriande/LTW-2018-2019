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
  id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  username VARCHAR NOT NULL UNIQUE,
  register_date DATETIME NOT NULL,  
  password VARCHAR NOT NULL
);
 
CREATE TABLE story (    
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    channel_id INTEGER,
    user_id INTEGER,
    title VARCHAR NOT NULL,
    description VARCHAR NOT NULL,
    date DATETIME NOT NULL,
    karma INTEGER,
        FOREIGN KEY (channel_id) REFERENCES channel(id),
        FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE comment (    
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    story_id INTEGER,
    user_id INTEGER,
    description VARCHAR NOT NULL,
    date DATETIME NOT NULL,
    karma INTEGER,
    father INTEGER,
        FOREIGN KEY (story_id) REFERENCES story(id),
        FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE channel (    
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    user_id INTEGER,
    name VARCHAR NOT NULL,
    subscriptions INTEGER,
        FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE subscription (
    user_id INTEGER NOT NULL,
    channel_id INTEGER NOT NULL,
        PRIMARY KEY (user_id, channel_id),
        FOREIGN KEY (user_id) REFERENCES user(id),
        FOREIGN KEY (channel_id) REFERENCES channel(id)
);

CREATE TABLE voteStory (
    user_id INTEGER NOT NULL,
    story_id INTEGER NOT NULL,
    up_down INTEGER,
    Date DATETIME NOT NULL,
        PRIMARY KEY (user_id, story_id),
        FOREIGN KEY (user_id) REFERENCES user(id),
        FOREIGN KEY (story_id) REFERENCES story(id)
);

CREATE TABLE voteComment (
    user_id INTEGER NOT NULL,
    comment_id INTEGER NOT NULL,
    up_down INTEGER,
    Date DATETIME NOT NULL,
        PRIMARY KEY (user_id, comment_id),
        FOREIGN KEY (user_id) REFERENCES user(id),
        FOREIGN KEY (comment_id) REFERENCES comment(id)
);


CREATE TRIGGER create_vote_story AFTER INSERT ON voteStory
BEGIN
        UPDATE story SET karma = (SELECT SUM(up_down) FROM voteStory WHERE story_id = NEW.story_id)
    WHERE
        id = NEW.story_id;
END;

CREATE TRIGGER create_vote_comment AFTER INSERT ON voteComment
BEGIN
        UPDATE comment SET karma  = (SELECT SUM(up_down) FROM voteComment WHERE comment_id = NEW.comment_id)
    WHERE
        id = NEW.comment_id;
END;

CREATE TRIGGER create_subscription AFTER INSERT ON subscription
BEGIN
        UPDATE channel SET subscriptions = (SELECT COUNT (*) FROM subscription)
    WHERE  
        channel_id = NEW.channel_id;
END;

CREATE TRIGGER delete_vote_story AFTER DELETE ON voteStory
BEGIN
        UPDATE story SET karma = (SELECT SUM(up_down) FROM voteStory WHERE story_id = OLD.story_id)
    WHERE
        id = OLD.story_id;
END;

CREATE TRIGGER delete_vote_comment AFTER DELETE ON voteComment
BEGIN
        UPDATE comment SET karma  = (SELECT SUM(up_down) FROM voteComment WHERE comment_id = OLD.comment_id)
    WHERE
        id = OLD.comment_id;
END;

CREATE TRIGGER delete_subscription AFTER DELETE ON subscription
BEGIN
        UPDATE channel SET subscriptions = (SELECT COUNT (*) FROM subscription)
    WHERE  
        channel_id = OLD.channel_id;
END;