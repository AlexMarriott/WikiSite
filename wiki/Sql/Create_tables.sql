/*
 * /*@author Alex Marriott s4816928,
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
CONSTRAINT category_entree UNIQUE (category_id,category_name),
CONSTRAINT category_id_PK PRIMARY KEY (category_id));

CREATE TABLE sub_categories
(subcategory_id BIGINT(20) NOT NULL AUTO_INCREMENT,
subcategory_name VARCHAR(100) NOT NULL,
category_id_FK BIGINT(20) NOT NULL,
CONSTRAINT sub_categories_entree UNIQUE (subcategory_id,subcategory_name),
CONSTRAINT subcategory_id_PK PRIMARY KEY (subcategory_id),
CONSTRAINT category_id_FK FOREIGN KEY (category_id_FK) REFERENCES categories(category_id));

CREATE TABLE ratings
(ratings_id BIGINT(20) NOT NULL AUTO_INCREMENT,
 rating_score INT(2) NOT NULL,
 CONSTRAINT rating_id_PK PRIMARY KEY (ratings_id));

CREATE TABLE comments
(comments_id BIGINT(20) NOT NULL AUTO_INCREMENT,
 comment VARCHAR(256),
 comment_date DATE NOT NULL,
 user_id_FK BIGINT(20) NOT NULL,
 CONSTRAINT comment_id_PK PRIMARY KEY (comments_id),
 CONSTRAINT comment_user_FK FOREIGN KEY (user_id_FK) REFERENCES users(user_id));

CREATE TABLE posts
(post_id BIGINT(20) NOT NULL AUTO_INCREMENT,
post_title VARCHAR(100) NOT NULL,
post_body VARCHAR(256) NOT NULL,
post_date DATE NOT NULL,
user_id_FK BIGINT(20) NOT NULL,
rating_id_FK BIGINT(20) NOT NULL,
CONSTRAINT post_id_PK PRIMARY KEY (post_id),
CONSTRAINT user_id_FK FOREIGN KEY (user_id_FK) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT rating_id_FK FOREIGN KEY (rating_id_FK) REFERENCES ratings(ratings_id) ON DELETE CASCADE ON UPDATE CASCADE);

CREATE TABLE post_comment_link
(post_id_link BIGINT(20) NOT NULL,
comment_id_link BIGINT(20) NOT NULL,
CONSTRAINT post_comment_link_PK PRIMARY KEY (post_id_link,comment_id_link),
CONSTRAINT post_id_link_FK FOREIGN KEY (post_id_link) REFERENCES posts(post_id),
CONSTRAINT comment_id_link_FK FOREIGN KEY (comment_id_link) REFERENCES comments(comments_id));

CREATE TABLE rating_comment_link
(rating_id_link BIGINT(20) NOT NULL,
 comment_id_link BIGINT(20) NOT NULL,
 CONSTRAINT rating_comment_link_PK PRIMARY KEY (rating_id_link,comment_id_link),
 CONSTRAINT rating_comment_link_rating_FK FOREIGN KEY (rating_id_link) REFERENCES ratings (ratings_id),
 CONSTRAINT rating_comment_link_comment_FK FOREIGN KEY (comment_id_link) REFERENCES comments (comments_id));