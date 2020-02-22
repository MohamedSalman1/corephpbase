<?php
    include('includes/header.php');
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Sign Up</h1>
</div>

<div class="container">

    <div class="row">
        <div class="col-6 offset-md-3">

            <?php include('partials/flash_msg.php'); ?>

            <form action="" novalidate="" id="signUpForm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="hidden" class="js-field-token" name="signup_token" value="<?php echo csrf_token(); ?>" />
                    <input type="text" name="name" class="form-control js-field-name" placeholder="Enter name" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name="email" class="form-control js-field-email" placeholder="Enter email" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" class="form-control js-field-pwd" placeholder="Enter password" id="pwd">
                </div>
                <button type="submit" name="signup" class="btn btn-primary js-submit-btn">Submit</button>
            </form>

        </div>
    </div>

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 col-md text-center">
                <small class="d-block mb-3 text-muted">&copy; 2020-2021</small>
            </div>
        </div>
    </footer>

</div>

<?php
    include('includes/footer.php');
?>