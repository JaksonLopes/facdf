
<?php  

	//require '../conexao.php';
	require '../funcoes/selecionar.php';
	include_once("conexao.php");

$id = $_GET['usuario_id'];
$result_usuario = "SELECT * FROM tb_usuarios WHERE usuario_id = '$id'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$dadosEdicao = mysqli_fetch_assoc($resultado_usuario);
	
?>


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
	        
	        <!-- End of Topbar -->

	        <div class="row">
	         <div class="col-lg-12">
	          <div class="p-5">
	            <h6 class="m-0 font-weight-bold text-primary">EDIÇÃO DE CADASTRO </h6><br>
			        <?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?>
	              
	            <form class="user" method="GET" action="/samec/funcionarios/edita.php">
	              <div class="form-group row">
	                <div class="col-sm-6 mb-3 mb-sm-0">
	                  <input type="text" class="form-control form-control-user" placeholder="Nome" name="nome" value="<?php echo isset($dadosEdicao['nome']) ? $dadosEdicao['nome'] : "" ?>" >
	                </div>
	                <div class="col-sm-6 mb-3 mb-sm-0">
	                  <input type="text" class="form-control form-control-user" placeholder="Sobrenome" name="sobrenome" value="<?php echo isset($dadosEdicao['sobrenome']) ? $dadosEdicao['sobrenome'] : "" ?>" ><br>
	                </div>
	                <div class="col-sm-6 mb-3 mb-sm-0">
	                  <input type="text" class="form-control form-control-user" placeholder="E-mail" name="email" value="<?php echo isset($dadosEdicao['email']) ? $dadosEdicao['email'] : "" ?>" >
	                </div>
	                <div class="col-sm-6 mb-3 mb-sm-0">
	                  <input type="password" class="form-control form-control-user" placeholder="Senha" name="senha" value="<?php echo isset($dadosEdicao['senha']) ? $dadosEdicao['senha'] : "" ?>" ><br>
	                </div>
	                <div class="col-sm-6 mb-3 mb-sm-0">
	                  <input type="number" class="form-control form-control-user" placeholder="CPF" name="cpf" value="<?php echo isset($dadosEdicao['cpf']) ? $dadosEdicao['cpf'] : "" ?>" >
	                </div>
	                <div class="form-group row">
	               
	                <div class="col-sm-4">
	                  <input required id="cep" type="text" class="form-control form-control-user" placeholder="cep" name="cep" >
	                </div>
	                <div class="col-sm-2">
	                  <input id="pesquisar" type="Button" class="btn btn-primary btn-user btn-block " value="pesquisar">
	                </div>
	                <div class="col-sm-6">
	                  <input id="logradouro" type="text" class="form-control form-control-user" placeholder="Logradouro" name="logradouro" >
	                </div>
	                <div class="col-sm-6">
	                  <input id="bairro" type="text" class="form-control form-control-user" placeholder="bairro" name="bairro" >
	                </div>
	                <div class="col-sm-6">
	                  <input id="Cidade" type="text" class="form-control form-control-user" placeholder="Cidade" name="Cidade" >
	                </div>
	                 <div class="col-sm-6">
	                  <input  type="text" class="form-control form-control-user" placeholder="Complemento" name="Complemento" >
	                </div>
	            </div>
	              <input type="hidden" name="usuario_id" value="<?php echo $id ?>"/>
	              <input type="submit" class="btn btn-primary btn-user btn-block col-sm-3" value="Editar">


	            </input>
	          </form>
	        </div>
	      </div>
	    </div>

	    <!-- Begin Page Content -->
	    <div class="container-fluid">
	                  <?php
	                ?>
	  
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
	<script type="text/javascript">

	  $("#pesquisar").click(function(){

	    var cep = $("#cep").val();
	    var url ="https://viacep.com.br/ws/" + cep + "/json/";
	    $.get(url,function(dados,status){ 
	      console.log(dados);
	      $("#logradouro").val(dados.logradouro);
	      $("#bairro").val(dados.bairro);
	      $("#Cidade").val(dados.localidade);
	    });
	  });
	</script>
	</body>

	</html>

