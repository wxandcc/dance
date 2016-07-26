-- MySQL dump 10.13  Distrib 5.6.23, for Linux (x86_64)
--
-- Host: localhost    Database: dance
-- ------------------------------------------------------
-- Server version	5.6.23-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE=''+00:00'' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=''NO_AUTO_VALUE_ON_ZERO'' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `wz_class`
--

DROP TABLE IF EXISTS `wz_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wz_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT ''课程名称'',
  `hard` int(11) NOT NULL COMMENT ''课程难度'',
  `age` int(11) NOT NULL COMMENT ''适用年龄段'',
  `cls` varchar(25) NOT NULL COMMENT ''分类'',
  `des` text NOT NULL COMMENT ''课程介绍'',
  `showCls` text NOT NULL COMMENT ''教学环境展示'',
  `clsTime` int(11) NOT NULL COMMENT ''课时'',
  `clsAim` text NOT NULL COMMENT ''预期效果'',
  `clsNotice` text NOT NULL COMMENT ''课程须知'',
  `created_time` datetime DEFAULT NULL COMMENT ''创建时间'',
  `updated_time` datetime DEFAULT NULL COMMENT ''最后修改时间'',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT=''课程表'';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wz_feedback`
--

DROP TABLE IF EXISTS `wz_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wz_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL COMMENT ''学生id'',
  `message` text NOT NULL COMMENT ''留言内容'',
  `enable` tinyint(1) NOT NULL DEFAULT ''1'' COMMENT ''1有效 0已删除'',
  `reply_type` tinyint(1) NOT NULL DEFAULT ''0'' COMMENT ''回复类型 1短信 2在线回复'',
  `reply` text COMMENT ''回复内容'',
  `created_time` datetime DEFAULT NULL COMMENT ''创建时间'',
  `updated_time` datetime DEFAULT NULL COMMENT ''最后修改时间'',
  `uid` int(11) DEFAULT NULL COMMENT ''管理员id'',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT=''留言'';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wz_good_student`
--

DROP TABLE IF EXISTS `wz_good_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wz_good_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT ''学员名称'',
  `gender` tinyint(1) NOT NULL DEFAULT ''0'' COMMENT ''性别 1 男 2 女'',
  `cls` varchar(25) NOT NULL COMMENT ''分类'',
  `age` int(11) NOT NULL COMMENT ''年龄'',
  `banner` varchar(255) NOT NULL COMMENT ''banner图片地址'',
  `des` text NOT NULL COMMENT ''介绍'',
  `created_time` datetime DEFAULT NULL COMMENT ''创建时间'',
  `updated_time` datetime DEFAULT NULL COMMENT ''最后修改时间'',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT=''优秀学员管理'';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wz_info`
--

DROP TABLE IF EXISTS `wz_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wz_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT ''资讯标题'',
  `cls` varchar(20) NOT NULL COMMENT ''资讯分类'',
  `from` varchar(50) DEFAULT NULL COMMENT ''来源'',
  `banner` varchar(255) NOT NULL COMMENT ''banner图片地址'',
  `content` text NOT NULL COMMENT ''正文'',
  `created_time` datetime DEFAULT NULL COMMENT ''创建时间'',
  `updated_time` datetime DEFAULT NULL COMMENT ''最后修改时间'',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT=''资讯管理'';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wz_photo`
--

DROP TABLE IF EXISTS `wz_photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wz_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL COMMENT ''剧照图片地址'',
  `cls` varchar(20) DEFAULT NULL COMMENT ''资讯分类'',
  `banner` varchar(255) NOT NULL COMMENT ''banner图片地址'',
  `des` text NOT NULL COMMENT ''剧照描述'',
  `created_time` datetime DEFAULT NULL COMMENT ''创建时间'',
  `updated_time` datetime DEFAULT NULL COMMENT ''最后修改时间'',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT=''剧照'';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wz_relationship`
--

DROP TABLE IF EXISTS `wz_relationship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wz_relationship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` char(70) NOT NULL COMMENT ''课程id'',
  `teacher_id` char(70) NOT NULL COMMENT ''教师ID'',
  `enable` tinyint(1) NOT NULL DEFAULT ''1'' COMMENT ''状态'',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT=''课程教师关系表'';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wz_resource`
--

DROP TABLE IF EXISTS `wz_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wz_resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(70) NOT NULL COMMENT ''资源名称'',
  `enable` tinyint(1) NOT NULL DEFAULT ''1'' COMMENT ''1有效 0无效'',
  `type` tinyint(1) NOT NULL DEFAULT ''1'' COMMENT ''资源类型 1图片 2视频'',
  `created_time` datetime DEFAULT NULL COMMENT ''创建时间'',
  `uid` int(11) NOT NULL COMMENT ''创建者ID'',
  `location` text COMMENT ''文件位置'',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_rolename` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT=''资源信息表'';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wz_role`
--

DROP TABLE IF EXISTS `wz_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wz_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(70) NOT NULL COMMENT ''角色名称'',
  `enable` tinyint(1) NOT NULL DEFAULT ''1'' COMMENT ''1有效 0无效'',
  `created_time` datetime DEFAULT NULL COMMENT ''注册时间'',
  `updated_time` datetime DEFAULT NULL COMMENT ''修改时间'',
  `config` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_rolename` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT=''角色信息表'';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wz_teacher`
--

DROP TABLE IF EXISTS `wz_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wz_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT ''教师名称'',
  `gender` tinyint(1) NOT NULL DEFAULT ''0'' COMMENT ''性别 1 男 2 女'',
  `cls` varchar(25) NOT NULL COMMENT ''分类'',
  `age` int(11) NOT NULL COMMENT ''年龄'',
  `des` text NOT NULL COMMENT ''介绍'',
  `phone` varchar(25) NOT NULL COMMENT ''手机号码'',
  `created_time` datetime DEFAULT NULL COMMENT ''创建时间'',
  `updated_time` datetime DEFAULT NULL COMMENT ''最后修改时间'',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT=''教师信息表'';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wz_user`
--

DROP TABLE IF EXISTS `wz_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wz_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(70) NOT NULL COMMENT ''用户名'',
  `password` char(70) NOT NULL COMMENT ''密码'',
  `superman` tinyint(1) NOT NULL DEFAULT ''0'' COMMENT ''1超级管理员 0 普通管理员'',
  `created_time` datetime DEFAULT NULL COMMENT ''注册时间'',
  `updated_time` datetime DEFAULT NULL COMMENT ''修改时间'',
  `status` tinyint(4) NOT NULL DEFAULT ''1'' COMMENT ''封禁状态，0禁止 1正常'',
  `login_ip` char(20) DEFAULT NULL COMMENT ''登录ip'',
  `login_time` int(11) DEFAULT NULL COMMENT ''上一次登录时间'',
  `login_count` int(10) DEFAULT ''0'' COMMENT ''登陆次数'',
  `update_password` int(10) DEFAULT ''0'' COMMENT ''修改密码次数'',
  `config` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_username` (`username`),
  KEY `username` (`username`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT=''登录管理表'';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-26 23:59:36
