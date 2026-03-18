-- Database for Manipur Chart
CREATE DATABASE IF NOT EXISTS manipur_chart_live;
USE manipur_chart_live;

-- Important: Drop existing tables to ensure they are re-created with new columns
DROP TABLE IF EXISTS live_results;
DROP TABLE IF EXISTS page_content;

-- Table for Live Results
CREATE TABLE live_results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    market_name VARCHAR(50) NOT NULL,
    open_panna VARCHAR(10),
    jodi VARCHAR(10),
    close_panna VARCHAR(10),
    open_time VARCHAR(20),
    close_time VARCHAR(20),
    result_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for Page Content (Optional, for SEO data persistence)
CREATE TABLE page_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    keyword VARCHAR(255) UNIQUE,
    content TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert Professional Sample Data for Multiple Markets
INSERT INTO live_results (market_name, open_panna, jodi, close_panna, open_time, close_time) VALUES 
('SRIDEVI', '123', '45', '678', '11:35 AM', '12:35 PM'),
('TIME BAZAR', '234', '56', '789', '01:00 PM', '02:00 PM'),
('SRIDEVI DAY', '345', '67', '890', '01:30 PM', '02:30 PM'),
('MILAN DAY', '456', '78', '901', '03:00 PM', '05:00 PM'),
('KALYAN', '567', '89', '012', '03:55 PM', '05:55 PM'),
('MANIPUR DAY', '346', '38', '279', '12:00 PM', '01:00 PM'),
('MILAN NIGHT', '678', '90', '123', '09:00 PM', '11:00 PM'),
('KALYAN NIGHT', '789', '01', '234', '09:25 PM', '11:30 PM'),
('MANIPUR NIGHT', '890', '12', '345', '08:00 PM', '09:00 PM');
