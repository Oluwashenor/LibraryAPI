<?php 
require_once "Database.php";
echo "This is the API file";

$date = date("Y/m/d");

$sql = "INSERT INTO Books(title, author, category, year_of_publication, isbn, quantity)
VALUES ('Ake', 'Wole Soyinka', 'fiction', '$date', '14-200-78456', '13')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

class API {

}