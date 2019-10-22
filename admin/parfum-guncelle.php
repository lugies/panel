<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/all.css">
<!--===============================================================================================-->
    <title>Parfüm Paneli</title>
</head>
<?php
    include ('vb.php'); 
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header("location:/login/admin/index.php");
    }
    if(!isset($_GET['id'])) {
        header("location:/login/admin/musteri.php");
    }
?>

<body style="background: url('../img/bg-3.jpg')">
    <div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="panel.php">PANEL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="musteri.php">Müşteri Listesi</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="parfum.php">Parfüm Listesi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="parfum-ekle.php">Parfüm Ekle</a>
            </li>
        </ul>
    </nav>
    <!-- form user info -->
    <div class="card bg-info">
        <div class="card-body text-center">
            <form autocomplete="off" class="form" role="form">
            <?php
                $products_id = $_GET['id'];
                $query = $db->query("SELECT * FROM products WHERE products_id = $products_id");
                $query->execute();
                $all = $query -> fetchAll();
                    foreach( $all as $row ){
            ?>
            <?php
                    echo '<div class="form-group">
                    <div class="col-lg-12">';
                    echo "<input class='form-control'  type='text' value='".$row['products_id']."' disabled>";
                    echo '</div>
                    </div>';
            ?>
            <?php
                    echo '<div class="form-group">
                    <div class="col-lg-12">';
                    echo "<input class='form-control'  type='text' value='".$row['products_name']."'>";
                    echo '</div>
                    </div>';
            ?>
            <?php
                    echo '<div class="form-group">
                    <div class="col-lg-12">';
                    echo "<input class='form-control'  type='number' value='".$row['products_cat']."'>";
                    echo '</div>
                    </div>';
            ?>
            <?php
                    echo '<div class="form-group">
                    <div class="col-lg-12">';
                    echo "<input class='form-control'  type='text' value='".$row['products_ml']."'>";
                    echo '</div>
                    </div>';
            ?>
            <?php
                    echo '<div class="form-group">
                    <div class="col-lg-12">';
                    echo "<input class='form-control'  type='text' value='".$row['products_price']."'>";
                    echo '</div>
                    </div>';
                    }
            ?>            
                  <div class="form-group">
                    <div class="col-lg-12">
                        <input class="btn btn-secondary" type="reset" value="Cancel"> 
					    <input class="btn btn-primary" type="button" value="Save Changes">
                    </div>
                  </div>
                </form>
              </div>
            </div><!-- /form user info -->
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>