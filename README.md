# Guia de Setup, Execução e Análise do Código-Fonte

## 1. Pré-requisitos

- [XAMPP](https://www.apachefriends.org/pt_br/index.html) (inclui Apache e MySQL)
- [HeidiSQL](https://www.heidisql.com/)
- [Visual Studio Code](https://code.visualstudio.com/)

## 2. Setup do Ambiente

### 2.1. Iniciando o Servidor Apache e MySQL

1. Abra o XAMPP Control Panel.
2. Clique em **Start** nos módulos **Apache** e **MySQL**.
3. Certifique-se de que ambos estejam com o status "Running".

### 2.2. Salvando o Código-Fonte

1. Copie todos os arquivos da aplicação para a pasta `c:\xampp\htdocs\circo`.
2. Certifique-se de que o arquivo principal seja `index.php`.

## 3. Configurando o Banco de Dados

### 3.1. Conectando ao MySQL com HeidiSQL

1. Abra o HeidiSQL.
2. Crie uma nova sessão com os seguintes dados padrão:
   - **Host/IP:** 127.0.0.1
   - **Usuário:** root
   - **Senha:** (deixe em branco, a menos que tenha definido uma senha no MySQL)
3. Caso utilize usuário/senha diferentes, atualize o arquivo `conexao.php` da aplicação com essas informações.

### 3.2. Executando o Script SQL

1. No HeidiSQL, conecte-se ao servidor local.
2. Abra o arquivo `circo.sql` pelo menu **Arquivo > Abrir**.
3. Execute o script para criar o banco de dados e as tabelas necessárias.

## 4. Executando a Aplicação

1. No navegador, acesse: [http://localhost/circo/index.php](http://localhost/circo/index.php)
2. A aplicação estará disponível para uso.

## 5. Análise do Código-Fonte

- Abra a pasta `c:\xampp\htdocs\circo` no Visual Studio Code.
- Analise os arquivos PHP, HTML, CSS e SQL conforme necessário.

---

## Estrutura do projeto

```
[Usuário]
   |
   v
[index.php]
   |---> Inclui conexao.php (faz conexão com o banco de dados)
   |---> Consulta reservas no banco (SELECT * FROM reservas)
   |---> Exibe tabela de reservas
   |---> Inclui estilo.css (aplica o estilo visual à página)
   |---> Botão "Reservar" (adicionar_reserva.php)
   |---> Botão "Editar" (editar_reserva.php?id=)
   |---> Botão "Excluir" (excluir_reserva.php?id=)
   |
   v
[Funções principais]
   |
   +--> adicionar_reserva.php
   |      |---> Inclui conexao.php
   |      |---> Inclui estilo.css
   |      |---> Formulário de nova reserva
   |      |---> Envia dados para o banco (INSERT)
   |      |---> Redireciona para index.php
   |
   +--> editar_reserva.php
   |      |---> Inclui conexao.php
   |      |---> Inclui estilo.css
   |      |---> Busca dados da reserva (SELECT WHERE id)
   |      |---> Formulário de edição
   |      |---> Atualiza dados no banco (UPDATE)
   |      |---> Redireciona para index.php
   |
   +--> excluir_reserva.php
          |---> Inclui conexao.php
          |---> Remove do banco (DELETE)
          |---> Redireciona para index.php

[conexao.php]
   |---> Utiliza dados do banco criados por circo.sql para conectar

[estilo.css]
   |---> Aplica estilos visuais às páginas HTML

[circo.sql]
   |---> Cria o banco de dados e a tabela 'reservas' utilizada por todas as funções

```

Resumo:

- index.php: Arquivo principal da aplicação. Exibe a lista de reservas de sessões do circo em uma tabela, permitindo visualizar, editar ou excluir cada reserva. Inclui o arquivo conexao.php para acessar o banco de dados e o arquivo estilo.css para aplicar o visual à página. Possui botões para adicionar nova reserva, editar ou excluir reservas existentes.
- adicionar_reserva.php: Página responsável por exibir o formulário para cadastrar uma nova reserva de sessão do circo. Ao enviar o formulário, os dados são inseridos no banco de dados (tabela reservas). Após o cadastro, o usuário é redirecionado para o index.php.
- editar_reserva.php: Permite editar os dados de uma reserva já existente. Busca as informações da reserva selecionada, exibe em um formulário para edição e, ao salvar, atualiza os dados no banco de dados. Após a atualização, redireciona para o index.php.
- excluir_reserva.php: Arquivo responsável por excluir uma reserva do banco de dados. Recebe o identificador da reserva via parâmetro, realiza a exclusão e redireciona para o index.php.
- conexao.php: Contém o código para conectar ao banco de dados MySQL utilizando os dados definidos no script circo.sql. É incluído em todas as páginas que precisam acessar o banco de dados.
- estilo.css: Arquivo de estilos responsável pela aparência visual das páginas HTML da aplicação, tornando a interface mais agradável e organizada.
- circo.sql: Script SQL utilizado para criar o banco de dados e a tabela reservas, que armazena todas as informações das reservas de sessões do circo. Deve ser executado antes de utilizar a aplicação.
