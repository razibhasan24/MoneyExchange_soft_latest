CREATE DATABASE IF NOT EXISTS test;
USE test;

1. core_mex_transactions
DROP TABLE IF EXISTS core_mex_transactions;

CREATE TABLE core_mex_transactions (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    agent_id INT,
    transaction_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_amount_paid DECIMAL(18,2) NOT NULL,
    total_received DECIMAL(18,2) NOT NULL,
    status ENUM('PENDING', 'COMPLETED', 'FAILED', 'CANCELLED') DEFAULT 'PENDING',
    payment_method VARCHAR(50),
    remarks TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO core_mex_transactions (customer_id, agent_id, total_amount_paid, total_received, status, payment_method, remarks) VALUES
(1, 101, 1000.00, 920.00, 'COMPLETED', 'cash', 'USD to EUR'),
(2, 102, 500.00, 460.00, 'COMPLETED', 'card', 'USD to GBP'),
(3, 103, 750.00, 690.00, 'PENDING', 'bank_transfer', 'EUR to INR'),
(4, 101, 1200.00, 1104.00, 'FAILED', 'cash', 'USD to CAD'),
(5, 104, 300.00, 270.00, 'COMPLETED', 'mobile_wallet', 'USD to BDT');



-- 2. core_mex_payments
DROP TABLE IF EXISTS core_mex_payments;

CREATE TABLE core_mex_payments (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    transaction_id INT  NOT NULL,
    payment_method VARCHAR(50),
    payment_reference VARCHAR(100),
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    payment_document VARCHAR(255),
    CONSTRAINT fk_transaction FOREIGN KEY (transaction_id) REFERENCES core_mex_transactions(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO core_mex_payments (transaction_id, payment_method, payment_reference, payment_document) VALUES
(1, 'Cash', 'CASH1234', 'payment1.pdf'),
(2, 'Card', 'CARD5678', 'payment2.pdf'),
(3, 'Bank Transfer', 'BANK9012', 'payment3.pdf'),
(4, 'Mobile Money', 'MOMO3456', 'payment4.pdf'),
(5, 'Cash', 'CASH7890', 'payment5.pdf');



-- 3. core_mex_transactions_details
DROP TABLE IF EXISTS core_mex_transactions_details;

CREATE TABLE core_mex_transactions_details (
    id             INT AUTO_INCREMENT PRIMARY KEY,
    transaction_id INT  NOT NULL,
    source_currency VARCHAR(3) NOT NULL,
    target_currency VARCHAR(3) NOT NULL,
    source_amount DECIMAL(18, 2) NOT NULL,
    exchange_rate DECIMAL(18, 6) NOT NULL,
    target_amount DECIMAL(18, 2) NOT NULL,
    fee_amount DECIMAL(18, 2) DEFAULT 0,
    transaction_type ENUM('BUY', 'SELL') NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_transaction_detail FOREIGN KEY (transaction_id) REFERENCES core_mex_transactions(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO core_mex_transactions_details (transaction_id, source_currency, target_currency, source_amount, exchange_rate, target_amount, fee_amount, transaction_type) VALUES
(1, 'USD', 'EUR', 1000.00, 0.920000, 920.00, 5.00, 'SELL'),
(2, 'USD', 'GBP', 500.00, 0.920000, 460.00, 2.50, 'SELL'),
(3, 'EUR', 'INR', 750.00, 92.000000, 69000.00, 10.00, 'BUY'),
(4, 'USD', 'CAD', 1200.00, 0.920000, 1104.00, 7.00, 'SELL'),
(5, 'USD', 'BDT', 300.00, 90.000000, 27000.00, 1.50, 'SELL');

-- DROP IF EXISTS

DROP TABLE IF EXISTS core_mex_money_receipts;

-- MAIN MONEY RECEIPT TABLE
CREATE TABLE core_mex_money_receipts (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    receipt_number VARCHAR(50) UNIQUE NOT NULL,
    transaction_id INT  NOT NULL,
    customer_id INT NOT NULL,
    agent_id INT,
    total_amount DECIMAL(18, 2) NOT NULL,
    payment_method VARCHAR(50),
    status ENUM('PENDING', 'PAID', 'CANCELLED') DEFAULT 'PENDING',
    issued_by VARCHAR(100),
    issued_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    notes TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_receipt_transaction FOREIGN KEY (transaction_id) REFERENCES core_mex_transactions(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- MONEY RECEIPT DETAILS TABLE

DROP TABLE IF EXISTS core_mex_money_receipt_details;
CREATE TABLE core_mex_money_receipt_details (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    receipt_id INT  NOT NULL,
    currency_code VARCHAR(3) NOT NULL, -- e.g., USD, EUR
    amount DECIMAL(18, 2) NOT NULL,
    exchange_rate DECIMAL(18, 6),
    equivalent_amount DECIMAL(18, 2),
    fee DECIMAL(18, 2) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_receipt_details FOREIGN KEY (receipt_id) REFERENCES core_mex_money_receipts(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------
-- 🔽 INSERT SAMPLE DATA (5 entries each)
-- -------------------------------------------------------

-- INSERT INTO core_mex_money_receipts
INSERT INTO core_mex_money_receipts (receipt_number, transaction_id, customer_id, agent_id, total_amount, payment_method, status, issued_by, notes)
VALUES
('RCPT001', 1, 1, 101, 1000.00, 'cash', 'PAID', 'Admin', 'Payment for USD to EUR'),
('RCPT002', 2, 2, 102, 500.00, 'card', 'PAID', 'Admin', 'Payment for USD to GBP'),
('RCPT003', 3, 3, 103, 750.00, 'bank_transfer', 'PENDING', 'Cashier1', 'Payment for EUR to INR'),
('RCPT004', 4, 4, 101, 1200.00, 'cash', 'CANCELLED', 'Admin', 'Cancelled transaction'),
('RCPT005', 5, 5, 104, 300.00, 'mobile_wallet', 'PAID', 'BranchManager', 'Payment for USD to BDT');

-- INSERT INTO core_mex_money_receipt_details
INSERT INTO core_mex_money_receipt_details (receipt_id, currency_code, amount, exchange_rate, equivalent_amount, fee)
VALUES
(1, 'USD', 1000.00, 0.920000, 920.00, 5.00 ),
(2, 'USD', 500.00, 0.920000, 460.00, 2.50),
(3, 'EUR', 750.00, 92.000000, 69000.00, 10.00),
(4, 'USD', 1200.00, 0.920000, 1104.00, 7.00),
(5, 'USD', 300.00, 90.000000, 27000.00, 1.50);
