--
-- table `admin_role`
--
CREATE TABLE IF NOT EXISTS `admin_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- table `admin_rule`
--
CREATE TABLE IF NOT EXISTS `admin_rule` (
  `rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `resource` varchar(250) NOT NULL,
  `permission` tinyint(1) NOT NULL,
  PRIMARY KEY (`rule_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- table `admin_user`
--
CREATE TABLE IF NOT EXISTS `admin_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(200) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- table `admin_config`
--
CREATE TABLE IF NOT EXISTS `admin_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(250) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Contraints table `admin_rule`
--
ALTER TABLE `admin_rule`
  ADD CONSTRAINT `admin_rule_admin_role` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraints table `admin_user`
--
ALTER TABLE `admin_user`
  ADD CONSTRAINT `admin_user_admin_role` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;