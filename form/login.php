<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>HOME</title>
</head>

<body>
    <header>
        <h1 class="logo">NO PONTO <img src="../img/icone-certo-1.png" alt=""></h1>
        <nav>
            <ul>
                <li><a href="../index.php">HOME</a></li>
                <li><a href="../quem_somos.php">QUEM SOMOS</a></li>
                <li><a href="cadastro.php">CADASTRE-SE</a></li>
                <li><a href="login.php">LOGIN</a></li>
            </ul>
        </nav>
    </header>

    <h1>Formulario de cadastro</h1>
    <main class="principal">

        <form action="../controller/verificaLogin.php" method="post">
            <table>
                <tr>
                    <td><label for="">Login: </label></td>
                    <td><input type="text" name="login"></td>
                </tr>

                <tr>
                    <td><label for="">Senha: </label></label></td>
                    <td><input type="password" name="senha"></td>
                </tr>

            </table>
            <button type="submit">LOGIN</button>
        </form>
    </main>
</body>

</html>