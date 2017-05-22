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
