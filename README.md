# masterleaseTask - Tabliczka mnożenia
This project presents a multiplication table implementation in PHP using a MySQL database.

## Functionality

The project allows displaying a multiplication table of a specified size. The values are stored in a database using the JSON format, which enables retrieving them without the need for unnecessary calculations.

## Installation and commissioning

1. Clone the repository to your local computer.
2. Configure the database connection in the index.php file (line 26) by replacing the
```
('localhost', 'root', '', 'masterlease') 
```
  values with your own
``` 
('database host', 'username', 'password', 'database name')
```

3. Create a table named "cache" in your database using the following SQL command:
  ```
  CREATE TABLE cache (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  `wrench` VARCHAR(255) NOT NULL,
  `worth` TEXT NOT NULL
  );
  ```
  4. Start the PHP server.
  
## Technical requirements:

PHP version 7.0 or higher (I used version 8.1.5)

MySQL database

Web server (e.g. Apache)

JSON extension for PHP

MySQLi extension for PHP
