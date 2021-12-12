<?php

require '../conexao.php';

function selecionarpesquisa(){
    $pesquisar= $_REQUEST['pesquisar'];
    $conexao = conexao();
    $consulta = " SELECT * FROM tb_usuarios where nome like'$pesquisar%' ";
    $resultado = mysqli_query($conexao, $consulta);
    return $resultado;
  }



//UTILIZADO PARA MOSTRAR A TABELA COM OS REGISTROS DO BANCO DE DADOS
$pesquisar = selecionarpesquisa();

// UTILIZADO PARA A FUNCIONALIDADE DE EDIÇÃO


?>
<!DOCTYPE html>
<html lang="en">



<?php require '../head.php' ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require '../menu_lateral.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
            <nav class="navbar navbar-light bg-light">
      <form class="form-inline"method="get" action="pesquisa.php">
        <input class="form-control mr-sm-2" type="search"name="pesquisa" placeholder="Nome do Usuário" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">PESQUISAR</button>
      </form>
    </nav>
        <!-- End of Topbar -->

        

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">LISTA DE PESQUISA </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NOME</th>
                  <th>SOBRENOME</th>
                  <th>E-MAIL</th>
                  <th>CPF</th>
                  <th>Ações</th>
                </tr>
              </thead>
              
                <?php
                while($linha = mysqli_fetch_array($pesquisar)) {
                  ?>
                  <tr>
                    <td><?php echo $linha["nome"] ?></td>
                    <td><?php echo $linha["sobrenome"] ?></td>
                    <td><?php echo $linha["email"] ?></td>
                    <td><?php echo $linha["cpf"] ?></td>
                    <td>
                      <a href="index.php?id=<?php echo $linha["id"] ?>">Editar</a>
                      <a href="deletar.php?id=<?php echo $linha["id"] ?>">excluir</a>
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <?php require '../rodape.php'; ?>
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
<?php require '../footer.php' ?>
</body>

?>
</html>


