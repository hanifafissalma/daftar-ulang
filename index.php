<?php
    require 'functions/koneksi_ukt.php';
    session_start();

    if(isset($_POST['no_peserta'])){
       $nopes = $_POST['no_peserta'];
        $query = "SELECT tb_user.no_peserta, tb_cmahasiswa.nama_mahasiswa, ref_fakultas.nama as fakultas, 
        ref_prodi.nama as prodi, ref_ukt.besar_ukt as ukt
         FROM tb_user, tb_cmahasiswa, ref_fakultas, ref_prodi, ref_ukt
         WHERE tb_user.userid=tb_cmahasiswa.userid 
         AND tb_cmahasiswa.fakultas=ref_fakultas.kode
         AND tb_cmahasiswa.prodi = ref_prodi.kode
         AND tb_cmahasiswa.golongan_id = ref_ukt.id_golongan
         AND no_peserta=$nopes";

        $stmt = $koneksi_ukt->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Ulang <?=date('Y')?> UNJ</title>
        <link href="dist/css/datatables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="dist/css/bootstrap.min.css"/>
        <link href="dist/css/toastr.min.css" rel="stylesheet">
        <link href="dist/css/custom.css" rel="stylesheet">
        <link href="dist/img/LogoUnj.png" rel="shortcut icon"/>
        <script src="dist/js/jquery-2.1.4.min.js"></script>
    </head>
    <body class="bg-unj no-overflow-x">
        <nav class="navbar navbar-default bottom-border">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand clearfix">
                        <div class="pull-left" style="margin-right: 20px;">
                            <img src="dist/img/LogoUnj.png" height="60" alt="LogoUnj.jpg"/>
                        </div>
                        <div class="pull-left">
                            Verifikasi Daftar Ulang <?=date('Y')?> UNJ
                        </div>
                    </span>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akun <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="disabled"><a href="#"><?=ucwords($_SESSION['username'])?></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="functions/logout.php">Keluar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">>
            <div class="container">
                <div class="col-md-12">
                    <div class="col-md-offset-3 col-md-6">
                        <center><h2>Cari Berdasarkan Nomor Peserta</h2></center>
                        <hr>
                        <form id="nopes" method="post" action="index.php">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="no_peserta" class="form-control" placeholder="Nomor Peserta" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" form="nopes" class="btn btn-success btn-block">
                                    <span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;&nbsp;Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <div class="hasil-container
            <?php
                if(isset($_POST['no_peserta'])){
                    echo 'slide-left';
                }
            ?>
            ">
                <div class="col-md-offset-3 col-md-6">
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <div class="panel-body">
                            <center><h2>DATA CALON MAHASISWA</h2></center>
                            <hr>
                            <h4>
                            <div style="padding:3%">
                                <table class="table">
                                    <tr>
                                        <td>Nomor Peserta</td>
                                        <td width="10px">:</td>
                                        <td><?php echo $row['no_peserta'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td width="10px">:</td>
                                        <td><?php echo $row['nama_mahasiswa'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fakultas</td>
                                        <td width="10px">:</td>
                                        <td><?php echo $row['fakultas'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Program Studi</td>
                                        <td width="10px">:</td>
                                        <td><?php echo $row['prodi'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Besaran UKT</td>
                                        <td width="10px">:</td>
                                        <td><?php echo "Rp. ".number_format($row['ukt'],2,",",".") ?></td>
                                    </tr>
                                </table>
                            </div>
                            </h4>
                            <div id="baru_lapor">
                                <button class="btn btn-primary btn-block btn-lg">
                                    <span class="glyphicon glyphicon-lock"></span>
                                    &nbsp;&nbsp; Buka Pembayaran UKT
                                </button>
                            </div>
                            <br>
                            <div id="belum_bayar">
                                <div class="alert alert-warning">
                                    <center><h4>Belum Melakukan Pembayaran UKT</h4></center>
                                </div>
                            </div>
                            <div id="udah_bayar">
                                <button class="btn btn-danger btn-block btn-lg">
                                    <span class="glyphicon glyphicon-print"></span>
                                    &nbsp;&nbsp; Cetak Noreg dan Password Siakad
                                </button>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
        
        <div style="position: fixed; margin-top: 20px; padding: 15px 0; bottom: 0; left: 0; right: 0; background-color: #006f45; color: #fff">
            <div class="text-center">Copyright &copy; UPT TIK - Universitas Negeri Jakarta <?=date('Y')?></div>
        </div>
        <script src="dist/js/bootstrap.min.js"></script>
        <script src="dist/js/datatables.min.js"></script>
        <script src="dist/js/toastr.min.js"></script>
        <script src="dist/js/custom.js"></script>
        <script type="text/javascript">
            $(function(){
                $(".dropdown-toggle").dropdown();
                $(".table-data").DataTable();
            })
        </script>
    </body>
</html>