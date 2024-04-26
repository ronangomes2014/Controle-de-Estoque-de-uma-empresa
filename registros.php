<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Estoque</title>
</head>
<body>
    <h1>Registros de Estoque</h1>

    <table border="1">
        <tr>
            <th>Tipo</th>
            <th>Nome do Objeto</th>
            <th>Número de Série</th>
            <th>Origem / Setor Destino</th>
        </tr>
        <?php
        $file = fopen('estoque.csv', 'r');
        while (($line = fgetcsv($file)) !== false) {
            echo "<tr>";
            foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>";
        }
        fclose($file);
        ?>
    </table>
</body>
</html>
