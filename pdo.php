<?php
$host = 'localhost';
$user = 'root';
$pass = 'factorise@123';

try {
    // connect mysql server to php
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database
    $pdo -> exec("CREATE DATABASE IF NOT EXISTS crud_of_pdo");
    echo "Database created <br>";

    $pdo -> exec("USE crud_of_pdo");
    $sql = "CREATE TABLE IF NOT EXISTS holiday (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    place VARCHAR(100),
    password VARCHAR(200)
    )";
    $pdo -> exec($sql);
    echo "table created  successfully";
} catch (PDOException $e) {
    echo "ERROR". $e -> getMessage(); 
}
?>