/*
 * /*@author Alex Marriott s4816928,
 * 03/2/2018.
 * filename: Create_table.sql
 * The create tables script creates the necessary tables to work in the database. ID's for each table is auto incremented.
 */

CREATE TABLE user_tbl
(website_user_id INT(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
email_address VARCHAR(40) NOT NULL UNIQUE,
account_password VARCHAR(30) NOT NULL,
username VARCHAR(20) NOT NULL,
CONSTRAINT website_user_PK PRIMARY KEY (website_user_id));

CREATE TABLE categories_tbl
(category_id INT(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
category_name VARCHAR(30) NOT NULL,
CONSTRAINT category_entree UNIQUE (category_id,category_name),
CONSTRAINT category_id_PK PRIMARY KEY (category_id));

CREATE TABLE sub_categories_tbl
(subcategory_id INT(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
subcategory_name VARCHAR(100) NOT NULL,
CONSTRAINT sub_categories_entree UNIQUE (subcategory_id,subcategory_name),
CONSTRAINT subcategory_id_PK PRIMARY KEY (subcategory_id));

CREATE TABLE ratings_tbl
(ratings_id INT(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
 rating_score INT(1) NOT NULL UNIQUE,
  CONSTRAINT rating_id_PK PRIMARY KEY (ratings_id));

CREATE TABLE comments_tbl
(comments_id INT(5) unsigned zerofill NOT NULL,
 comment_usename TEXT,
 comment TEXT,
 comment_date DATE NOT NULL,
  CONSTRAINT comment_id_PK PRIMARY KEY (comments_id));

CREATE TABLE post_tbl
(post_id INT(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
post_title VARCHAR(100) NOT NULL,
post_desc VARCHAR(5000) NOT NULL,
post_date DATE NOT NULL,
website_user_id_FK INT(5) unsigned zerofill NOT NULL,
rating_id_FK INT(5) unsigned zerofill NOT NULL,
comment_id_FK INT(5) unsigned zerofill NOT NULL,
CONSTRAINT post_id_PK PRIMARY KEY (post_id),
CONSTRAINT website_user_id_FK FOREIGN KEY (website_user_id_FK) REFERENCES user_tbl(website_user_id) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT ratings_id_FK FOREIGN KEY (rating_id_FK) REFERENCES ratings_tbl(ratings_id) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT comment_id_FK FOREIGN KEY (comment_id_FK) REFERENCES comments_tbl(comments_id) ON DELETE CASCADE ON UPDATE CASCADE);



CREATE TABLE rating_comment_link
(rating_id_link_FK INT (5) unsigned zerofill NOT NULL,
comment_id_link_FK INT (5) unsigned zerofill NOT NULL,
CONSTRAINT rating_comment_link_PK PRIMARY KEY (rating_id_link_FK,comment_id_link_FK),
CONSTRAINT rating_id_link_FK FOREIGN KEY (rating_id_link_FK) REFERENCES ratings_tbl (ratings_id),
CONSTRAINT comment_id_link_FK FOREIGN KEY (comment_id_link_FK) REFERENCES comments_tbl (comments_id));

CREATE TABLE cat_subcat_link
(category_id_link_FK INT (5) unsigned zerofill NOT NULL,
subcategory_id_link_FK INT (5) unsigned zerofill NOT NULL,
CONSTRAINT category_id_link_PK PRIMARY KEY (category_id_link_FK,subcategory_id_link_FK),
CONSTRAINT category_id_link_FK FOREIGN KEY (category_id_link_FK) REFERENCES categories_tbl (category_id),
CONSTRAINT subcategory_id_link_FK FOREIGN KEY (subcategory_id_link_FK) REFERENCES sub_categories_tbl (subcategory_id));

