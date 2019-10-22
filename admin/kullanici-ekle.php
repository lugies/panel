<?php
    include ('vb.php');
    if(isset($_POST)){
        $query = $db->query("Select admin_id, admin_nick, admin_pass FROM admins");
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $userId = $row['admin_id'];

        if (($row['admin_nick'] === $username) && ($row['admin_pass'] === $pass)) {
            session_start();       
            $_SESSION['admin_id'] = $userId;
            header("Location: /login/admin/panel.php");
        }
        else {
            echo 'Kullanıcı adı veya şifre hatalı';
        }
    }    
    else {
        echo "lütfen önce giriş yapınız";
    }
?>