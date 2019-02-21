<?
if($_SESSION['erro']) {
?>
<div class="alert alert-danger" role="alert">
  <?echo $_SESSION['erro'];?>
</div>
<?
};
unset($_SESSION['erro']);
?>
