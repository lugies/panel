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
        <div class="table-responsive-sm" >
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Parfüm Id</th>
                    <th scope="col">Parfüm Adı</th>
                    <th scope="col">Parfüm Kategori</th>
                    <th scope="col">Parfüm Güncelle</th>
                    <th scope="col">Parfüm Sil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $db->query("SELECT * FROM products");
                        $query->execute();
                        $all = $query -> fetchAll();
                        foreach( $all as $row ){
                            echo '<tr>';
                            print "<th scope='row'>" . $row['products_id']."</th>";
                            print "<td>" . $row['products_name']."</td>";
                            if($row['products_cat'] === 'E')
                            print "<td>" . "Erkek"."</td>";
                            elseif ($row['products_cat'] === 'K') {
                                print "<td>" . "Kadın"."</td>";
                            }
                            elseif ($row['products_cat'] === 'U') {
                                print "<td>" . "Unisex"."</td>";
                            }
                            print "<td><a class='btn btn-outline-info btn-sm btn-lg btn-block' href='/panel/admin/parfum-guncelle.php?id=". $row['products_id']."' role='button'>Güncelle</a></td>";
                            print "<td><a id='".$row['products_id']."' class='btn btn-outline-info btn-sm btn-lg btn-block' href='/panel/admin/sil.php?id=". $row['products_id']."' role='button' data-toggle='modal' data-target='#myModal' onClick='sil(this.id)'>Sil</a></td>";
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