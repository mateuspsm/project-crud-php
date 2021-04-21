<?php require_once "controller/autentica.php";
?>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>ADMINISTRATIVO</title>
</head>

<body>
    <header>
    <h1 class="logo">NO PONTO <img src="img/icone-certo-1.png" alt=""></h1>
    <nav>
        <ul>
            <li><a href="form/form_ponto_turistico.php">Cadastrar Novo Ponto Turistico</a></li>
            <li><a href="controller/logoff.php">Efetuar logoff</a></li>
        </ul>
    </nav>
    </header>

    <div class="usuario"><h2>Olá, <?php echo $_SESSION['nome'] ?></h2>
    <p>Usuario: <strong><?php echo $_SESSION['login'] ?></strong></p></div>

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
                </figure><a href="<?= "form/form_alterar.php?id=" . $linha["id"] . "&nome=" . $linha["nome"] . "&endereco=" . $linha["endereco"] . "&imagem=" . $linha["imagem"] . "" ?>"><button>Alterar</button></a>
        <a href="<?= "controller/excluir_ponto_turistico.php?id=" . $linha["id"] . "&nome=" . $linha["imagem"] . "" ?>"><button>Excluir</button></a>
            </div>
        <?php } ?>
    </main>
    <footer>
        <h1>NO PONTO - copyright 2019</h1>
    </footer>
</body>

</html>