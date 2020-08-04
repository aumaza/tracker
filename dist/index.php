<?php include "../connection/connection.php";
      
       session_start();
	$varsession = $_SESSION['user'];
	
	//obtenemos el nombre del usuario
	$sql = "select nombre from usuarios where user = '$varsession'";
	mysqli_select_db('tracker');
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	}
	//obtenemos la cantidad de desarrolladores
	$cantidad = 0;
	$sql = "SELECT * FROM desarrolladores";
    	mysqli_select_db('tracker');
    	$resultado = mysqli_query($conn,$sql);
    	while($linea = mysqli_fetch_array($resultado)){
	      $cantidad++;
    	}
    	//obtenemos la cantidad de proyectos activos
    	$cant = 0;
    	$sql = "SELECT * FROM proyectos where estado = 'activo'";
    	mysqli_select_db('tracker');
    	$resultado = mysqli_query($conn,$sql);
    	while($linea = mysqli_fetch_array($resultado)){
	      $cant++;
    	}
    	//obtenemos la cantidad de proyectos retrasados
    	$cant1 = 0;
    	$sql = "SELECT * FROM proyectos where estado = 'retrazado'";
    	mysqli_select_db('tracker');
    	$resultado = mysqli_query($conn,$sql);
    	while($linea = mysqli_fetch_array($resultado)){
	      $cant1++;
    	}
    	//obtenemos la cantidad de proyectos terminados
    	$cant2 = 0;
    	$sql = "SELECT * FROM proyectos where estado = 'finalizado'";
    	mysqli_select_db('tracker');
    	$resultado = mysqli_query($conn,$sql);
    	while($linea = mysqli_fetch_array($resultado)){
	      $cant2++;
    	}
    	//obtenemos la cantidad de proyectos detenidos
    	$cant3 = 0;
    	$sql = "SELECT * FROM proyectos where estado = 'inactivo'";
    	mysqli_select_db('tracker');
    	$resultado = mysqli_query($conn,$sql);
    	while($linea = mysqli_fetch_array($resultado)){
	      $cant3++;
    	}
    	//obtenemos la cantidad de proyectos iniciados
    	$cant4 = 0;
    	$sql = "SELECT * FROM proyectos where estado = 'iniciado'";
    	mysqli_select_db('tracker');
    	$resultado = mysqli_query($conn,$sql);
    	while($linea = mysqli_fetch_array($resultado)){
	      $cant4++;
    	}
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="icon" type="image/png" href="../icons/actions/code-context.png" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tracker - Menú Principal</title>
        <link href="css/styles.css" rel="stylesheet" />
       
        <link rel="stylesheet" href="/tracker/vendor/bootstrap/dataTables/DataTables/css/jquery.dataTables.min.css" >
        <link rel="stylesheet" href="/tracker/vendor/bootstrap/dataTables/DataTables/css/jquery.dataTables.css" >
        <link rel="stylesheet" href="/tracker/vendor/bootstrap/dataTables/DataTables/css/dataTables.bootstrap.css" >
        <link rel="stylesheet" href="/tracker/vendor/bootstrap/dataTables/DataTables/css/dataTables.bootstrap.min.css" >
        <link rel="stylesheet" href="/tracker/vendor/bootstrap/dataTables/DataTables/css/dataTables.bootstrap4.css" >
        <link rel="stylesheet" href="/tracker/vendor/bootstrap/dataTables/DataTables/css/dataTables.bootstrap4.min.css" >
        
        
        

        
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><img src="../icons/actions/code-context.png"  class="img-reponsive img-rounded"> Tracker</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="user/password.php"><img src="../icons/actions/view-refresh.png"  class="img-reponsive img-rounded"> Editar Password</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../logout.php"><img src="../icons/actions/go-previous-view.png"  class="img-reponsive img-rounded"> Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
<!-- end navbar -->

<!-- side nav -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Configuración
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Administración
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="usuarios/newUser.php">Altas Usuarios</a>
                                            <a class="nav-link" href="user/password.php">Editar Password</a>
                                            <a class="nav-link" href="proyectos/newProject.php">Alta Proyecto</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Logs
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">Usuarios</a>
                                            <a class="nav-link" href="404.html">Commits</a>
                                            </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Informes</div>
                            <a class="nav-link" href="charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tablas
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Usuario:</div>
                        <?php echo $nombre; ?>
                    </div>
                </nav>
            </div>
<!-- end side nav -->


<!-- Main -->
            <div id="layoutSidenav_content">
		<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Resumen</li>
                        </ol>
                        
<!-- banners -->
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Desarrolladores Activos <span class="badge badge-pill badge-dark"><?php echo $cantidad;?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
					 <a class="small text-white stretched-link" href="#desarrolladores">Detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Proyectos Retrazados <span class="badge badge-pill badge-dark"><?php echo $cant1;?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Proyectos Terminados <span class="badge badge-pill badge-dark"><?php echo $cant2;?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Proyectos Detenidos <span class="badge badge-pill badge-dark"><?php echo $cant3;?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Proyectos Activos <span class="badge badge-pill badge-dark"><?php echo $cant;?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#proyectoActivo">Detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Proyectos Iniciados <span class="badge badge-pill badge-light"><?php echo $cant4;?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#proyectoActivo">Detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
<!-- end Banners -->
                
<!-- charts -->
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        
<!-- end charts --> 

<!-- tables -->

<!-- tabla desarrolladores -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1" id="desarrolladores"></i>
                                Desarrolladores
                            </div>
			      <div class="card-body">
                                <div class="table-responsive">
                                    
<?php 
if($conn){
	
	$sql = "SELECT * FROM desarrolladores";
    	mysqli_select_db('tracker');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila

   	$count = 0;
	$i=0;
            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>

                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Email</th>
                    <th class='text-nowrap text-center'>Grupo</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado))
	{


			 // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nombre']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['grupo']."</td>";
			 echo "<td class='text-nowrap'>";
			 if($_SESSION['user'] == root){
			 echo '<a href="editar.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Editar</a>';
			 echo '<a href="#" data-href="eliminar.php?id='.$fila['id'].'" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Borrar</a>';
			 }
			 echo "</td>";
			 echo "</tr>";
			
		}
		echo "</table>";
		echo "<br><br><hr>";
		echo '<div class="alert alert-success" role="alert">';
		echo '<span class="pull-center "><img src="../icons/status/dialog-information.png"  class="img-reponsive img-rounded">';
		echo "<strong> Si desea agregar desarrolladores dirijase al Panel lateral izquierdo, Configuración/Administración/Alta de Usuarios</strong>";
		echo "<br>";
		echo "</div>";
		}else{
			echo 'Connection Failure...';
		}

    //mysqli_close($conn);
?>
                                                
                                    
                                </div>
                            </div>
<!-- en tablas -->
                        </div>
<!--end tabla desarrolladores  -->

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1" id="proyectoActivo"></i>
                                Proyectos Activos
                            </div>
			      <div class="card-body">
                                <div class="table-responsive">
                                    
<?php 
if($conn){
	
	$ql = "SELECT * FROM proyectos where estado = 'Activo'";
    	mysqli_select_db('tracker');
    	$res = mysqli_query($conn,$ql);
	//mostramos fila x fila

   	$count = 0;
	$i=0;
            echo "<table class='display compact' style='width:100%' id='myTable1'>";
              echo "<thead>

                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Proyecto</th>
                    <th class='text-nowrap text-center'>Desarrollador</th>
                    <th class='text-nowrap text-center'>Estado</th>
                    <th class='text-nowrap text-center'>Commits</th>
                    <th class='text-nowrap text-center'>Ultimo Cambio</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($res))
	{
			 // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['desarrollador']."</td>";
			 echo "<td align=center>".$fila['estado']."</td>";
			 echo "<td align=center>".$fila['commits']."</td>";
			 echo "<td align=center>".$fila['last_change']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="editar.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Cambiar Estado</a>';
			 echo "</td>";
			 echo "</tr>";
			
		}
		echo "</table>";
		echo "<br><br><hr>";
		}else{
			echo 'Connection Failure...';
		}

    mysqli_close($conn);
?>
                                                

                                    
                                </div>
                            </div>
                        </div>
<!-- end tabla proyectos activos -->
                    </div>
<!-- end tablas -->
                </main>
 
 
<!-- end Main -->
             
<!-- footer -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; GPL v2</div>
                            <div>
                                <a href="https://deps.slackzone.com.ar/wiki">Política de Privacidad</a>
                                &middot;
                                <a href="https://deps.slackzone.com.ar/wiki">Términos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
<!-- end footer -->
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="/tracker/vendor/bootstrap/dataTables/DataTables/js/jquery.dataTables.min.js"></script>
	<script src="/tracker/vendor/bootstrap/dataTables/DataTables/js/dataTables.editor.min.js"></script>
	<script src="/tracker/vendor/bootstrap/dataTables/DataTables/js/dataTables.select.min.js"></script>
	<script src="/tracker/vendor/bootstrap/dataTables/DataTables/js/dataTables.buttons.min.js"></script>
	
	<!-- data table -->
        <script>
 $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });
  </script>
<!-- end data table -->

<!-- data table -->
        <script>
 $(document).ready(function(){
      $('#myTable1').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });
  </script>
<!-- end data table -->
	
    </body>
</html>
