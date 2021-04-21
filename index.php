<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>HOME</title>
</head>

<body>
    <header>
        <h1 class="logo">NO PONTO <img src="img/icone-certo-1.png" alt=""></h1>
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="quem_somos.php">QUEM SOMOS</a></li>
                <li><a href="form/cadastro.php">CADASTRE-SE</a></li>
                <li><a href="form/login.php">LOGIN</a></li>
            </ul>
        </nav>
    </header>

    <h1>Pontos turisticos de Brasília</h1>

    <main class="principal">
        <?php
        require_once "conexao/conexao.php";
        $ps = $pdo->query('SELECT * FROM ponto_turistico');

        while ($linha = $ps->fetch()) { ?>
            <div class="box-img">
                <h2>Nome: <i><?= $linha["nome"] ?></i></h2>
                <h3>Endereço: <i><?= $linha["endereco"] ?></i></h3>
                <figure class="img">
                    <img src="uploads/<?php echo $linha["imagem"] ?>" alt="">
                </figure>
            </div>
        <?php } ?>
    </main>
    <footer>
        <h1>NO PONTO - copyright 2019</h1>
    </footer>
</body>

</html>