<?php
require_once("connect.php");


$name = $_POST['name'];
$ingredients = $_POST['ingredients'];
$directions = $_POST['directions'];
$category = $_POST['category'];
$difficulty = $_POST['difficulty'];

$sql = "INSERT INTO recipes  (`name`, `ingridients`, `directions`, `cathegory`, `dif`)
        VALUES ('$name', '$ingredients', '$directions', '$category', '$difficulty')";

$response = [];
if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = "Рецепт {$name} успешно добавлен!";
    $response['data'] = [
        'name' => $name,
        'ingredients' => $ingredients,
        'directions' => $directions,
        'category' => $category,
        'difficulty' => $difficulty
    ];
} else {
    $response['status'] = 'error';
    $response['message'] = "При добавлении нового рецепта произошла ошибка";
}

$conn->close();
echo json_encode($response);
?>
