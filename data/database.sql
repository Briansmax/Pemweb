create database crud_db;

use crud_db;

CREATE TABLE `users` (
    id int(11) NOT NULL auto_increment,
    `Name` varchar(100) NOT NULL,
    `Username` varchar(100) NOT NULL UNIQUE,
    `Email` varchar(100) NOT NULL UNIQUE,
    `Password` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `menu` (
    id int(11) NOT NULL auto_increment,
    `nama` varchar(100) NOT NULL,
    `harga` varchar(100) NOT NULL UNIQUE,
    `gambar` varchar(255) ,
    `kategori` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pemesan VARCHAR(100),
    menu VARCHAR(100),
    jumlah INT,
    status ENUM('Menunggu', 'Diproses', 'Selesai') DEFAULT 'Menunggu',
    waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

