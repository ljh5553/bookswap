/*
    Author : 이준형
    File Name : post.sql
    Format : SQL
    Description : 게시글 정보를 저장하는 테이블
*/

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `writer` varchar(20) NOT NULL,
  `subject` text NOT NULL,
  `contents` text NOT NULL,
  `image` longblob,
  `date` datetime NOT NULL,
  PRIMARY KEY (`post_id`),
  FOREIGN KEY (`writer`) REFERENCES `user` (`user_nickname`);
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;