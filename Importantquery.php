
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