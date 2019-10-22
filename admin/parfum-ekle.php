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
        header("location:/panel/admin/index.php");
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
            <li class="nav-item">
                <a class="nav-link" href="parfum.php">Parfüm Listesi</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="parfum-ekle.php">Parfüm Ekle</a>
            </li>
        </ul>
    </nav>
    <!-- form user info -->
    <div class="card bg-info">
        <div class="card-body text-center">
            <form autocomplete="off" class="form" role="form" method="POST" action="parfum-kayit.php">
            <div class="form-group row">
                <div class="col-lg-6">
                    <input class='form-control'  type='text' placeholder="Lütfen Parfüm Adını Giriniz" name="products_name">
                </div>
                <div class="col-lg-6">
                    <input class='form-control'  type='number' placeholder="Lütfen Parfüm Fiyatını Giriniz" step="any" name="products_price">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <select class="form-control" name="products_ml" >
                        <option value="0">Parfüm Boyutunu Seçiniz</option>
                        <option value="50">50 Ml</option>
                        <option value="100">100 Ml</option>
                   </select>
                </div>
                <div class="col-lg-6">
                   <select class="form-control" name="products_cat" >
                        <option value="0">Lütfen Parfüm Kategorisini Seçiniz</option>
                        <option value="E">Erkek</option>
                        <option value="K">Kadın</option>
                        <option value="U">Unisex</option>
                   </select>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-lg-12">
                    <input class="btn btn-secondary" type="reset" value="Cancel"> 
                    <input class="btn btn-primary" type="submit" value="Save Changes">
                </div>
            </div>
            </form>
              </div>
            </div><!-- /form user info -->
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>