<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
<div class="box">
        <h1>Silahkan Login</h1>
        <form action="ceklogin.php" method="post">
          <input type="text" placeholder="Username" name="username" />
          <input type="password" placeholder="Password" name="password" />
          <button type="submit">Login</button>
        </form>
        <p>Belum punya akun?
          <span><a href="daftar.php?">Daftar</a></span>
        </p>
      </div>
</body>

</html>