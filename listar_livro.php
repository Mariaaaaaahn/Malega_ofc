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
    <?php 
    
        session_start();
        require_once 'includes/funcoes.php';
        require_once 'core/conexao_mysql.php';
        require_once 'core/sql.php';
        require_once 'core/mysql.php';

        foreach($_GET as $indice => $dado){ //como funciona esse comando
            $$indice = limparDados($dado);
        }

        $criterio = [];

        if(!empty($busca)){
            $criterio[] = ['titulo', 'like', "%{$busca}%"];
        }

        $result = buscar(
            'livros',
            [
                'idLivro',
                'titulo',
                'autor',
                'capa',
                'artigo',
                'pdf',
                'banca',
                'texto'
            ],
            $criterio,
            'idLivro DESC'
        );
    ?>
    
    <div class="container">
    <h1>Consulta de Livros</h1>
    <form class="form-inline my-2 my-lg-0" method='get' action=' '> <!-- action vazio busca a propia pagina-->
    <input class="form-control mr-sm-2" type="search" name='busca'
        placeholder="Busca" arial-label="Busca">
    <button class="btn btn-outline-sucess my-2 my-sm-0"
        type="submit">Buscar</button>
    </form>
    <table align="center" border="1" width="500" bgcolor="grey">
        <thead>
            <?php
            $pasta = "imagensLivro/";
            $pasta_pdf = "pdf/";
            foreach($result as $entidade):

        ?>
        <tr>
            <th class="col">Código</th>
            <th class="col">Título</th>
            <th class="col">Autor</th>
            <th class="col">Banca</th>
            <th class="col">Resumo</th>
            <th class="col">Artigo</th>
            <th class="col">PDF</th>
            <th class="col">Capa</th>
            </tr>
        </thead>
        <tbody>
                <td><?php echo $entidade['idLivro'] ?></td>
                <td><?php echo $entidade['titulo'] ?></td>
                <td><?php echo $entidade['autor'] ?></td>
                <td><?php echo $entidade['banca'] ?></td>
                <td><?php echo $entidade['texto'] ?></td>
                <td><?php echo $entidade['artigo'] ?></td>
                <td><a href="<?php echo $pasta_pdf.$entidade['pdf'] ?>">PDF</a></td>
                <td><img src="<?php echo $pasta.$entidade['capa']?>" width="200px" height="400px"> </td>
                <!--<td><a href="../core/livro_repositorio.php?acao=delete&idLivro=<?php //echo $entidade['idLivro']?>">Deletar</a></td>-->
                <td><a href="core/livro_repositorio.php?acao=delete&idLivro=<?php echo $entidade['idLivro']?>" onclick="return confirm('Deseja excliur permanentemente o livro?');">Deletar</a></td>
                <td><a href="cadastro_livro.php?idLivro=<?php echo $entidade['idLivro']?>">Atualizar</a></td>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
    <div>
    <a href="cadastro_livro.php">Voltar</a>
    </div>
</body>
</html>