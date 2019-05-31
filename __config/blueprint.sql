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
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullanme VARCHAR(255) NOT NULL,
username VARCHAR(255) NOT NULL,
password VARCHAR(255),
reg_date TIMESTAMP
);

/**
* post table
*/

CREATE TABLE posts (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
post_image VARCHAR(255) NOT NULL,
heading VARCHAR(255) NOT NULL,
body VARCHAR(255) NOT NULL,
category VARCHAR(255),
post_date VARCHAR(255)
);

/**
* slider table
*/
CREATE TABLE slider (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
picture VARCHAR(255) NOT NULL,
heading VARCHAR(255) NOT NULL,
link VARCHAR(255) NOT NULL,
created_at TIMESTAMP
);

/**
* teams table
*/
CREATE TABLE teams (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
team_logo VARCHAR(255) NULL,
team_name VARCHAR(255) NOT NULL,
coach_name VARCHAR(255) NOT NULL,
address VARCHAR(255) NOT NULL,
phone VARCHAR(255) NOT NULL,
email VARCHAR(255) NULL,
status ENUM('Active', 'Inactive') DEFAULT 'Active',
created_at VARCHAR(255) NOT NULL
);

/**
* players table
*/
CREATE TABLE players (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
team_id INT(10) UNSIGNED NOT NULL,
picture VARCHAR(255) NULL,
player_name VARCHAR(255) NOT NULL,
playing_position VARCHAR(255) NOT NULL,
jersey_number VARCHAR(255) NULL,
created_at TIMESTAMP,
CONSTRAINT player_team_id_foreign FOREIGN KEY (team_id)
REFERENCES teams(id)
);

/**
* competition table 
*/
CREATE TABLE competitions (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
competition_logo VARCHAR(255) NULL,
competition_name VARCHAR(255) NOT NULL,
location VARCHAR(255) NOT NULL,
start_date VARCHAR(255) NOT NULL,
end_date VARCHAR(255) NOT NULL,
status ENUM('Active', 'Finished') DEFAULT 'Active',
created_at TIMESTAMP
);

/**
* competition teams table
*/
CREATE TABLE competition_teams (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
competition_id INT(10) UNSIGNED NULL,
team_id INT(10) UNSIGNED NOT NULL,
created_at TIMESTAMP,
CONSTRAINT competition_teams_team_id_foreign FOREIGN KEY (team_id) REFERENCES teams(id),
CONSTRAINT competition_teams_competition_id_foreign FOREIGN KEY (competition_id) REFERENCES competitions(id)
);

/**
* fixtures table
*/
CREATE TABLE fixtures (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
competition_id INT(10) UNSIGNED NULL,
home_team_id INT(10) UNSIGNED NOT NULL,
away_team_id INT(10) UNSIGNED NOT NULL,
match_date VARCHAR(255) NOT NULL,
match_time VARCHAR(255) NOT NULL,
venue VARCHAR(255) NOT NULL,
created_at TIMESTAMP,
CONSTRAINT fixtures_home_team_id_foreign FOREIGN KEY (home_team_id) REFERENCES teams(id),
CONSTRAINT fixtures_away_team_id_foreign FOREIGN KEY (away_team_id) REFERENCES teams(id),
CONSTRAINT fixtures_competition_id_foreign FOREIGN KEY (competition_id) REFERENCES competitions(id)
);

