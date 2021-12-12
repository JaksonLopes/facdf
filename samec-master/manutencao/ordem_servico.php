<?php

require '../conexao.php';
require '../perfis.php';

$id_veiculos = $_REQUEST['id_veiculos'];
function selecionar_status(){
 $id = $_REQUEST['id_veiculos'];
 $conexao = conexao();
 $consulta = " SELECT t1.nome,t1.sobrenome,t1.email,t1.cpf,t2.usuario_id,t2.id_veiculos,t2.marca,t2.modelo,t2.ano_fabricacao,t2.status 
  from tb_usuarios as t1 
 inner JOIN tb_veiculos as t2 
 on t1.usuario_id = t2.usuario_id
 WHERE t2.id_veiculos =".$id ;
 $resultado = mysqli_query($conexao, $consulta);
 return $resultado;
}
function valortotal(){
  $conexao = conexao();
  $id = $_REQUEST['id_veiculos'];
  $consulta="SELECT sum(valor)as total from tb_os where id_veiculos=".$id;
  $resultado = mysqli_query ($conexao,$consulta);
  return $resultado;
}
function selecionarprodutos(){
 $id = $_REQUEST['id_veiculos'];
 $conexao = conexao();
 $consulta = " SELECT id_os,id_veiculos,nome_produto,quantidade,valor  FROM tb_os where id_veiculos=".$id;
 $resultado = mysqli_query($conexao, $consulta);
 return $resultado;
}
$total= valortotal();
$valor_total_os = mysqli_fetch_array($total);
$produto=selecionarprodutos();
$resultado = selecionar_status();
$linha = mysqli_fetch_array($resultado);

?>
<!DOCTYPE html>
<html lang="en">



<?php require '../head.php' ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php require '../menu_lateral.php'; ?>
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
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dados Clientes</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>nome</th>
                    <th>sobrenome</th>
                    <th>cpf</th>
                    <th>email</th>

                  </tr> 
                  <tr>
                    <td><?php echo $linha["nome"] ?></td>
                    <td><?php echo $linha["sobrenome"] ?></td>
                    <td><?php echo $linha["cpf"] ?></td>
                    <td><?php echo $linha["email"] ?></td>
                  </tr>


                </thead>
              </table>

            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dados Veiculo</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>

                  <tr>
                    <th>marca</th>
                    <th>modelo</th>
                    <th>ano</th>
                  </tr>
                </thead>
                <tr>
                  <td><?php echo $linha["marca"] ?></td>
                  <td><?php echo $linha["modelo"] ?></td>
                  <td><?php echo $linha["ano_fabricacao"] ?></td>
                </tr>
              </table>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">relaçoẽs de peças</h6>
                </div>

                <?php if ($linha["status"]==1) {  ?>
                <nav class="navbar navbar-light bg-light">
                  <form class="form-inline"method="get" action="../produtos/pesquisa.php">
                    <input class="form-control mr-sm-2" type="search"name="pesquisa" placeholder="Nome peças" aria-label="Search">
                    <input hidden name="id_veiculos" value="<?php echo $linha["id_veiculos"] ?>"/>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">pesquisar</button>
                  </form>
                </nav>
                 <?php } ?>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>

                        <tr>
                          <th>Nome</th>
                          <th>Quantidade</th>
                          <th>Valor</th>
                          <th>Ação</th>
                        </tr>
                      </thead>


                      <?php

                      while($linha_produto = mysqli_fetch_array($produto)) {
                        ?>
                        <tr>
                          <td><?php echo $linha_produto["nome_produto"] ?></td>
                          <td><?php echo $linha_produto["quantidade"] ?></td>
                          <td><?php echo $linha_produto["valor"] ?></td>
                          <td>
                            <form method="get" action="apaga_item_os.php">
                              <input hidden name="id_os" value="<?php echo $linha_produto["id_os"] ?>">
                              <input hidden name="id_veiculos" value="<?php echo $id_veiculos ?>">

                              <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Remover</button>



                            </form>
                          </td>
                        </tr>  
                      <?php } ?>
                      <form>
                        <table>
                          <tr>
                            <th>Valor Total</th>
                            <td> <input readonly type="text " name="" value="<?php echo $valor_total_os['total'] ?>"></td>
                          </tr>
                        </table>
                       </form>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->

    <?php require '../footer.php' ?>

  </body>

  ?>
  </html>

