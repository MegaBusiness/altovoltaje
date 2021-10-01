<?php
  if(isset($_POST['registrar'])) {

      $para      = 'alexizaguirre17rc@gmail.com';
      $titulo    = 'Contacto - Alto Voltaje';

    if(!isset($_POST['cedula']) || !isset($_POST['nombres']) || !isset($_POST['apellidos']) || !isset($_POST['telefono']) || !isset($_POST['correo'])) {
      echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
      echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
      die();
    }else{
      $mensaje = "Detalles del formulario de contacto:\n\n";
      $mensaje .= "Cédula: " . $_POST['cedula'] . "\n";
      $mensaje .= "Nombres: " . $_POST['nombres'] . "\n";
      $mensaje .= "Apellidos: " . $_POST['apellidos'] . "\n";
      $mensaje .= "Teléfono: " . $_POST['telefono'] . "\n";
      $mensaje .= "Correo: " . $_POST['correo'] . "\n\n";
      $cabeceras = 'From: asistentemegabusiness@gmail.com' . "\r\n" .
                   'Reply-To: asistentemegabusiness@gmail.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

      mail($para, $titulo, $mensaje, $cabeceras);
      header("Location: index.php");
      
      
    }
  }

      
?>