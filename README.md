Aluno: Jhonatan Cesar Alves da Silva
RA: 2010656

Cadastro e Listagem de Usuários — SRP Demo
Este projeto é um exemplo prático em PHP baseado no Princípio da Responsabilidade Única (SRP) do SOLID.
O objetivo é demonstrar uma aplicação web simples, porém organizada, que permite cadastrar e listar usuários, utilizando boas práticas de separação de camadas, validação e interface moderna.

Funcionalidades
Cadastro de novos usuários com validação de nome, e-mail e senha.

Impede cadastros duplicados pelo mesmo e-mail.

Exibição centralizada e estilizada dos usuários cadastrados.

Interface amigável feita com HTML5 e CSS3 responsivo.

Botões para navegação entre cadastro e listagem, sempre visíveis e acessíveis.

Organização do Código
Camada de Aplicação: Regras de negócio e controle geral.

Domínio: Interfaces e validação das regras.

Infraestrutura: Persistência de dados em arquivo texto.

Views: HTML limpo separado da lógica e CSS padronizado.

Como Executar
Clone o repositório:

text
git clone https://github.com/Le0assis/desing-pattern-p2
Entre na pasta e instale as dependências:

text
cd desing-pattern-p2
composer install
Suba o servidor local:

text
php -S localhost:8000 -t public
Acesse no navegador:

text
http://localhost:8000/index.php
Exemplo de Uso
Preencha o formulário de cadastro na tela inicial.

Clique em “Listar usuários” para visualizar a tabela dos cadastrados.

Utilize os botões de navegação para retornar ao menu ou ver os cadastrados a qualquer instante.

Estrutura da Interface
Projeto com estilização moderna e responsiva.

Cards centralizados para formulários, avisos e tabelas.

Feedback visual para sucesso e erro nos cadastros.

Licença
Este projeto é livre para fins didáticos e acadêmicos.