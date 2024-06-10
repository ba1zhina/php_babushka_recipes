<?php
include 'connect.php';

if(isset($_GET['id'])) {
    $recipeId = $_GET['id'];
    
    $query = "SELECT * FROM recipes WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $recipeId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $recipe = $result->fetch_assoc();
        
        echo json_encode($recipe);
    } else {
        echo json_encode(array('error' => 'Рецепт не найден'));
    }
} else {
    echo json_encode(array('error' => 'Нет такого рецепта'));
}

$stmt->close();
$conn->close();
?>