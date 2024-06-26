<?php
session_start();
require_once('tcpdf/tcpdf.php'); // Inclua o arquivo TCPDF

include_once('config.php');

// Função para obter dados dos produtos
function getProductsData() {
    global $conexao;
    $sql = "SELECT * FROM produtos WHERE visivel = 1 ORDER BY idprod DESC";
    $result = $conexao->query($sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

// Cria um novo documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Define informações do documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Lista de Produtos');
$pdf->SetSubject('Lista de Produtos');
$pdf->SetKeywords('PDF, Produtos, Lista');

// Define o cabeçalho e rodapé
$pdf->setHeaderData('', 0, 'Lista de Produtos', 'Gerado em: ' . date('Y-m-d H:i:s'));

// Define fontes
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Define margens
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Define a fonte padrão
$pdf->SetFont('helvetica', '', 10);

// Adiciona uma página
$pdf->AddPage();

// Título do PDF
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 10, 'Lista de Produtos', 0, 1, 'C');

// Dados dos produtos
$pdf->SetFont('helvetica', '', 12);
$data = getProductsData();
$html = '<table border="1" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Data de Compra</th>
                    <th>Validade</th>
                    <th>Prateleira</th>
                </tr>
            </thead>
            <tbody>';
foreach ($data as $row) {
    $html .= '<tr>
                <td>'.$row['idprod'].'</td>
                <td>'.$row['produto'].'</td>
                <td>'.$row['quantidade'].'</td>
                <td>'.$row['preco'].'</td>
                <td>'.$row['data_comp'].'</td>
                <td>'.$row['validade'].'</td>
                <td>'.$row['prateleira'].'</td>
            </tr>';
}
$html .= '</tbody></table>';

$pdf->writeHTML($html, true, false, true, false, '');

// Nome do arquivo para download
$filename = 'lista_produtos_' . date('Y-m-d') . '.pdf';

// Saída do PDF (download ou visualização no navegador)
$pdf->Output($filename, 'D');

?>
