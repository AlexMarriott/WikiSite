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


INSERT INTO sub_categories (subcategory_name) VALUES ("Subnetting");
INSERT INTO sub_categories (subcategory_name) VALUES ("Classful");
INSERT INTO sub_categories (subcategory_name) VALUES ("Classless");
INSERT INTO sub_categories (subcategory_name) VALUES ("Java");
INSERT INTO sub_categories (subcategory_name) VALUES ("Ruby");
INSERT INTO sub_categories (subcategory_name) VALUES ("Python");
INSERT INTO sub_categories (subcategory_name) VALUES ("Centos");
INSERT INTO sub_categories (subcategory_name) VALUES ("Ubuntu");
INSERT INTO sub_categories (subcategory_name) VALUES ("Arch");

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


INSERT INTO post (post_title,post_body,post_date,website_user_id_FK) VALUES ("how to fix ","stuff about the post here", "2016-05-21",1);
INSERT INTO post (post_title,post_body,post_date,website_user_id_FK) VALUES ("how to fix ","stuff about the post here", "2016-05-21",2);
INSERT INTO post (post_title,post_body,post_date,website_user_id_FK) VALUES ("how to fix ","stuff about the post here", "2016-05-21",1);
INSERT INTO post (post_title,post_body,post_date,website_user_id_FK) VALUES ("how to fix ","stuff about the post here", "2016-05-21",3);
INSERT INTO post (post_title,post_body,post_date,website_user_id_FK) VALUES ("how to fix ","stuff about the post here", "2016-05-21",3);


INSERT INTO comments (comment,comment_date,comment_user_id) VALUES ("ayyyy lmao good post", "2017-03-12",1);
INSERT INTO comments (comment,comment_date,comment_user_id) VALUES ("ayyyy lmao good post", "2017-03-12",1);
INSERT INTO comments (comment,comment_date,comment_user_id) VALUES ("ayyyy lmao good post", "2017-03-12",1);
INSERT INTO comments (comment,comment_date,comment_user_id) VALUES ("ayyyy lmao good post", "2017-03-12",1);



INSERT INTO rating_comment_link (rating_id_link,comment_id_link) VALUES (1,1);
INSERT INTO rating_comment_link (rating_id_link,comment_id_link) VALUES (1,2);
INSERT INTO rating_comment_link (rating_id_link,comment_id_link) VALUES (1,3);



INSERT INTO cat_subcat_link (category_id_link,subcategory_id_link) VALUES (1, 1);
INSERT INTO cat_subcat_link (category_id_link,subcategory_id_link) VALUES (1, 2);
INSERT INTO cat_subcat_link (category_id_link,subcategory_id_link) VALUES (1, 3);
INSERT INTO cat_subcat_link (category_id_link,subcategory_id_link) VALUES (2, 4);
INSERT INTO cat_subcat_link (category_id_link,subcategory_id_link) VALUES (2, 5);
INSERT INTO cat_subcat_link (category_id_link,subcategory_id_link) VALUES (2, 6);
INSERT INTO cat_subcat_link (category_id_link,subcategory_id_link) VALUES (3, 7);
INSERT INTO cat_subcat_link (category_id_link,subcategory_id_link) VALUES (3, 8);
INSERT INTO cat_subcat_link (category_id_link,subcategory_id_link) VALUES (3, 9);


INSERT INTO post_comment_link (rating_id_link,comment_id_link) VALUES (3,9);
INSERT INTO post_comment_link (rating_id_link,comment_id_link) VALUES (3, 9);
INSERT INTO post_comment_link (rating_id_link,comment_id_link) VALUES (3, 9);
INSERT INTO post_comment_link (rating_id_link,comment_id_link) VALUES (3, 9);
