<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Adicionar categoria</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
</head>

<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
?>

<body>

    <div style="margin-top: 40px;">
        <h3>Lista de Fornecedores</h3>
        <div style="text-align: right; margin-top: 20px;">
            <a href="adicionar_categoria.php" role="button" class="btn btn-success btn-sm">Cadastrar fornecedor</a>
        </div>
        <br>
        <table id="table_id" class="table">
            <thead>
                <tr>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <?php
                include 'conexao.php';
                $sql = "SELECT * FROM fornecedor";
                $busca = mysqli_query($con, $sql);
                while($array = mysqli_fetch_array($busca)){
                    $nome_fornecedor = $array['nome_fornecedor'];
                    $email_fornecedor = $array['email_fornecedor'];
                    $cnpj = $array['cnpj'];
                    $telefone = $array['telefone'];
                    $status = $array['status'];
                    if($status == "inativo") $estilo = "<span style='color:red;'>$status</span>";
                    else $estilo = $status;
                    ?>
                    <tr>
                        <td><?php echo $nome_fornecedor ?></td>
                        <td><?php echo $email_fornecedor ?></td>
                        <td><?php echo $cnpj ?></td>
                        <td><?php echo $telefone ?></td>
                        <td><?php echo $status ?></td>
                    </tr>
                    <?php } ?>
        </table>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script> -->
    
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function (){
            $('#table_id').DataTable({
                "pageLenght":25,
                "language": {
                    "lenghtMenu":
                }
            });
        });
    </script>


</body>
</html>