USE LCN;

-- Create the new table for provider registration
CREATE TABLE provider_register (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id VARCHAR(50) NOT NULL UNIQUE,  -- Employee ID
    name VARCHAR(100) NOT NULL,                -- Full Name
    email VARCHAR(100) NOT NULL UNIQUE,        -- Email
    mobile VARCHAR(15) NOT NULL,               -- Mobile Number
    password VARCHAR(255) NOT NULL,            -- Password
    confirm_password VARCHAR(255) NOT NULL     -- Confirm Password
);

-- Create the updated provider_login table
CREATE TABLE provider_login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,      -- Username (from email or employee ID)
    password VARCHAR(255) NOT NULL             -- Password
);

-- Update provider_login with provider name and password
-- Assuming 'provider_login' should have the name and password fields
ALTER TABLE provider_login 
    ADD COLUMN name VARCHAR(100) NOT NULL,     -- Adding name for the provider (this can be fetched from provider_register table)
    ADD COLUMN email VARCHAR(100) NOT NULL UNIQUE; -- Adding email for the provider (again, can be fetched from provider_register table)

-- If you'd like to update provider_login with data from provider_register,
-- assuming both tables are related by 'employee_id' or 'email':
UPDATE provider_login p
JOIN provider_register r ON p.username = r.employee_id
SET p.name = r.name, p.email = r.email;
