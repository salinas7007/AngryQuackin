# AngryQuackin

## Web forum code built in 2015/2016 using HTML, CSS, and PHP to interact with a MySQL database.


## Table of Contents
* [General info](#general-info)
* [Real life example](#example)
* [Technologies](#technologies)
* [Setup](#setup)



## General info
* AngryQuackin was designed to an interactive forum for community college students. The forum allows members to sign up, indicate their current college status, and create and interact with other people's posts. Posts are locked down so that only signed-in users can see what is available. It was written with a quirky, personal sense of humor to help students felt like they belonged. Yes, 23yo me cringes at what 18yo me wrote. 

* Project status: Archived

* Created by Elizabeth Salinas


## Real life example
See active example:
* <http://forum.sandboxsalinas.com>
* Feel free to sign up and interact with the forum! 


## Technologies 
Project is created with:
* HTML5
* CSS3 
* PHP 5.6.38
* MySQL 5.6.43 


## Setup
To setup this website, you will need to install the code on your local server. You will also need to build a MySQL database:

```
CREATE DATABASE forumName;

CREATE TABLE forum_members (
  user_id  int(11) NOT NULL AUTO_INCREMENT,
  user_name  varchar(255) NOT NULL,
  user_pass varchar(255) NOT NULL,
  contact_email varchar(255) NOT NULL,
  ls_student_yn varchar(255) NOT NULL,
  my_ls_email varchar(255) NOT NULL,
  Contact_E_Code int(11) NOT NULL,
  Student_E_Code int(11) NOT NULL,
  Confirmed_User varchar(255) NOT NULL,
  Confirmed_Student varchar(255) NOT NULL,
  PRIMARY KEY (user_id)
);

CREATE TABLE Notifications (
  user_id varchar(255) NOT NULL,
  Notification text NOT NULL,
  Date date NOT NULL
);

CREATE TABLE original_posts (
  post_number int(11) NOT NULL AUTO_INCREMENT,
  post text NOT NULL,
  title text NOT NULL,
  date date NOT NULL,
  member  varchar(255) NOT NULL,
  PRIMARY KEY (post_number)
);

CREATE TABLE replies (
  reply_id int(11) NOT NULL AUTO_INCREMENT,
  reply text NOT NULL,
  date date NOT NULL,
  member  varchar(255) NOT NULL,
  post_number int(11) NOT NULL,
  PRIMARY KEY (reply_id)
);
