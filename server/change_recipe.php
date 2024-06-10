<?php
include "connect.php";

$recipeId = $_POST['recipeId'];
$recipeName = $_POST['recipeName'];
$recipeIngredients = $_POST['recipeIngredients'];
$recipeDirections = $_POST['recipeDirections'];
$recipeCategory = $_POST['recipeCategory'];
$recipeDifficulty = $_POST['recipeDifficulty'];


$sql_old = "SELECT * FROM recipes WHERE id=$recipeId";
$result_old = $conn->query($sql_old);
$old_data = $result_old->fetch_assoc();

$sql = "UPDATE recipes SET name='$recipeName', ingridients='$recipeIngredients', directions='$recipeDirections', cathegory='$recipeCategory', dif='$recipeDifficulty' WHERE id=$recipeId";

if ($conn->query($sql) === TRUE) {
    $response = [
        'status' => 'success',
        'message' => 'Рецепт успешно изменен',
        'old_data' => $old_data,
        'new_data' => [
            'name' => $recipeName,
            'ingredients' => $recipeIngredients,
            'directions' => $recipeDirections,
            'category' => $recipeCategory,
            'difficulty' => $recipeDifficulty
        ]
    ];
} else {
    $response = [
        'status' => 'error',
        'message' => 'Ошибка: ' . $sql . '<br>' . $conn->error
    ];
}

$conn->close();
echo json_encode($response);
?>
