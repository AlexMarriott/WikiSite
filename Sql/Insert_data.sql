/*
 * /*@author Alex Marriott s4816928,
 * 03/2/2018.
 * filename: insert_data.sql
 * The create tables script creates the necessary tables to work in the database. ID's for each table is auto incremented.
 */

INSERT INTO user (email_address, account_password,username) VALUES ("alex-blah123@gmail.com", "Blah1234","amarriott");
INSERT INTO user (email_address, account_password,username) VALUES ("supercool23@gmail.com", "supplier_name","toomanycooks");
INSERT INTO user (email_address, account_password,username) VALUES ("email_address@gmail.com", "123345","whatislife");

INSERT INTO categories (category_name) VALUES ("Networking");
INSERT INTO categories (category_name) VALUES ("Software");
INSERT INTO categories (category_name) VALUES ("Infrastructure");

INSERT INTO sub_categories (subcategory_name,category_id_FK) VALUES ("Subnetting",1);
INSERT INTO sub_categories (subcategory_name,category_id_FK) VALUES ("Classful",1);
INSERT INTO sub_categories (subcategory_name,category_id_FK) VALUES ("Classless",1);
INSERT INTO sub_categories (subcategory_name,category_id_FK) VALUES ("Java",2);
INSERT INTO sub_categories (subcategory_name,category_id_FK) VALUES ("Ruby",2);
INSERT INTO sub_categories (subcategory_name,category_id_FK) VALUES ("Python",2);
INSERT INTO sub_categories (subcategory_name,category_id_FK) VALUES ("Centos",3);
INSERT INTO sub_categories (subcategory_name,category_id_FK) VALUES ("Ubuntu",3);
INSERT INTO sub_categories (subcategory_name,category_id_FK) VALUES ("Arch",3);

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

INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",1,1);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",2,2);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",1,3);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,4);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);
INSERT INTO post (post_title,post_body,post_date,user_id_FK,rating_id_FK) VALUES ("how-to-fix","stuff about the post here", "2016-05-21",3,5);

INSERT INTO comments (comment,comment_date,comment_user_id) VALUES ("ayyyy lmao good post", "2017-03-12",1);
INSERT INTO comments (comment,comment_date,comment_user_id) VALUES ("ayyyy lmao good post", "2017-03-12",1);
INSERT INTO comments (comment,comment_date,comment_user_id) VALUES ("ayyyy lmao good post", "2017-03-12",1);
INSERT INTO comments (comment,comment_date,comment_user_id) VALUES ("ayyyy lmao good post", "2017-03-12",1);

INSERT INTO rating_comment_link (rating_id_link,comment_id_link) VALUES (1,1);
INSERT INTO rating_comment_link (rating_id_link,comment_id_link) VALUES (1,2);
INSERT INTO rating_comment_link (rating_id_link,comment_id_link) VALUES (1,3);

INSERT INTO post_comment_link (post_id_link,comment_id_link) VALUES (1, 1);
INSERT INTO post_comment_link (post_id_link,comment_id_link) VALUES (3, 2);
INSERT INTO post_comment_link (post_id_link,comment_id_link) VALUES (4, 3);
INSERT INTO post_comment_link (post_id_link,comment_id_link) VALUES (4, 4);
