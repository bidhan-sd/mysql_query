//For Create Database
Query = "CREATE DATABASE liveproject";

//For Delete Database
/*
If not detete database go to phpmyadmin folder press enter and open libraries folder and go to default.config.php open that file and search => $cfg['AllowUserDropDatabase'] = false; <= default it false you should true and restart your machine.
*/
Query = "DROP DATABASE liveproject";

//Create Table
Query = CREATE TABLE customers(
	    id INT NOT NULL AUTO_INCREMENT,
	    firstname VARCHAR(255),
	    lastname VARCHAR(255),
	    address VARCHAR(255),
	    email VARCHAR(255),
	    city VARCHAR(255),
	    division VARCHAR(255),
	    zipcode VARCHAR(255),
	    PRIMARY KEY(id)
	);

//Insert Query
Query = INSERT INTO customers(firstname,lastname,address,email,city,division,zipcode) VALUES('Bidhan','sutradhar','gupti','bidhanvk@gmail.com','Chandpur','chittagong','3652');

//Update Query
Query = UPDATE customers SET email='kholi@gmail.com',firstname='Virat kohli' WHERE id=2;

//Delete Query
Query = DELETE FROM customers WHERE id=4;

//Add table COLUMN
Query = ALTER TABLE customers ADD address VARCHAR(255);

//Modify table column field type
Query = ALTER TABLE customers MODIFY COLUMN newCol INT(11)

//Delete table column
Query = ALTER TABLE customers DROP COLUMN newCol;

//Show data from table.
Query = SELECT * FROM customers;

//Show only 3 row data.
Query = SELECT * FROM customers LIMIT 3;

//Show only 1 data after first 3 item
Query = SELECT * FROM customers LIMIT 2,1;

//Show only 1 column data which is specific
Query = SELECT address FROM customers;

//Duplicate data show only one time.
Query = SELECT DISTINCT address FROM customers

//Show only 3 column data which is specific
Query = SELECT firstname, lastname, email FROM customers;

//Show full row data using condition
Query = SELECT * FROM customers WHERE id=3;

//Show assinding or desinding data using any field.
Query = SELECT * FROM customers ORDER BY firstname DESC;
Query = SELECT * FROM customers ORDER BY firstname ASC;
Query = SELECT * FROM customers ORDER BY id DESC;
Query = SELECT * FROM customers ORDER BY id ASC;


/*List of SQL Operators */
	perator      Description                                                  Example
1.     =         Equal to                                                     name="Bidhan"
2.    <>         Not equal to (many DBMSs accept !=  in addition to <>)       Dept<>'Sales'				
3.    >          Greater than                                                 Hire_Date>'2012-01-31'
4.    <          ess than                                                     Bonus  <   500000.00
5.    >=         Greater than or Equal                                        Bonus  >=  20000.00
6.    <=         Less than or Equal                                           Selary <= 20000.00 
7. BETWEEN       Between an inclusive range                                   Cost BETWEEN 100.00 AND 500.00
8. LIKE          Match a characher pattern                                    Firstname LIKE "% $variable% "
9. IN            Equal to one of multiple possible values.			          DeptCode IN(101, 103, 209)		
10.IS or IS NOT  Compare to null (missing data)                               Debt IS NOT DISTINCT FORM 																					  receivables

11. AS           Used to change a field name when viewing results             SELECT employee AS 'department'



//Between Operator use for any range.
Query = SELECT * FROM `customers` WHERE age BETWEEN 20 AND 30;

//Like Operator use for search by searchkeyword.
Query = SELECT * FROM customers WHERE city LIKE '%Searchkeyword%';

//Like Operator use for search by searchkeyword without keyword item.
Query = SELECT * FROM customers WHERE city NOT LIKE '%Searchkeyword%';

//IN Operator use for search
Query = SELECT * FROM `customers` WHERE division IN('dhaka', 'chittagong');

/*
	INDEX use when You work in a big database because that time You need seed up in your database that is the resion for using database.
*/

//Create Index for Database column by this exmaple
Query = CREATE INDEX cIndex ON customers(city);

//Remove Index for Database column by this exmaple
Query = DROP INDEX cIndex On customers;

//How to make forenkey using command line show here
Query = CREATE TABLE orders(
	id INT NOT NULL AUTO_INCREMENT,
    Ordername VARCHAR(255),
    productId INT,
    customerId INT,
    orderDate DATETIME default CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN key(productId) REFERENCES product(id),
    FOREIGN key(customerId) REFERENCES customers(id)    
);


/*------------------------------------------------------------------------*/

//INNER JOIN QUERY Part 16.
Query = SELECT customers.firstname, customers.lastname, orders.Ordername
FROM customers
INNER JOIN orders
ON customers.id = orders.customerId
ORDER BY customers.lastname

Note : Here find data firstname , lastname from customers table and ordername from orders table it's comes from customers and orders table where how many (orders.customersId) match with (customers.id) and order by anythings.

//LEFT JOIN QUERY Part 17.
QUERY = SELECT customers.firstname, customers.lastname, orders.Ordername, orders.orderDate 
FROM customers
LEFT JOIN orders
ON customers.id = orders.customerId
ORDER BY customers.lastname;

//RIGHT JOIN QUERY Part 18.
QUERY = SELECT orders.Ordername, customers.firstname, customers.lastname
FROM orders
RIGHT JOIN customers
ON orders.customerId = customers.id
ORDER BY customers.id ASC;

//Join Multiple table with INNER JOIN QUERY Part 21.
Query = SELECT orders.Ordername , customers.firstname, customers.lastname, product.name
FROM orders
INNER JOIN product
ON orders.productId = product.id
INNER JOIN customers
ON orders.customerId = customers.id
ORDER BY orders.Ordername;

/*-----------------------------------------------------------------------------------------*/

//Two table query using "union" keyword duplicate data not available example here.
Query = SELECT city FROM customers UNION SELECT city FROM suppliars ORDER BY city;

//Two table query using "union" keyword duplicate data available example here.
Query = SELECT city FROM customers UNION ALL SELECT city FROM suppliars ORDER BY city;

//SubQuery how to Select using subquery.
Query = SELECT * FROM customers WHERE id IN(SELECT id FROM customers WHERE age > 30);

//SubQuery how to Insert using subquery.
Query = INSERT INTO customer_bup SELECT * FROM customers WHERE id IN (SELECT id FROM customers);

//SubQuery how to Update using subquery.
Query = UPDATE customers SET salary = salary*2 WHERE age IN(SELECT age FROM customer_bup WHERE age >= 30);

//SubQuery how to Delete using subquery.
Query = DELETE FROM customer_bup WHERE age IN( SELECT age FROM customers WHERE age = 30 );

//When need remove all data from any table that time apply this query.
Query = TRUNCATE TABLE suppliars;

//Alises Example.
SELECT firstname as 'First Name ' , lastname as 'Last Name' FROM customers;

//Another alises example
Query = SELECT CONCAT(firstname, ' ' , lastname) AS 'Name',email,address, city FROM customers;

//Another alises example
Query = SELECT CONCAT(firstname, ' ' ,lastname) AS 'Name', email, CONCAT (address, ' ', city) AS Adderss FROM customers;

//Another alises example connection with two table.
Query = SELECT o.id,o.orderDate, c.firstname, c.lastname FROM customers AS c, orders AS o;

// Mysql agreegate function.

Query = SELECT AVG(age) FROM customers;

Query = SELECT COUNT(age) FROM customers;

Query = SELECT MAX(age) FROM customers;

Query = SELECT MIN(age) FROM customers;

Query = SELECT sum(age) FROM customers;

//Akta value koto bar ache seta count kora GROUP BY AR kaj.

Query = SELECT age, COUNT(age) FROM customers GROUP BY age;

// Agreegate function ar khatra (WHERE vs HAVING) ar example.
Query = SELECT age, COUNT(age) FROM customers WHERE age >= 30 GROUP BY age;

Query = SELECT age, COUNT(age) FROM customers GROUP BY age HAVING COUNT(age) >= 1;


//Create Virsual table use another table or else
Query = CREATE VIEW customers_view AS SELECT id ,firstname, lastname , FROM customers WHERE firstname IS NOT NULL;

//Insert data into virsual table.
Query = INSERT INTO customers_view  VALUES(11,'Bidhan vk','imbidhan');

//Update data into virsual table.
Query = UPDATE customers_view SET firstname = 'virat kohli' WHERE id = 11;

//Delete data into virsual table.
Query = UPDATE FROM customers_view WHERE id = 11;

//Drop virsual table.
Query = DROP VIEW customers_view;

//UCASE AND LCASE Function example.
Query = SELECT UCASE(firstname), LCASE(lastnameFROM), address FROM customers;

//For MID Function exmaple.
Query = SELECT MID(city,1,3) AS ShortCity FROM customers;

//For LENGTH Function findout string length.
Query = SELECT firstname, LENGTH(address) AS lengthofaddress FROM customers;

//For ROUND Function return integer value and remove float or double value.
Query = SELECT firstname, ROUND(salary) as RoundSalary FROM customers;

//For NOW Function return current system data and time .
Query = SELECT name,size, Now() AS Date FROM product;