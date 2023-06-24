<?php
$servername = "localhost";
$username = "vasya";
$password = "12345";
$dbname = "myDB";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$date = $_POST['date']; // Получаем дату из запроса

$sql = "SELECT * FROM myTable WHERE date = '$date'"; // Запрос к базе данных
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // выводим данные каждой строки
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
