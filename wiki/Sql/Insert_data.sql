/*
 * /*@author Alex Marriott s4816928,
 version 2
 * 03/2/2018.
 * filename: insert_data.sql
 * The create tables script creates the necessary tables to work in the database. ID's for each table is auto incremented.
 */

INSERT INTO users (email_address, account_password,user_name) VALUES ("alex-blah123@gmail.com", MD5("Blah1234"),"amarriott");
INSERT INTO users (email_address, account_password,user_name) VALUES ("supercool23@gmail.com", MD5("supplier_name"),"toomanycooks");
INSERT INTO users (email_address, account_password,user_name) VALUES ("email_address@gmail.com", MD5("123345"),"whatislife");

INSERT INTO categories (category_name) VALUES ("Networking");
INSERT INTO categories (category_name) VALUES ("Software");
INSERT INTO categories (category_name) VALUES ("Infrastructure");

INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Subnetting",1);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Classful",1);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Classless",1);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Java",2);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Ruby",2);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Python",2);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Centos",3);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Ubuntu",3);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Arch",3);

INSERT INTO ratings (rating_score) VALUES (1);
INSERT INTO ratings (rating_score) VALUES (2);
INSERT INTO ratings (rating_score) VALUES (3);
INSERT INTO ratings (rating_score) VALUES (4);
INSERT INTO ratings (rating_score) VALUES (5);
INSERT INTO ratings (rating_score) VALUES (6);
INSERT INTO ratings (rating_score) VALUES (7);
INSERT INTO ratings (rating_score) VALUES (8);
INSERT INTO ratings (rating_score) VALUES (9);
INSERT INTO ratings (rating_score) VALUES (10);

INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("how to fix","how-to-fix","stuff about the postshere","default_image.jpg",1,1,1);
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("how to fix again","how-to-fix-again","stuff about thtics (style, behaviour) + CKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate a ﻿","default_image.jpg", 1,1,1);



INSERT INTO comments (comment,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post",1,1);
INSERT INTO comments (comment,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", 1,2);