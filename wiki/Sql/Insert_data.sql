/*
 * /*@author Alex Marriott s4816928,
 version 2
 * 03/2/2018.
 * filename: insert_data.sql
 * The create tables script creates the necessary tables to work in the database. ID's for each table is auto incremented.
 */

INSERT INTO users (email_address, account_password,user_name) VALUES ("alex-blah123@gmail.com", "$2y$10$PGMDZKIA2YyukBSsSe0S0uCjZymNpQvjruUY/Fkj0jd6dUuhUNggi","amarriott");
INSERT INTO users (email_address, account_password,user_name) VALUES ("supercool23@gmail.com",  "$2y$10$Qs8dceZpm7Un/kc5ZczfV.LpViMxFoHW448s/EZUglzNGjolPkejy","toomanycooks");
INSERT INTO users (email_address, account_password,user_name) VALUES ("email_address@gmail.com", "$2y$10$eOAuMwGG.RY1yyLuU0dwQu2feviRTeIPC4n6wFGdhWOohjvBd114S","whatislife");

INSERT INTO categories (category_name) VALUES ("Networking");
INSERT INTO categories (category_name) VALUES ("Software");
INSERT INTO categories (category_name) VALUES ("Infrastructure");
INSERT INTO categories (category_name) VALUES ("System Design");
INSERT INTO categories (category_name) VALUES ("Hardware");
INSERT INTO categories (category_name) VALUES ("Databases");



INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Subnetting",1);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Classful",1);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Classless",1);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Java",2);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Ruby",2);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Python",2);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Centos",3);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Ubuntu",3);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Arch",3);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("UML",4);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Data Flow Diagrams",4);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Class Diagrams",4);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("RAM",5);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Network Cards",5);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("CPU",5);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Mysql",6);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("SQL",6);
INSERT INTO sub_categories (sub_category_name,category_id_FK) VALUES ("Redis",6);


INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("how to fix","how-to-fix","stuff about the postshere","default_image.jpg",1,1);
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("how to fix again","how-to-fix-again","stuff about thtics (style, behaviour) + CKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate a ﻿","default_image.jpg", 1,1);
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("This is a cool story","how-to-fix-again-once-more","stuff about thtics (style, behaviour) + CKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate a ﻿","default_image.jpg", 1,1);
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("greta times had by all","how-to-fix-again-another-time","stuff about thtics (style, behaviour) + CKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate a ﻿","default_image.jpg", 1,1);
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("how to fix again second time","how-to-fix-again-second-time","stuff about thtics (style, behaviour) + CKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate a ﻿","default_image.jpg", 1,1);
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("how to fix again last time","how-to-fix-again-last-time","stuff about thtics (style, behaviour) + CKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate a ﻿","default_image.jpg", 1,1);
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("how to fix again come on. time","how-to-fix-again-come-on-time","stuff about thtics (style, behaviour) + CKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate aCKEditor: when you truncate a ﻿","default_image.jpg", 1,1);


INSERT INTO comments (comment,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post",1,1);
INSERT INTO comments (comment,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", 1,2);

INSERT INTO post_ratings(post_id, rating) VALUES (1,1);
INSERT INTO post_ratings(post_id, rating) VALUES (2,2);
INSERT INTO post_ratings(post_id, rating) VALUES (3,5);
INSERT INTO post_ratings(post_id, rating) VALUES (4,5);