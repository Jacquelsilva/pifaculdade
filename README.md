<p align="center"><b>Banco de Dados do Recora</b></p>
<div align="justify">

O banco de dados foi criado por meio do mySQL. Primeiro, para que o site consiga armazenar o cadastro de usuários, fizemos a tabela de usuários. Então, foi feita a tabela de categorias, que será responsável por armazenar as categorias que o usuário queira criar. Como cada usuário cria uma categoria diferente, as duas tabelas estão conectadas.

As tabelas "Outros", "Pagamentos" e "Assinaturas" são os diferentes tipos de categoria que podem ser criados, então, dependendo do que o usuário escolher, o seu conteúdo irá mudar.

A tabela de Gastos precisa acessar os dados contidos nas categorias, para então retornar quanto que foi gasto em um mês, ano, entre outros. Já a tabela de histórico precisa acessar tudo o que o usuário cria, modifica ou faz dentro do site, por isso está conectada à tabela de Usuários.

</div>

<p></p>

***Tabela do Banco***
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/user-attachments/assets/003f76b7-e2ae-4010-9e47-ca5a562439a6"  alt="Banco de dados"></a></p>

*Autoria: Recora*
