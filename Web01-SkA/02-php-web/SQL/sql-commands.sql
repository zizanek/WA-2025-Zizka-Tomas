CREATE TABLE wa_test (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL,
    user_surname VARCHAR(50) NOT NULL,
    user_email VARCHAR(100) NOT NULL UNIQUE,
    user_age INT DEFAULT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

INSERT INTO wa_test (user_name, user_surname, user_email, user_age) VALUES 
('Petr','Novák','petr@example.com',25), 
('Jana','Koutná','jana@example.com',30), 
('Jiří','Janota','jiri.janota@example.com',52), 
('Zbyněk','Hubáček','zbynek@example.com',54);