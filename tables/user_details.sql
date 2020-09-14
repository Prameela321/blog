/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : task

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2020-09-14 19:03:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user_details
-- ----------------------------
DROP TABLE IF EXISTS `user_details`;
CREATE TABLE `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_details
-- ----------------------------
INSERT INTO `user_details` VALUES ('1', 'PRADEEP', 'THANDU', 'thandu.prameela321@g', '45678');
INSERT INTO `user_details` VALUES ('28', 'PRADEEP', 'THANDU', 'thandu.prameela321@gmail.com', '1244');
INSERT INTO `user_details` VALUES ('29', 'Prameela', 'THANDU', 'prameela.t@purplle.com', '145');
INSERT INTO `user_details` VALUES ('30', 'PRADEEP', 'THANDU', 'arvind.k@purplle.com', '1234');
INSERT INTO `user_details` VALUES ('31', 'PRADEEP', 'THANDU', 'pradeepmarshall7@gmail.com', '165');
INSERT INTO `user_details` VALUES ('32', 'PRADEEP', 'THANDU', 'n130189@rguktn.ac.in', '1344');
