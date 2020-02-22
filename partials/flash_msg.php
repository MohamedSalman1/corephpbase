<div class="js-flash-success alert alert-success <?php echo $_SESSION['SUCCESS_MSG'] ?? 'd-none'; ?>">
    <?php echo $_SESSION['SUCCESS_MSG'] ?? ''; ?>
</div>
<div class="js-flash-error alert alert-danger <?php echo $_SESSION['ERROR_MSG'] ?? 'd-none'; ?>">
    <?php echo $_SESSION['ERROR_MSG'] ?? ''; ?>
</div>