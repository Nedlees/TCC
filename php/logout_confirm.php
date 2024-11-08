<?php 
include 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>
<body>
    
    <div class="container">
        <h2>Deseja reallmente fazer Logout?</h2>
        <button class="confirm" onclick="confirmlogout()">Sim</button>
        <button class="cancel" onclick="window.location.href='index.php'">Cancelar</button>
    </div>

    <script>
        function confirmlogout() {
            window.location.href = 'logout.php'
        }
    </script>

</body>
</html>