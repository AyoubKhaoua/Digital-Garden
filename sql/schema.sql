-- Active: 1764683361796@@127.0.0.1@3306@digitalgarden
CREATE DATABASE DigitalGarden;

use DigitalGarden;
-----create tables
--1-tabel users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

alter TABLE users add COLUMN email VARCHAR(100) not NULL;

alter table users add UNIQUE (email);
--2-table themes
CREATE TABLE themes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(150) NOT NULL,
    color VARCHAR(7) DEFAULT '#ffffff',
    nbrnotes int DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);
--2-tbale notes
CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    theme_id INT NOT NULL,
    title VARCHAR(255),
    content TEXT,
    importance ENUM('1', '2', '3', '4', '5'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (theme_id) REFERENCES themes (id) ON DELETE CASCADE
);
-----
SELECT * from users;

INSERT into
    themes (
        user_id,
        title,
        color,
        nbrnotes
    )
VALUES (3, 'husa', 'gray', 6)