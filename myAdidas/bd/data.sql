SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(255),
    type VARCHAR(255),
    targetAudience VARCHAR(255),
    possibleColors VARCHAR(255),
    images VARCHAR(255),
    collection VARCHAR(255),
    liked BOOLEAN DEFAULT FALSE,
    selectedItem BOOLEAN DEFAULT FALSE,
    quantity INT
);

CREATE TABLE accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    likeItemCollection INT,
    FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    total_price DECIMAL(10, 2),
    itemsSelected VARCHAR(255) 
);

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT,
    cart_id INT,
    total_price DECIMAL(10, 2) NOT NULL,
    validation BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (customer_id) REFERENCES account(id),
    FOREIGN KEY (cart_id) REFERENCES cart(id)
);


INSERT INTO products (productName, price, category, type, targetAudience, possibleColors, images, collection, liked, selectedItem, quantity)
VALUES 
('Air Max 90', 120.00, 'Shoes', 'Sneakers', 'Men', 'Red, Blue, Black', 'airmax90.jpg', 'Summer 2024', FALSE, FALSE, 50),
('Adidas Ultraboost', 150.00, 'Shoes', 'Running', 'Women', 'White, Pink, Grey', 'ultraboost.jpg', 'Winter 2023', TRUE, FALSE, 30),
('Converse Chuck Taylor', 60.00, 'Shoes', 'Casual', 'Unisex', 'Black, White, Navy', 'converse.jpg', 'Classic', FALSE, TRUE, 100);

INSERT INTO accounts (name, password, email, likeItemCollection)
VALUES 
('John Doe', 'password123', 'john.doe@example.com', 1),
('Jane Smith', 'securepass456', 'jane.smith@example.com', 2),
('Alex Johnson', 'mypassword789', 'alex.johnson@example.com', 3);

INSERT INTO carts (total_price, itemsSelected)
VALUES 
(120.00, 'Air Max 90'),
(150.00, 'Adidas Ultraboost'),
(60.00, 'Converse Chuck Taylor');

INSERT INTO transactions (account_id, cart_id, total_price, validation)
VALUES 
(1, 1, 120.00, TRUE),
(2, 2, 150.00, TRUE),
(3, 3, 60.00, FALSE);
