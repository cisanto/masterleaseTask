# masterleaseTask - Tabliczka mnożenia
This project presents a multiplication table implementation in PHP using a MySQL database.

#Functionality

The project allows displaying a multiplication table of a specified size. The values are stored in a database to avoid unnecessary calculations.

#Installation and commissioning

1. Clone the repository to your local computer.
2. Configure the database connection in the index.php file (line 26).
3. Create a table named "cache" in your database using the following SQL command:
  CREATE TABLE cache (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  `wrench` VARCHAR(255) NOT NULL,
  `worth` TEXT NOT NULL
  );
  4. Start the PHP server.
