
SQL QUERIES:

# Table for posts: 
CREATE TABLE `blog_db`.`posts_tb` (`post_id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(150) NOT NULL , `subtitle` VARCHAR(100) NOT NULL , `content` MEDIUMTEXT NOT NULL , `tags` VARCHAR(50) NOT NULL , `date_created` TIMESTAMP NOT NULL , `user_id` INT NOT NULL , PRIMARY KEY (`post_id`)) ENGINE = InnoDB COMMENT = 'Table for posts.';