<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> .:: Login ::. </title>

<link rel="stylesheet" type="text/css" href="../style.css">
<style type="text/css">

body {
        background-image: url('../img/login_wallpaper.jpg');
        background-attachment: fixed;
        background-size: 100%;
      }

</style>

</head>

<body>

<form name="frm_login" action="validation.php" method="post">
  <div id="principal">
    <label> Login </label>
    <input name="txt_user" type="text" class="input_01">

    <label> Senha </label>
    <input name="txt_password" type="password" class="input_01">

    <input name="btn_send" type="submit" value="Login" class="btn">
  </div>
</form>

</body>
</html>