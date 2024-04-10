DROP TABLE IF EXISTS users;

CREATE TABLE users (
    username VARCHAR(100) PRIMARY KEY,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100),
);

LOCK TABLES users WRITE;
INSERT INTO users(username,password) VALUES ('…',md5('###'));
UNLOCK TABLES;