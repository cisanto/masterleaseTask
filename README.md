# masterleaseTask - Tabliczka mnożenia
This project presents a multiplication table implementation in PHP using a MySQL database.

## Functionality

The project allows displaying a multiplication table of a specified size. The values are stored in a database using the JSON format, which enables retrieving them without the need for unnecessary calculations.

## Installation and commissioning

1. Clone the repository to your local computer.
2. Configure the database connection in the db.php file by replacing the   values with your own
```
  $host = "database host"
  $username = "username"
  $pass = "password"
  $dbName = "database name"

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

PHP version 8.1.5

  Extension for PHP:
  
    - JSON
    
    - MySQLi
    
MySQL database version 10.4.24-MariaDB

Web server (e.g. Apache)
