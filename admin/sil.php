<?php
    include ('vb.php'); 
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header("location:/login/index.php");
    }
    if($_GET['id'] == null) {
        header("location:/login/index.php");
    }
    if(!isset($_GET['id'])) {
        header("location:/login/index.php");
    }
?>
<?php
    $musteriId = $_GET['id'];
    $delete = $db->prepare("DELETE FROM users WHERE users_id = ?");
    $delete->execute(array(
        $_GET['id']
    ));
    header("location:/login/admin/musteri.php");
?>