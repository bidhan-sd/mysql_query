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
