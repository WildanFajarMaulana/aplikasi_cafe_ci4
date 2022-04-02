<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styleAdmin/login.css">

    <title>Login</title>
</head>
<body>
    <div class="formact">
        <form action="/admin/login.html" class="form" method="post">
            <h1 class="form-title">Mau Cafe</h1>
            <?php if(session()->getFlashdata('pesan')){ ?>
          <div class="alert alert-primary"><?= session()->getFlashdata('pesan') ?></div>
            <?php } ?>
            <div class="form_div">
                <input class="form_input" type="text" placeholder="" name="email">
                <label for="" class="form_label">Email/Username</label>
            </div>

            <div class="form_div">
                <input class="form_input" type="password" placeholder="" name="password">
                <label for="" class="form_label">Password</label>
            </div>

            <button type="submit" class="btn" value="Login">Login</button>
        </form>
    </div>


</body>
</html>