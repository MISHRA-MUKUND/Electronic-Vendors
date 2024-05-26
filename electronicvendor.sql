create database if not exists project3;
USE project3;

CREATE TABLE Customers (
    CustomerID INT AUTO_INCREMENT,
    Name VARCHAR(255),
    Address VARCHAR(255),
    Email VARCHAR(255),
	PRIMARY KEY(CustomerID)
);

CREATE TABLE Contract (
    ContractID INT AUTO_INCREMENT ,
    CustomerID INT,
    BillingDetails TEXT,
    PRIMARY KEY(ContractID ),
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);


CREATE TABLE OnlineCustomers (
    CustomerID INT ,
    LoginCredentials VARCHAR(255),
    CreditCard CHAR(12),
    PRIMARY KEY(CustomerID),
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE OfflineCustomers (
    CustomerID INT,
    StoreLocation VARCHAR(255),
     PRIMARY KEY(CustomerID),
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Manufacturer (
ManufacturerID INT AUTO_INCREMENT PRIMARY KEY,
ManufacturerName VARCHAR(255)
);

CREATE TABLE Products (
    ProductID INT AUTO_INCREMENT ,
    Name VARCHAR(255),
    Description TEXT,
    ManufacturerID INT,
    Price DECIMAL(10, 2) check(price>0),
    PRIMARY KEY(ProductID),
    foreign key(ManufacturerID ) REFERENCES Manufacturer(ManufacturerID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Categories (
    CategoryID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255)
);

CREATE TABLE ProductCategories (
    ProductID INT,
    CategoryID INT,
    PRIMARY KEY (ProductID, CategoryID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Sales (
    SaleID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT,
    ProductID INT,
    SaleDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Quantity INT check(Quantity>=0),
    TotalPrice DECIMAL(10, 2),
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Shippers (
    ShipperID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    ContactDetails VARCHAR(255)
);

CREATE TABLE Shipments (
    ShipmentID INT AUTO_INCREMENT PRIMARY KEY,
    SaleID INT,
    ShipperID INT,
    TrackingNumber VARCHAR(255) Unique ,
    ShipmentDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    DeliveryDate DATE,
    PromisedDeliveryDate DATE,
    FOREIGN KEY (SaleID) REFERENCES Sales(SaleID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (ShipperID) REFERENCES Shippers(ShipperID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Stores (
    StoreID INT AUTO_INCREMENT PRIMARY KEY,
    Location VARCHAR(255)
);

CREATE TABLE Inventory (
    InventoryID INT AUTO_INCREMENT PRIMARY KEY,
    ProductID INT,
    StoreID INT,
    Quantity INT check(Quantity>=0),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (StoreID) REFERENCES Stores(StoreID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Warehouses (
    WarehouseID INT AUTO_INCREMENT PRIMARY KEY,
    Location VARCHAR(255)
);

CREATE TABLE WarehouseInventory (
    ProductID INT,
    WarehouseID INT,
    Quantity INT check(Quantity>=0),
    PRIMARY KEY (ProductID, WarehouseID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (WarehouseID) REFERENCES Warehouses(WarehouseID) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE Reorders (
    ReorderID INT AUTO_INCREMENT PRIMARY KEY,
    ProductID INT,
    Quantity INT check(Quantity>=0),
    OrderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ArrivalDate DATE DEFAULT NULL,
    Status ENUM('Ordered', 'Arrived') DEFAULT 'Ordered',
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE ON UPDATE CASCADE
);




-- Insert data into Customers
INSERT INTO Customers (Name, Address, Email)
VALUES 
('Ram', 'California', 'ram@gmail.com'),
('Krishna', 'Darbhanga', 'krishna@gmail.com'),
('Hanuman', 'Madhubani', 'hanuman@gmail.com'),
('Mukund', 'Patliputra', 'mukund@gmail.com'),
('Raghav', 'California', 'raghav@gmail.com'),
('Shyam', 'Darbhanga', 'shyam@gmail.com'),
('Gopal', 'Madhubani', 'gopal@gmail.com'),
('Radha', 'Patliputra', 'radha@gmail.com'),
('Sita', 'California', 'sita@gmail.com'),
('Lakshman', 'Darbhanga', 'lakshman@gmail.com'),
('Rupam', 'patna', 'rupam@gmail.com'),
('Amit', 'Delhi', 'amit@yahoo.com'),
('Suresh', 'Mumbai', 'suresh@gmail.com'),
('Ramesh', 'Kolkata', 'ramesh@gmail.com');

-- Insert data into OnlineCustomers
INSERT INTO OnlineCustomers (CustomerID, LoginCredentials, CreditCard)
VALUES 
(1, 'ram123', '123456789012'),
(3, 'hanuman123', '234567890123'),
(5, 'raghav123', '345678901234'),
(7, 'gopal123', '456789012345'),
(9, 'sita123', '567890123456'),
(11, 'rupam123', null);

-- Insert data into OfflineCustomers
INSERT INTO OfflineCustomers (CustomerID, StoreLocation)
VALUES 
(2, 'Darbhanga'),
(4, 'Patna'),
(6, 'California'),
(8, 'Patliputra'),
(10, 'Madhubani');

-- Insert data into Contract 
INSERT INTO Contract ( CustomerID, BillingDetails)
VALUES 
( 14, 'Billing Details for Ramesh'),
( 12, 'Billing Details for Amit'),
( 13, 'Billing Details for Suresh');

-- Insert data into Manufacturer
INSERT INTO Manufacturer( ManufacturerName)
VALUES 
('Apple'),
('Lenonvo'),
('Samsung' ),
('Vivo'),
('Dell'),
('HP'),
('Asus' ),
('Acer');


-- Insert data into Products
INSERT INTO Products (Name, Description, ManufacturerID, Price)
VALUES 
('iPhone 13', 'Apple iPhone 13, 5G, 128GB', 1, 80000),
('ThinkPad X1', 'Lenovo ThinkPad X1, 4G, i7, 16GB RAM', 2, 90000),
('Galaxy S21', 'Samsung Galaxy S21, 5G, 128GB', 3, 70000),
('Vivo V21', 'Vivo V21, 4G, 128GB', 4, 25000),
('iPad Pro', 'Apple iPad Pro, 5G, 256GB', 1, 85000),
('MacBook Pro', 'Apple MacBook Pro, M1, 8GB RAM', 1, 120000),
('IdeaPad Flex 5', 'Lenovo IdeaPad Flex 5, 4G, i5, 8GB RAM', 2, 60000),
('Galaxy Book Pro', 'Samsung Galaxy Book Pro, 5G, i7, 16GB RAM', 3, 95000),
('VivoBook 15', 'Vivo VivoBook 15, 4G, i3, 8GB RAM', 4, 40000),
('XPS 15', 'Dell XPS 15, 4K, i7, 16GB RAM', 5, 150000),
('Spectre x360', 'HP Spectre x360, 4K, i7, 16GB RAM', 6, 140000),
('ROG Zephyrus G14', 'Asus ROG Zephyrus G14, 4K, Ryzen 9, 16GB RAM', 7, 130000),
('Predator Helios 300', 'Acer Predator Helios 300, 4K, i7, 16GB RAM', 8, 120000);

-- Insert data into Categories
INSERT INTO Categories (Name)
VALUES 
('Smartphones'),
('Foldable Phones'),
('5G Support'),
('4G Support'),
('Laptops'),
('Tablets'),
('Smart Watches'),
('Bluetooth Speakers');


-- Insert data into ProductCategories
INSERT INTO ProductCategories (ProductID, CategoryID)
VALUES 
(1, 1),  -- iPhone 13 is a Smartphone
(1, 3),  -- iPhone 13 supports 5G
(2, 4),  
(2, 5),  
(3, 1),  -- Galaxy S21 is a Smartphone
(3, 3),  -- Galaxy S21 supports 5G
(4, 1),  -- Vivo V21 is a Smartphone
(4, 4),  -- Vivo V21 supports 4G
(5, 3),  -- iPad Pro supports 5G
(5, 6),  -- iPad Pro is a Tablet
(6, 5), 
(7, 4),  -- IdeaPad Flex 5 supports 4G
(7, 5),  -- IdeaPad Flex 5 is a Laptop
(8, 3),  -- Galaxy Book Pro supports 5G
(8, 5),  -- Galaxy Book Pro is a Laptop
(9, 4),  -- VivoBook 15 supports 4G
(9, 5),  -- VivoBook 15 is a Laptop
(10, 5), -- XPS 15 is a Laptop
(11, 5), -- Spectre x360 is a Laptop
(12, 5), 
(13, 5); 


INSERT INTO Sales (CustomerID, ProductID, Quantity, TotalPrice)
VALUES 
(1, 1, 2, 160000),
(2, 2, 3, 270000),
(3, 3, 1, 70000),
(4, 4, 1, 25000),
(5, 5, 2, 170000),
(6, 6, 1, 120000),
(7, 7, 2, 120000),
(8, 8, 1, 95000);


-- Insert data into Shippers
INSERT INTO Shippers (Name, ContactDetails)
VALUES 
('USPS', 'usps@gmail.com'),
('FedEx', 'fedex@gmail.com'),
('DHL', 'dhl@gmail.com'),
('UPS', 'ups@gmail.com'),
('BlueDart', 'bluedart@gmail.com'),
('DTDC', 'dtdc@gmail.com');


-- Insert data into Shipments
INSERT INTO Shipments (SaleID, ShipperID, TrackingNumber, DeliveryDate, PromisedDeliveryDate)
VALUES 
(1, 1, '123456', null, '2024-04-20'),
(2, 2, '234567', '2024-04-19', '2024-04-21'),
(3, 3, '345678', '2024-04-18', '2024-04-20'),
(4, 4, '456789', '2024-04-19', '2024-04-21'),
(5, 5, '567890', '2024-04-20', '2024-04-22'),
(6, 6, '678901', '2024-04-21', '2024-04-23'),
(7, 1, '789012', '2024-04-29', '2024-04-24'),
(8, 2, '890123', '2024-04-27', '2024-04-25');

INSERT INTO Stores (Location)
VALUES 
('California'),
('Darbhanga'),
('Madhubani'),
('Patliputra'),
('Kailash');

-- Insert data into Inventory
INSERT INTO Inventory (ProductID, StoreID, Quantity)
VALUES 
(1, 1, 0), -- This product is out of stock
(2, 2, 200),
(3, 3, 300),
(4, 4, 400),
(5, 5, 500),
(6, 1, 600),
(7, 2, 700),
(8, 3, 800);


-- Insert data into Reorders for some products
INSERT INTO Reorders (ProductID, Quantity)
VALUES 
(1, 10),
(3, 30),
(5, 50),
(7, 70);

-- Insert data into Warehouses
INSERT INTO Warehouses ( Location)
VALUES 
('California'),
('Darbhanga'),
('Madhubani'),
('Magadh'),
('Kailash');


-- Insert data into WarehouseInventory
INSERT INTO WarehouseInventory (ProductID, WarehouseID, Quantity)
VALUES 
(1, 1, 100),
(2, 2, 200),
(3, 3, 300),
(4, 4, 400),
(5, 5, 500),
(6, 1, 600),
(7, 2, 700),
(8, 3, 800);


UPDATE sales SET SaleDate = '2024-02-13 ' WHERE (SaleID = '1');
UPDATE sales SET SaleDate = '2024-03-13 ' WHERE (SaleID = '2');
UPDATE sales SET SaleDate = '2024-03-23 ' WHERE (SaleID = '3');
UPDATE sales SET SaleDate = '2024-03-25 ' WHERE (SaleID = '4');
UPDATE sales SET SaleDate = '2024-01-27 ' WHERE (SaleID = '5');
UPDATE sales SET SaleDate = '2024-03-28 ' WHERE (SaleID = '6');
UPDATE sales SET SaleDate = '2024-03-29 ' WHERE (SaleID = '7');
UPDATE sales SET SaleDate = '2024-03-29 ' WHERE (SaleID = '8');
