<?php 

if (isset($_POST)) {
    require_once('includes/conexion.php');
    
    if (!isset($_SESSION)) {
        session_start();
    }

    $nombre = isset( $_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : FALSE;
    $apellidos= isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos'])  : FALSE;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim( $_POST['email'])) : FALSE;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, trim($_POST['password'])) : FALSE;

    //array de errores
    $errores = array();
    
    //Validar los datos antes de guatdarlos en base de datos
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre )) {
       // echo "el nombre es valido";
        $nombre_validate = TRUE;
     }else{
         echo "el campo es invalido";
         $errores['nombre'] = 'el nombre no es valido';
         $nombre_validate = TRUE;
     }

     //VALIDAR APELLIDOS
     if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/",$apellidos )) {
       // echo "los apellidos es valido";
        $apellidos_validate = TRUE;
     }else{
         echo "el campo es invalido";
         $errores['apellidos'] = 'el apellido no es valido';
         $apellidos_validate = TRUE;
     }

     //VALIDAR EMAIL
     if (!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)) {
       // echo "el email es valido";
        $email_validate = TRUE;
     }else{
         echo "el campo es invalido";
         $errores['email'] = 'el email no es valido';
         $password_validate = TRUE;
     }

     //VALIDAR CONTRASEÑA
     if (!empty($password) ) {
        $email_validate = TRUE;
     }else{
         echo "el campo es invalido";
         $errores['password'] = 'La Contraseña esta vacia';
         $password_validate = TRUE;
     }

     $guardar_usuario = FALSE;
    if (count($errores)== 0) {
        
        $guardar_usuario = TRUE;

        //Cifrar la contraseña
        $password_segura = password_hash($password,PASSWORD_BCRYPT,['cost'=> 4] );
      
        //Insertar usuario en la tabla usuarios de la bd
        $sql = "INSERT INTO usuarios VALUES(null,'$nombre','$apellidos','$email','$password_segura',CURDATE())";

        $guardar = mysqli_query($db,$sql);


        if ($guardar) {
            $_SESSION['completado'] = 'El reguistro se ha completado con exito';
        }else{
            $_SESSION['errores']['general'] = 'Fallo al guardar el usuario!!';
        }


    }else{
        $_SESSION['errores'] = $errores;
        
    }
   
}

header('Location: index.php');
?>