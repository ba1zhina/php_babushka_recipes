<?php
include('connect.php');


$category = $_POST['category'];
$difficulty = $_POST['level'];

$sql = "SELECT * FROM recipes WHERE 1=1";
$params = [];

if ($category != 'all') {
    $sql .= " AND cathegory = ?";
    $params[] = $category;
}

if ($difficulty != 'all') {
    $sql .= " AND dif = ?";
    $params[] = $difficulty;
}

$stmt = $conn->prepare($sql);
if ($params) {
    $types = str_repeat('s', count($params));
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();


$recipes = array();
while($row = $result->fetch_assoc()) {
    $recipes[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode($recipes);


?>
