-- Create database
CREATE DATABASE IF NOT EXISTS demo_db;
USE demo_db;

-- Create table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
);

-- Insert sample data (optional)
INSERT INTO users (name) VALUES
('Ali'),
('Sara'),
('Zain');
