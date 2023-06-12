/*
    Author : JunHyeong Lee
    File Name : user.sql
    Format : SQL
    Description : Table for storing user data
*/

CREATE TABLE IF NOT EXISTS `user` (
  `user_number` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_nickname` varchar(20) NOT NULL,
  `active` tinyint(4),
  `hash` varchar(512),
  PRIMARY KEY (`user_number`, `user_id`, `user_nickname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;