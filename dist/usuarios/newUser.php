<?php include "../../connection/connection.php";
      
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
        <title>Page Title - SB Admin</title>
        <link href="/tracker/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
<!-- main -->
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><img src="../../icons/actions/user-group-new.png"  class="img-reponsive img-rounded"> Alta de Usuario</h3></div>
                                    <div class="card-body">
                                        <form action="formNewUser.php" method="POST">
                                            <div class="form-row">
                                            
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Nombre</label>
                                                        <input class="form-control py-4" id="nombre" type="text" name="nombre" placeholder="Ingrese el nombre y apellido" />
                                                    </div>
                                                </div>
                                            <div class="col-md-6">    
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" name="email" aria-describedby="emailHelp" placeholder="ingrese dirección de email" />
                                            </div>
                                            </div>
                                            </div>
                                             <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Grupos</label><br>
                                                        <select class="browser-default custom-select" name="grupo" required>
                                                        <option value="" disabled selected>Seleccionar</option>
                                                       	<option value="admin">Administrador</option>
                                                       	<option value="developer">Desarrollador</option>
							<option value="user">Usuario</option>
							</select>
                                                    </div>
                                                </div>
                                              </div>
                                            
                                            <div class="form-row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Usuario</label>
                                                        <input class="form-control py-4" id="user" type="text" name="user" placeholder="Ingrese el nombre de usuario" />
                                                    </div>
                                                </div>
                                                </div>
                                           
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" id="inputPassword" type="password" name="pass" placeholder="ingrese password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Repita Password</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" name="pass1" placeholder="Repita password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Crear</button>
                                            <button type="reset" class="btn btn-primary btn-block"><img src="../../icons/actions/draw-eraser.png"  class="img-reponsive img-rounded"> Limpiar</button>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a class="btn btn-secondary btn-block" href="../index.php"><img src="../../icons/actions/arrow-left.png"  class="img-reponsive img-rounded"> Volver</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<!-- end main -->
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
