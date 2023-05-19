/*
    Author : 이준형
    File Name : user.sql
    Format : SQL
    Description : 유저 정보를 저장하는 테이블
*/

CREATE TABLE IF NOT EXISTS `user` (
  `user_number` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_nickname` varchar(20) NOT NULL,
  `active` tinyint(4),
  `hash` varchar(512),
  PRIMARY KEY (`user_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;