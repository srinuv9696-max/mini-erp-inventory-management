-- MySQL schema for mini-erp-inventory-management

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES
('admin', 'admin_pass', 'admin@example.com'),
('user1', 'user1_pass', 'user1@example.com');

CREATE TABLE product_master (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    product_code VARCHAR(50) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO product_master (product_name, product_code) VALUES
('Product A', 'PROD_A'),
('Product B', 'PROD_B');

CREATE TABLE semi_finished_stock_in (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    quantity INT NOT NULL,
    in_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES product_master(product_id)
);

INSERT INTO semi_finished_stock_in (product_id, quantity) VALUES
(1, 100),
(2, 200);

CREATE TABLE semi_finished_stock_out (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    quantity INT NOT NULL,
    out_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES product_master(product_id)
);

INSERT INTO semi_finished_stock_out (product_id, quantity) VALUES
(1, 50),
(2, 30);

CREATE TABLE finished_goods_stock_in (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    quantity INT NOT NULL,
    in_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES product_master(product_id)
);

INSERT INTO finished_goods_stock_in (product_id, quantity) VALUES
(1, 150),
(2, 80);

CREATE TABLE finished_goods_stock_out (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    quantity INT NOT NULL,
    out_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES product_master(product_id)
);

INSERT INTO finished_goods_stock_out (product_id, quantity) VALUES
(1, 100),
(2, 40);

CREATE TABLE packing_material_stock_in (
    id INT AUTO_INCREMENT PRIMARY KEY,
    material_name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    in_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO packing_material_stock_in (material_name, quantity) VALUES
('Packing Material A', 500),
('Packing Material B', 300);

CREATE TABLE packing_material_stock_out (
    id INT AUTO_INCREMENT PRIMARY KEY,
    material_name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    out_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO packing_material_stock_out (material_name, quantity) VALUES
('Packing Material A', 200),
('Packing Material B', 100);

CREATE TABLE audit_trail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    action VARCHAR(255) NOT NULL,
    action_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO audit_trail (user_id, action) VALUES
(1, 'Created product A'),
(2, 'Updated product B');

-- End of MySQL schema