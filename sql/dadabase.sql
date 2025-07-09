CREATE DATABASE IF NOT EXISTS test;
USE test;

-- 1. core_mex_currencies
DROP TABLE IF EXISTS core_mex_currencies;
CREATE TABLE core_mex_currencies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    currency_code VARCHAR(10) NOT NULL UNIQUE,
    currency_name VARCHAR(50) NOT NULL,
    symbol VARCHAR(10),
    image VARCHAR(255)
);

INSERT INTO core_mex_currencies (currency_code, currency_name, symbol, image) VALUES
('USD', 'US Dollar', '$', 'usd.png'),
('EUR', 'Euro', '€', 'eur.png'),
('GBP', 'British Pound', '£', 'gbp.png'),
('JPY', 'Japanese Yen', '¥', 'jpy.png'),
('BDT', 'Bangladeshi Taka', '৳', 'bdt.png');

-- 2. core_mex_customers
DROP TABLE IF EXISTS core_mex_customers;
CREATE TABLE core_mex_customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    id_type VARCHAR(50),
    id_number VARCHAR(100),
    phone VARCHAR(20),
    address TEXT,
    id_proof_document VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO core_mex_customers (name, id_type, id_number, phone, address, id_proof_document) VALUES
('Rahim Uddin', 'Passport', 'P12345678', '01710000000', 'Dhaka, Bangladesh', 'rahim_passport.pdf'),
('Karim Ali', 'NID', 'NID98765432', '01820000000', 'Chittagong, Bangladesh', 'karim_nid.pdf'),
('Anika Begum', 'Passport', 'P87654321', '01930000000', 'Sylhet, Bangladesh', 'anika_passport.pdf'),
('Jamal Hossain', 'NID', 'NID12345678', '01640000000', 'Khulna, Bangladesh', 'jamal_nid.pdf'),
('Sabrina Yasmin', 'Passport', 'P56781234', '01550000000', 'Rajshahi, Bangladesh', 'sabrina_passport.pdf');


-- 3. core_mex_exchange_rates
DROP TABLE IF EXISTS core_mex_exchange_rates;
CREATE TABLE core_mex_exchange_rates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    currency_from INT NOT NULL,
    currency_to INT NOT NULL,
    rate DECIMAL(15,6) NOT NULL,
    effective_date DATE NOT NULL,
    FOREIGN KEY (currency_from) REFERENCES core_mex_currencies(id),
    FOREIGN KEY (currency_to) REFERENCES core_mex_currencies(id)
);

INSERT INTO core_mex_exchange_rates (currency_from, currency_to, rate, effective_date) VALUES
(1, 5, 105.500000, '2025-07-08'),
(2, 5, 120.750000, '2025-07-08'),
(3, 5, 140.250000, '2025-07-08'),
(4, 5, 0.950000, '2025-07-08'),
(5, 1, 0.009500, '2025-07-08');


-- 4. core_mex_transactions
DROP TABLE IF EXISTS core_mex_transactions;
CREATE TABLE core_mex_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    currency_from INT NOT NULL,
    currency_to INT NOT NULL,
    amount_from DECIMAL(15,2) NOT NULL,
    amount_to DECIMAL(15,2) NOT NULL,
    rate DECIMAL(15,6) NOT NULL,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    agent_id INT,
    remarks TEXT,
    receipt_document VARCHAR(255),
    FOREIGN KEY (customer_id) REFERENCES core_mex_customers(id),
    FOREIGN KEY (currency_from) REFERENCES core_mex_currencies(id),
    FOREIGN KEY (currency_to) REFERENCES core_mex_currencies(id)
);

INSERT INTO core_mex_transactions (customer_id, currency_from, currency_to, amount_from, amount_to, rate, agent_id, remarks, receipt_document) VALUES
(1, 1, 5, 100.00, 10550.00, 105.500000, 101, 'Exchange USD to BDT', 'receipt1.pdf'),
(2, 2, 5, 200.00, 24150.00, 120.750000, 102, 'Exchange EUR to BDT', 'receipt2.pdf'),
(3, 3, 5, 150.00, 21037.50, 140.250000, 103, 'Exchange GBP to BDT', 'receipt3.pdf'),
(4, 4, 5, 5000.00, 4750.00, 0.950000, 104, 'Exchange JPY to BDT', 'receipt4.pdf'),
(5, 5, 1, 100000.00, 950.00, 0.009500, 105, 'Exchange BDT to USD', 'receipt5.pdf');


-- 5. core_mex_payments
DROP TABLE IF EXISTS core_mex_payments;
CREATE TABLE core_mex_payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaction_id INT NOT NULL,
    payment_method VARCHAR(50),
    payment_reference VARCHAR(100),
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    payment_document VARCHAR(255),
    FOREIGN KEY (transaction_id) REFERENCES core_mex_transactions(id)
);

INSERT INTO core_mex_payments (transaction_id, payment_method, payment_reference, payment_document) VALUES
(1, 'Cash', 'CASH1234', 'payment1.pdf'),
(2, 'Card', 'CARD5678', 'payment2.pdf'),
(3, 'Bank Transfer', 'BANK9012', 'payment3.pdf'),
(4, 'Mobile Money', 'MOMO3456', 'payment4.pdf'),
(5, 'Cash', 'CASH7890', 'payment5.pdf');


-- 6. core_mex_users
DROP TABLE IF EXISTS core_mex_users;
CREATE TABLE core_mex_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(100),
    role VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO core_mex_users (username, password_hash, full_name, role) VALUES
('admin', 'hash_admin_123', 'Administrator', 'admin'),
('agent1', 'hash_agent1_456', 'Agent One', 'agent'),
('agent2', 'hash_agent2_789', 'Agent Two', 'agent'),
('accountant', 'hash_account_101', 'Accountant', 'account'),
('manager', 'hash_manager_202', 'Manager', 'manager');


-- 7. core_mex_invoices
DROP TABLE IF EXISTS core_mex_invoices;
CREATE TABLE core_mex_invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    invoice_date DATE NOT NULL,
    total_amount DECIMAL(15,2) NOT NULL,
    status VARCHAR(20),
    FOREIGN KEY (customer_id) REFERENCES core_mex_customers(id)
);

INSERT INTO core_mex_invoices (customer_id, invoice_date, total_amount, status) VALUES
(1, '2025-07-01', 5000.00, 'Paid'),
(2, '2025-07-02', 3000.00, 'Unpaid'),
(3, '2025-07-03', 4500.50, 'Paid'),
(4, '2025-07-04', 7000.00, 'Pending'),
(5, '2025-07-05', 1200.00, 'Cancelled');


-- 8. core_mex_invoice_details
DROP TABLE IF EXISTS core_mex_invoice_details;
CREATE TABLE core_mex_invoice_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT NOT NULL,
    description VARCHAR(255),
    quantity INT DEFAULT 1,
    unit_price DECIMAL(15,2),
    total_price DECIMAL(15,2),
    FOREIGN KEY (invoice_id) REFERENCES core_mex_invoices(id)
);

INSERT INTO core_mex_invoice_details (invoice_id, description, quantity, unit_price, total_price) VALUES
(1, 'Currency Exchange Fee', 1, 5000.00, 5000.00),
(2, 'Service Charge', 1, 3000.00, 3000.00),
(3, 'Foreign Transaction Fee', 1, 4500.50, 4500.50),
(4, 'Late Payment Fee', 1, 7000.00, 7000.00),
(5, 'Discount Applied', 1, 1200.00, 1200.00);


-- 9. core_mex_purchases
DROP TABLE IF EXISTS core_mex_purchases;
CREATE TABLE core_mex_purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_name VARCHAR(100),
    purchase_date DATE NOT NULL,
    total_amount DECIMAL(15,2) NOT NULL,
    status VARCHAR(20)
);

INSERT INTO core_mex_purchases (supplier_name, purchase_date, total_amount, status) VALUES
('Supplier A', '2025-06-25', 10000.00, 'Completed'),
('Supplier B', '2025-06-26', 15000.50, 'Pending'),
('Supplier C', '2025-06-27', 7500.00, 'Completed'),
('Supplier D', '2025-06-28', 12000.00, 'Cancelled'),
('Supplier E', '2025-06-29', 5000.00, 'Completed');


-- 10. core_mex_purchase_details
DROP TABLE IF EXISTS core_mex_purchase_details;
CREATE TABLE core_mex_purchase_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    purchase_id INT NOT NULL,
    item_description VARCHAR(255),
    quantity INT DEFAULT 1,
    unit_price DECIMAL(15,2),
    total_price DECIMAL(15,2),
    FOREIGN KEY (purchase_id) REFERENCES core_mex_purchases(id)
);

INSERT INTO core_mex_purchase_details (purchase_id, item_description, quantity, unit_price, total_price) VALUES
(1, 'Currency Notes USD', 100, 50.00, 5000.00),
(2, 'Currency Notes EUR', 100, 75.00, 7500.00),
(3, 'Currency Notes GBP', 50, 100.00, 5000.00),
(4, 'Currency Notes JPY', 200, 30.00, 6000.00),
(5, 'Currency Notes BDT', 500, 10.00, 5000.00);


-- 11. core_mex_money_stocks
DROP TABLE IF EXISTS core_mex_money_stocks;
CREATE TABLE core_mex_money_stocks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    currency_id INT NOT NULL,
    quantity DECIMAL(15,2) NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (currency_id) REFERENCES core_mex_currencies(id)
);

INSERT INTO core_mex_money_stocks (currency_id, quantity) VALUES
(1, 50000.00),
(2, 40000.00),
(3, 30000.00),
(4, 20000.00),
(5, 1000000.00);


-- 12. core_mex_money_stock_adjustment_types
DROP TABLE IF EXISTS core_mex_money_stock_adjustment_types;
CREATE TABLE core_mex_money_stock_adjustment_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    description TEXT
);

INSERT INTO core_mex_money_stock_adjustment_types (name, description) VALUES
('Addition', 'Stock added due to purchase or correction'),
('Subtraction', 'Stock reduced due to sale or correction'),
('Correction', 'Stock corrected after audit'),
('Damaged', 'Stock damaged and removed'),
('Theft', 'Stock lost due to theft');


-- 13. core_mex_money_stock_adjustments
DROP TABLE IF EXISTS core_mex_money_stock_adjustments;
CREATE TABLE core_mex_money_stock_adjustments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adjustment_type_id INT NOT NULL,
    adjustment_date DATE NOT NULL,
    remarks TEXT,
    FOREIGN KEY (adjustment_type_id) REFERENCES core_mex_money_stock_adjustment_types(id)
);

INSERT INTO core_mex_money_stock_adjustments (adjustment_type_id, adjustment_date, remarks) VALUES
(1, '2025-07-01', 'Added new stock after purchase'),
(2, '2025-07-02', 'Reduced stock after sale'),
(3, '2025-07-03', 'Corrected stock after audit'),
(4, '2025-07-04', 'Removed damaged currency notes'),
(5, '2025-07-05', 'Lost stock due to theft');


-- 14. core_mex_money_stock_adjustment_details
DROP TABLE IF EXISTS core_mex_money_stock_adjustment_details;
CREATE TABLE core_mex_money_stock_adjustment_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adjustment_id INT NOT NULL,
    currency_id INT NOT NULL,
    quantity DECIMAL(15,2) NOT NULL,
    FOREIGN KEY (adjustment_id) REFERENCES core_mex_money_stock_adjustments(id),
    FOREIGN KEY (currency_id) REFERENCES core_mex_currencies(id)
);

INSERT INTO core_mex_money_stock_adjustment_details (adjustment_id, currency_id, quantity) VALUES
(1, 1, 1000.00),
(2, 2, 500.00),
(3, 3, 300.00),
(4, 4, 200.00),
(5, 5, 100.00);


-- 15. core_mex_status
DROP TABLE IF EXISTS core_mex_status;
CREATE TABLE core_mex_status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT
);

INSERT INTO core_mex_status (name, description) VALUES
('Active', 'The record is active and valid'),
('Inactive', 'The record is inactive'),
('Pending', 'The record is pending approval'),
('Cancelled', 'The record is cancelled'),
('Completed', 'The record is completed');


DROP TABLE IF EXISTS core_mex_adjustments;
CREATE TABLE core_mex_adjustments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    agent_id INT NOT NULL, -- foreign key to core_mex_agents
    amount DECIMAL(15,2) NOT NULL, -- adjustment amount
    type ENUM('credit', 'debit') NOT NULL, -- adjustment direction
    reason VARCHAR(255), -- reason or note for the adjustment
    created_by INT, -- admin/user who made the adjustment
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


INSERT INTO core_mex_adjustments (agent_id, amount, type, reason, created_by)
VALUES
(1, 500.00, 'credit', 'Initial balance', 100),
(2, 200.00, 'debit', 'Overpayment correction', 100),
(3, 150.00, 'credit', 'Manual bonus', 101),
(1, 100.00, 'debit', 'Adjustment error', 102),
(4, 300.00, 'credit', 'Referral reward', 100);


DROP TABLE IF EXISTS core_mex_agents;
CREATE TABLE core_mex_agents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO core_mex_agents (name, email, phone)
VALUES
('John Doe', 'john@example.com', '1234567890'),
('Jane Smith', 'jane@example.com', '2345678901'),
('Ali Khan', 'ali@example.com', '3456789012'),
('Maria Gomez', 'maria@example.com', '4567890123'),
('Chen Wei', 'chen@example.com', '5678901234');
