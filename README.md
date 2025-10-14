Products SRP Demo

Projeto simples em PHP demonstrando o uso do Princípio da Responsabilidade Única (SRP).
O sistema permite cadastrar e listar produtos, com validação e persistência em arquivo.

Como executar
# 1. Clone o projeto
git clone https://github.com/Le0assis/desing-pattern-p2

# 2. Acesse a pasta
cd products-srp-demo

# 3. Instale as dependências
composer install

# 4. Inicie o servidor local

Acesse no navegador:

http://localhost/products-srp-demo/public/index.php



Casos de Teste Manuais
Caso	Entrada	Resultado Esperado
1. Cadastro válido	name="Teclado", price=120.50	✔ Produto criado e aparece na listagem
2. Nome curto	name="T", price=50	❌ Rejeitado — nome com menos de 2 caracteres
3. Preço negativo	name="Mouse", price=-10	❌ Rejeitado — preço inválido
4. Lista vazia	Arquivo vazio	“Nenhum produto cadastrado”
5. Múltiplos cadastros	3 produtos criados	IDs incrementais e listagem na ordem correta

Testes:

Caso 1 — Create válido

Entrada:
name=Teclado, price=120.50
Saída esperada:
Código HTTP 201
Mensagem: Produto cadastrado com sucesso
Produto visível na listagem (list.php)

'''JSON
>{"id":1,"name":"Teclado","price":120.5}
'''

Caso 2 — Create inválido (nome curto)

Entrada:
name=T, price=50
Saída esperada:
Código HTTP 422
Mensagem: Falha na validação

Caso 3 — Create inválido (preço negativo)

Entrada:
name=Mouse, price=-10
Saída esperada:
Código HTTP 422
Mensagem: Falha na validação

Caso 4 — List vazio

Condição:
Arquivo products.txt está vazio
Saída esperada:
Texto exibido: Nenhum produto cadastrado

Caso 5 — List com itens

Condição:
3 produtos já cadastrados
Saída esperada:
'''JSON
>{"id":1,"name":"teste","price":10}
>{"id":2,"name":"teste","price":10}
>{"id":3,"name":"teste","price":10}
'''
