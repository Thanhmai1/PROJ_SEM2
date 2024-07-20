CREATE TABLE `Role` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50),
   is_default BOOLEAN DEFAULT FALSE
);

INSERT INTO Role (name, is_default) VALUES ('admin', FALSE), ('user', TRUE);

CREATE TABLE `Categories` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `namecategories` varchar(50)
);

INSERT INTO Categories (namecategories) VALUES ('Healthy'), ('Fat Food'), ('Smoothy'), ('Quick Filling');

CREATE TABLE `Dish` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `category_id` int,
  `thumbnail` text,
  `title` varchar(100),
   FOREIGN KEY (category_id) REFERENCES Categories(id)
);

CREATE TABLE `Person_Types` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `person_types` varchar(50),
  `description` varchar(255),
  `bmi_min` decimal(5,2),
  `bmi_max` decimal(5,2)
);

INSERT INTO Person_Types (person_types, description, bmi_min, bmi_max) VALUES
('Underweight', 'BMI < 18.5', NULL, 18.5),
('Normal weight', 'BMI between 18.5 and 24.9', 18.5, 24.9),
('Overweight', 'BMI between 25 and 29.9', 25.0, 29.9),
('Obese', 'BMI between 30 and 34.9', 30.0, 34.9),
('Extremely Obese', 'BMI > 35', 35.0, NULL);

CREATE TABLE `User` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(50),
  `email` varchar(50),
  `password` varchar(500),
  `role_id` int,
  `person_type_id` int,
  `created_at` datetime,
  `update_at` datetime,
  verification_code VARCHAR(50) NOT NULL,
  FOREIGN KEY (role_id) REFERENCES Role(id),
  FOREIGN KEY (person_type_id) REFERENCES Person_Types(id)
);

CREATE TABLE `Menu` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `person_type_id` int,
  `dish_id` int,
  FOREIGN KEY (person_type_id) REFERENCES Person_Types(id),
  FOREIGN KEY (dish_id) REFERENCES Dish(id)
);

CREATE TABLE `Dish_Detail` (
  `recipe_id` int,
  `thumbnail` text ,
  `title` varchar(100),
  `prepare` varchar(20),
  `process` varchar(20),
  `intendedFor` varchar(20),
  `introduction` varchar(300),
  `popularity` varchar(300),
  `aboutatfood` varchar(500),
  `thumbnailhtc` text,
  `ingredient` varchar(300),
  `howdoit` varchar(2000),
   FOREIGN KEY (recipe_id) REFERENCES Dish(id)
);

CREATE TABLE `Comment` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `comment_id` int,
  `user_id` int,
  `name` varchar(50),
  `thumbnail` varchar(500),
  `comment` varchar(300),
  `recipe_id` int,
  `created_at` datetime,
  FOREIGN KEY (user_id) REFERENCES User(id),
  FOREIGN KEY (recipe_id) REFERENCES Menu(id)
);

CREATE TABLE `RecentPost` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `recipe_id` int,
  `thumbnail` text,
  `update` datetime,
  `title` varchar(300),
   FOREIGN KEY (recipe_id) REFERENCES Menu(id)
);
CREATE TABLE pending_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    role_id INT NOT NULL,
    person_type_id INT,
    
    created_at VARCHAR(100) NOT NULL,
    updated_at VARCHAR(100) NOT NULL 
);

ALTER TABLE pending_user 
CHANGE COLUMN name username VARCHAR(100) UNIQUE NOT NULL;

ALTER TABLE pending_user
ADD password VARCHAR(100);

