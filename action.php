<?php
   // include('service/api.php');
   
   if (isset($_POST['mostrar'])) {
     session_start();
     $res = json_decode(file_get_contents("https://my-json-server.typicode.com/dp-danielortiz/dptest_jsonplaceholder/items"), true);
   
     $_SESSION['all'] = $res;
     $_SESSION['message'] = 'Mostrando todos los resultados';
     $_SESSION['message_type'] = 'success';
     header('Location: index.php');
   
   }
   
     if(isset($_POST['generar'])) {
       session_start();
       $_SESSION['generate'] = "";
       $_SESSION['message'] = 'Archivo generado';
       $_SESSION['message_type'] = 'danger';
       header('Location: index.php');
     }
      
   
   ?>
