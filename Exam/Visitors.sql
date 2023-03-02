USE VisitorsDB;

DROP TABLE IF EXISTS books;

CREATE TABLE oharvey.visitors
(
    ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstName varchar(60),
    lastName varchar(60)
);

INSERT INTO oharvey.visitors (firstName, lastName) VALUES ('Owen', 'Harvey');
INSERT INTO oharvey.visitors (firstName, lastName) VALUES ('John', 'Smith');
INSERT INTO oharvey.visitors (firstName, lastName) VALUES ('Jane', 'Doe');


