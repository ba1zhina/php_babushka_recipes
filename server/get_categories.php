<?php
include('connect.php');

$sql = "SELECT DISTINCT cathegory FROM recipes";
$result = $conn->query($sql);

$categories = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $categories[] = $row['cathegory'];
    }
}

echo json_encode($categories);

$conn->close();
?>
