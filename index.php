<?php
define('DB_HOST'        , "sql.database.windows.net,1433");
define('DB_USER'        , "user");
define('DB_PASSWORD'    , "passworld");
define('DB_NAME'        , "banco-usuario");
define('DB_DRIVER'      , "sqlsrv");

require_once "conexao.php";

try{

    $Conexao    = Conexao::getConnection();
    $query      = $Conexao->query("SELECT TOP (1000) * FROM [dbo].[USUARIOS]");
    $usuarios   = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Conexão SQL Server</title>
</head>
<body>
  <form>
        <table border=1>
            <tr>
               <td>Nome</td>
               <td>Sobrenome</td>
               <td>Idade</td>
            </tr>
            <?php
               foreach($usuarios as $usuario) {
            ?>
            <tr>
                <td><?php echo $usuario['NOME']; ?></td>
                <td><?php echo $usuario['SOBRENOME']; ?></td>
                <td><?php echo $usuario['IDADE']; ?></td>
            </tr>
            <?php
               }
            ?>
        </table>
    </form>
</body>
</html>
