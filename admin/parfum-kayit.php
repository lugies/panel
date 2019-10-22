<?php
    include ('vb.php'); 
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header("location:/panel/admin/index.php");
    }
    if(!isset($_POST)){
        header("location:/panel/admin/parfum-ekle.php");
    }
?>
<?php
    $products_name = $_POST['products_name'];
    $products_cat = $_POST['products_cat'];
    $products_ml = $_POST['products_ml'];
    $products_price = $_POST['products_price'];
    
    $query = $db->prepare("INSERT INTO products SET
    products_name = :products_name,
    products_cat = :products_cat,
    products_ml = :products_ml,
    products_price = :products_price");
    $insert = $query->execute(array(
        "products_name" => $products_name,
        "products_cat" => $products_cat,
        "products_ml" => $products_ml,
        "products_price" => $products_price
    ));
    if ( $insert ){
        $last_id = $db->lastInsertId();
        header("location:/panel/admin/parfum-ekle.php");
        print "insert işlemi başarılı!" . $last_id;
    }

?>