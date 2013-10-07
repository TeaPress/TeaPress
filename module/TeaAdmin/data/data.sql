--
-- Content table `admin_role`
--
INSERT INTO `admin_role` (`role_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', NOW(), NOW());

--
-- Content table `admin_rule`
--
INSERT INTO `admin_rule` (`rule_id`, `role_id`, `resource`, `permission`) VALUES
(1, 1, 'all', 1);