<?php
include './lib/mysql.php';
include './lib/utils.php';

$tableUser = "CREATE TABLE IF NOT EXISTS users (
	id INT auto_increment NOT NULL,
	login varchar(50) NOT NULL,
	password varchar(100) NOT NULL,
	nome varchar(50) NOT NULL,
	tipo INT NOT NULL,
	primary key(id)
)
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;";

$tableMarcas = "CREATE TABLE IF NOT EXISTS marcas (
	id INT auto_increment NOT NULL,
	nome varchar(50) NOT NULL,
	primary key(id)
)
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;";

$tableVeiculos = "CREATE TABLE IF NOT EXISTS veiculos (
	id INT auto_increment NOT NULL,
	nome varchar(50) NOT NULL,
	valor FLOAT NOT NULL,
	ano INT NOT NULL,
	tipo INT NOT NULL,
	marca_id INT NOT NULL,
	vendido BOOL NOT NULL,
	venda_id INT,
	primary key(id)
)
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;";

$userAdmin = "INSERT INTO users (login, password, nome, tipo) 
    VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 1);";


$insereTabelaUser = execQuery($tableUser, 'Criar Tabela Users');
if($insereTabelaUser === 1){
	// busca o admin na tabela user, se não existir cadastra-o
	$user = buscarUserLogin('admin');
	var_dump($user);
	if(gettype($user) !== 'array' && $user === 0){
		echo '<br/>';
		execQuery($userAdmin, 'Inserir Admin');
	}
}

$insereTabelaMarca = execQuery($tableMarcas, 'Criar Tabela Marcas');
$insereTabelaVeiculos = execQuery($tableVeiculos, 'Criar Tabela Veiculos');

if($insereTabelaVeiculos === 1 && $insereTabelaMarca === 1 && $insereTabelaUser === 1){
	header("Location: ./?init=OK");
}

?>