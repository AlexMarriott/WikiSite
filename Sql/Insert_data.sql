/*
 * /*@author Alex Marriott s4816928,
 * 03/2/2018.
 * filename: insert_data.sql
 * The create tables script creates the necessary tables to work in the database. ID's for each table is auto incremented.
 */


INSERT INTO user_tbl (website_user_id, email_address, account_password,username) VALUES ("alex-blah123@gmail.com", "Blah1234","amarriott");
INSERT INTO user_tbl (website_user_id, email_address, account_password,username) VALUES ("supercool23@gmail.com", "supplier_name","toomanycooks");
INSERT INTO user_tbl (website_user_id, email_address, account_password,username) VALUES ("email_address@gmail.com", "123345","whatislife");

INSERT INTO categories_tbl (category_name) VALUES ("Networking");
INSERT INTO categories_tbl (category_name) VALUES ("Software");
INSERT INTO categories_tbl (category_name) VALUES ("Infrastructure");


INSERT INTO sub_categories_tbl (subcategory_name) VALUES ("Subnetting");
INSERT INTO sub_categories_tbl (subcategory_name) VALUES ("Classful");
INSERT INTO sub_categories_tbl (subcategory_name) VALUES ("Classless");
INSERT INTO sub_categories_tbl (subcategory_name) VALUES ("Java");
INSERT INTO sub_categories_tbl (subcategory_name) VALUES ("Python");
INSERT INTO sub_categories_tbl (subcategory_name) VALUES ("Ubuntu");
INSERT INTO sub_categories_tbl (subcategory_name) VALUES ("Centos");



INSERT INTO post_tbl (post_title,post_body,post_date) VALUES ("how to fix ","stuff about the post here", "2016-05-21");
INSERT INTO post_tbl (post_title,post_body,post_date) VALUES ("how to fix ","stuff about the post here", "2016-05-21");
INSERT INTO post_tbl (post_title,post_body,post_date) VALUES ("how to fix ","stuff about the post here", "2016-05-21");
INSERT INTO post_tbl (post_title,post_body,post_date) VALUES ("how to fix ","stuff about the post here", "2016-05-21");
INSERT INTO post_tbl (post_title,post_body,post_date) VALUES ("how to fix ","stuff about the post here", "2016-05-21");


INSERT INTO comments_tbl (customer_id,comment,comment_date) VALUES ("ayyyy lmao good post", "2017-03-12");
INSERT INTO comments_tbl (customer_id,comment,comment_date) VALUES ("ayyyy lmao good post", "2017-03-12");
INSERT INTO comments_tbl (customer_id,comment,comment_date) VALUES ("ayyyy lmao good post", "2017-03-12");
INSERT INTO comments_tbl (customer_id,comment,comment_date) VALUES ("ayyyy lmao good post", "2017-03-12");



INSERT INTO rating_comment_link (rating_id_link_FK,comment_id_link_FK) VALUES ("0001","0001");
INSERT INTO rating_comment_link (rating_id_link_FK,comment_id_link_FK) VALUES ("0001","0001");
INSERT INTO rating_comment_link (rating_id_link_FK,comment_id_link_FK) VALUES ("0001","0001");



INSERT INTO cat_subcat_link (category_id_link_FK,category_id_link_FK) VALUES ("0001", "0001");
INSERT INTO cat_subcat_link (category_id_link_FK,category_id_link_FK) VALUES ("0001", "0001");
INSERT INTO cat_subcat_link (category_id_link_FK,category_id_link_FK) VALUES ("0001", "0001");
