<?php
// Função para verificar se o parâmetro existe, senão retorna 'parametro_não_encontrado'
function getParametro($param) {
    return isset($_GET[$param]) ? $_GET[$param] : 'parametro_não_encontrado';
}

// Recebe os parâmetros, ou 'parametro_não_encontrado' caso não estejam presentes
$aluno = getParametro('fullname');
$email = getParametro('email');
$user = getParametro('username');
$nomecurso = getParametro('coursename');
$codcurso = getParametro('courseshortname');

// Define o conteúdo a ser escrito no arquivo
$conteudo = "Aluno: $aluno\n";
$conteudo .= "Email: $email\n";
$conteudo .= "Username: $user\n";
$conteudo .= "Nome do Curso: $nomecurso\n";
$conteudo .= "Código do Curso: $codcurso\n";
$conteudo .= "----------------------------------\n";

// Define o caminho e nome do arquivo
$caminhoArquivo = 'dados_alunos.txt';

// Escreve o conteúdo no arquivo (modo append para não sobrescrever)
if (file_put_contents($caminhoArquivo, $conteudo, FILE_APPEND | LOCK_EX)) {
    echo "Dados gravados com sucesso!";
} else {
    echo "Erro ao gravar os dados.";
}
?>
