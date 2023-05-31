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
    user_id VARCHAR(13) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE if not exists driving_licenses (
   id CHAR(36) NOT NULL,
   driver_license_num CHAR(8) NOT NULL,
   categories VARCHAR(255) NOT NULL,
   issue_date DATE,
   expiry_date DATE,
   penalty_points INT NOT NULL,
   status VARCHAR(255) NOT NULL,
   official_id VARCHAR(13),
   user_id VARCHAR(13) NOT NULL,
   created_at TIMESTAMP NULL DEFAULT NULL,
   updated_at TIMESTAMP NULL DEFAULT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE if not exists officials (
    `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
    `official_id` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
)

INSERT INTO officials VALUES ('')
