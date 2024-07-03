SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_senha` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_tipo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_email`) VALUES
(6, 'elias11', '$2y$10$duWMWfZXM0dqyiKGuMHJee3pzlxkxbCzLtnyV9rSZqC/kclhabFq6', 'Elias A', 'elias@example.com'),
(7, 'john23', '$2y$10$Yo4yI.cU4BOy7Fvg73fbG.CaaOUJx95Qj/iXKHaobJ1jxBeekxzmS', 'John Doe', 'john@jo.com');

ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;