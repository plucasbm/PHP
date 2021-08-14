<?php

    session_start();

    $user_authenticated = false;
    $user_id = null;
    $user_profile_id = null;

    $profile_id = array(
        'Administrativo' => 1,
        'Usuário' => 2,
    );

    $usuarios = array(
        array('id' => 1, 'email' => 'adm@email.com', 'senha' => 'admin123', 'perfil' => 1),
        array('id' => 2, 'email' => 'user@email.com', 'senha' => 'user123', 'perfil' => 1),
        array('id' => 3, 'email' => 'maria@email.com', 'senha' => 'maria123', 'perfil' => 2),
        array('id' => 4, 'email' => 'jose@email.com', 'senha' => 'jose123', 'perfil' => 2),
    );

    foreach($usuarios as $user){
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $user_authenticated = true;
            $user_id = $user['id'];
            $user_profile_id = $user['perfil'];
        }
    }

    if($user_authenticated){
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $user_id;
        $_SESSION['perfil'] = $user_profile_id;
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NÃO';
        header('Location: index.php?login=erro');
    }

    
?>