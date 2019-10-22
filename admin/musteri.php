<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
                    <th scope="col">Kullanıcı Id</th>
                    <th scope="col">Kullanıcı Adı</th>
                    <th scope="col">Kullanıcı Tel</th>
                    <th scope="col">Kullanıcı Gün</th>
                    <th scope="col">Kullanıcı Sil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $db->query("SELECT * FROM users");
                        $query->execute();
                        $all = $query -> fetchAll();
                        foreach( $all as $row ){
                            $GLOBALS['users_id'] = $row['users_id'];
                            echo '<tr>';
                            print "<th scope='row'>" . $row['users_id']."</th>";
                            print "<td>" . $row['users_name']."</td>";
                            print "<td>" . $row['users_phone']."</td>";
                            print "<td><a class='btn btn-outline-info btn-sm btn-lg btn-block' href='/panel/admin/mus-guncelle.php?id=". $row['users_id']."' role='button'>Güncelle</a></td>";
                            print "<td><a id='".$row['users_id']."' class='btn btn-outline-info btn-sm btn-lg btn-block' href='/panel/admin/sil.php?id=". $row['users_id']."' role='button' data-toggle='modal' data-target='#myModal' onClick='sil(this.id)'>Sil</a></td>";
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal body -->
        <div class="modal-body">
            <div class="alert alert-danger">
                <strong>Dikkat!</strong> Silme işlemini onaylıyor musunuz?
            </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <a id='sil' class="btn btn-success" href='' role='button'>Evet</a>
            <a class="btn btn-danger" href='' role='button' data-dismiss="modal">Hayır</a>
        </div>
        
      </div>
    </div>
  </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    function sil(id){
        document.getElementById("sil").href = "/login/admin/sil.php?id="+id;
    } 
    </script>
</body>
</html>