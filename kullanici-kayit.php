<?php
    include ('admin/vb.php'); 
    session_start();
    if(!isset($_POST['users_name'])){
        header("location:/panel/kullanici-ekle.php");
    }
?>
<?php
    $users_name = $_POST['users_name'];
    $users_password = $_POST['users_password'];
    $users_password2 = $_POST['users_password_2'];
    $users_phone = $_POST['users_phone'];
    
    if($users_password === $users_password2){
        $query = $db->prepare("INSERT INTO users SET
        users_name = :users_name,
        users_pass = :users_pass,
        users_phone = :users_phone");
        $insert = $query->execute(array(
            "users_name" => $users_name,
            "users_pass" => $users_password,
            "users_phone" => $users_phone
        ));
        if ( $insert ){
            $last_id = $db->lastInsertId();
            print "insert işlemi başarılı!" . $last_id;
        }
        else
        print "eklenemedi";
    }
    else{
        header("location:/panel/kullanici-ekle.php");
    }

?>