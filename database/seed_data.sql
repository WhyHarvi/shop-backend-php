USE project_store;

-- USERS
INSERT INTO users (username, email, password, shipping_address)
VALUES 
('harvi', 'harvi@example.com', 'hashedpass1', '123 Maple St, Ontario'),
('Jieliang', 'jieliang@example.com', 'hashedpass2', '456 Oak St, Toronto'),
('joban', 'joban@example.com', 'hashedpass3', '789 Pine St, Waterloo');

-- PRODUCTS
INSERT INTO products (name, description, image, price, shipping_cost)
VALUES 
('Coffee Mug', 'Ceramic mug for hot drinks', 'https://via.placeholder.com/150', 9.99, 2.50),
('Notebook', 'Hardcover ruled notebook', 'https://via.placeholder.com/150', 5.49, 1.20),
('Wireless Mouse', 'Compact ergonomic mouse', 'https://via.placeholder.com/150', 15.99, 3.00),
('USB-C Charger', 'Fast 25W USB-C charger', 'https://via.placeholder.com/150', 18.99, 2.75),
('Water Bottle', 'Stainless steel insulated bottle', 'https://via.placeholder.com/150', 12.50, 2.00);

-- CART
INSERT INTO cart (user_id, product_id, quantity)
VALUES 
(1, 1, 2),  -- Harvi adds 2 Coffee Mugs
(1, 3, 1),  -- Harvi adds 1 Wireless Mouse
(2, 2, 3);  -- Jeliang adds 3 Notebooks

-- ORDERS
INSERT INTO orders (user_id, total_amount)
VALUES 
(1, 35.97),  -- Harvi’s order
(2, 16.47);  --Jeliang’s order

-- COMMENTS
INSERT INTO comments (user_id, product_id, rating, image, text)
VALUES 
(1, 1, 5, 'https://via.placeholder.com/100', 'Amazing mug! Keeps coffee warm.'),
(2, 2, 4, '', 'Notebook pages are smooth, great quality.'),
(3, 3, 3, '', 'Mouse works well but feels a bit too light.');
