<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/all.css">
<!--===============================================================================================-->
    <title>Parfüm Paneli</title>
</head>
<?php
    include ('admin/vb.php'); 
    session_start();
    if(!isset($_SESSION['users_id'])){
        header("location:/login/index.php");
    }
?>

<body style="background: url('./img/bg-3.jpg')">
<div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="kullanici-panel.php">PANEL</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="parfum-siparis.php">Parfüm Siparişi Ver</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="parfumler.php">Parfüm Listesi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Bilgilerimi Güncelle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cikis.php">Çıkış Yap</a>
            </li>
        </ul>
    </nav>
    <!-- form user info -->
    <div class="card bg-dark">
        <div class="card-body text-center">
            <form autocomplete="off" class="form" method="POST" action="parfum-siparis-ekle.php">
                            
            <div class="col-lg-12">
                <input class="btn btn-outline-info" id="button" type="button" value="Parfüm Ekle">
                <input class="btn btn-outline-danger" type="reset" value="Sipariş İptal">
                <input class="btn btn-outline-success" type="button" value="Sipariş Ver" role='button' data-toggle='modal' data-target='#myModal'>
            </div>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="alert alert-info">
                                <strong>Lütfen Sipari Adını Giriniz</strong>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="siparis_adi" placeholder="Sipariş Adı">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-outline-danger" type="reset" value="Sipariş İptal">
                            <input class="btn btn-outline-success" type="submit" value="Sipariş Ver">
                        </div> 
                    </div>
                </div>
            </div>
                <?php
                echo '<div id="clone0" class="form-group row">
                <div class="col-lg-9">
                    <select class="form-control" id="user_time_zone" name="siparis_secim[]" size="0">';
                    echo "<option value='0'>";
                    echo "Lütfen Parfüm Seçiniz";
                    echo "</option>";
                    $users_id = $_SESSION['users_id'];
                    $query = $db->query("SELECT * FROM products");
                    $query->execute();
                    $all = $query -> fetchAll();
                    foreach( $all as $row ){
                        echo "<option value='".$row['products_id']."'>";
                        echo  $row['products_name'] .' '. $row['products_ml'] . ' Ml';
                        echo "</option>";
                    }
                    echo '</select>
                </div>';
                    echo '
                    <div class="col-lg-3">
                        <input type="number" class="form-control" name="siparis_miktar[]" placeholder="Lütfen Miktar Seçiniz" min="1" max="10">
                    </div>
                </div>';
                ?>   
            </form>
        </div>
    </div><!-- /form user info -->
</div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        if (document.getElementById('button').onclick == null) {
            console.log("asdasda");
            document.getElementById('button').onclick = duplicate;
            var i = 0;
            function duplicate() {
            var original = document.getElementById('clone' + i);
            var clone = original.cloneNode(true); // "deep" clone
            clone.id = "clone" + ++i; // there can only be one element with an ID
                if (i<=10) {
                    original.parentNode.appendChild(clone); 
                }
                else
                console.log("yavaş ol sığır");
                console.clear();
            }
        }
        
    </script>
</body>
</html>