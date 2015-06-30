<?php
  if($this->session->userdata('isLogin')){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Detail Pegawai - Portofolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/pages/dashboard.css" rel="stylesheet">
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="#">Aplikasi Penilaian Portofolio Pegawai  </a>

      <!--/.nav-collapse -->
    </div>
    <!-- /container -->
  </div>
  <!-- /navbar-inner -->
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="<?php echo base_url();?>beranda"><i class="icon-home"></i><span>Beranda</span> </a> </li>
        <li><a href="<?php echo base_url();?>pegawai"><i class="icon-group"></i><span>Pegawai</span> </a> </li>
        <li><a href="<?php echo base_url();?>komparasi"><i class="icon-archive"></i><span>Komparasi</span> </a></li>

      </ul>
  <ul class="mainnav pull-right">
        <li><a href="<?php echo base_url();?>logout"><i class="icon-signout"></i><span>Sign Out</span> </a> </li>

      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <!-- <ul class="breadcrumb">
        <li><a href="#">Pegawai</a> <span class="divider">/</span></li>
        <li class="active"><a href="#">Detail Pegawai</a></li>
      </ul> -->
      <div class="row">
        <div class="span9">
          <div class="widget">
            <div class="widget-header"> <i class="icon-user"></i>
              <h3> Detail Pegawai</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="row">
                <div class="span3">
                  <img src="<?php echo $foto; ?>" style="width: 200px; height: 240px;" class="img-polaroid img-responsive">
                </div>
                <div class="span5">
                  <table class="table table-striped table-hover tablefont tblright" cellspacing="0">

                    <tr><th width="35%">NIP </th><th width="3%">:</th><td><?php echo $detail_pegawai->NIP;?></td></tr>
                    <tr><th width="35%">Nama </th><th width="3%">:</th><td><?php echo $detail_pegawai->nama;?></td></tr>
                    <tr><th width="35%">Tempat, Tanggal Lahir </th><th width="3%">:</th><td><?php echo $detail_pegawai->tempat_lahir.", ".cnvdateindo($detail_pegawai->tgl_lahir);?></td></tr>
                    <tr><th width="35%">Jenis Kelamin </th><th width="3%">:</th><td><?php echo $detail_pegawai->JenisKelamin;?></td></tr>
                    <tr><th width="35%">Agama </th><th width="3%">:</th><td><?php echo $detail_pegawai->agama;?></td></tr>
                    <!-- <tr><th width="35%">Alamat </th><th width="3%">:</th><td><?php //echo $detail_pegawai->alamat." ".$detail_pegawai->rt."/".$detail_pegawai->rw.", ".$detail_pegawai->kel.", ".$detail_pegawai->kec.", ". $detail_pegawai->kotamadya.", ".$detail_pegawai->propinsi;?></td></tr> -->
                    <tr><th width="35%">Setatus Pegawai </th><th width="3%">:</th><td><?php echo $detail_pegawai->status_peg;?></td></tr>
                    <tr><th width="35%">Tanggal Mulai CPNS / PNS </th><th width="3%">:</th><td><?php echo cnvdateindo($detail_pegawai->tgl_mulai_CPNS); echo " / "; echo cnvdateindo($detail_pegawai->tgl_mulai_PNS);?></td></tr>
                    <tr><th width="35%">Gol / Pangkat </th><th width="3%">:</th><td><?php echo $detail_pegawai->gol." - ".$detail_pegawai->pangkat;?></td></tr>
                    <tr><th width="35%">Jabatan </th><th width="3%">:</th><td><?php echo $detail_pegawai->jabatan;?></td></tr>
                    <tr><th width="35%">Unit Kerja </th><th width="3%">:</th><td><?php echo $detail_pegawai->UnitKerja4." <br> ".$detail_pegawai->UnitKerja3." <br> ".$detail_pegawai->UnitKerja2;?></td></tr>

                  </table>
                  <br>
                  <br>
                </div>
              </div>


            </div>
          </div>
        </div>

        <div class="span3">
          <div class="widget">
            <div class="widget-header"> <i class="icon-star"></i>
              <h3> Nilai Pegawai</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-hover tablefont tblright" cellspacing="0">
                    <!-- <tr><th width="35%">Total Nilai :</th></tr> -->
                    <tr><th width="35%"><center><h1 style="font-size:40pt" ><?php echo npersen($nilai_pegawai['total'],30);?></h1></center></th></tr>
                    <!-- <tr><th width="35%"></th></tr> -->

              </table>
              <!-- <i><span style="font-size:10pt" >*Total Nilai Administrasi dan SKP</span></i> -->
            </div>
          </div>
        </div>

        <div class="span3">
          <div class="widget">
            <div class="widget-header"> 
              <h3> Aspek Administrasi (30%)</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-hover tablefont tblright" cellspacing="0">
                    <!-- <tr><th width="35%">Total Nilai :</th></tr> -->
                    <tr><th width="35%"><center><h1 style="font-size:40pt" ><?php echo npersen($nilai_pegawai['total'],30);?></h1></center></th></tr>
                    <!-- <tr><th width="35%"></th></tr> -->

              </table>
              <!-- <i><span style="font-size:10pt" >*Total Nilai Administrasi x 30%</span></i> -->
            </div>
          </div>
        </div>

        <div class="span3">
          <div class="widget">
            <div class="widget-header"> 
              <h3> Aspek Perilaku Kerja (70%)</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-hover tablefont tblright" cellspacing="0">
                    <!-- <tr><th width="35%">Total Nilai :</th></tr> -->
                    <tr><th width="35%"><center><h1 style="font-size:40pt" >0</h1></center></th></tr>
                    <!-- <tr><th width="35%"></th></tr> -->

              </table>
              <!-- <i><span style="font-size:10pt" >*Total Nilai SKP x 70%</span></i> -->
            </div>
          </div>
        </div>


      </div>

      <div class="row">

        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-star"></i>
              <h3> Aspek Administrasi</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">


              <table class="table table-striped table-hover tablefont tblright" cellspacing="0">

                    <tr><th width="35%">Pendidikan</th><th width="3%">:</th><td><?php echo $nilai_pegawai['pendidikan'];?></td></tr>
                    <tr><th width="35%">Diklat Pimpinan </th><th width="3%">:</th><td><?php echo $nilai_pegawai['diklat_pim'];?></td></tr>
                    <tr><th width="35%">Diklat Teknis</th><th width="3%">:</th><td>0</td></tr>
                    <tr><th width="35%">Golongan  </th><th width="3%">:</th><td><?php echo $nilai_pegawai['golongan'];?></td></tr>
                    <tr><th width="35%">Masa Kerja </th><th width="3%">:</th><td><?php echo $nilai_pegawai['masa_kerja'];?></td></tr>
                    <tr><th width="35%"></th><td>&nbsp;</td><td>&nbsp;</td></tr>

                    <tr><th width="35%"><h2>Total Nilai</h2></th><th width="3%"><h2>:</h2></th><td><h2><?php echo $nilai_pegawai['total'];?></h2></td></tr>


              </table>


            </div>
          </div>
        </div>

        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-star"></i>
              <h3> Aspek Perilaku Kerja</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">


              <table class="table table-striped table-hover tablefont tblright" cellspacing="0">

                    <tr><th width="35%">Orientasi Pelayanan</th><th width="3%">:</th><td>0</td></tr>
                    <tr><th width="35%">Integritas</th><th width="3%">:</th><td>0</td></tr>
                    <tr><th width="35%">Komitmen</th><th width="3%">:</th><td>0</td></tr>
                    <tr><th width="35%">Disiplin</th><th width="3%">:</th><td>0</td></tr>
                    <tr><th width="35%">Kerjasama</th><th width="3%">:</th><td>0</td></tr>
                    <tr><th width="35%">Kepemimpinan</th><th width="3%">:</th><td>0</td></tr>
                    
                    <tr><th width="35%"><h2>Total Nilai</h2></th><th width="3%"><h2>:</h2></th><td><h2>0</h2></td></tr>


              </table>


            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3> RIWAYAT JABATAN</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">

              <table class="table table-striped table-hover tablefont tblright" cellspacing="0">
                <tr>
                  <th width="3%">NO</th>
                  <th width="35%">Jabatan</th>
                  <th width="35%">Unit Kerja</th>
                  <th width="35%">TMT Jabatan</th>
                </tr>
                <?php $no=1;foreach ($r_jabatan as $rj) { ?>
                <tr>
                  <td width="3%"><?php echo $no;?></th>
                  <td width="35%"><?php echo $rj->jabatan;?></td>
                  <td width="35%">
                    <?php
                      if($rj->nama_seksi!=""){echo $rj->nama_seksi." ".$rj->nama_subdir." ".$rj->nama_dir;}
                      else { echo $rj->unit_lama;}
                    ?>
                  </td>
                  <td width="35%"><?php echo cnvdateindo($rj->tmt);?></td>
                </tr>
                <?php $no++;}      ?>
              </table>

            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3> RIWAYAT GOLONGAN</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-hover tablefont tblright" cellspacing="0">
                <tr>
                  <th width="3%">NO</th>
                  <th width="35%">Golongan</th>
                  <th width="35%">Pangkat</th>
                  <th width="35%">TMT Golongan</th>
                </tr>
                <?php $no=1;foreach ($r_golongan as $rj) { ?>
                <tr>
                  <td width="3%"><?php echo $no?></th>
                  <td width="35%"><?php echo $rj->gol;?></td>
                  <td width="35%"><?php echo $rj->pangkat;?></td>
                  <td width="35%"><?php echo cnvdateindo($rj->tmt);?></td>
                </tr>
                <?php $no++; }      ?>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3> RIWAYAT PENDIDIKAN</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-hover tablefont tblright" cellspacing="0">
                <tr>
                  <th width="3%">NO</th>
                  <th width="35%">Pendidikan</th>
                  <th width="35%">Jurusan</th>
                  <th width="35%">Tahun Lulus</th>
                </tr>
                <?php $no=1;foreach ($r_pendidikan as $rj) { ?>
                <tr>
                  <td width="3%"><?php echo $no;?></th>
                  <td width="35%"><?php echo $rj->nama_pend;?></td>
                  <td width="35%"><?php echo $rj->nama_studi;?></td>
                  <td width="35%"><?php echo $rj->tahun_lulus;?></td>
                </tr>
                <?php $no++; } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3> RIWAYAT DIKLAT</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-hover tablefont tblright" cellspacing="0">
                <tr>
                  <th width="3%">NO</th>
                  <th width="35%">Nama Diklat</th>
                  <th width="35%">Tahun Diklat</th>
                  <th width="35%">Angkatan</th>
                </tr>
                <?php $no=1;foreach ($r_diklat as $rj) { ?>
                <tr>
                  <td width="3%"><?php echo $no;?></th>
                  <td width="35%"><?php echo $rj->diklat;?></td>
                  <td width="35%"><?php echo $rj->tahun_diklat;?></td>
                  <td width="35%"><?php echo $rj->angkatan;?></td>
                </tr>
                <?php $no++; } ?>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3> RIWAYAT KURSUS</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-hover tablefont tblright" cellspacing="0">
                <tr>
                  <th width="3%">NO</th>
                  <th width="35%">Nama Kursus</th>
                  <th width="35%">Tahun</th>
                </tr>
                <?php $no=1;foreach ($r_kursus as $rj) { ?>
                <tr>
                  <td width="3%"><?php echo $no;?></th>
                  <td width="35%"><?php echo $rj->kursus;?></td>
                  <td width="35%"><?php echo $rj->thn_kursus;?></td>
                </tr>
                <?php $no++; } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3> RIWAYAT TANDA JASA</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-hover tablefont tblright" cellspacing="0">
                <tr>
                  <th width="3%">NO</th>
                  <th width="35%">Tanda Jasa</th>
                  <th width="35%">Tahun</th>
                </tr>
                <?php $no=1;foreach ($r_tanda_jasa as $rj) { ?>
                <tr>
                  <td width="3%"><?php echo $no;?></th>
                  <td width="35%"><?php echo $rj->tanda_jasa;?></td>
                  <td width="35%"><?php echo $rj->tahun_perolehan;?></td>
                </tr>
                <?php $no++; } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /main-inner -->
</div>
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2015 Aplikasi Penilaian Portofolio Pegawai  - Kemendikbud. </div>
        <!-- /span12 -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /footer-inner -->
</div>
<!-- /footer -->
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/bootstrap.js"></script>

</body>
</html>
<?php
  }
  else{
    show_404();
  }
?>
