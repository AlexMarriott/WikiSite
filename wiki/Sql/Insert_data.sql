/*
 * /*@author Alex Marriott s4816928,
 version 2
 * 03/2/2018.
 * filename: insert_data.sql
 * The create tables script creates the necessary tables to work in the database. ID's for each table is auto incremented.
 */

INSERT INTO users (email_address, account_password,user_name,user_image) VALUES ("alex-blah123@gmail.com", "$2y$10$u0vgiCaYIxWJWwUtW9YBx.TlTy/tER3/sD8Zd3A9nAflLXo8ZIch.","amarriott",'user_image.png');
INSERT INTO users (email_address, account_password,user_name,user_image) VALUES ("supercool23@gmail.com",  "$2y$10$u0vgiCaYIxWJWwUtW9YBx.TlTy/tER3/sD8Zd3A9nAflLXo8ZIch.","toomanycooks",'user_image.png');
INSERT INTO users (email_address, account_password,user_name,user_image) VALUES ("email_address@gmail.com", "$2y$10$u0vgiCaYIxWJWwUtW9YBx.TlTy/tER3/sD8Zd3A9nAflLXo8ZIch.","whatislife",'user_image.png');
INSERT INTO users (email_address, account_password,user_name,user_image) VALUES ("email_addrsupercool23ess@gmail.com", "$2y$10$u0vgiCaYIxWJWwUtW9YBx.TlTy/tER3/sD8Zd3A9nAflLXo8ZIch.","isthisreallife",'user_image.png');
INSERT INTO users (email_address, account_password,user_name,user_image) VALUES ("email_addsupercool23ress@gmail.com", "$2y$10$u0vgiCaYIxWJWwUtW9YBx.TlTy/tER3/sD8Zd3A9nAflLXo8ZIch.","awikisiteuser",'user_image.png');
INSERT INTO users (email_address, account_password,user_name,user_image) VALUES ("emaisupercool23l_address@gmail.com", "$2y$10$u0vgiCaYIxWJWwUtW9YBx.TlTy/tER3/sD8Zd3A9nAflLXo8ZIch.","acooleruser",'user_image.png');

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
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("What is a Subnet","What-is-a-Subnet","Each IP class is equipped with its own default subnet mask which bounds that IP class to have prefixed number of Networks and prefixed number of Hosts per network. Classful IP addressing does not provide any flexibility of having less number of Hosts per Network or more Networks per IP Class.
CIDR or Classless Inter Domain Routing provides the flexibility of borrowing bits of Host part of the IP address and using them as Network in Network, called Subnet. By using subnetting, one single Class A IP address can be used to have smaller sub-networks which provides better network management capabilities.
Class A Subnets
In Class A, only the first octet is used as Network identifier and rest of three octets are used to be assigned to Hosts (i.e. 16777214 Hosts per Network). To make more subnet in Class A, bits from Host part are borrowed and the subnet mask is changed accordingly.
For example, if one MSB (Most Significant Bit) is borrowed from host bits of second octet and added to Network address, it creates two Subnets (21=2) with (223-2) 8388606 Hosts per Subnet.
The Subnet mask is changed accordingly to reflect subnetting. Given below is a list of all possible combination of Class A subnets:
","default_image.jpg",1,2);
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("What is Classless routing","What-is-Classless-routing","Classless Inter-Domain Routing (CIDR, /ˈsaɪdər/ or /ˈsɪdər/) is a method for allocating IP addresses and IP routing. The Internet Engineering Task Force introduced CIDR in 1993 to replace the previous addressing architecture of classful network design in the Internet. Its goal was to slow the growth of routing tables on routers across the Internet, and to help slow the rapid exhaustion of IPv4 addresses.[1][2]

IP addresses are described as consisting of two groups of bits in the address: the most significant bits are the network prefix, which identifies a whole network or subnet, and the least significant set forms the host identifier, which specifies a particular interface of a host on that network. This division is used as the basis of traffic routing between IP networks and for address allocation policies.","default_image.jpg",6,3);
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("What is java?","what-is-java?","Java is a general-purpose computer-programming language that is concurrent, class-based, object-oriented,[15] and specifically designed to have as few implementation dependencies as possible. It is intended to let application developers (WORA),[16] meaning that compiled Java code can run on all platforms that support Java without the need for recompilation.[17] Java applications are typically compiled to bytecode that can run on any Java virtual machine (JVM) regardless of computer architecture. As of 2016, Java is one of the most popular programming languages in use,[18][19][20][21] particularly for client-server web applications, with a reported 9 million developers.[22] Java was originally developed by James Gosling at Sun Microsystems (which has since been acquired by Oracle Corporation) and released in 1995 as a core component of Sun Microsystems' Java platform. The language derives much of its syntax from C and C++, but it has fewer low-level facilities than either of them.","default_image.jpg",5,4);
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("What is ruby?","What-is-ruby?","Ruby is a dynamic, reflective, object-oriented, general-purpose programming language. It was designed and developed in the mid-1990s by Yukihiro  Matsumoto in Japan. According to the creator, Ruby was influenced by Perl, Smalltalk, Eiffel, Ada, and Lisp.[12] It supports multiple programming paradigms, including functional, object-oriented, and imperative. It also has a dynamic type system and automatic memory management.","default_image.jpg",5,5);
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("What is python?","What-is-python?","Python is an interpreted high-level programming language for general-purpose programming. Created by Guido van Rossum and first released in 1991, Python has a design philosophy that emphasizes code readability, notably using significant whitespace. It provides constructs that enable clear programming on both small and large scales.[26]

Python features a dynamic type system and automatic memory management. It supports multiple programming paradigms, including object-oriented, imperative, functional and procedural, and has a large and comprehensive standard library.[27]

Python interpreters are available for many operating systems. CPython, the reference implementation of Python, is open source software[28] and has a community-based development model, as do nearly all of its variant implementations. CPython is managed by the non-profit Python Software Foundation.","default_image.jpg",4,6);
INSERT INTO posts(post_title,slug,post_body,post_image,user_id_FK,sub_categories_FK) VALUES ("how to fix","how-to-fix","stuff about the postshere","default_image.jpg",1,1);


INSERT INTO comments (comment,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post",1,1);
INSERT INTO comments (comment,user_id_FK,post_id_FK) VALUES ("ayyyy lmao good post", 1,2);

INSERT INTO post_ratings(post_id, rating) VALUES (1,1);
INSERT INTO post_ratings(post_id, rating) VALUES (2,2);
INSERT INTO post_ratings(post_id, rating) VALUES (3,5);
INSERT INTO post_ratings(post_id, rating) VALUES (4,5);