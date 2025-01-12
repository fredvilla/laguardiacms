<?php
if (isset($_SESSION['msg'])) {
    ?>
    <div id="hide" class="alert alert-danger alert-dismissible fade show" role="alert"><?=$_SESSION['msg'];?> </div>
    <?php
unset($_SESSION['msg']);

}
if (isset($_SESSION['msge'])) {
    ?>
    <div id="Hide" class="alert alert-success alert-dismissible fade show" role="alert"><?=$_SESSION['msge'];?> </div>
    <?php
unset($_SESSION['msge']);

}
?>

<script type="text/javascript" src="js/hide.js"></script>