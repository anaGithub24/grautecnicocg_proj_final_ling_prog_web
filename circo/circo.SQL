


CREATE DATABASE IF NOT EXISTS circo;
USE circo;

create TABLE IF NOT EXISTS reservas (
	id INT AUTO_INCREMENT primary KEY,
	expectador VARCHAR(100) NOT NULL,
	assento VARCHAR(20)NOT NULL,
   horario DATETIME NOT NULL
);
