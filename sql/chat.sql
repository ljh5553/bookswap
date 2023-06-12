/*
    Source : https://dev.epiloum.net/1395 by Epiloum
    Modifier : JunHyeong Lee
    File Name : chat.sql
    Format : SQL
    Description : Table for chatting
*/

CREATE TABLE IF NOT EXISTS `chat` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `msg` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`no`),
  KEY `date` (`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;