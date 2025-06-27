
<?php
session_start();
if (isset($_GET['login']) && isset($_GET['passwd']) && isset($_GET['submit']) && $_GET['submit'] === "OK")
{
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];
    $_SESSION['submit'] = $_GET['submit'];
}
?>
<html><body>
<form action="index.php", method="get">
    Identifiant: <input type="text" name="login" value="<?php echo (isset($_SESSION['login']) ? $_SESSION['login'] : ''); ?>" />
    <br />
    Mot de passe: <input type="password" name="passwd" value="<?php echo (isset($_SESSION['passwd']) ? $_SESSION['passwd'] : ''); ?>" />
    <input type="submit" name="submit" value="OK" />
</form>
</body></html>