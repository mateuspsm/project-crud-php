<?php require_once "../controller/autentica.php";
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>ALTERAR</title>
</head>

<body>
    <header>
        <h1 class="logo">NO PONTO <img src="../img/icone-certo-1.png" alt=""></h1>
        <nav>
            <ul>
            </ul>
        </nav>
    </header>

    <div class="usuario">
        <h2>Olá, <?php echo $_SESSION['nome'] ?></h2>
        <p>Usuario: <strong><?php echo $_SESSION['login'] ?></strong></p>
    </div>

    <!-- FORM DE CADASTRO DE USUARIO -->
    <?php
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_GET, 'endereco', FILTER_SANITIZE_STRING);
    $imagem = filter_input(INPUT_GET, 'imagem', FILTER_SANITIZE_STRING);
    ?>

    <h2>Formulario atualizar</h2>
    <main class="principal">

        <form action="../controller/alterar_ponto_turistico.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="imagem" value="<?= $imagem ?>">
            <table>
                <tr>
                    <td><label for="">Nome do Ponto Turistico: </label></td>
                    <td><input type="text" name="nome" id="nome" value="<?= $nome ?>" /></td>
                </tr>

                <tr>
                    <td><label for="">Endereço: </label></label></td>
                    <td><input type="text" name="endereco" id="endereco" value="<?= $endereco ?>" /></td>
                </tr>

                <tr>
                    <td><label for="">Imagem: </label></td>
                    <td><input type="file" name="arquivo" id="arquivo"></td>
                </tr>
            </table>
            <button type="submit">Cadastrar</button>
        </form>

    </main>
</body>

</html>