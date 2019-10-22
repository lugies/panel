<?php
    include ('admin/vb.php'); 
    session_start();
    if(!isset($_SESSION['users_id'])){
        header("location:/panel/index.php");
    }
?>
<?php
    $users_id = $_SESSION['users_id'];
    $orders_name = $_POST['siparis_adi'];
    
    $query = $db->prepare("INSERT INTO orders SET
    users_id = :users_id,
    orders_code = :orders_code,
    orders_name = :orders_name");
    $insert = $query->execute(array(
        "users_id" => $users_id,
        "orders_code" => mb_substr(md5($orders_name) , 0 , 5),
        "orders_name" => $orders_name
    ));
    if ( $insert ){
        $last_id = $db->lastInsertId();
        print "insert işlemi başarılı!" . $last_id;
    }
    foreach (array_combine($_POST['siparis_secim'], $_POST['siparis_miktar']) as $parfum_id => $parfum_adet) {
        echo 'Parfüm ID' . $parfum_id .'</br>';
        echo 'Parfüm Adet' . $parfum_adet . '</br>' ; 
        $query = $db->prepare("INSERT INTO orders_details SET
        orders_id = :orders_id,
        products_id = :products_id,
        orders_count = :orders_count");
        $insert = $query->execute(array(
            "orders_id" => $last_id,
            "products_id" => $parfum_id,
            "orders_count" => $parfum_adet,
        ));
        if ( $insert ){
            print "insert işlemi başarılı!" . $last_id;
            header("location:/panel/kullanici-panel.php?" . $okey  = 'okey');
        }
    }

?>