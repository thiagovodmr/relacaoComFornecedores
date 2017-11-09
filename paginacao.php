<?php 
 
    mysqli_connect("localhost","root",""); 
    mysqli_select_db("banco_teste");
     
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
 
    //seleciona todos os itens da tabela 
    $cmd = "select * from produtos"; 
    $produtos = mysqli_query($cmd); 
 
    //conta o total de itens 
    $total = mysqli_num_rows($produtos); 
 
    //seta a quantidade de itens por página, neste caso, 12 itens 
    $registros = 12; 
 
    //calcula o número de páginas arredondando o resultado para cima 
    $numPaginas = ceil($total/$registros); 
 
    //variavel para calcular o início da visualização com base na página atual 
    $inicio = ($registros*$pagina)-$registros; 
 
    //seleciona os itens por página 
    $cmd = "select * from produtos limit $inicio,$registros"; 
    $produtos = mysqli_query($cmd); 
    $total = mysqli_num_rows($produtos); 
     
    //exibe os produtos selecionados 
    while ($produto = mysqli_fetch_array($produtos)) { 
        echo $produto['id']." - "; 
        echo $produto['nome']." - "; 
        echo $produto['descricao']." - "; 
        echo "R$ ".$produto['valor']."<br />"; 
    } 
     
    //exibe a paginação 
    for($i = 1; $i < $numPaginas + 1; $i++) { 
        echo "<a href='paginacao.php?pagina=$i'>".$i."</a> "; 
    } 
?>