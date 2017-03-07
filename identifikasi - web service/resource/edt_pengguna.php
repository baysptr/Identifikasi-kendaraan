<?php session_start(); ?>
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
                        <li role="presentation"><a href="identifikasi.php">Indetifikasi</a></li>
                        <li role="presentation" class="active"><a href="javascript:;">Pengguna</a></li>
                        <li role="presentation"><a href="javascript:;" onclick="if (confirm('yakin untuk log out ???') == true) {
                                    window.location = 'resource/logout.php'
                                }">Log out</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted">Identifikasi Kendaraan</h3>
            </div>
            <div class="row marketing">
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="btn btn-success" onclick="window.location = '../pengguna.php';">
                                <span class="glyphicon glyphicon-backward"></span> 
                                Back to Pengguna
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="upt_pengguna.php" method="post" enctype="multipart/form-data">
                                <table class="table table-responsive table-hover">
                                    <?php
                                    include './config.php';

                                    $id = $_GET['_id'];
                                    $res = mysqli_query($mysqli, "select * from M_PENGGUNA where id = '$id'");
                                    while ($data = mysqli_fetch_array($res)) {
                                        ?>
                                        <input type="hidden" name="id" id="id" value="<?= $data['id'] ?>">
                                        <tr>
                                            <td>NOPOL</td>
                                            <td>:</td>
                                            <td><input type="text" name="nopol" id="nopol" class="form-control" value="<?= $data['nopol'] ?>" autofocus="true"></td>
                                        </tr>
                                        <tr>
                                            <td>NAMA</td>
                                            <td>:</td>
                                            <td><input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>EMAIL</td>
                                            <td>:</td>
                                            <td><input type="email" name="email" id="email" class="form-control" value="<?= $data['email'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <input type="hidden" name="old_foto" id="old_foto" value="<?= $data['foto'] ?>">
                                                <img src="../utilitas/img/<?= $data['foto'] ?>" width="120px" height="auto" id="foto"><br/>
                                                <input type="checkbox" onclick="myFunction()" name="ganti" id="ganti"> Klik Untuk Ganti foto <br/>
                                                <input type="hidden" name="status" id="status">
                                                <input type="file" name="edt_foto" id="edt_foto">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right">
                                                <input type="reset" value="Batal" class="btn btn-sm btn-danger">
                                            </td>
                                            <td align="left">
                                                <input type="submit" value="Ganti" class="btn btn-sm btn-primary">
                                            </td>
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

        <script>
                                                    function myFunction() {
                                                        var x = document.getElementById('foto');
                                                        var y = document.getElementById('edt_foto');
                                                        y.style.display = 'block';
                                                        if (x.style.display === 'none') {
                                                            x.style.display = 'block';
                                                            document.getElementById('edt_foto').style.display = 'none';
                                                            $("#status").val("0");
                                                            console.log($("#status").val());
                                                        } else {
                                                            x.style.display = 'none';
                                                            document.getElementById('edt_foto').style.display = 'block';
                                                            $("#status").val("1");
                                                            console.log($("#status").val());
                                                        }
                                                    }
        </script>

    </body>
</html>
