<?php


function addProduto ($nome,$descricao,$preco, $img){
        
    $jsonProdutos = file_get_contents('Produtos.json'); // llamo al arqivo json
    $produtos = json_decode($jsonProdutos,true); // para transformar um json a string
    // $produtos = $produtos['Produtos'];

    $chave = count($produtos['Produtos']) + 1;
    $novoProduto = ["id"=>"produto$chave",'nomeProduto' =>$nome,'categoria'=>$categoria, 'descricao'=>$descricao, 'precoProduto'=>$preco, 'imgProduto' =>$img];
    $produtos["Produtos"][]=$novoProduto;

    $jsonProdutos = json_encode($produtos);

    file_put_contents('Produtos.json', $jsonProdutos);

    
    return true;
}

function validarNome($nome){
    return strlen($nome) >= 3;
}
function validarCategoria($categoria){
    return strlen($categoria) >= 3;
}

function validarPrecoProduto($precoProduto){
    return $precoProduto >=1;
}

function validarDescricaoProduto($descProduto){
    return strlen($descProduto) >= 3;
}

function validarQuantidade($quantidade){
    return $quantidade >=1;
}



session_start();

$contadorInputVazio = 0;
foreach($_POST as $item){
$item == ""?$contadorInputVazio++:0;    
}

if($contadorInputVazio == count($_POST)){
 
echo " <h1>Voce nao envio nenhuma informacoe sobre o produto</h1>";
echo '  <a class="btn btn-primary" href="cadastroProduto.php">Voltar para pagina de Cadastro!</a>';

//  para la ejecucion de la pag si no tiene  un POST E UM FILE para hacer la validacao
exit;
}


$imgAceitas = ["imgs/png","imgs/jpg","imgs/jpeg"];
$erroEnvio =$_FILES['arquivo']['error'];


$nomeProduto = $_POST['nomeProduto'];

if (empty($nomeProduto)) {
$_SESSION['nomeVazio'] = "Campo nome e obrigatorio";
}else{
    $_SESSION['valueNome'] = $_POST['nomeProduto'];
}
$categoriaProduto = $_POST['categoria'];
$descricaoProduto = $_POST['descProduto'];
$quantidadeProduto = $_POST['quantidade'];
$precoProduto = $_POST['preco'];
$nomeArquivo = $_FILES['arquivo']['name'];
$arquivoTmp = $_FILES['arquivo']['tmp_name'];

$caminhoImg= "imgs/$nomeArquivo";
$typeFile = $_FILES['arquivo']['type'];



if($erroEnvio !== 0){
 
echo " <h1>Ouve um erro no envio do arquivo verifique e tente novamente!</h1>";
echo '  <a class="btn btn-primary" href="cadastroProduto.php">Voltar para pagina de Cadastro!</a>';

exit;
}

if (array_search($typeFile, $imgAceitas) == false) {
echo " <h1>Extensao do arquivo invalido! veifique se o arquivo e uma imagem do tipo png, jpg, jpeg</h1>";
echo '  <a class="btn btn-primary" href="cadastroProduto.php">Voltar para pagina de Cadastro!</a>';

exit;
}




// ese arq temp va estar en la pasta img con ese nome va a parecer con ese nome na pasta
move_uploaded_file($arquivoTmp, "imgs/$nomeArquivo");
