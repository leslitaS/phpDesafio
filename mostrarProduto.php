
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>descricao do Produto</title>
    <!-- <style>
        h2{
            font-size: 16px;
        }
        .produto{
            margin: 20px 0;
        }
        .produto a{
            margin-bottom: 20px;
        }
    </style> -->
</head>
<body>


<div class="container">
        <div class="row">

            <div class="col-xs-12">
                        <a href="index.php" class="btn btn-default">
                            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                            Voltar para lista de produtos
                        </a>
                    </div>
                    <div class="col-md-6 col-xs-12">
                    <br>
                       <img class="img-responsive" src="<?php echo $_SESSION['produtos'][$_GET['id']]['imgProduto'] ?>" alt="350px" width="450px">
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <h3>nome Produto: </h3>
                        <h3><?php echo $_SESSION['produtos'][$_GET['id']]['nomeProduto'] ?></h3>
                        <h3>Categoria: </h3>
                        <p><?php echo $_SESSION['produtos'][$_GET['id']]['categoria'] ?></p>
                        <h3>Descrição:</h3>
                        <p><?php echo $_SESSION['produtos'][$_GET['id']]['descProduto'] ?></p>
                        <p><?php echo $_SESSION['produtos'][$_GET['id']]['precoProduto'] ?></p>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <h3>Quantidade em estoque:</h3>
                                <p><?php echo $_SESSION['produtos'][$_GET['id']]['quantidade'] ?></p>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <h3>Preço:</h3>
                                <p>R$<?php echo $_SESSION['produtos'][$_GET['id']]['precoProduto'] ?></p>
                            </div>
                    </div>
                    <hr>
            </div>
        </div>

    </div>
 </div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</body>
</html>

