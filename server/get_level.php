<?php
include('connect.php');

$sql = "SELECT DISTINCT dif FROM recipes";
$result = $conn->query($sql);

$level = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $level[] = $row['dif'];
    }
}

echo json_encode($level);

$conn->close();

?>