<?php
  if($this->session->userdata('isLogin')){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Beranda - Portofolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/jquery-ui/jquery-ui.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset/css/pages/dashboard.css" rel="stylesheet">
</head>
<body>
  
  
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="index.html">Aplikasi Penilaian Portofolio Pegawai  </a>

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
        <li class="active"><a href="<?php echo base_url(); ?>beranda"><i class="icon-home"></i><span>Beranda</span> </a> </li>
        <li><a href="<?php echo base_url(); ?>pegawai"><i class="icon-group"></i><span>Pegawai</span> </a> </li>
        <li><a href="<?php echo base_url(); ?>komparasi"><i class="icon-archive"></i><span>Komparasi</span> </a></li>

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
        <div class="span7">
        <div class="row">
        <div class="span7">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Top List Pegawai</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="tabbable">
						   <ul class="nav nav-tabs">
						    <li   class="active">
						     <a href="#eselon1" data-toggle="tab" id="ckeselon1">Eselon 1</a>
						    </li>
						    <li><a href="#eselon2" data-toggle="tab" id="ckeselon2">Eselon 2</a></li>
                <li><a href="#eselon3" data-toggle="tab" id="ckeselon3">Eselon 3</a></li>
                <li><a href="#eselon4" data-toggle="tab" id="ckeselon4">Eselon 4</a></li>
                <li><a href="#staff" data-toggle="tab" id="ckstaff">Staff</a></li>
						   </ul>
							<div class="tab-content">
								<div class="tab-pane active" id="eselon1"></div>
								<div class="tab-pane" id="eselon2"></div>
                <div class="tab-pane" id="eselon3"></div>
                <div class="tab-pane" id="eselon4"></div>
                <div class="tab-pane" id="staff"></div>
							</div>
						</div>
            </div>
            <!-- /widget-content -->
          </div>
        </div>
        <div class="span7">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Top List Berdasarkan Aspek</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="tabbable">
               <ul class="nav nav-tabs">
                <li   class="active">
                 <a href="#administrasi" data-toggle="tab" id="ckadministrasi">Administrasi</a>
                </li>
                <li><a href="#skp" data-toggle="tab" id="ckskp">Perilaku Kerja</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="administrasi"></div>
                <div class="tab-pane" id="skp"> <div><center><b>Data Kosong</b></center></div> </div>
              </div>
            </div>
            </div>
            <!-- /widget-content -->
          </div>
        </div>
        </div>
        </div>
        <div class="span5">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Diklat Pimpinan</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts">
                <a href="<?php echo base_url();?>pegawai/dikpim/1" class="shortcut">
                  <span class="shortcut-label"> <h1><?php echo $pim1;?></h1> DiklatPim 1</span>
                </a>
                <a href="<?php echo base_url();?>pegawai/dikpim/2" class="shortcut">
                  <span class="shortcut-label"><h1><?php echo $pim2;?></h1>DiklatPim 2</span>
                </a>
                <a href="<?php echo base_url();?>pegawai/dikpim/3" class="shortcut">
                  <span class="shortcut-label"><h1><?php echo $pim3;?></h1>DiklatPim 3</span>
                </a>
                <a href="<?php echo base_url();?>pegawai/dikpim/4" class="shortcut">
                  <span class="shortcut-label"><h1><?php echo $pim4;?></h1>DiklatPim 4</span>
                </a>
              </div>
              <!-- /shortcuts -->
            </div>
            <!-- /widget-content -->
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

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>asset/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>asset/js/bootstrap.js"></script>
<script>
  $(document).ready(function() {
    var ci_baseurl = "<?php echo base_url(); ?>";
		var vurl=ci_baseurl+"beranda/get_toplist";
    var datareqa = "eselon=1&limit=10&persen=0";

    var icek = $("#eselon1").html();
    if (icek == "") {
      $("#eselon1").html('<div><center><img src="'+ci_baseurl+'asset/img/loading.gif"><br><b>Menghitung</b></center></div>');
      $.ajax({
  			url: vurl,
  			data: datareqa,
  			type: "GET",
  			success: function(data){
  				$("#eselon1").html(data);
  			},
        error: function (xhr, ajaxOptions, thrownError){
          $("#eselon1").html('<div class="alert alert-error">Server Error !</div><center><a href="javascript:;" class="btn btn-primary" id="rtyeselon1"><i class="icon-refresh"></i> Refresh</a></center>');
        }
  		});
    }

    $("#eselon1").on("click","#rtyeselon1",function(){
      var datareqa = "eselon=1&limit=10&persen=0";
      $("#eselon1").html("");
      $("#eseleon").html('<div><center><img src="'+ci_baseurl+'asset/img/loading.gif"><br><b>Menghitung</b></center></div>');
      $.ajax({
        url: vurl,
        data: datareqa,
        type: "GET",
        success: function(data){
          $("#eselon1").html(data);
        },
        error: function (xhr, ajaxOptions, thrownError){
          $("#eselon1").html('<div class="alert alert-error">Server Error !</div><center><a href="javascript:;" class="btn btn-primary" id="rtyeselon1"><i class="icon-refresh"></i> Refresh</a></center>');
        }
      });
    });

    $("#ckeselon2").click(function(){
      var datareqb = "eselon=2&limit=10&persen=0";
      var cek = $("#eselon2").html();

      if (cek == "") {
        $("#eselon2").html('<div><center><img src="'+ci_baseurl+'asset/img/loading.gif"><br><b>Menghitung</b></center></div>');
        $.ajax({
    			url: vurl,
    			data: datareqb,
    			type: "GET",
    			success: function(data){
    				$("#eselon2").html(data);
    			},
          error: function (xhr, ajaxOptions, thrownError){
            $("#eselon2").html('<div class="alert alert-error">Server Error !</div><center><a href="javascript:;" class="btn btn-primary" id="rtyeselon2"><i class="icon-refresh"></i> Refresh</a></center>');
          }
    		});
      }
    });

    $("#eselon2").on("click","#rtyeselon2",function(){
      var datareqb = "eselon=2&limit=10&persen=0";
      $("#eselon2").html("");
      $("#eselon2").html('<div><center><img src="'+ci_baseurl+'asset/img/loading.gif"><br><b>Menghitung</b></center></div>');
      $.ajax({
        url: vurl,
        data: datareqb,
        type: "GET",
        success: function(data){
          $("#eselon2").html(data);
        },
        error: function (xhr, ajaxOptions, thrownError){
          $("#eselon2").html('<div class="alert alert-error">Server Error !</div><center><a href="javascript:;" class="btn btn-primary" id="rtyeselon2"><i class="icon-refresh"></i> Refresh</a></center>');
        }
      });
    });

    $("#ckeselon3").click(function(){
      var datareqc = "eselon=3&limit=10&persen=0";
      var cek = $("#eselon3").html();

      if (cek == "") {
        $("#eselon3").html('<div><center><img src="'+ci_baseurl+'asset/img/loading.gif"><br><b>Menghitung</b></center></div>');
        $.ajax({
    			url: vurl,
    			data: datareqc,
    			type: "GET",
    			success: function(data){
    				$("#eselon3").html(data);
    			},
          error: function (xhr, ajaxOptions, thrownError){
            $("#eselon3").html('<div class="alert alert-error">Server Error !</div><center><a href="javascript:;" class="btn btn-primary" id="rtyeselon3"><i class="icon-refresh"></i> Refresh</a></center>');
          }
    		});
      }
    });

    $("#eselon3").on("click","#rtyeselon3",function(){
      var datareqc = "eselon=3&limit=10&persen=0";
      $("#eselon3").html("");
      $("#eselon3").html('<div><center><img src="'+ci_baseurl+'asset/img/loading.gif"><br><b>Menghitung</b></center></div>');
      $.ajax({
        url: vurl,
        data: datareqc,
        type: "GET",
        success: function(data){
          $("#eselon3").html(data);
        },
        error: function (xhr, ajaxOptions, thrownError){
          $("#eselon3").html('<div class="alert alert-error">Server Error !</div><center><a href="javascript:;" class="btn btn-primary" id="rtyeselon3"><i class="icon-refresh"></i> Refresh</a></center>');
        }
      });
    });

    $("#ckeselon4").click(function(){
      var datareqd = "eselon=4&limit=10&persen=0";
      var cek = $("#eselon4").html();

      if (cek == "") {
        $("#eselon4").html('<div><center><img src="'+ci_baseurl+'asset/img/loading.gif"><br><b>Menghitung</b></center></div>');
        $.ajax({
    			url: vurl,
    			data: datareqd,
    			type: "GET",
    			success: function(data){
    				$("#eselon4").html(data);
    			},
          error: function (xhr, ajaxOptions, thrownError){
            $("#eselon4").html('<div class="alert alert-error">Server Error !</div><center><a href="javascript:;" class="btn btn-primary" id="rtyeselon4"><i class="icon-refresh"></i> Refresh</a></center>');
          }
    		});
      }
    });

    $("#eselon4").on("click","#rtyeselon4",function(){
      var datareqe = "eselon=Staff&limit=10&persen=0";
      $("#eselon4").html("");
      $("#eselon4").html('<div><center><img src="'+ci_baseurl+'asset/img/loading.gif"><br><b>Menghitung</b></center></div>');
      $.ajax({
        url: vurl,
        data: datareqe,
        type: "GET",
        success: function(data){
          $("#staff").html(data);
        },
        error: function (xhr, ajaxOptions, thrownError){
          $("#eselon4").html('<div class="alert alert-error">Server Error !</div><center><a href="javascript:;" class="btn btn-primary" id="rtyeselon4"><i class="icon-refresh"></i> Refresh</a></center>');
        }
      });
    });

    $("#ckstaff").click(function(){
      var datareqe = "eselon=Staff&limit=10&persen=0";
      var cek = $("#staff").html();

      if (cek == "") {
        $("#staff").html('<div><center><img src="'+ci_baseurl+'asset/img/loading.gif"><br><b>Menghitung</b></center></div>');
        $.ajax({
          url: vurl,
          data: datareqe,
          type: "GET",
          success: function(data){
            $("#staff").html(data);
          },
          error: function (xhr, ajaxOptions, thrownError){
            $("#staff").html('<div class="alert alert-error">Server Error !</div><center><a href="javascript:;" class="btn btn-primary" id="rtystaff"><i class="icon-refresh"></i> Refresh</a></center>');
          }
        });
      }
    });

    $("#staff").on("click","#rtystaff",function(){
      var datareqe = "eselon=Staff&limit=10&persen=0";
      $("#staff").html("");
      $("#staff").html('<div><center><img src="'+ci_baseurl+'asset/img/loading.gif"><br><b>Menghitung</b></center></div>');
      $.ajax({
        url: vurl,
        data: datareqe,
        type: "GET",
        success: function(data){
          $("#staff").html(data);
        },
        error: function (xhr, ajaxOptions, thrownError){
          $("#staff").html('<div class="alert alert-error">Server Error !</div><center><a href="javascript:;" class="btn btn-primary" id="rtystaff"><i class="icon-refresh"></i> Refresh</a></center>');
        }
      });
    });


    //aspek administrasi
    var datareqx = "eselon=0&limit=10&persen=1";
      var cekx = $("#administrasi").html();

      if (cekx == "") {
        $("#administrasi").html('<div><center><img src="'+ci_baseurl+'asset/img/loading.gif"><br><b>Menghitung</b></center></div>');
        $.ajax({
          url: vurl,
          data: datareqx,
          type: "GET",
          success: function(data){
            $("#administrasi").html(data);
          },
          error: function (xhr, ajaxOptions, thrownError){
            $("#administrasi").html('<div class="alert alert-error">Server Error !</div><center><a href="javascript:;" class="btn btn-primary" id="rtyadministrasi"><i class="icon-refresh"></i> Refresh</a></center>');
          }
        });
      }

    $("#administrasi").on("click","#rtyadministrasi",function(){
      var datareqx = "eselon=0&limit=10&persen=0";
      $("#administrasi").html("");
      $("#administrasi").html('<div><center><img src="'+ci_baseurl+'asset/img/loading.gif"><br><b>Menghitung</b></center></div>');
      $.ajax({
        url: vurl,
        data: datareqx,
        type: "GET",
        success: function(data){
          $("#administrasi").html(data);
        },
        error: function (xhr, ajaxOptions, thrownError){
          $("#administrasi").html('<div class="alert alert-error">Server Error !</div><center><a href="javascript:;" class="btn btn-primary" id="rtyadministrasi"><i class="icon-refresh"></i> Refresh</a></center>');
        }
      });
    });

  });
</script>
</body>
</html>
<?php
  }
  else{
    show_404();
  }
?>
