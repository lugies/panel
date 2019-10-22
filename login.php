<?php
    include ('./admin/vb.php');
    if(isset($_POST)){
        $query = $db->query("Select users_id, users_name,users_phone, users_pass FROM users");
            $query->execute();
            $all = $query -> fetchAll();
            foreach( $all as $row ){
                $username = $_POST['username'];
                $pass = $_POST['password'];
                $userId = $row['users_id'];

                if (($row['users_name'] === $username) && ($row['users_pass'] === $pass)) {
                    session_start();       
                    $_SESSION['users_id'] = $userId;
                    header("Location: ./kullanici-panel.php");
                }
                else {
                    echo 'Kullanıcı adı veya şifre hatalı';
                }
            }
    }    
    else {
        echo "lütfen önce giriş yapınız";
    }
?>