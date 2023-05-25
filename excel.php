<?php
// Conecta ao banco de dados
require('vendor/autoload.php');

try {
    $pdo = new PDO("mysql:host=localhost;dbname=formulario-aruanda", "root", "@Jkjalves25");
} catch(PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}

// Executa uma consulta SQL para obter as informações necessárias para o relatório
$sql = "SELECT situacao, matricula, alvara, nome, cpf, rg, data_nasc, filiacao_pai, filiacao_mae, cep, endereco, numero, bairro, cidade, estado, nome_templo, data_inaug, filiacao_religiosa, data_filiacao FROM cadastro";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Cria um objeto PHPExcel
require ('Classes/PHPExcel.php');
$objPHPExcel = new PHPExcel();

// Define as propriedades do documento
$objPHPExcel->getProperties()->setCreator("Nome do Criador")
                             ->setLastModifiedBy("Nome do Modificador")
                             ->setTitle("Título do Documento")
                             ->setSubject("Assunto do Documento")
                             ->setDescription("Descrição do Documento")
                             ->setKeywords("palavras-chave")
                             ->setCategory("Categoria do Documento");

// Define a planilha ativa
$objPHPExcel->setActiveSheetIndex(0);
$sheet = $objPHPExcel->getActiveSheet();

// Insere o cabeçalho na planilha
$coluna = 'A';
$header = array_keys($dados[0]);
foreach ($header as $cell) {
    $sheet->setCellValue($coluna . '1', $cell);
    $coluna++;
}

// Insere os dados na planilha
$linha = 2;
foreach ($dados as $row) {
    $coluna = 'A';
    foreach ($row as $cell) {
        $sheet->setCellValue($coluna . $linha, $cell);
        $coluna++;
    }
    $linha++;
}

// Define o tipo de conteúdo como Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="relatorio.xlsx"');
header('Cache-Control: max-age=0');

// Gera o arquivo Excel
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>