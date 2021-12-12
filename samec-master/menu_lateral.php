    <?php include_once 'config_inicial.php'; ?>

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <link rel="stylesheet" type="text/css" href="../css/estilo.css">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/clientes/teste.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Asmec</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo NOME_SISTEMA ?>/dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>pagina principal</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo NOME_SISTEMA ?>/clientes/index.php">
            <i class="fas fa-fw fa-table"></i>
            <span>CLIENTES</span></a>

            
            <a class="nav-link" href="<?php echo NOME_SISTEMA ?>/funcionarios/index.php">
              <i class="fas fa-fw fa-table"></i>
              <span>FUNCIONÁRIOS</span></a>
              

              <a class="nav-link" href="<?php echo NOME_SISTEMA ?>/produtos/index.php">
                <i class="fas fa-fw fa-table"></i>
                <span>PRODUTOS</span></a>
                 


                  
                  <i class="fas fa-fw fa-table"></i>
                  <span>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"  >
                      Serviços
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="<?php echo NOME_SISTEMA ?>/manutencao/servico_em_andamento.php">Em Andamento</a>
                      <a class="dropdown-item" href="<?php echo NOME_SISTEMA ?>/manutencao/servico_finalizados.php"> Finalizados</a>
                    </div>
                  </li></span>


                  <li class="nav-item"> 





                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                      <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

                  </ul>