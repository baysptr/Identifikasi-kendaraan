<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Identifikasi Kendaraan | WEB</title>
        <link rel="icon" href="utilitas/img/signal.ico">
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="utilitas/css/jumbotron-narrow.css" type="text/css" rel="stylesheet">
    </head>
    <body>

        <!-- Content -->
        <div class="container">
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation" class="active"><a href="#">Home</a></li>
                        <li role="presentation"><a href="identifikasi.php">Indetifikasi</a></li>
                        <?php if (isset($_SESSION['do_login'])) { ?>
                        <li role="presentation"><a href="pengguna.php">Pengguna</a></li>
                            <li role="presentation"><a href="javascript:;" onclick="if(confirm('yakin untuk log out ???') == true){window.location = 'resource/logout.php'}">Log out</a></li>
                        <?php } else {
                            ?>
                            <li role="presentation"><a href="javascript:;" data-toggle="modal" data-target="#login">Login</a></li>
                        <?php } ?>
                    </ul>
                </nav>
                <h3 class="text-muted">Identifikasi Kendaraan</h3>
            </div>
            <div class="jumbotron">
                <h1>Hai Identifier</h1>
                <p class="lead">Selamat datang di web site identifikasi kendaraan melalui chip ESP8266, silahkan kakak/bapak/ibu yang ingin kendaraannya aman dan saling mengamankan kendaraan secara bersama melalui program Identifier</p>
                <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
            </div>
            <div class="row marketing">

            </div>
            <footer class="footer">
                <p>&copy; 2016 Company, Inc.</p>
            </footer>
        </div>
        <!-- / Content -->

        <!-- Modal -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="login">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="">Login Identifier</h4>
                    </div>
                    <div class="modal-body">
                        <form action="resource/login.php" method="POST">
                            <table class="table table-responsive table-hover">
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td><input type="text" name="user" id="user" class="form-control" placeholder="Username"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                    <td><input type="password" name="pass" id="pass" class="form-control" placeholder="Password"></td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right">
                                        <a href="#">Belum punya akun, klik untuk membuat akun</a>
                                        <input type="submit" value="Login" class="btn btn-success">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Modal -->

        <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="bower_components/bootbox/bootbox.js"></script>
    </body>
</html>
