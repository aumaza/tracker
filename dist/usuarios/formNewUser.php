<?php include "../../connection/connection.php";
      include "../../functions/functions.php";
      
       session_start();
	$varsession = $_SESSION['user'];
	
	//obtenemos el nombre del usuario
	$sql = "select nombre from usuarios where user = '$varsession'";
	mysqli_select_db('tracker');
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	      }
	
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="icon" type="image/png" href="../../icons/actions/code-context.png" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tracker - Nuevo Usuario</title>
        <link href="/tracker/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
    
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                            
                               <?php
                               
				if($conn){
       
			    mysqli_select_db('tracker');
				
			        
			    $nombre = mysqli_real_escape_string($conn,$_POST["nombre"]);
			    $email = mysqli_real_escape_string($conn,$_POST["email"]);
                            $grupo = mysqli_real_escape_string($conn,$_POST["grupo"]);
                            $user = mysqli_real_escape_string($conn,$_POST["user"]);
                            $pass = mysqli_real_escape_string($conn,$_POST["pass"]);
                            $pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
                            $role = 1;
			    addUser($nombre,$email,$grupo,$user,$role,$pass,$pass1,$conn);
                            
                            }else{
			      mysqli_error($conn);
                                }
                                    

  //cerramos la conexion
  
  mysqli_close($conn);
                               
                               
                               ?>
                            
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
        <script src="/tracker/dist/js/scripts.js"></script>
    </body>
</html>
