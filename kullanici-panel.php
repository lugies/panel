<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
                <a class="nav-link" href="#">Bilgilerimi Güncelle</a>
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
                    <th scope="col">Sipariş Adı</th>
                    <th scope="col">Referans Kodu</th>
                    <th scope="col">Teslim Tarihi</th>
                    <th scope="col">Bilgiler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $users_id = $_SESSION['users_id'];
                        $query = $db->query("SELECT *,COUNT(DISTINCT orders_details.products_id) as pr_count, SUM(orders_details.orders_count) as total FROM orders LEFT JOIN orders_details ON orders.orders_id = orders_details.orders_id WHERE orders.users_id = '$users_id' GROUP BY orders_details.orders_id");
                        $query->execute();
                        if(!$query ->rowCount()){
                        echo "Siparişiniz bulunmamaktadır.";
                        }
                        $all = $query -> fetchAll();
                        foreach( $all as $row ){
                            echo '<tr>';
                            print "<td>" . $row['orders_name']."</td>";
                            print "<td>" . mb_strtoupper($row['orders_code'])."</td>";
                            echo "<td>"; 
                               // $daterow = $row['musteriTeslim'];
                                $date = new DateTime($row['orders_date']);
                                $now = new DateTime();
                                echo $date->diff($now)->format("%d gün, %h saat sonra teslim");
                            echo"</td>";
                            print "<td><a class='btn btn-outline-info btn-sm btn-lg btn-block' href='/login/detay.php?id=". $row['orders_id']."' role='button'>Detaylar</a></td>";
                            echo '</tr>';
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>