<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A simple interface for checking card validity">
    <meta name="author" content="CodeLiter">

    <title>CodeLiter Card Checker</title>

    <!-- Bootstrap Core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/css/font-awesome.min.css" rel="stylesheet">
    <link href="static/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <header>
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- <div class="navbar-header logo"> -->
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <i class="fa fa-5x fa-lock"></i><h1 class="logo-brand">CodeLiter Card Checker</h1>
                </div>
                <div class="col-md-4"></div>
            <!-- </div> -->
        </div>
        <!-- /.container -->
    </header>

    <!-- Page Content --> 
    <div class="container" id="site-content">
        <div class="row">
                <div class="col-md-4"></div>
                <section class="col-md-4 page">
                    <?php if ($_SESSION['msg'] && count($_SESSION['msg']) > 0) {
                        foreach ($_SESSION['msg'] as $key => $value) {
                            if ($key == 'error') {
                                echo '<br><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>'.$value."</div>";
                            }
                            elseif($key == 'success') {
                                if (is_array($value)) {
                                    echo '<br><div class="alert alert-info">';
                                    echo "<p>Card Name<br><h4>".$value['cardName']."</h4></p>";
                                    echo "<p>Country<br><h4>".$value['country']."</h4></p>";
                                    echo '</div>';
                                }

                            }
                        }
                    }
                    ?>
                    <form action="checker.php" method="post" class="row form-horizontal">
                        <div class="col-xs-12">
                             <input type="number" name="card_no" placeholder="First 6 Digits of card number" title="Card number" id="card-no" class="form-control input-lg" maxlength="6" autocomplete="off" value="<?php if($_SESSION['card_no']) {echo $_SESSION['card_no'];} ?>">
                        </div>
                       

                        <div class="row col-xs-12">
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-lg btn-danger" title="Check card">Check</button>
                            </div>
                        </div>
                    </form>    
                </section>
                <div class="col-md-4"></div>
           
            <footer class="col-xs-12">
                <div class="text-center">
                    A CodeLiter Expression
                </div>
            </footer>
            <?php
                if (count($_SESSION) > 0) {
                    foreach ($_SESSION as $key => $value) {
                        $_SESSION[$key]= '';
                    }
                }
            ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container --><!-- /.main-content -->

    <script src="static/js/jquery-3.1.0.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/exp.codeliter.js"></script>
</body>

</html>
