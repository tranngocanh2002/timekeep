
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
<?php if (isset($_SESSION['error'])): ?>
<div class="alert alert-danger">
    <?php
    echo $_SESSION['error'];
    unset($_SESSION['error']);
    ?>
</div>
<?php endif; ?>

<?php if (!empty($this->error)): ?>
<div class="alert alert-danger">
    <?php
    echo $this->error;
    ?>
</div>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
<div class="alert alert-success">
    <?php
    echo $_SESSION['success'];
    unset($_SESSION['success']);
    ?>
</div>
<?php endif; ?>

<?php require_once 'header.php';?>
<?php echo $this->content; ?>
</div>



<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="assets/js/adminlte.min.js"></script> -->
<!--CKEditor -->
<script src="assets/ckeditor/ckeditor.js"></script>
<!--My SCRIPT-->
<script src="assets/js/script.js"></script>
</body>
</html>

