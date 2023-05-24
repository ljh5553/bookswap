/*
    Author : 이준형
    File Name : setting_db.sql
    Format : SQL
    Description : SQL 파일을 한 번에 설정하는 마스터 SQL
*/

CREATE DATABASE bookswap default CHARACTER SET UTF8;
USE bookswap;

CREATE TABLE IF NOT EXISTS `user` (
  `user_number` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_nickname` varchar(20) NOT NULL,
  `active` tinyint(4),
  `hash` varchar(512),
  PRIMARY KEY (`user_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `chat` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `msg` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`no`),
  KEY `date` (`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;