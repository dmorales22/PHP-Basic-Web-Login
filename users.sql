CREATE TABLE users (
    username varchar(255) NOT NULL,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    dateOfCreation timestamp DEFAULT CURRENT_TIMESTAMP,
    lastLogin timestamp,
    admin TINYINT(1) NOT NULL,
    PRIMARY KEY (username)
);

INSERT INTO users (username, firstname, lastname, password, admin) VALUES ('admin', 'Luc', 'Longpre', 'nimba21', 1);