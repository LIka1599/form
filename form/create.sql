CREATE DATABASE form;
use form;

CREATE TABLE questions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    today datetime,
    name VARCHAR(250) NOT NULL,
    e_mail varchar(256) CHARACTER SET utf8mb4 NOT NULL,
    year_birth int NOT null,
    gender varchar(10) not null,
    topic text not null,
    question text not null
);