<?php
  if($this->session->userdata('isLogin')){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Pegawai - Portofolio</title>
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
      <a class="brand" href="#">Aplikasi Penilaian Portofolio Pegawai </a>

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
        <li class="active"><a href="<?php echo base_url();?>pegawai"><i class="icon-group"></i><span>Pegawai</span> </a> </li>
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
        <li class="active"><a href="#">Pegawai</a></li>
      </ul> -->
      <div class="row">
        <div class="span12">
          <form class="form-search pull-right" action="<?php echo base_url();?>pegawai/search" method="POST">
            <input type="text" class="input-medium search-query" placeholder="keyword" name="srctoken">
            <button type="submit" class="btn btn-primary">Search</button>
          </form>
        </div>
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Daftar Pegawai <?php if(isset($dikpim))echo $dikpim;?></h3>
               <!-- echo $this->session->userdata('uu3')." "; echo $this->session->userdata('uu2'); -->
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <table class="table table-striped table-responsive">
                    <thead>
                      <th width="2%">No</th>
                      <th width="10%">NIP</th>
                      <th width="17%">Nama</th>
                      <th width="51%">Unit Kerja</th>
                      <!-- <th width="10%">Action</th> -->
                    </thead>
                    <tbody>
                      <?php

                      $no=$offset+1;


                      foreach ($pegawai as $peg) {
                        # code...
                        $str = $peg->NIP;
                        $encoded = urlencode( base64_encode( $str ) );
                      ?>
                      <tr style="cursor:pointer" onclick="window.location = '<?php echo base_url()."pegawai/show/".$encoded;?>'">
                        <td><?php echo $no;?></td>
                        <td><?php echo $peg->NIP;?></td>
                        <td><?php echo $peg->nama;?></td>
                        <td><?php echo $peg->UnitKerja4." ".$peg->UnitKerja3." ".$peg->UnitKerja2;?></td>
                        <!-- <td>View | Compare</td> -->
                      </tr>
                      <?php $no++; } ?>
                    </tbody>
                  </table>

                  <center>
                  <div class="pagination">
                    <b>Total Pegawai : <?php echo $total_row?></b> <br>
                    <ul>
                      <?=$pagination ?>
                    </ul>
                  </div>
                  </center>
                  <br>
                </div>
                <!-- /widget-content -->

              </div>
            </div>
          </div>
        </div>
        <!-- /span6 -->
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
        <div class="span12"> &copy; 2015 Aplikasi Penilaian Portofolio Pegawai - Kemendikbud. </div>
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
