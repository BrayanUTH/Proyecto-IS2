<?php
    require '../../model/modelo_usuario.php';

    $mec = new ModeloUsuario();
    
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

    $consulta = $mec->modificarUsuario($id, $username, $password);
    echo $consulta;
     
?>