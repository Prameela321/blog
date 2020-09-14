/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : task

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2020-09-14 19:04:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for post_details
-- ----------------------------
DROP TABLE IF EXISTS `post_details`;
CREATE TABLE `post_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of post_details
-- ----------------------------
INSERT INTO `post_details` VALUES ('1', 'Cream cleansers.', 'Apply a coin-sized amount of your chosen cleanser, work between your hands and apply to face. Massage into your skin, including your neck. Rinse with lukewarm water, or remove with our Muslin Cloth. Use a cotton pad to apply your chosen toner to dry, clea', 'cleansersyyy', null);
INSERT INTO `post_details` VALUES ('3', 'face cream', 'Apply a coin-sized amount of your chosen cleanser, work between your hands and apply to face. Massage into your skin, including your neck. Rinse with lukewarm water, or remove with our Muslin Cloth. Use a cotton pad to apply your chosen toner to dry, clea', 'skin care', null);
INSERT INTO `post_details` VALUES ('5', 'Cream cleansers.', 'Apply a coin-sized amount of your chosen cleanser, work between your hands and apply to face. Massage into your skin, including your neck. Rinse with lukewarm water, or remove with our Muslin Cloth. Use a cotton pad to apply your chosen toner to dry, clea', 'cleansers', null);
INSERT INTO `post_details` VALUES ('6', '234', '234435 n34tr', 'cleansers', null);
INSERT INTO `post_details` VALUES ('7', 'Cream cleansers.', 'Apply a coin-sized amount of your chosen cleanser, work between your hands and apply to face. Massage into your skin, including your neck. Rinse with lukewarm water, or remove with our Muslin Cloth. Use a cotton pad to apply your chosen toner to dry, clea', 'cleansers', null);
INSERT INTO `post_details` VALUES ('8', 'Cream cleansers.', 'Apply a coin-sized amount of your chosen cleanser, work between your hands and apply to face. Massage into your skin, including your neck. Rinse with lukewarm water, or remove with our Muslin Cloth. Use a cotton pad to apply your chosen toner to dry, clea', '123', null);
INSERT INTO `post_details` VALUES ('10', 'Cream cleansers.', 'testcouponarthn 457689  r5t76yu8i99p  4567890- 4567890 678', 'cleansers', null);
