-- Create the database
CREATE DATABASE IF NOT EXISTS user_login_db;

-- Use the database
USE user_login_db;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
);

-- Insert initial data
INSERT INTO users (username, password) VALUES ('admin', 'admin123');
