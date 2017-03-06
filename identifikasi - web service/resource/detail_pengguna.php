<html>
    <head>
        <meta charset="UTF-8">
        <title>Identifikasi Kendaraan | WEB</title>
        <link rel="icon" href="utilitas/img/signal.ico">
        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="../utilitas/css/jumbotron-narrow.css" type="text/css" rel="stylesheet">
    </head>
    <body>

        <!-- Content -->
        <div class="container">
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation"><a href="/identifikasi">Home</a></li>
                        <li role="presentation" class="active"><a href="identifikasi.php">Indetifikasi</a></li>
                        <li role="presentation"><a href="javascript:;" data-toggle="modal" data-target="#login">Login</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted">Identifikasi Kendaraan</h3>
            </div>
            <div class="jumbotron">
                <h1>Detail Pemilik Kendaraan</h1>
            </div>
            <div class="row marketing">
                <div class="col-md-12 col-sm-12">
                    <div class="pane panel-primary">
                        <div class="panel-heading">
                            <div class="btn btn-sm btn-success" onclick="window.location = '../identifikasi.php'"><span class="glyphicon glyphicon-backward"></span> Go back</div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-responsive table-hover">
                                <?php
                                include './config.php';

                                $id = $_GET['xyz@_pg'];
                                $res = mysqli_query($mysqli, "select * from M_PENGGUNA where id = '$id'");
                                while ($data = mysqli_fetch_array($res)) {
                                    ?>
                                    <tr>
                                        <td rowspan="4">
                                            <img src="../utilitas/img/<?= $data['foto'] ?>" width="140px" height="auto">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NOPOL</td>
                                        <td>:</td>
                                        <td><?= $data['nopol'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>NAMA</td>
                                        <td>:</td>
                                        <td><?= $data['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>e-MAIL</td>
                                        <td>:</td>
                                        <td><?= $data['email'] ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
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
