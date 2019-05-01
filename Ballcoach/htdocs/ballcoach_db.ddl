CREATE DATABASE ballcoach;

USE ballcoach;
CREATE TABLE coach
(
  id int auto_increment PRIMARY KEY,
  user_id varchar(25),
  first_name varchar(20),
  last_name varchar(25),
  email varchar(50),
  zip int(5),
  fb varchar(50),
  insta varchar(50),
  twit varchar(50),
  linked varchar(50),
  education varchar(255),
  ath_exp varchar(255),
  coach_exp varchar(255),
  coach_phil varchar(255),
  sport varchar(25)
);

CREATE TABLE athlete
(
  id int auto_increment PRIMARY KEY,
  user_id varchar(25),
  first_name varchar(20),
  last_name varchar(25),
  email varchar(50),
  zip int(5),
  fb varchar(50),
  insta varchar(50),
  twit varchar(50),
  linked varchar(50),
  edu varchar(255)
);


CREATE TABLE users 
(
    id int primary key auto_increment,
    first_name varchar(50),
    username varchar(255), 
    password varchar(255),
    email varchar(255),
    role int(1)
);

INSERT INTO users (username, password, role) VALUES ('admin', 'pwd', 'admin');

INSERT INTO coach (user_id, first_name, last_name, sport) VALUES( 'admin','John', 'Doe', 'Baseball');

