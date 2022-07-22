<?php
include '../lib/utils.php';
include '../lib/mysql.php';
$login = verificaSession();
$marcas = listarMarcas();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/css/reset.css">
    <link rel="stylesheet" href="../assests/css/stilo.css">
    <script src="../assets/js/utils.js" defer></script>
    <title>Cadastrar Carro</title>
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
        <form action="../lib/valida.php?cadastra=veiculos" method="post" enctype="multipart/form-data">
            <p>
                <label> Nome: </label>
                <input name="nome" type="text" id="box_nome">
            </p>
            <p>
                <label> Valor: </label>
                <input name="valor" type="number" id="box_valor" step="0.01">
            </p>
            <p>
                <label> Ano: </label>
                <input name="ano" type="number" id="box_ano">
            </p>
            <p>
                <label> Marca: </label>
                <select id="box_tipo" name="marca">
                    <?php
                        for($i = 0; $i < count($marcas); $i++){
                            echo '<option value="'. $marcas[$i]['id'].'">'.$marcas[$i]['nome'].'</option>';
                        }
                    ?>
                </select>
            </p>
            <p>
                <label> Tipo: </label>
                <select id="box_tipo" name="tipo">
                    <option value="1">Moto</option>
                    <option value="2">Carro</option>
                    <option value="3">Caminhão</option>
                </select>
            </p>
            <p>
                <input type="submit" value="Cadastrar">
                <input type="button" value="Cancelar" onclick="bt_cancelar()">
            </p>
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>