<?php
include "connect.php";

$recipeId = $_POST['id'];

$sql_old = "SELECT name FROM recipes WHERE id=$recipeId";
$result_old = $conn->query($sql_old);

if ($result_old->num_rows > 0) {
    $old_data = $result_old->fetch_assoc();
    $recipeName = $old_data['name'];

    $sql = "DELETE FROM recipes WHERE id=$recipeId";

    if ($conn->query($sql) === TRUE) {
        $response = [
            'status' => 'success',
            'message' => 'Рецепт успешно удален',
            'recipeName' => $recipeName
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Ошибка: ' . $conn->error
        ];
    }
} else {
    $response = [
        'status' => 'error',
        'message' => 'Рецепт не найден'
    ];
}

$conn->close();
echo json_encode($response);
?>
