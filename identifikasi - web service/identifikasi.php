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
                        <li role="presentation" class="active"><a href="identifikasi.php">Indetifikasi</a></li>
                        <?php if (isset($_SESSION['do_login'])) { ?>
                            <li role="presentation"><a href="pengguna.php">Pengguna</a></li>
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
                <h1>Daftar Kendaraan yang teridentifikasi</h1>
            </div>
            <hr/>
            <div class="row marketing">
                <div class="col-md-12 col-sm-12">
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <td>NO</td>
                                <td>NOPOL</td>
                                <td>LASST SEEN</td>
                                <td>DETAIL</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include './resource/config.php';

                            /* Pengaturan Paging */
                            $per_page = 6; /* Jumlah Data yang ditampilkan Setiap Page */
                            $page_query = mysqli_query($mysqli, "select * from M_HISTORY");
                            $pages = ceil(mysqli_num_rows($page_query) / $per_page);
                            $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
                            $start = ($page - 1) * $per_page;
                            /* ------------------ */

                            $res = mysqli_query($mysqli, "select h.id, h.id_pengguna, h.last_seen, p.nopol from M_HISTORY as h join M_PENGGUNA as p on h.id_pengguna = p.id limit $start, $per_page");
                            $no = 1 + $start;
                            while ($data = mysqli_fetch_array($res)) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nopol'] ?></td>
                                    <td><?= $data['last_seen'] ?></td>
                                    <td><a href="javascript:;" class="btn btn-xs btn-primary" onclick="window.location = 'resource/detail_pengguna.php?xyz@_pg=<?= $data["id_pengguna"] ?>';">Detail Pengguna</a></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3" align="center">
                                    <?php
                                    /* Link Paging */
                                    if ($pages >= 1 && $page <= $pages) {
                                        for ($x = 1; $x <= $pages; $x++) {
                                            echo ($x == $page) ?
                                                    '<a href="?page=' . $x . '" class="btn btn-xs btn-primary">' . $x . '</a> ' : '<a  href="?page=' . $x . '" class="btn btn-xs btn-primary">' . $x . '</a> ';
                                        }
                                    }
                                    ?> 
                                </td>
                            </tr>
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
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="login">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="">Login Identifier</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <table class="table table-responsive table-hover">
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td><input type="text" name="nama" id="nama" class="form-control" placeholder="Username"></td>
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
        <!-- / Modal Login -->

        <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="bower_components/bootbox/bootbox.js"></script>
    </body>
</html>
