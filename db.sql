 CREATE TABLE `wz_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(70) NOT NULL COMMENT '角色名称',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1有效 0无效',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `config` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色信息表';

CREATE TABLE `wz_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(70) NOT NULL COMMENT '用户名',
  `password` char(70) NOT NULL COMMENT '密码',
  `superman` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1超级管理员 0 普通管理员',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='登录管理表';

 CREATE TABLE `wz_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL COMMENT '学生id',
  `message` text NOT NULL COMMENT '留言内容',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1有效 0已删除',
  `reply_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '回复类型 1短信 2在线回复',
  `reply` text null COMMENT '回复内容',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '最后修改时间',
  `uid` int(11) NULL COMMENT '管理员id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='留言' ;

