<?php session_start() ?>
<?php include('include/header.php') ?>


        <?php if(isset($_SESSION['message'])) {?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey User <?= $_SESSION['message']; ?></strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } 
            
            unset($_SESSION['message']);
            
        ?>

<h1>hello user</h1>
<?php include('include/footer.php') ?>