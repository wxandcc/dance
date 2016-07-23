 CREATE TABLE `wz_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(70) NOT NULL COMMENT '角色名称',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1有效 0无效',
  `created_time` datetime DEFAULT NULL COMMENT '注册时间',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `config` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色信息表';

CREATE TABLE `wz_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(70) NOT NULL COMMENT '用户名',
  `password` char(70) NOT NULL COMMENT '密码',
  `superman` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1超级管理员 0 普通管理员',
  `created_time` datetime DEFAULT NULL COMMENT '注册时间',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '封禁状态，0禁止 1正常',
  `login_ip` char(20) DEFAULT NULL COMMENT '登录ip',
  `login_time` int(11) DEFAULT NULL COMMENT '上一次登录时间',
  `login_count` int(10) DEFAULT '0' COMMENT '登陆次数',
  `update_password` int(10) DEFAULT '0' COMMENT '修改密码次数',
  `config` text,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='登录管理表'