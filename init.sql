CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO `users` (`name`, `email`, `password`, `created_at`, `updated_at`) 
VALUES 
    ('ww', 'ww@gmail.com', '$2y$10$z9qTKVXAgweKF160WkXarutngOeZX6eE50qWOj5umQj.l5Yn/eoLG', '2024-11-08 09:34:20', '2024-11-08 09:34:20');


CREATE TABLE IF NOT EXISTS `contacts` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `phone_number` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

-- Insert data into `contacts` table
INSERT INTO `contacts` (`user_id`, `phone_number`, `email`, `created_at`, `updated_at`)
VALUES
    (1, '1234567890', 'user2@gmail.com', '2024-11-08 09:34:20', '2024-11-08 09:34:20');
