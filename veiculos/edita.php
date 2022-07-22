<?php
include '../lib/mysql.php';
include '../lib/utils.php';
// somente o proprio usuario e usuarios do tipo ADM = 1 poderão editar user
// o proprio usuario não podera alterar seu tipo de usuário, somente ADM poderá alterar o tipo

$login = verificaSession();

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $veiculo = buscarVeiculoId($id);
    $marcas = listarMarcas();
} else {
    header('Location: ../bemvindo.php');
}

/*
if (($_SESSION['user']['tipo'] === 2)) {
    // caso não seja ADM e nem o proprio user redireciona para acesso restrito
    header('Location: ../acessorestrito.php');
} else if (!$marca){
   header('Location: ../acessorestrito.php?marcaNotFound');
}
*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/stilo.css">
    <script src="../assets/js/utils.js" defer></script>
    <title>Editar Usuário</title>
</head>

<body>
    <header>
        <figure>
            <img src="" alt="logo">
            <?php
            if ($login !== 0) {
                $name = $_SESSION['user']['nome'];
                echo "<p>$name</p>";
                echo '<a href="../lib/valida.php?logout">Logout</a>';
            }
            ?>
        </figure>
        <?php
            exibeMenuSubpasta('.');
        ?>
    </header>
    <main>
        <form action="../lib/valida.php?edita=veiculos" method="post" enctype="multipart/form-data">
            <p>
                <input name="id" type="text" id="box_nome" style="display: none;" <?php echo 'value ="' . $id . '"' ?>>
            </p>
            <p>
                <label> Nome: </label>
                <input name="nome" type="text" id="box_nome" <?php echo 'value ="' . $veiculo['nome'] . '"' ?>>
            </p>
            <p>
                <label> Ano: </label>
                <input name="ano" type="number" id="box_nome" <?php echo 'value ="' . $veiculo['ano'] . '"' ?>>
            </p>
            <p>
                <label> Valor: </label>
                <input name="valor" type="number" step="0.01" id="box_nome" <?php echo 'value ="' . $veiculo['valor'] . '"' ?>>
            </p>
            <p>
                <label> Marca: </label>
                <select id="box_tipo" name="marca">
                    <?php
                        for($i = 0; $i < count($marcas); $i++){
                            if( $marcas[$i]['id'] === $veiculo['marca']){
                                echo '<option value="'. $marcas[$i]['id'].'" selected>'.$marcas[$i]['nome'].'</option>';
                            }else{
                                echo '<option value="'. $marcas[$i]['id'].'">'.$marcas[$i]['nome'].'</option>';
                            }
                        }
                    ?>
                </select>
            </p>
            <p>
                <label> Tipo: </label>
                <select id="box_tipo" name="tipo">
                    <?php
                    $tipos = [
                    array('id' => 1 , 'nome' => 'Moto'),
                    array('id' => 2 , 'nome' => 'Carro'),
                    array('id' => 3 , 'nome' => 'Caminhão')
                ];
                    for($i=0; $i < count($tipos); $i++){
                        if($tipos[$i]['id'] === $veiculo['tipo']){
                            echo '<option value="'. $tipos[$i]['id'].'" selected>'.$tipos[$i]['nome'].'</option>';
                        }else {
                            echo '<option value="'. $tipos[$i]['id'].'">'.$tipos[$i]['nome'].'</option>';
                        }
                    }
                    ?>
                </select>
            </p
            <p>
                <input type="submit" value="Editar">
                <input type="button" value="Cancelar" onclick="bt_cancelar()">
            </p>
        </form>
    </main>
    <footer>
    </footer>
</body>

</html>