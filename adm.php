<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php session_start();
include 'includes/valida_adm.php'; ?>
    <div>
        <h3>Ações com livros</h3><br>
        <a href="cadastro_livro.php">Cadastro de Livros</a><br>
        <a href="listar_livro.php">Lista Livros</a><br>
        <h3>Ações usuarios livros</h3><br>
        <a href="cadastro_usuario.php">Cadastro de Usuario</a><br>
        <a href="listar_usuario.php">Listar usuarios</a><br>
        <br>
        <a href="index.php">Pagina Inicial</a>
    </div>
</body>
</html>