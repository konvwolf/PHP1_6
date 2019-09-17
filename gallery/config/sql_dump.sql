CREATE DATABASE IF NOT EXISTS gallery DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE gallery;

CREATE TABLE IF NOT EXISTS car_photos (
  id SERIAL,
  file_name VARCHAR(255),
  counter int(10) DEFAULT 0,
  description VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS user_comments (
  comment_id SERIAL,
  user_name VARCHAR(60),
  comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  comment_text TEXT
);

INSERT INTO car_photos (file_name, description)
  VALUES ('ford-explorer.jpg', 'Ford Explorer'),
         ('ford-focus.jpg', 'Ford Focus'),
         ('kia-ceed.jpg', 'Kia Ceed'),
         ('kia-rio.jpg', 'Kia Rio');