# NEES Requisiton Button
Plugin desenvolvido para adicionar um botão (com configurações e condicionais de exibição) que permitem a instituição utilizar para realizar uma requisição a fim de gerar certificações em sites externos a partir do envio dos dados relevantes para tal.

## O que pode ser configurado
Neste plugin podem ser configurados de forma individual sempre que a atividade for inserida:
- Nome da Atividade
- Descrição da Atividade
- Texto do botão
- Url para requisição

## Opções do plugin:
São encaminhados na requisição os seguintes dados:
- Nome completo do aluno
- Nome de usuário do aluno
- E-mail do aluno
- Nome do curso onde a atividade foi adicionada
- Shortname do curso onde a atividade foi adicionada

## Recomendações
### Shortname - Código do curso
Utilize um código para identificação do curso no sistema externo como shortname do curso

### Username - Dado relevante de Identificação
Ao utilizar o cpf como nome de usuário no cadastro dos alunos no moodle, este dado também será enviado pelo plugin para geração de um certificado, por exemplo.

# STATUS
Versão atual do plugin encontra-se em desenvolvimento, por isso ainda não está em estado final.
## Próximos Passos
- Verificar Criptografia para os dados para envio da requisição
- Verificar comportamentos relacionados ao ícone e a ponta final de processamento
 
