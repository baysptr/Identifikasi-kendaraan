<html>
    <head>
        <meta charset="UTF-8">
        <title>Identifikasi Kendaraan | WEB</title>
        <link rel="icon" href="../utilitas/img/signal.ico">
        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="../utilitas/css/jumbotron-narrow.css" type="text/css" rel="stylesheet">
        <?php
        include './config.php';
        $credential = $_GET['3D17'];
        $id = $_GET['id'];
        if ($credential != "pengguna=@$%^") {
            echo "<script>alert('Ooopppsss! sistem error, parsing URL not found');window.location = '../pengguna.php';</script>";
        }
        ?>
    </head>
    <body>

        <!-- Content -->
        <div class="container">
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation"><a href="../index.php">Home</a></li>
                        <li role="presentation"><a href="../identifikasi.php">Indetifikasi</a></li>
                        <li role="presentation" class="active"><a href="javascript:;">Pengguna</a></li>
                        <li role="presentation"><a href="javascript:;" onclick="if (confirm('yakin untuk log out ???') == true) {
                                    window.location = 'logout.php';
                                }">Log out</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted">Identifikasi Kendaraan</h3>
            </div>
            <div class="row marketing">
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3>Edit Pengguna</h3>
                        </div>
                        <div class="panel-body">
                            <form>
                                <table class="table table-responsive table-hover">
                                    <?php
                                    $res = mysqli_query($mysqli, "select * from M_PENGGUNA where id = '$id'");
                                    while ($data = mysqli_fetch_array($res)) {
                                        ?>
                                        <tr>
                                            <td>NOPOL</td>
                                            <td>:</td>
                                            <td><input type="text" name="nopol" id="nopol" class="form-control" value="<?= $data['nopol'] ?>"></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <p>&copy; 2017 Company, Inc.</p>
            </footer>
        </div>
        <!-- / Content -->

        <script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../bower_components/bootbox/bootbox.js"></script>

    </body>
</html>