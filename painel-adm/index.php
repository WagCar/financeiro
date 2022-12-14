<?php
@session_start();
require_once("../conexao.php");
require_once("verificar.php");

$id_usuario = $_SESSION['id_usuario'];
//------------Recuperar Dados Usuario ----------------
$query = $pdo->query("SELECT * FROM usuarios WHERE id = '$id_usuario' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_usuario  = $res[0]['nome'];
$email_usuario = $res[0]['email'];
$senha_usuario = $res[0]['senha'];
$nivel_usuario = $res[0]['nivel'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nome_sistema  ?></title>

    <link href="../imagens/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--------  Lib do ajax ---------------- -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
    .color {
        color: greenyellow !important;
    }

    a.color:hover {
        font-weight: bold !important;
    }

    .cor-escura {
        color: black !important;
    }

    a.cor-escura:hover {
        font-weight: bold !important;
    }
</style>

<body>
    <!-- INICIO DA NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../imagens/SISFInan1.png" width="80px"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active color" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  color" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cadastros
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled color" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <div class="d-flex mr-8 ">
                    <!-- Imagem do usuario -->
                    <img class="img-profile rounded-circle" src="../imagens/usuario.png" width="40px" height="40px">

                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle color" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo  @$nome_usuario; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item cor-escura" data-bs-toggle="modal" data-bs-target="#modalPerfil">Editar Dados</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item cor-escura" href="../logout.php">Sair </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <img class="img-profile rounded-circle" src="../imagens/ponto_azul.png" width="60px" height="20px">
                </div>
            </div>
        </div>
    </nav>
</body>

</html>

<!-------------------- Modal ----------------->
<div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-perfil" method="POST">
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome-usuario" placeholder="Nome" value="<?php echo $nome_usuario ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email-usuario" placeholder="Email" value="<?php echo $email_usuario ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Senha</label>
                            <input type="text" class="form-control" name="senha-usuario" placeholder="Senha" value="<?php echo $senha_usuario ?>">
                        </div>

                        <div id="mensagem-perfil' align=" center"> </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Id</label>
                            <input type="text" class="form-control" name="id-usuario" placeholder="Id" value="<?php echo $id_usuario ?>">
                        </div>




                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-perfil">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Ajax para inserir ou editar dados -->
<script type="text/javascript">
    $("#form-perfil").submit(function() {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "editar-perfil.php",
            type: 'POST',
            data: formData,

            success: function(mensagem) {

                $('#mensagem-perfil').removeClass()

                if (mensagem.trim() == "Salvo com Sucesso!") {
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar-perfil').click();
                    //window.location = "index.php";
                } else {
                    $('#mensagem-perfil').addClass('text-danger')
                }

                $('#mensagem-perfil').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,

        });

    });
</script>