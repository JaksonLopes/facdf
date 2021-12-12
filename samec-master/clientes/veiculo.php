<?php

require '../conexao.php';
require '../funcoes/selecionar.php';


function selecionarveiculo(){
  $id= $_REQUEST['usuario_id'];
  $conexao = conexao();
  $consulta = " SELECT t1.nome,t1.usuario_id,t2.usuario_id,t2.id_veiculos,t2.marca,t2.modelo,t2.ano_fabricacao,t2.status 
  from tb_usuarios as t1 
  inner JOIN tb_veiculos as t2 
  on t1.usuario_id = t2.usuario_id
  WHERE t2.usuario_id =".$id;
  $resultado = mysqli_query($conexao, $consulta);
  return $resultado;
}
$usuario_id;

$pesquisar = selecionarveiculo();
?>
<!DOCTYPE html>
<html lang="en">
<?php require '../head.php' ?>
<body id="page-top">

  <div id="wrapper">

    <!-- Sidebar -->
    <?php require '../menu_lateral.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">LISTA DE VEICULOS </h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>NOME PROPRIETARIO </th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>ANO</th>
                    <th>Ações</th>
                  </tr>
                </thead>

                <?php
                while($linha = mysqli_fetch_array($pesquisar)) {
                  ?>
                  <tr>
                    <td><?php echo $linha["nome"] ?></td>
                    <td><?php echo $linha["marca"] ?></td>
                    <td><?php echo $linha["modelo"] ?></td>
                    <td><?php echo $linha["ano_fabricacao"] ?></td>
                    <td>
                      <form method="get" action="apagar_veiculo.php">
                        <input hidden name="usuario_id" value="<?php echo $_REQUEST['usuario_id']?>"/>
                        <input hidden name="id_veiculos" value="<?php echo $linha["id_veiculos"] ?>"/>
                        <input type="submit" class="btn btn-danger  " value="Excluir">

                        
                     </form>

                      <form method="get" action="status.php">

                        <input hidden name="id_status" value="<?php echo $linha["status"] ?>"/>
                        <input hidden name="id_veiculos" value="<?php echo $linha["id_veiculos"] ?>"/>
                        <input hidden name="usuario_id" value="<?php echo $linha["usuario_id"] ?>"/>
                        <?php if ($linha["status"]==0) { ?>
                        <input type="submit" class="btn btn-primary"  value="Iniciar Manutençao">
                        <?php }  ?>

                        <?php if ($linha["status"]==1) {  ?>
                        <a  href="../manutencao/ordem_servico.php?id_veiculos=<?php echo $linha["id_veiculos"] ?>" class="btn btn-success">Ordem de Serviço</a>
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
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">ADICIONAR NOVO VEICULOS </h6>
    </div>
    <div class="row">
     <div class="col-lg-12">
      <div class="p-5">
        <form class="user" method="get" action="inserir_veiculo.php">
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input required type="text" class="form-control form-control-user" placeholder="marca" name="marca"  >
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input required type="text" class="form-control form-control-user" placeholder="modelo" name="modelo"  >
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <input required  type="text" class="form-control form-control-user" placeholder="ano fabricação" name="ano" >

            </div>
            <input hidden name="id" value="<?php echo $_REQUEST['usuario_id']?>"/>
            <input type="submit" class="btn btn-primary btn-user btn-block col-sm-3" value="Adicionar">


          </input>
        </form>

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


