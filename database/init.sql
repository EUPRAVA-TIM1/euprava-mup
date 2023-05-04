create database if not exists `euprava_mup`
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_0900_ai_ci;
SET NAMES utf8mb4;
use euprava_mup;

CREATE TABLE if not exists vehicles (
    id CHAR(36) NOT NULL,
    brand VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    year INT NOT NULL,
    color VARCHAR(255) NOT NULL,
    engine_power INT NOT NULL,
    max_speed INT NOT NULL,
    num_of_seats INT NOT NULL,
    weight INT NOT NULL,
    vehicle_type VARCHAR(255) NOT NULL,
    user_id VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
