/*
 * /*@author Alex Marriott s4816928,
 version 2
 * 03/2/2018.
 * filename: insert_data.sql
 * The create tables script creates the necessary tables to work in the database. ID's for each table is auto incremented.
 */

INSERT INTO users (email_address, account_password,username) VALUES ("alex-blah123@gmail.com", "Blah1234","amarriott");
INSERT INTO users (email_address, account_password,username) VALUES ("supercool23@gmail.com", "supplier_name","toomanycooks");
INSERT INTO users (email_address, account_password,username) VALUES ("email_address@gmail.com", "123345","whatislife");

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

INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("how-to-fix","stuff about the postshere", "2016-05-21",1,1,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("how-not-to-fix","ayyyy lmao what up", "2016-05-21",2,2,2);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("GivenanumberA","stuff about the postshere", "2016-05-21",1,3,3);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("Give-nanu-mberA","stuff about the postshere", "2016-05-21",3,4,4);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("gucci-gang","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("sick-new-thing","stuff about the postshere", "2016-05-21",3,5,2);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("blah-bl;ahl-blag","stuff about the postshere", "2016-05-21",3,5,3);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("1233-blah","stuff about the postshere", "2016-05-21",3,5,4);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toomanycooks","stuff about the postshere", "2016-05-21",3,5,5);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("how-to-xtoomanycooks-toomanycooks","stuff about the postshere", "2016-05-21",3,5,6);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("how-toxomanycooks-fix","stuff about the postshere", "2016-05-21",3,5,7);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("how-to-toomxanycooks","stuff about the postshere", "2016-05-21",3,5,2);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("asddasdsadasdas-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("tooman2ycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("too6manycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toom3anycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("too7manycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("tooma4nycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("tooma5nycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("tooma4nyc32ooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toomanyc3123ookbs-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("to8o21321321321manycoovks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toom543543anycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("t9ooma5345435nycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("tooma4werwernycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("tooma6nfdsdsfycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("too2manysdfsdfsdfcooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("too3maasdasdasdnycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toom3anadasasycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toom1ancgdfdfgycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toomanygdfgdfgcookfs-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toomanyfcooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("5toomanyc6ooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toomanycosadasdasdasdoks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toomanyco7oks-t8o-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toomanyco0oks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toomaasdsadasdasdnycooks-to9-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toomanasdasdasdasdasycooks-to--fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toomadnycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toomarnycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toomanfycooks-to-fix","stuff about the postshere", "2016-05-21",3,5,1);
INSERT INTO posts(post_title,post_body,post_date,user_id_FK,rating_id_FK,sub_categories_FK) VALUES ("toofdsfasdfasdfsdafmanycfdsfdsfdsfdookss-to-fix","stuff about the postshere", "2016-05-21",3,5,1);


INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",1,1);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",1,2);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",1,3);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",1,4);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",1,1);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",1,2);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",1,3);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",1,4);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",1,1);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",1,2);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",1,3);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",1,4);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",2,1);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",3,1);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",2,1);
INSERT INTO comments (comment,comment_date,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", "2017-03-12",3,1);