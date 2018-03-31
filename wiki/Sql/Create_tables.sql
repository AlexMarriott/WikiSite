/*
 * /*@author Alex Marriott s4816928,
 version 2
 * 03/2/2018.
 * filename: Create_table.sql
 * The create tables script creates the necessary tables to work in the database. ID's for each table is auto incremented.
 */

CREATE TABLE users
(user_id BIGINT(20) NOT NULL AUTO_INCREMENT,
email_address VARCHAR(100) NOT NULL UNIQUE,
account_password VARCHAR(100) NOT NULL,
username VARCHAR(100) NOT NULL,
CONSTRAINT user_PK PRIMARY KEY (user_id));

CREATE TABLE categories
(category_id BIGINT(20) NOT NULL AUTO_INCREMENT,
category_name VARCHAR(30) NOT NULL,
CONSTRAINT category_id_PK PRIMARY KEY (category_id));

CREATE TABLE sub_categories
(sub_category_id  BIGINT(20) NOT NULL AUTO_INCREMENT,
 sub_category_name VARCHAR(100) NOT NULL,
 category_id_FK   BIGINT(20) NOT NULL,
CONSTRAINT subcategory_id_PK PRIMARY KEY (sub_category_id),
CONSTRAINT category_id_FK FOREIGN KEY (category_id_FK) REFERENCES categories(category_id) ON DELETE CASCADE ON UPDATE CASCADE);

CREATE TABLE ratings
(rating_id BIGINT(20) NOT NULL AUTO_INCREMENT,
 rating_score BIGINT(20) NOT NULL,
 CONSTRAINT rating_id_PK PRIMARY KEY (rating_id));

CREATE TABLE posts
(post_id BIGINT(20) NOT NULL AUTO_INCREMENT,
post_title VARCHAR(100) NOT NULL,
slug VARCHAR(100),
post_body VARCHAR(256) NOT NULL,
post_date DATE NOT NULL,
user_id_FK BIGINT(20) NOT NULL,
rating_id_FK BIGINT(20) NOT NULL,
sub_categories_FK BIGINT(20) NOT NULL,
CONSTRAINT post_id_PK PRIMARY KEY (post_id),
CONSTRAINT user_id_FK FOREIGN KEY (user_id_FK) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT rating_id_FK FOREIGN KEY (rating_id_FK) REFERENCES ratings(rating_id) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT sub_categories_FK FOREIGN KEY (sub_categories_FK) REFERENCES sub_categories(sub_category_id) ON DELETE CASCADE ON UPDATE CASCADE);

CREATE TABLE comments
(comments_id BIGINT(20) NOT NULL AUTO_INCREMENT,
 comment VARCHAR(256) NOT NULL,
 comment_date DATE NOT NULL,
 user_id_FK BIGINT(20) NOT NULL,
 post_id_FK BIGINT(20) NOT NULL,
 CONSTRAINT comment_id_PK PRIMARY KEY (comments_id),
 CONSTRAINT comment_user_FK FOREIGN KEY (user_id_FK) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT comment_post_FK FOREIGN KEY (post_id_FK) REFERENCES posts (post_id) ON DELETE CASCADE ON UPDATE CASCADE);