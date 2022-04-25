/**************************************** Samsung Table ****************************************/
DROP TABLE IF EXISTS SAMSUNG;
CREATE TABLE SAMSUNG (
  SAMSUNG_ID int(11) NOT NULL,
  SAMSUNG_TYPE varchar(50) NOT NULL,
  SAMSUNG_IMAGE varchar(50) NOT NULL,
  SAMSUNG_PRICE double(10,2) NOT NULL
);

INSERT INTO SAMSUNG(SAMSUNG_ID, SAMSUNG_TYPE, SAMSUNG_IMAGE, SAMSUNG_PRICE) VALUES 
(1,'Samsung s21 Blue', 'sam_blue.png', 9.99),
(2,'Samsung s21 Brown', 'sam_brown.png', 9.99),
(3,'Samsung s21 Dark Red', 'sam_dark_red.png', 9.99),
(4,'Samsung s21 Green', 'sam_green.png', 9.99),
(5,'Samsung s21 Navy', 'sam_navy.jpg', 9.99),
(6,'Samsung s21 Pink', 'sam_pink.png', 9.99),
(7,'Samsung s21 Red', 'sam_red.png', 9.99),
(8,'Samsung s21 Purple', 'sam_purple.png', 9.99)
;

/**************************************** iPhone Table ****************************************/
DROP TABLE IF EXISTS IPHONE;
CREATE TABLE IPHONE (
  IPHONE_ID int(11) NOT NULL,
  IPHONE_TYPE varchar(50) NOT NULL,
  IPHONE_IMAGE varchar(50) NOT NULL,
  IPHONE_PRICE double(10,2) NOT NULL
);

INSERT INTO IPHONE(IPHONE_ID, IPHONE_TYPE, IPHONE_IMAGE, IPHONE_PRICE) VALUES 
(1,'iPhone 11 Blue', 'ip_blue.png', 9.99),
(2,'iPhone 11 Green', 'ip_green.png', 9.99),
(3,'iPhone 11 Pink', 'ip_pink.png', 9.99),
(4,'iPhone 11 Purple', 'ip_purple.png', 9.99),
(5,'iPhone 11 Yellow', 'ip_yellow.png', 9.99),
(6,'iPhone 11 Aqua', 'ip_aqua.png', 9.99),
(7,'iPhone 11 Green', 'ip_green.png', 9.99),
(8,'iPhone 11 Red', 'ip_red.jpg', 9.99);


/**************************************** Huawei Table ****************************************/
DROP TABLE IF EXISTS HUAWEI;
CREATE TABLE HUAWEI (
  HUAWEI_ID int(11) NOT NULL,
  HUAWEI_TYPE varchar(50) NOT NULL,
  HUAWEI_IMAGE varchar(50) NOT NULL,
  HUAWEI_PRICE double(10,2) NOT NULL
);

INSERT INTO HUAWEI(HUAWEI_ID, HUAWEI_TYPE, HUAWEI_IMAGE, HUAWEI_PRICE) VALUES 
(1,'Huawei P30 Black', 'huawei_black.png', 9.99),
(2,'Huawei P30 Blue', 'huawei_blue.png', 9.99),
(3,'Huawei P30 Red', 'huawei_red.png', 9.99);
