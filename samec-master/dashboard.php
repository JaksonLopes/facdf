<?php

require 'conexao.php';
require 'config_inicial.php';
require 'autenticado.php';


require 'funcoes/selecionar.php';

$numeroclientes = contarRegistros();
$numero_os_aberta= os_em_abertas();
$numeros_os_finalizados=os_finalizados();

$usuarioId = $_SESSION['usuario_id'];
$usuarioLogado = selecionarPorId($usuarioId);
$lucros = lucro_mensal();
$lucro_mensal = mysqli_fetch_array($lucros);


?>


<!DOCTYPE html>
<html lang="en">

<?php require 'head.php' ?>

<body id="page-top">

  <!-- Wrapper de Página -->
  <div id="wrapper">

    <!-- Barra Lateral -->
    <?php require 'menu_lateral.php'; ?>
    <!-- Fim da barra lateral -->

    <!-- Wrapper de Conteúdo -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Conteúdo principal -->
      <div id="content">

        <!-- Barra superior -->
        <?php require 'menu_superior.php' ?>

        <div class="container-fluid">

          <!-- Cabeçalho da página-->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ASMEC</h1>
            
          </div>

          <!-- Linha de conteúdo -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">clientes Cadastrados</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numeroclientes; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Vendas </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">R$ <?php echo $lucro_mensal['total']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Serviços em Andamento</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numero_os_aberta; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Serviço Finalizados</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numeros_os_finalizados; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

  </div>
  <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->

</html>
          
           
        </div>
  </div>

          </div>
        </div>
      </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>




    <?php require 'footer.php' ?>



  </body>

  </html>