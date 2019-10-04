<?php
include "perguntasDAO.php";

$perguntasDAO = new PerguntaDAO();
$lista = $perguntasDAO->buscar();
?>


<!DOCTYPE html>
<html>
<head>

 <meta charset="UTF-8">
 <title></title>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
 integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel = "stylesheet" type = "text/css" href="css/all.min.css">

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">ProjetoPW  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
  </ul>
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
</nav>

<div class="container-fluid">
  <div class="row">

   <div class = "col-2">
     <ul class="nav flex-column nav-pills vertical">
       <li class="nav-item">
         <a class="nav-link" href="usuario.php">Usuários</a>
       </li>
       <li class="nav-item">
         <a class="nav-link active" href="#">Perguntas</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Link</a>
       </li>
       <li class="nav-item">
         <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
       </li>
     </ul>
   </div>

   <div class="col-10">
    <br>
    <h3>Perguntas</h3>
    <button class = "btn btn-primary" data-toggle="modal" data-target="#modalnovo"><i class="fas fa-user-plus"></i>   Nova Questão</button>
    <table class = "table">
      <tr>
        <th>Questão</th>
        <th>Enunciados</th>
        <th>Tipo</th>
        <th>Ações</th>
      </tr>
      <?php
      foreach($lista as $pergunta): ?>
        <tr>

          <td><?= $pergunta->questao ?></td>
          <td><?= $pergunta->enunciado ?></td>
          <td><?= $pergunta->tipo ?></td>

          <td>
            <a class = "btn btn-danger" href="perguntascontroller.php?acao=apagar&id=<?= $pergunta->usuario ?>"> <i class="fas fa-user-minus"> </i></a>
            <button class = "btn btn-warning"> <i class="fas fa-user-edit"></i> </button>
            <a type="button" class="btn btn-primary alterar-senha" data-toggle="modal" data-target="#modalsenha"  data-id="<?=$perguntas->pergunta?>">
              <i class="fas fa-key"></i>
            </a>
          </td>

        </tr>
      <?php endforeach ?>

    </table>

  </div>
</div>
</div>


<!-- ModalTrocarSenha -->
<div class="modal fade" id="modalsenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <form action= "perguntascontroller.php?acao=trocarsenha" method="POST">
          <input type="hidden" name="id" id="campo-id">
          <div class="form-group">
            <div class="form-group">
              <label for="exampleInputPassword1">Alterar Senha</label>
              <input type="password" name="senha" class="form-control" id="trocarsenha" placeholder="Nova Senha">
            </div>
            <button type="submit" class="btn btn-primary " >Enviar</button>
          </div>
        </div>
      </div>
    </form>
</div>
</div>
    <!-- ModalInserir -->
    <div class="modal fade" id="modalnovo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <form action="perguntascontroller.php?acao=inserir" method="POST">
         <div class="form-group">
          <label for="nome">Nome de usuário</label>
          <input type="text" name="nome" class="form-control" id="Nome" placeholder="Nome completo">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Endereço de Email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu email">
          <small id="emailHelp" class="form-text text-muted">Nós nunca compartilharemos seu email com ninguém.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Não sou robô</label>
        </div>
        <button type="submit" class="btn btn-primary">Inscrever-se</button>

      </div>
    </form>
  </div>
</div>
</div>
</body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
      var botao = document.querySelector(".alterar-senha");
      botao.addEventListener("click", function(){
        var campo = document.querySelector("#campo-id");
        campo.value = botao.getAttribute("data-id");
      });
    </script>

    </html>