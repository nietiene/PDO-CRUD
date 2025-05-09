<?php
$host = 'localhost';
$dbname = "crud_of_pdo";
$user = "root";
$pass = "factorise@123";
$charset = 'utf8mb4'; // this is chracter which support all chracters and emojis

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
    //new = is keyword for creating an object
    // PDO is class of establishing connection
    //mysql = is mysqli drive
    echo ("connection successfully");
} catch (PDOException $e) {
    // PROException means an error from connection
    // $e we store those error from PDOException to our variable $e
    die ("Connection failed". $e -> getMessage());
    // die() this stops system to running
    // getMessage() this method displaying an error
}

// insert 
$sql = "INSERT INTO holiday (name, place, password) VALUES (?,?,?)";
// $sql contain sql query string
$stmt = $pdo -> prepare($sql);
// $stmt stands for statement 
//$pdo this variable contain your connection
// prepare($sql) prepare your sql query to be executed 
$stmt -> execute(['John, doe', 'England', '10349']);
////execute() this metthod runs our query with this values
echo "User INserted successfully";


//  Read

$sql = "SELECT * FROM holiday";
$stmt = $pdo -> query($sql);
// query() this methood sends query directly to the server
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    // fetch() this method used to fetch data 
    // PDO::FETCH_ASSOC tell the server that wants to fetch data as associative array
    echo $row['id']. ":". $row['name']. "-" . $row['password']. "<br>";
    // displaying data
}

// update data
$sql = "UPDATE holiday SET name = ?, place = ? WHERE id = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute(['Etiene', 'Rwanda', 1]);
echo "user Updated successfully";

// delete depend on user's id
$sql = "DELETE FROM holiday WHERE id = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([1]);
echo "user deleted";
?>