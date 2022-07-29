<?php 

/*  VALIDACIONES POST 

/ validar si existe POST
/ si se trabaja con sesiones validar si esque existe 1 sesion, de lo contrario generar 1 isset(!SESSION[''])
/ Validar si existen datos dentro de las variables post
/ Validar si esque los datos por POST tienen string demas eje: ' "" , mysqli_real_escape_string(basededatos,variablePOST)
/ Validar los datos antes de guardarlos en la BD ya sea si son string numericos aplicarles expresiones regulares validar email
/ en caso de que hayan errores guardar los errores dentro de un array ya sea errores de las variables post o al momento de una query
/ encriptar siempre la contraseña, puede ser con la funcion password_hash(variable,PASSWORD_BCRYPT,['cost'=> 4] ); (variable,metodo de encriptacion, vueltas a encriptar o cuantas veces se encripta)
/
*/
?>