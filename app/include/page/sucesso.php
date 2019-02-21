<?
if($_SESSION['sucesso']) {
?>
<div class="alert alert-success" role="alert">
  <?echo $_SESSION['sucesso'];?>
</div>
<?
};
unset($_SESSION['sucesso']);
?>
