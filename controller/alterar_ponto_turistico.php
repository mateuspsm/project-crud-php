<?php require '../conexao/conexao.php';
date_default_timezone_set('UTC');


$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$arquivo = $_FILES['arquivo']['name'];
$dir = "../uploads/" . $imagem;

if (empty($arquivo) && empty($nome) && empty($endereco)) {
   echo "Campos em branco.";
   header("Refresh: 4; url = http://localhost/Trabalho_final/administrativo.php");
} else {

   if ($arquivo == NULL) {

      $ps = $pdo->prepare("UPDATE ponto_turistico SET nome=?, endereco=? WHERE id= ?;");
      if ($ps->execute([$nome, $endereco, $id])) {
         echo "Ponto alterado com sucesso!";
         header("Location: ../administrativo.php");
      }
   } else {

      if (!unlink($dir)) {
         echo ("Erro ao deletar $dir");
      } else {

         //Pasta onde o arquivo vai ser salvo
         $_UP['pasta'] = '../uploads/';

         //Tamanho máximo do arquivo em Bytes
         $_UP['tamanho'] = 1024 * 1024 * 100; //5mb

         //Array com a extensões permitidas
         $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');

         //Renomeiar
         $_UP['renomeia'] = false;

         //Array com os tipos de erros de upload do PHP
         $_UP['erros'][0] = 'Não houve erro';
         $_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
         $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
         $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
         $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

         //Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
         if ($_FILES['arquivo']['error'] != 0) {
            die("Não foi possivel fazer o upload, erro: <br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
            exit; //Para a execução do script
         }

         //Faz a verificação da extensao do arquivo
         $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
         if (array_search($extensao, $_UP['extensoes']) === false) {
            echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Trabalho_final/form/form_ponto_turistico.php'>
            <script type=\"text/javascript\">
                alert(\"A imagem não foi cadastrada extesão inválida.\");
            </script>";
         }

         //Faz a verificação do tamanho do arquivo
         elseif ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
            echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Trabalho_final/form/form_ponto_turistico.php'>
            <script type=\"text/javascript\">
                alert(\"Arquivo muito grande.\");
            </script>";
         }

         //O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
         else {

            $nome_final = date("Y-m-d") . "-" . $_FILES['arquivo']['name'];

            //Verificar se é possivel mover o arquivo para a pasta escolhida
            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
               //Upload efetuado com sucesso, exibe a mensagem


               $ps = $pdo->prepare('UPDATE ponto_turistico SET nome=?, endereco=?, imagem=? WHERE id= ?;');
               if ($ps->execute([$nome, $endereco, $nome_final, $id])) {
                  echo "Ponto alterado com sucesso!";
                  header("Location: ../administrativo.php");
               }
            } else {
               //Upload não efetuado com sucesso, exibe a mensagem
               echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Trabalho_final/form/form_ponto_turistico.php'>
                <script type=\"text/javascript\">
                    alert(\"Ponto turistico não foi cadastrado com sucesso.\");
                </script>
            ";
            }
         }
      }
   }
}
