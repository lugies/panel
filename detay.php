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
    <link rel="stylesheet" type="text/css" href="./css/all.css">
<!--===============================================================================================-->
    <title>Parfüm Paneli</title>
</head>
<?php
    include ('admin/vb.php'); 
    session_start();
    if(!isset($_SESSION['users_id'])){
        header("location:/panel/index.php");
    }
?>

<body style="background: url('./img/bg-3.jpg')">
    <div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="nav-link" href="kullanici-panel.php">PANEL</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="parfum-siparis.php">Parfüm Siparişi Ver</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="parfumler.php">Parfüm Listesi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bilgileri-guncelle.php">Bilgilerimi Güncelle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cikis.php">Çıkış Yap</a>
            </li>
        </ul>
    </nav>
        <div class="table-responsive-sm" >
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Kullancı Adı</th>
                    <th scope="col">Sipariş Adı</th>
                    <th scope="col">Sipariş Edilen Parfümler</th>
                    <th scope="col">Parfüm Kategorisi</th>
                    <th scope="col">Parfüm Boyutu</th>
                    <th scope="col">Parfüm Adeti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $users_id = $_SESSION['users_id'];
                        $get_id = $_GET['id'];
                        $query = $db->query("SELECT users.users_name, orders.orders_name, products.products_name,products.products_cat,products.products_ml, orders_details.orders_count FROM orders_details INNER JOIN products ON products.products_id = orders_details.products_id INNER JOIN orders ON orders.orders_id = orders_details.orders_id INNER JOIN users ON users.users_id = orders.users_id WHERE orders_details.orders_id = '$get_id'");
                        $query->execute();
                        $all = $query -> fetchAll();
                        foreach( $all as $row ){
                            echo '<tr>';
                            print "<td>" . $row['users_name']."</td>";
                            print "<td>" . $row['orders_name']."</td>";
                            print "<td>" . $row['products_name']."</td>";
                            if($row['products_cat'] === 'E')
                            print "<td>" . "Erkek"."</td>";
                            elseif ($row['products_cat'] === 'K') {
                                print "<td>" . "Kadın"."</td>";
                            }
                            elseif ($row['products_cat'] === 'U') {
                                print "<td>" . "Unisex"."</td>";
                            }
                            print "<td>" . $row['products_ml']. ' Ml' ."</td>";
                            print "<td>" . $row['orders_count'].' Adet'."</td>";
                            echo '</tr>';
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>