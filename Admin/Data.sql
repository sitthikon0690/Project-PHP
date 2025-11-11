-- CREATE DATABASE Data;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE Users (
    Email VARCHAR(50) primary key,
    Pass VARCHAR(50)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Products (
    Pro_id INT primary key,
    Pro_name VARCHAR(100),
    Pro_price INT,
    Pro_description TEXT ,
    Pro_date DATE,
    Pro_image BLOB,
    Pro_status CHAR(4),
    Pro_email VARCHAR(50) references Users (Email)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Favorites (
    Fav_email VARCHAR(50) references Users (Email),
    Fav_pro_id INT references Products (Pro_id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Tags (
    Tag_name VARCHAR(50) primary key
)ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
CREATE TABLE Product_Tags (
    Tag_pid INT references Product (Product_id),
    Tag_tn VARCHAR(50) references Tags (Tag_name)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Selled_Product (
    SP_pid INT references Product (Product_id),
    SP_selldate DATE,
    SP_email VARCHAR(50) references Users (Email)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO Tags VALUES
("For Professor"),
("1st Year Student"),
("2nd Year Student"),
("3rd Year Student"),
("4th Year Student"),
("4th+ Year Student"),
("Electronics"),
("Study"),
("Utility"),
("Cloth and Accessories"),
("Other(s)");

INSERT INTO Users VALUES
("Addmin1","123");