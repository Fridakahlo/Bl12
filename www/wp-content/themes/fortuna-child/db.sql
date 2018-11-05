CREATE DATABASE bdd_bl12 CHARACTER SET 'utf8';

CREATE TABLE statuses (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE payment_statuses (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE payment_modes (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE accounts (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    payment_date DATE,
    payment_status_id SMALLINT UNSIGNED NOT NULL,
    CONSTRAINT fk_payment_status_id
        FOREIGN KEY (payment_status_id)
        REFERENCES payment_statuses(id),
    payment_mode_id SMALLINT UNSIGNED NOT NULL,
  	CONSTRAINT fk_payment_mode_id
        FOREIGN KEY (payment_mode_id)
        REFERENCES payment_modes(id)
) ENGINE=InnoDB;

CREATE TABLE users (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(45) NOT NULL,
    last_name VARCHAR(45) NOT NULL,
    professional_title VARCHAR (45) NOT NULL,
    email VARCHAR (45) NOT NULL,
    pro_field VARCHAR (45) NOT NULL,
    company_name VARCHAR (45),
    company_description TEXT,
    company_adress_number VARCHAR (45),
    company_adress_street VARCHAR (45) NOT NULL,
    company_adress_post_code VARCHAR (45) NOT NULL,
    company_adress_city VARCHAR (45) NOT NULL,
    company_adress_country VARCHAR (45) NOT NULL,
    company_phone_number VARCHAR(45) NOT NULL,
    company_website VARCHAR (45) NOT NULL,
    subscription_date DATE NOT NULL,
    end_of_rights DATE,
    photo_link TEXT,
    status_active BOOLEAN NOT NULL,
    status_id SMALLINT UNSIGNED NOT NULL,
    CONSTRAINT fk_status_id
        FOREIGN KEY (status_id)
        REFERENCES statuses(id),
    account_id  SMALLINT UNSIGNED NOT NULL,
    CONSTRAINT fk_account_id
        FOREIGN KEY (account_id)
        REFERENCES accounts(id)
) ENGINE=InnoDB;

