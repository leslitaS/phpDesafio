<?php
session_start();

// incluyo el arquivo funcoes.php para tener acceso a mis funcoes
// include "funcoes.php"; 

if ($_POST) {
    if ($_FILES) {
        $destino = 'imgs/' . $_FILES['imgProduto']['name'];

        $arquivo_tmp = $_FILES['imgProduto']['tmp_name'];

        move_uploaded_file($arquivo_tmp, $destino);
    }
    $_POST['imgProduto'] = $destino;
    $_SESSION['produtos'][] = $_POST;
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Desafio PHP- Produto</title>
</head>


<body>

<div class="container">
        <div class="row">

        <!-- tabela de produtos  include "tabelaProdutos.php";  -->
        <div class="col-md-6 col-xs-12">
                <h2 id="idH2">Todos os Produtos</h2> <br>     
                <?php
                if (isset($_SESSION['produtos']) && $_SESSION['produtos']) {
                    ?>
                    <table class="table">
                        <tr>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Preço R$</th>
                        </tr>
                        <?php
                        $nomeProduto = isset($_GET['nomeProduto'])? $_GET['nomeProduto']:"nao informado";
                        foreach ($_SESSION['produtos'] as $key => $produto) {
                            echo "<tr>";
                            echo "<td><a href='mostrarProduto.php?id=" . $key . "'>" . $produto['nomeProduto'] . "</a></td>";
                            echo "<td>" . $produto['categoria'] . "</td>";
                            if(!empty( $produto['precoProduto'])){
                                echo "<td>R$" . $produto['precoProduto'] ." </td>";
                            }else{
                               "  <td></td>";
                            }                            
                            echo "</tr>";
                        }
                        ?>
                    </table>
                <?php
                } else {
                    echo "<div class='alert alert-info'>Ainda nao tem produtos</div>";
                }
                ?>

        </div>


        <div class="col-md-6 col-xs-12">

              
        <form class="jumbotron" action="index.php" action="index.php" method="POST" enctype="multipart/form-data">
            <legend>Cadastrar Produto:</legend>
            <div class="form-group">
                <label for="nomeProduto"> Nome do Produto</label>
                <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto" name="nomeProduto">
                <!-- <?php
                    // if (!empty($_SESSION['nomeVazio'])) {
                    //     echo "value='".$_SESSION['valueNome']. "'";
                    //     unset($_SESSION['valueNome']);
                    // }
                ?>
                >
                <?php
                    // if (!empty($_SESSION['nomeVazio'])) {
                    //     echo "<p style='color: red; '>".$_SESSION['nomeVazio']. "</p>";
                    //     unset($_SESSION['nomeVazio']);
                    // }
                ?> -->
            </div>
            <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <select name="categoria" id="categoria" class="form-control" >
                            <option disabled selected>Selecione uma Categoria:</option>
                            <option value="camiseta">Camiseta</option>
                            <option value="moleton">Moleton</option>
                            <option value="calça">Calça</option>
                        </select>
            </div>
            <div class="form-group">
                <label for="descProduto"> Descrição do Produto</label>
                <textarea class="form-control" name="descProduto" id="descProduto"></textarea>
            </div>
            <div class="form-group">
                <label for="precoProduto">Preço do Produto</label>
                <input type="number" step="any" class="form-control" id="precoProduto" placeholder="Preço do Produto" name="precoProduto">
            </div>

           
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" step="any" class="form-control" id="quantidade" placeholder="Quantidade em Estoque" name="quantidade">
            </div>

            <div class="form-group">
                <label for="imgProduto"> Imagem do Produto</label>
            <input type ="file" name="imgProduto" id ="imgProduto">
            </div>

            <button class ="btn btn-success" type="submit">Enviar</button>
        </form>

       

        </div>


        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</body>
</html>



