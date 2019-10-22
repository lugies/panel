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

<body style="background: url('./img/bg-3.jpg')">
    <div class="container">
    <!-- form user info -->
    <div class="card bg-info">
        <div class="card-body text-center">
            <form autocomplete="off" class="form" role="form" method="POST" action="kullanici-kayit.php">
            <div class="form-group row">
                <div class="col-lg-12">
                    <input class='form-control'  type='text' placeholder="Lütfen Adınızı ve Soyadınızı Giriniz" name="users_name">
                </div>
            </div>
            <div class="form-group row">
            <div class="col-lg-6">
                    <input class='form-control'  type='text' placeholder="Lütfen Şifrenizi Giriniz" name="users_password">
                </div>
                <div class="col-lg-6">
                    <input class='form-control'  type='text' placeholder="Lütfen Şifrenizi Giriniz" name="users_password_2">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12">
                    <input class='form-control'  type='text' placeholder="Lütfen Telefon Numarınızı Giriniz" name="users_phone">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12">
                    <input class="btn btn-success" type="submit" value="KAYDET">
                </div>
            </div>
            </form>
              </div>
            </div><!-- /form user info -->
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>