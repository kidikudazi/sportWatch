/*
* Database Schema
*/

/**
* create  database
*/

CREATE DATABASE sport_watch;


/**
* create admin table
*/
CREATE TABLE admin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullanme VARCHAR(255) NOT NULL,
username VARCHAR(255) NOT NULL,
password VARCHAR(255),
reg_date TIMESTAMP
)