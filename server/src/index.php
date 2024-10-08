<?php
// Define o caminho do arquivo que contém os dados
$caminhoArquivo = 'dados_alunos.txt';

// Verifica se o arquivo existe antes de tentar lê-lo
if (file_exists($caminhoArquivo)) {
    // Lê o conteúdo do arquivo
    $conteudo = file_get_contents($caminhoArquivo);

    // Exibe o conteúdo na tela
    echo "<h2>Conteúdo do Arquivo:</h2>";
    echo "<pre>$conteudo</pre>";  // Usar <pre> para manter a formatação do texto
} else {
    echo "O arquivo '$caminhoArquivo' não foi encontrado.";
}
?>