CREATE TABLE user (
  id INTEGER PRIMARY KEY,
  username VARCHAR NOT NULL,
  password VARCHAR NOT NULL,
  karma INTEGER
);

CREATE TABLE story (    
    id INTEGER PRIMARY KEY,
    title VARCHAR NOT NULL,
    description VARCHAR NOT NULL,
    date DATETIME NOT NULL,
    karma INTEGER
);

CREATE TABLE comment (    
    id INTEGER PRIMARY KEY,
    description VARCHAR NOT NULL,
    date DATETIME NOT NULL,
    karma INTEGER
);


