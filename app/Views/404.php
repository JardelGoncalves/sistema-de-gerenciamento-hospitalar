<?
session_start();
if($_SESSION['usuario']) {
  require 'include/page/head.php';
?>

<div class="text-center" style="margin-top:10%">
  <img class="img-fluid" src="/assets/img/404.png" width="500px" alt="">
</div>
<?
  require 'include/page/footer.php';
}
else {
?>
<div class="text-center" style="margin-top:10%; margin-left:28%">
  <img class="img-fluid" src="/assets/img/404.png" width="500px" alt="">
</div>
<?
}
?>
