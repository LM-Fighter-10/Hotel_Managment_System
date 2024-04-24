create database hotel_managment;

CREATE TABLE Customer (
  CustomerID Char(14),
  FirstName VARCHAR(20) NOT NULL,
  LastName VARCHAR(20) NOT NULL,
  Gender VARCHAR(6),
  Email VARCHAR(50) UNIQUE,
  PhoneNumber VARCHAR(20) NOT NULL,
  ContactNumber VARCHAR(20),
  Country VARCHAR(20),
  City VARCHAR(20),
  State VARCHAR(20),
  Zip_Code VARCHAR(5),
  constraint Email_Unique UNIQUE (Email),
  constraint Customer_pk primary key (CustomerID)
);
CREATE TABLE Hotel (
  BranchID Char(6),
  Name VARCHAR(50) NOT NULL,
  Description TEXT,
  Rating DECIMAL(2, 1),
  City VARCHAR(20) NOT NULL,
  Country VARCHAR(20) NOT NULL,
  StreetNum VARCHAR(10),
  PriceRange VARCHAR(20),
  ContactNumber VARCHAR(20),
  constraint Hotel_pk primary key (BranchID)
);
CREATE TABLE Rooms (
  RoomNum INT,
  Capacity VARCHAR(20) NOT NULL,
  Status VARCHAR(20) CHECK (Status IN ('Available', 'Occupied', 'Under Maintenance')),
  Price_Per_Night DECIMAL(10,2) NOT NULL,
  BranchID Char(6),
  constraint Rooms_Hotel_fk FOREIGN KEY (BranchID) REFERENCES Hotel(BranchID),
  constraint Rooms_pk primary key (RoomNum)
);
CREATE TABLE Accompanies (
  Name VARCHAR(50) NOT NULL,
  CustomerID char(14),
  RoomNum INT,
  Gender Varchar(6),
  Bdate date,
  Relationship Varchar(15),
  constraint Accompanies_Customer_fk FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID),
  constraint Accompanies_Room_fk FOREIGN KEY (RoomNum) REFERENCES Rooms(RoomNum),
  constraint Accompanies_pk primary key (Name, CustomerID)
);
CREATE TABLE Invoice (
  Inv_ID Char(8),
  Description TEXT,
  constraint Invoice_pk primary key (Inv_ID)
);
CREATE TABLE Book (
  CustomerID Char(14),
  RoomNum INT,
  Inv_ID Char(8),
  CheckInDate DATE NOT NULL,
  CheckOutDate DATE NOT NULL,
  BookingType VARCHAR(50),
  Price DECIMAL(10,2) NOT NULL,
  constraint Book_Customer_fk FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID),
  constraint Book_Rooms_fk FOREIGN KEY (RoomNum) REFERENCES Rooms(RoomNum),
  constraint Book_Invoice_fk FOREIGN KEY (Inv_ID) REFERENCES Invoice(Inv_ID),
  constraint Book_pk primary key (CustomerID, RoomNum)
);
CREATE TABLE Category (
  Category varchar(20),
  RoomNum INT,
  constraint Category_Rooms_fk FOREIGN KEY (RoomNum) REFERENCES Rooms(RoomNum),
  constraint Category_pk primary key (Category, RoomNum)
);
CREATE TABLE Food_Plan (
  ID Char(6),
  Type VARCHAR(20) NOT NULL,
  Main_Dish VARCHAR(50) NOT NULL,
  Side_Dish VARCHAR(50),
  Desert_Dish VARCHAR(50),
  constraint Food_Plan_pk primary key (ID)
);
CREATE TABLE Restaurant (
  RID Char(8),
  Name VARCHAR(50) NOT NULL,
  isExternal bit,
  OperatingHours VARCHAR(50),
  Location VARCHAR(50),
  PriceRange VARCHAR(20),
  ContactNumber VARCHAR(20),
  BranchID Char(6),
  constraint Restaurant_Hotel_fk FOREIGN KEY (BranchID) REFERENCES Hotel(BranchID),
  constraint Restaurant_pk primary key (RID)
);
CREATE TABLE Services (
  SID Char(8),
  Name VARCHAR(50) NOT NULL,
  isExternal bit,
  OperatingHours VARCHAR(50),
  Location VARCHAR(50),
  PriceRange VARCHAR(20),
  ContactNumber VARCHAR(20),
  BranchID Char(6),
  constraint Services_Hotel_fk FOREIGN KEY (BranchID) REFERENCES Hotel(BranchID),
  constraint Services_pk primary key (SID)
);
CREATE TABLE Choose (
  CustomerNo Char(14),
  ServiceID Char(8),
  constraint Choose_Customer_fk FOREIGN KEY (CustomerNo) REFERENCES Customer(CustomerID),
  constraint Choose_Services_fk FOREIGN KEY (ServiceID) REFERENCES Services(SID),
  constraint Choose_pk primary key (CustomerNo, ServiceID)
);
CREATE TABLE Offers (
  RestaurantID Char(8),
  FoodPlanID Char(6),
  constraint Offers_Restaurant_fk FOREIGN KEY (RestaurantID) REFERENCES Restaurant(RID),
  constraint Offers_Food_Plan_fk FOREIGN KEY (FoodPlanID) REFERENCES Food_Plan(ID),
  constraint Offers_pk primary key (RestaurantID, FoodPlanID)
);
CREATE TABLE Employee (
  EID Char(14),
  FName VARCHAR(20) NOT NULL,
  LName VARCHAR(20) NOT NULL,
  RoleName VARCHAR(50),
  WorkingHours INT,
  Phone VARCHAR(20),
  Email VARCHAR(50) UNIQUE,
  Salary INT,
  City VARCHAR(20),
  State VARCHAR(20),
  ZipCode VARCHAR(5),
  Country VARCHAR(20),
  Gender VARCHAR(6),
  ServiceID Char(8),
  RestaurantID Char(8),
  constraint Employee_Service_fk foreign key (ServiceID) references Services(SID),
  constraint Employee_Restaurant_fk foreign key (RestaurantID) references Restaurant(RID),
  constraint Employee_pk primary key (EID)
);