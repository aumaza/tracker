<?php

/*
** Agregar Proyecto
*/

function addProject($proyecto,$nombre,$estado,$commit,$conn){

		
	mysqli_select_db('tracker');
	$sqlInsert = "INSERT INTO proyectos ".
		"(descripcion,desarrollador,estado,commits,last_change)".
		"VALUES ".
      "('$proyecto','$nombre','$estado','$commit',NOW())";
           
	$res = mysqli_query($conn,$sqlInsert);


	if($res){
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Proyecto Guardado Exitosamente. Aguarde un Instante que será Redireccionado';
		echo "</div>";
		echo "</div>";	
		echo '<meta http-equiv="refresh" content="3;URL=../index.php"/>';
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Hubo un error al guardar el Proyecto!. Aguarde un Instante que será Redireccionado" .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
		echo '<meta http-equiv="refresh" content="3;URL=../index.php"/>';
	}
}


/*
** Edita estado de proyecto
*/

function updateProject($id,$proyecto,$nombre,$estado,$conn){

		
	mysqli_select_db('tracker');
	$sqlInsert = "update proyectos set descripcion = '$proyecto', desarrollador = '$nombre', estado = '$estado', last_change = NOW() where id = '$id'";
           
	$res = mysqli_query($conn,$sqlInsert);


	if($res){
		//mysqli_query($conn,$sqlInsert);
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Estado Actualizado Exitosamente. Aguarde un Instante que será Redireccionado';
		echo "</div>";
		echo "</div>";
		echo '<meta http-equiv="refresh" content="3;URL=../index.php"/>';
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Hubo un error al actualizar Estado!. Aguarde un Instante que será Redireccionado" .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
		echo '<meta http-equiv="refresh" content="3;URL=../index.php"/>';
	}
}


/*
** Agregar Proyecto
*/

function addUser($nombre,$email,$grupo,$user,$role,$pass,$pass1,$conn){

		
	mysqli_select_db('tracker');
	$sqlInsert = "INSERT INTO desarrolladores ".
		"(nombre,email,grupo)".
		"VALUES ".
      "('$nombre','$email','$grupo')";
       
       
       
       $sql = "insert into usuarios " .
	      "(nombre,user,password,role)".
	      "values ".
	      "('$nombre','$user','$pass','$role')";
	

	if(strcmp($pass,$pass1) == 0){
	$res = mysqli_query($conn,$sqlInsert);
	$retval = mysqli_query($conn,$sql);
	
	if($res && $retval){
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Usuario Creado Exitosamente. Aguarde un Instante que será Redireccionado';
		echo "</div>";
		echo "</div>";	
		echo '<meta http-equiv="refresh" content="3;URL=../index.php"/>';
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Hubo un error al crear el Usuario!. Aguarde un Instante que será Redireccionado" .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
		echo '<meta http-equiv="refresh" content="5;URL=../index.php"/>';
	}
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Las contraseñas no coinciden. Reintente!!";
		echo "</div>";
		echo "</div>";
		echo '<meta http-equiv="refresh" content="3;URL=newUser.php"/>';
	}
}


/*
** Edita password del usuario
*/

function updatePass($user,$pass,$pass1,$conn){

		
	mysqli_select_db('tracker');
	$sqlInsert = "update usuarios set password = '$pass' where user = '$user'";
           
	if(strcmp($pass,$pass1) == 0){
	$res = mysqli_query($conn,$sqlInsert);

	if($res){
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Password Actualizado Exitosamente. Aguarde un Instante que será Redireccionado';
		echo "</div>";
		echo "</div>";
		echo '<meta http-equiv="refresh" content="3;URL=../index.php"/>';
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Hubo un error al actualizar Password!. Aguarde un Instante que será Redireccionado" .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
		echo '<meta http-equiv="refresh" content="5;URL=../index.php"/>';
	}
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Las Contraseñas no Coinciden! Reintente. Aguarde un Instante que será Redireccionado" .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
		echo '<meta http-equiv="refresh" content="3;URL=password.php"/>';
	}
}















?>