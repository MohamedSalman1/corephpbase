<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/application.js"></script>
    </body>
</html>
<?php
    if (isset($_SESSION['SUCCESS_MSG'])) {
        unset($_SESSION['SUCCESS_MSG']);
    }
    if (isset($_SESSION['ERROR_MSG'])) {
        unset($_SESSION['ERROR_MSG']);
    }
?>