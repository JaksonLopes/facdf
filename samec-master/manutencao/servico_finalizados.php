<?php

require '../conexao.php';
require '../perfis.php';


function selecionar_veiculos_finalizados(){
  $conexao = conexao();
  $consulta = " SELECT t1.nome,t2.usuario_id,t2.id_veiculos,t2.marca,t2.modelo,t2.ano_fabricacao,t2.status
  from tb_usuarios as t1 
  inner JOIN tb_veiculos as t2 
  on t1.usuario_id = t2.usuario_id
  WHERE t2.finalizados =1";
  $resultado = mysqli_query($conexao, $consulta);
  return $resultado;
}

$resultado = selecionar_veiculos_finalizados();

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

        <!-- vavbar -->
        <div class="row">
         <div class="col-lg-12">
          <div class="p-5">
            

          </div>
        </div>
      </div>
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Status de veiculos </h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nome proprietario</th>
                    <th>marca</th>
                    <th>modelo</th>
                    <th>ano</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                
                <?php
                while($linha = mysqli_fetch_array($resultado)) {
                  ?>
                  <tr>
                    <td><?php echo $linha["nome"] ?></td>
                    <td><?php echo $linha["marca"] ?></td>
                    <td><?php echo $linha["modelo"] ?></td>
                    <td><?php echo $linha["ano_fabricacao"] ?></td>

                    <td>
                      <form method="get" action="../manutencao/ordem_servico.php">
                        <input hidden name="id_status" value="<?php echo $linha["status"] ?>"/>
                        <input hidden name="id_veiculos" value="<?php echo $linha["id_veiculos"] ?>"/>
                        <input type="submit" class="btn btn-success  " value="Ver ordem de serviço">
                        
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

