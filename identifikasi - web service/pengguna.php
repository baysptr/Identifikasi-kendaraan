<?php session_start(); ?>
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
                        <li role="presentation"><a href="/identifikasi">Home</a></li>
                        <li role="presentation"><a href="identifikasi.php">Indetifikasi</a></li>
                        <?php if (isset($_SESSION['do_login'])) { ?>
                            <li role="presentation" class="active"><a href="javascript:;">Pengguna</a></li>
                            <li role="presentation"><a href="javascript:;" onclick="if (confirm('yakin untuk log out ???') == true) {
                                        window.location = 'resource/logout.php'
                                    }">Log out</a></li>
                            <?php } else {
                                ?>
                            <li role="presentation"><a href="javascript:;" data-toggle="modal" data-target="#login">Login</a></li>
                        <?php } ?>
                    </ul>
                </nav>
                <h3 class="text-muted">Identifikasi Kendaraan</h3>
            </div>
            <div class="jumbotron">
                <h1>Daftar Pengguna Pemilik Kendaraan</h1>
            </div>
            <hr/>
            <div class="row marketing">
                <div class="col-md-12 col-sm-12">
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <td>NO</td>
                                <td>NOPOL</td>
                                <td>NAMA</td>
                                <td>EMAIL</td>
                                <td colspan="2"><div class="btn btn-sm btn-block btn-primary" data-toggle="modal" data-target="#pengguna"><span class="glyphicon glyphicon-plus"></span> Add Pengguna</div></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include './resource/config.php';

                            $no = 1;
                            $res = mysqli_query($mysqli, "select * from M_PENGGUNA order by nama asc");
                            while ($data = mysqli_fetch_array($res)) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nopol'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><div class="btn btn-xs btn-block btn-danger" onclick="
                                            if (confirm('Apa anda yakin data ini untuk dihapus ???') == true)
                                            {
                                                window.location = 'resource/hps_pengguna.php?id=<?= $data["id"] ?>&foto=<?= $data["foto"] ?>';
                                            }">Hapus</div></td>
                                    <td><div class="btn btn-xs btn-block btn-success" onclick="window.location = 'resource/edt_pengguna.php?3D17=pengguna=@$%^&_id=<?= $data['id'] ?>'">Edit</div></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="footer">
                <p>&copy; 2017 Company, Inc.</p>
            </footer>
        </div>
        <!-- / Content -->

        <!-- Modal Login -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="pengguna">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="">Tambah Pengguna</h4>
                    </div>
                    <div class="modal-body">
                        <form action="resource/add_pengguna.php" method="POST" enctype="multipart/form-data">
                            <table class="table table-responsive table-hover">
                                <tr>
                                    <td>NOPOL</td>
                                    <td>:</td>
                                    <td><input type="text" name="nopol" id="nopol" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>NAMA</td>
                                    <td>:</td>
                                    <td><input type="text" name="nama" id="nama" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>EMAIL</td>
                                    <td>:</td>
                                    <td><input type="email" name="email" id="email" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>FOTO</td>
                                    <td>:</td>
                                    <td><input type="file" name="foto" id="foto"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right">
                                        <input type="reset" value="Clear" class="btn btn-sm btn-danger">
                                    </td>
                                    <td align="left"><input type="submit" value="Tambah" class="btn btn-sm btn-primary"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Modal Login -->

        <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="bower_components/bootbox/bootbox.js"></script>

    </body>
</html>
