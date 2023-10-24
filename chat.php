<?php
session_start();
require_once 'includes/funcoes.php';
require_once 'core/conexao_mysql.php';
require_once 'core/sql.php';
require_once 'core/mysql.php';

     foreach($_POST as $indice => $dado) {
      $$indice = limparDados($dado);
  }
  
  foreach($_GET as $indice => $dado) {
      $$indice = limparDados($dado);
  }
    
  $livros = buscar(
      'livros',
          [
              'idLivro',
              'titulo',
              'autor',
              'capa',
              'capa2',
              'pdf',
              'banca',
              'texto'
           ],
    [
      ['idLivro', '=', $idLivro]
    ]
);
$livro = $livros[0];
$pasta = "imagensLivro/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>view post</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'includes/header.php'; ?>
<!-- header section ends -->

<!-- view posts section starts  -->

<section class="view-post">

   <div class="heading"><h1>Converse sobre o livro!</h1> <a href="cadastro_livro?idLivro=<?php $idLivro?>" class="inline-option-btn" style="margin-top: 0;">Voltar</a></div>

   <?php


        $total_ratings = 0;
        $rating_1 = 0;
        $rating_2 = 0;
        $rating_3 = 0;
        $rating_4 = 0;
        $rating_5 = 0;
         $average = 0;
        
         
   ?>
   <div class="row">
      <div class="col">
         <img src="<?echo $pasta.$livro['capa'] ?>" alt="" class="image">
         <h3 class="title"><?echo $livro['titulo'] ?></h3>
      </div>
      <div class="col">
          <div class="flex">
            <div class="total-reviews">
               <h3>5<i class="fas fa-star"></i></h3>
               <p>10 reviews</p>
            </div>
            <div class="total-ratings">
               <p>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <span><? ?></span>
               </p>
               <p>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <span><? ?></span>
               </p>
               <p>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <span><? ?></span>
               </p>
               <p>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <span><? ?></span>
               </p>
               <p>
                  <i class="fas fa-star"></i>
                  <span><? ?></span>
               </p>
            </div>
         </div> 
      </div>
   </div>
   <?php
          
   /* else{
      echo '<p class="empty">post is missing!</p>';
   }  */
   ?>

</section>

<!-- view posts section ends -->

<!-- reviews section starts  -->

<section class="reviews-container">

   <div class="heading"><h1>Comentários</h1> <a href="add_comentario.php?idComen=<? ?>" class="inline-btn" style="margin-top: 0;">add review</a></div>

   <div class="box-container">

   <div class="box">
      <div class="user">
            <img src="imagensUsuario/<?echo $_SESSION['login']['usuarios']['imagemUsuario'] ?>" alt="">
         <?php  ?>   
            <h3><? echo substr($_SESSION['login']['usuarios']['nomeUsuario'], 0, 1); ?></h3>
         <?php ; ?>   
         <div>
            <p><? echo $_SESSION['login']['usuarios']['nomeUsuario']; ?></p>
            <span><? echo $comentario['data_criacao']; ?></span>
         </div>
      </div>
      <?php ; ?>
      <div class="ratings">
         <?php /* if($fetch_review['rating'] == 1){ */ ?>
            <p style="background:var(--red);"><i class="fas fa-star"></i> <span><? echo $rating_1 ?></span></p>
         <?php /* }; */ ?> 
      <!-- <?php /* if($fetch_review['rating'] == 2){ ?>
         <p style="background:var(--orange);"><i class="fas fa-star"></i> <span><?= $fetch_review['rating']; ?></span></p>
      <?php }; ?>
      <?php if($fetch_review['rating'] == 3){ ?>
         <p style="background:var(--orange);"><i class="fas fa-star"></i> <span><?= $fetch_review['rating']; ?></span></p>
      <?php }; ?>   
      <?php if($fetch_review['rating'] == 4){ ?>
         <p style="background:var(--main-color);"><i class="fas fa-star"></i> <span><?= $fetch_review['rating']; ?></span></p>
      <?php }; ?>
      <?php if($fetch_review['rating'] == 5){ ?>
         <p style="background:var(--main-color);"><i class="fas fa-star"></i> <span><?= $fetch_review['rating']; ?></span></p>
      <?php };  */?> -->
      </div>
      <h3 class="title"><? echo $comentario['tituloComen']; ?></h3>
      <?php if($comentario['textoComen'] != ''){ ?>
         <p class="description"><? echo $comentario['textoComen']; ?></p>
      <?php }; ?>  
      <?php if($_SESSION['login']['usuarios']['adm'] > 0){ ?>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="delete_id" value="<?= $fetch_review['id']; ?>">
            <a href="update_review.php?get_id=<?= $fetch_review['id']; ?>" class="inline-option-btn">edit review</a>
            <input type="submit" value="delete review" class="inline-delete-btn" name="delete_review" onclick="return confirm('delete this review?');">
         </form>
      <?php }; ?>   
   </div>


   </div>

</section>

<!-- reviews section ends -->













<!-- sweetalert cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/alers.php'; ?>

</body>
</html>