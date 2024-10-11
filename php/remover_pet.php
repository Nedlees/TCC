<?php 

require_once 'config.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_id'] === 'null') {
    die('Você precisa estar logado para remover um pet.');
}

if (isset($_POST['animal_id'])) {
    $animalId = $conn -> real_escape_string(($_POST['animal_id']));
    $userId = $_SESSION['usuario_id'];

    $sql = "SELECT usuario_id FROM animais WHERE id = '$animalId'";
    $result = $conn -> query($sql);

    if ($result -> num_rows > 0) {
        $row = $result -> fetch_assoc();
    
        if ($row["usuario_id"] == $userId) {
            $sqlDelete = "DELETE FROM animais WHERE id = '$animalId'";
            if ($conn->query($sqlDelete)) {
                echo "Pet removido com sucesso.";
            } else {
                echo "Erro ao remover pet: " . $conn->error;
            }
        } else {
            die ('Você não tem permissão para remover este pet.');
        }
    } else {
        die ('Pet não encontrado.');
    }
} else {
    die ('ID do pet não fornecido.');
}

$conn->close();