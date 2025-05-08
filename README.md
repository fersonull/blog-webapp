# Alwrite (Blog WebApp)
The Blog Web App is a content management platform that allows users to create, manage, and interact with blog posts. It includes essential blogging functionality and user interaction features, making it ideal for personal or collaborative content sharing.

# Database Credentials

hosting : {
  username: "4629942_blogdb",
  password: "Jplus314159265pi_"
}

local : {
  username: "root",
  password: ""
}


# Table for posts 
CREATE TABLE `blog_db`.`posts_tb` (`post_id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(150) NOT NULL , `subtitle` VARCHAR(100) NOT NULL , `content` MEDIUMTEXT NOT NULL , `tags` VARCHAR(50) NOT NULL , `date_created` TIMESTAMP NOT NULL , `user_id` INT NOT NULL , PRIMARY KEY (`post_id`)) ENGINE = InnoDB COMMENT = 'Table for posts.';


# Table for comments_tb
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

# Table for users_tb
CREATE TABLE `users_tb` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10014 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table for all users.'


# Table for posts_tb

posts_tb	CREATE TABLE `posts_tb` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `title` varchar(150) NOT NULL,
  `subtitle` text NOT NULL,
  `content` mediumtext NOT NULL,
  `tags` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `fk_user_post` (`user_id`),
  CONSTRAINT `fk_user_post` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20035 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table for posts.'	
