<?php
include_once('config.php');

if (isset($_POST['download_csv'])) {
    $sql = "SELECT * FROM produtos WHERE visivel = 1 ORDER BY idprod DESC";
    $result = $conexao->query($sql);

    if ($result) {
        $filename = "produtos_" . date('Ymd') . ".csv";
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);

        $output = fopen('php://output', 'w');
        fputcsv($output, array('ID', 'Produto', 'Quantidade', 'Preço', 'Data de Compra', 'Validade', 'Prateleira'));

        while ($row = $result->fetch_assoc()) {
            fputcsv($output, $row);
        }

        fclose($output);
        exit;
    } else {
        die("Query failed: " . $conexao->error);
    }
}
?>