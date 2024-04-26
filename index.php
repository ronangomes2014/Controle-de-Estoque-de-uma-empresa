<?php
// Função para adicionar uma entrada ao estoque
function adicionarEntrada($nome_objeto, $numero_serie, $origem) {
    $data = [
        'Tipo' => 'Entrada',
        'Nome do Objeto' => $nome_objeto,
        'Número de Série' => $numero_serie,
        'Origem' => $origem
    ];

    adicionarRegistroCSV($data);
}

// Função para adicionar uma saída do estoque
function adicionarSaida($nome_objeto, $numero_serie, $setor_destino) {
    $data = [
        'Tipo' => 'Saída',
        'Nome do Objeto' => $nome_objeto,
        'Número de Série' => $numero_serie,
        'Setor Destino' => $setor_destino
    ];

    adicionarRegistroCSV($data);
}

// Função para adicionar um registro ao arquivo CSV
function adicionarRegistroCSV($data) {
    $file = fopen('estoque.csv', 'a');
    fputcsv($file, $data);
    fclose($file);
}

// Verifica se o formulário de entrada foi submetido
if(isset($_POST['entrada_submit'])) {
    $nome_objeto = $_POST['entrada_nome_objeto'];
    $numero_serie = $_POST['entrada_numero_serie'];
    $origem = $_POST['entrada_origem'];

    adicionarEntrada($nome_objeto, $numero_serie, $origem);
}

// Verifica se o formulário de saída foi submetido
if(isset($_POST['saida_submit'])) {
    $nome_objeto = $_POST['saida_nome_objeto'];
    $numero_serie = $_POST['saida_numero_serie'];
    $setor_destino = $_POST['saida_setor_destino'];

    adicionarSaida($nome_objeto, $numero_serie, $setor_destino);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>
</head>
<body>
    <h1>Controle de Estoque</h1>

    <h2>Registrar Entrada</h2>
    <form method="post">
        <label for="entrada_nome_objeto">Nome do Objeto:</label>
        <input type="text" id="entrada_nome_objeto" name="entrada_nome_objeto" required><br>
        <label for="entrada_numero_serie">Número de Série:</label>
        <input type="text" id="entrada_numero_serie" name="entrada_numero_serie" required><br>
        <label for="entrada_origem">Origem:</label>
        <input type="text" id="entrada_origem" name="entrada_origem" required><br>
        <input type="submit" name="entrada_submit" value="Registrar Entrada">
    </form>

    <h2>Registrar Saída</h2>
    <form method="post">
        <label for="saida_nome_objeto">Nome do Objeto:</label>
        <input type="text" id="saida_nome_objeto" name="saida_nome_objeto" required><br>
        <label for="saida_numero_serie">Número de Série:</label>
        <input type="text" id="saida_numero_serie" name="saida_numero_serie" required><br>
        <label for="saida_setor_destino">Setor Destino:</label>
        <input type="text" id="saida_setor_destino" name="saida_setor_destino" required><br>
        <input type="submit" name="saida_submit" value="Registrar Saída">
    </form>

    <a href="registros.php">Ver Registros</a>
</body>
</html>
