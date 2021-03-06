<!DOCTYPE html>
<html lang="en">

<?php 
require 'config_inicial.php';
require 'head.php'; 
?>

<body class="bg-gradient-secondary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Conecte-se</h1>
                  </div>
                  <form class="user" action="<?php echo NOME_SISTEMA ?>/login/consultar.php" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" placeholder="Enter Email Address..." name="email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Password" name="senha">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Lembrar senha</label>
                      </div>
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                  </form>
                  
                  <div class="text-center">
                    <a class="small" href="registra.php">entre em contato </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <?php require 'footer.php' ?>

</body>

</html>
