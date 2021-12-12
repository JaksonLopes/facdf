<?php

require '../conexao.php';
require '../funcoes/selecionar.php';

$pesquisa = selecionarpesquisa();

$id = $_REQUEST['id_veiculos'];;
$teste = $_REQUEST['id_veiculos'];

if ($id=="produto") {
  $id=1;
} else {
  $id = $_REQUEST['id_veiculos'];
}

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
    <input class="form-control mr-sm-2" type="search"name="pesquisa" placeholder="nome produto" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">pesquisar</button>
  </form>
</nav>
        <!-- End of Topbar -->

        

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Lista de pesquisa </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>codigo</th>
                  <th>Nome</th>
                  <th>valor</th>
                  <th>Quantidade</th>
                  <th>Ações</th>
                </tr>
              </thead>
              
                <?php
                while($linha = mysqli_fetch_array($pesquisa)) {
                  ?>
                  <tr>
                    <td><?php echo $linha["codigo"] ?></td>
                    <td><?php echo $linha["nome"] ?></td>
                    <td><?php echo $linha["valor"] ?></td>
                    <td><?php echo $linha["quantidade"] ?></td>
                    <td>
                      <form method="get" action="../manutencao/salvar_os.php">
                      <a href="index.php?produto_id=<?php echo $linha["produto_id"] ?>"><svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                      <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                    </svg></a>

                    <a href="deletar.php?produto_id=<?php echo $linha["produto_id"] ?>"><svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                    </svg></a>
                    <input type="hidden" name="id_veiculos" value="<?php echo $id ?>"/>
                    <input type="hidden" name="produto_id" value="<?php echo $linha["produto_id"]?>"/>
                    <input type="hidden" name="nome" value="<?php echo $linha["nome"] ?>"/>
                    <input type="hidden" name="valor" value="<?php echo $linha["valor"] ?>"/>

                    <?php if ($id==$teste) { ?>
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Adcionar</button>
                    <?php } ?>

                    </form>
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


