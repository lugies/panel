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
        header("location:/panel/index.php");
    }
?>

<body style="background: url('../img/bg-3.jpg')">
    <div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="panel.php">PANEL</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="musteri.php">Müşteri Listesi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="parfum.php">Parfüm Listesi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="parfum-ekle.php">Parfüm Ekle</a>
            </li>
        </ul>
    </nav>
        <div class="table-responsive-sm" >
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Müşteri Id</th>
                    <th scope="col">Müşteri Adı</th>
                    <th scope="col">Müşteri Tel</th>
                    <th scope="col">Referans Kodu</th>
                    <th scope="col">Teslim Tarihi</th>
                    <th scope="col">Bilgiler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $db->query("SELECT * FROM musteriler");
                        $query->execute();
                        $all = $query -> fetchAll();
                        foreach( $all as $row ){
                            echo '<tr>';
                            print "<th scope='row'>" . $row['musteriId']."</th>";
                            print "<td>" . $row['musteriAdi']."</td>";
                            print "<td>" . $row['musteriTel']."</td>";
                            print "<td>" . $row['musteriKod']."</td>";
                            echo "<td>"; 
                               // $daterow = $row['musteriTeslim'];
                                $date = new DateTime($row['musteriTeslim']);
                                $now = new DateTime();
                                echo $date->diff($now)->format("%d gün, %h saat sonra teslim");
                            echo"</td>";
                            print "<td><a class='btn btn-outline-info btn-sm btn-lg btn-block' href='/detay.html/". $row['musteriId']."' role='button'>Detaylar</a></td>";
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