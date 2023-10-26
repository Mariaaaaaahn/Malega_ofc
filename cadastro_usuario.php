<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Cadastro - Malega Libros</h1>

            <form  action="core/usuario_repositorio.php" method="post" enctype="multipart/form-data"> 
                <input type="hidden" name="acao" value="insert">
                <div class="form-group  col-12 col-md-6">
                    <label for="nome"><strong>Nome</strong></label>
                    <input type="text" class="form-control" name="nomeUsuario" id="nome">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="email"><strong>E-mail</strong></label>
                    <input type="email" class="form-control" name="emailUsuario" id="email">
                </div>
            </div>
                <div class="form-group col-12 col-md-6">
                    <label for="senha"><strong>Senha</strong></label>
                    <input type="password" class="form-control" name="senhaUsuario" id="senha">
                </div>
            </div>                
            <div class="form-row">          
                <div class="form-group col-6">
                    <label for="imagem"><strong>insira sua foto</strong></label>
                    <input type="file" class="form-control-file" name="imagemUsuario" id="imagem" accept="image/*">
                </div>
            </div>
            <div class="form-row">          
                <input type="submit" class="btn btn-primary col-2" value="Salvar">
            </div>
            </form>
        
        <a href="adm.php">Voltar</a><br>
        <a href="listar_usuario.php">Lista de usuarios</a>
    </div>
</body>
</html>