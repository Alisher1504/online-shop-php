<?php session_start() ?>
<?php include('include/header.php') ?>

<?php

if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "you are logged in";
    header('Location: ./index.php');
}

?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">


            <?php if(isset($_SESSION['message'])) {?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey User <?= $_SESSION['message']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } 
            
            unset($_SESSION['message']);
            
            ?>

            <div class="card">
                <div class="card-header">
                    <h1>Register</h1>
                </div>

                <div class="card-body">

                    <form action="function/auth.php" method="POST">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="submit_login" class="btn btn-primary">Submit</button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include('include/footer.php') ?>