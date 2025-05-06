# Blog WebApp

# Table for posts 
CREATE TABLE `blog_db`.`posts_tb` (`post_id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(150) NOT NULL , `subtitle` VARCHAR(100) NOT NULL , `content` MEDIUMTEXT NOT NULL , `tags` VARCHAR(50) NOT NULL , `date_created` TIMESTAMP NOT NULL , `user_id` INT NOT NULL , PRIMARY KEY (`post_id`)) ENGINE = InnoDB COMMENT = 'Table for posts.';


# Table for comments
CREATE TABLE `comments_tb` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `commented_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`comment_id`),
  KEY `fk_user_id` (`user_id`),
  KEY `fk_post_id` (`post_id`),
  CONSTRAINT `fk_post_id` FOREIGN KEY (`post_id`) REFERENCES `posts_tb` (`post_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

# Table form posts
