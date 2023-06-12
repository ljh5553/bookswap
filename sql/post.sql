/*
    Author : JunHyeong Lee
    File Name : post.sql
    Format : SQL
    Description : Table for storing postings
*/

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `writer` varchar(20) NOT NULL,
  `subject` text NOT NULL,
  `contents` text NOT NULL,
  `image` longblob,
  `date` datetime NOT NULL,
  PRIMARY KEY (`post_id`),
  FOREIGN KEY (`writer`) REFERENCES `user` (`user_nickname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;