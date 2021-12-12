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
            <input class="form-control mr-sm-2" type="search"name="pesquisar" placeholder="Usuários" aria-label="Search">
            <button class="btn btn-primary btn-user btn-block col-sm-3" type="submit">Procurar</button>

          </form>
        </nav>
        <!-- End of Topbar -->

        

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">LISTA DE CLIENTES </h6>
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
                      <td><a href="edusuario.php?usuario_id=<?php echo $linha["usuario_id"] ?>"><?php echo $linha["nome"] ?></a><br></td>
                      <td><?php echo $linha["sobrenome"] ?></td>
                      <td><?php echo $linha["email"] ?></td>
                      <td><?php echo $linha["cpf"] ?></td>
                      <td>
                       <a href="deletar.php?usuario_id=<?php echo $linha["usuario_id"] ?>"><svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                      </svg></a>

                      <a href="veiculo.php?usuario_id=<?php echo $linha["usuario_id"] ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-truck" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5v7h-1v-7a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5v1A1.5 1.5 0 0 1 0 10.5v-7zM4.5 11h6v1h-6v-1z"/>
                        <path fill-rule="evenodd" d="M11 5h2.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5h-1v-1h1a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4.5h-1V5zm-8 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                        <path fill-rule="evenodd" d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                      </svg></a>
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


