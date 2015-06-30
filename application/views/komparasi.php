<?php
  if($this->session->userdata('isLogin')){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Komparasi - Portofolio</title>
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
  <div class="laod-fadec" id="fadec"></div>
  <div class="load-modalc" id="modalc">
    <img id="loader" src="<?php echo base_url(); ?>asset/img/loading.gif" />
  </div>
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
        <li><a href="<?php echo base_url(); ?>beranda"><i class="icon-home"></i><span>Beranda</span> </a> </li>
        <li><a href="<?php echo base_url(); ?>pegawai"><i class="icon-group"></i><span>Pegawai</span> </a> </li>
        <li class="active"><a href="<?php echo base_url(); ?>komparasi"><i class="icon-archive"></i><span>Komparasi</span> </a></li>

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
        <div class="span3 pull-right">
          <div class="widget">
            <div class="widget-content">
              <form class="form-inline" style="margin-bottom:10px">
                <input type="text" class="input-medium" id="autocomp" placeholder="NIP">
                <a class="btn btn-lg btn-primary" id="add_compare">&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-plus icon-white"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
              </form>
            </div>

          </div>
        </div>
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Daftar Komparasi</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table id="my_table" class="table table-striped table-responsive" width="100%">
                <tr>
                  <td width="20%"><b>Foto</b></td>
                </tr>
                <tr>
                  <td><b>NIP</b></td>
                </tr>
                <tr>
                  <td><b>Nama</b></td>
                </tr>
                <tr>
                  <td><b>Masa Kerja</b></td>
                </tr>
                <tr>
                  <td><b>Riwayat Jabatan</b></td>
                </tr>
                <tr>
                  <td><b>Riwayat Golongan</b></td>
                </tr>
                <tr>
                  <td><b>Riwayat Pendidikan</b></td>
                </tr>
                <tr>
                  <td><b>Riwayat Diklat</b></td>
                </tr>
                <tr>
                  <td><b>Riwayat Kursus</b></td>
                </tr>
                <tr>
                  <td><b>Riwayat Tanda Jasa</b></td>
                </tr>
                <tr>
                  <td><b>Aspek Administrasi</b></td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;- Nilai Pendidikan</td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;- Nilai Diklat Pimpinan</td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;- Nilai Diklat Teknis</td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;- Nilai Pangkat</td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;- Nilai Masa Kerja</td>
                </tr>
                <tr>
                  <td><b>Total Aspek Administrasi</b></td>
                </tr>
                <tr>
                  <td><b>Nilai Aspek Administrasi (30%)</b></td>
                </tr>
                <tr>
                  <td><b>Aspek Perilaku Kerja</b></td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;- Nilai Orientasi Pelayanan</td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;- Nilai Integritas</td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;- Nilai Komitemen</td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;- Nilai Displin</td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;- Nilai Kerasama</td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;- Nilai Kepemimpinan</td>
                </tr>
                <tr>
                  <td><b>Total Aspek Perilaku Kerja</b></td>
                </tr>
                <tr>
                  <td><b>Nilai Aspek Perilaku Kerja (70%)</b></td>
                </tr>
                <tr>
                  <td></td>
                </tr>
                <tr>
                  <td><b>Total Nilai</b></td>
                </tr>
                <tr>
                  <td></td>
                </tr>
              </table>
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
        <div class="span12"> &copy; 2015 Aplikasi Penilaian Portofolio Pegawai  - Kemendikbud. </div>
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
var ok = 0;

function hapus(req) {
	if (req = 'ok' ) {
		ok = 1;
	}else {
		ok = 0;
	}
}

function openModal() {
        document.getElementById('modalc').style.display = 'block';
        document.getElementById('fadec').style.display = 'block';
}

function closeModal() {
    document.getElementById('modalc').style.display = 'none';
    document.getElementById('fadec').style.display = 'none';
}

$(function () {

	$("#autocomp").autocomplete({
		source: function(request,response)
						{
							var ci_baseurl = "<?php echo base_url(); ?>";
							var vurl=ci_baseurl+"komparasi/autocomp";
							$.ajax({
								url: vurl,
								data: request,
								dataType: "json",
								type: "GET",
								success: function(data){
									response(data);
								}
							});
						},
		minLength: 3
	}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
				// var base_url=window.location.protocol+"//"+window.location.host+"/";
        var ci_baseurl = "<?php echo base_url(); ?>";
				var inner_html = '<a><div class="list_item_container_auto"><div class="image_auto"><img src="' + ci_baseurl + 'asset/img/' + item.image + '"></div><div class="label_auto">' + item.label + '</div><div class="description_auto">' + item.nama + '</div></div></a>';
        return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
    };

  $("#autocomp").on( "keypress", function(event) {
    if (event.which == 13 && !event.shiftKey) {
        event.preventDefault();
        $("#add_compare").click();
    }
  }); 

	$('#add_compare').click(function(){
		openModal();
		var rowIndex = $('tr:last-child').parent().children().index($('tr:last-child')) + 1;
		//var colIndex = $('td:last-child').parent().children().index($('td:last-child')) + 1;
		var ci_baseurl = "<?php echo base_url(); ?>";
		var vurl=ci_baseurl+"komparasi/add_compare";
		//var vurl=window.location.protocol+"//"+window.location.host+"/komparasi/add_compare";
		var nip = $("#autocomp").val();
		var datareq = "term="+nip;
		var n = 0;
		var setcolumn = "";
		var base_url=ci_baseurl+"asset/img/";
		//var ncolomn = 75;
		//ncolomn = ncolomn/colIndex;
		$.ajax({
			url: vurl,
			data: datareq,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				$("#autocomp").val("");
				//$('td').attr('width', ncolomn+"%");
				for (var i = 1; i <= rowIndex; i++) {
					setcolumn +="<td>";

					if (n == 0) {
						setcolumn += "<center><img src=\""+data[0]+"\" class=\"img-polaroid img-responsive\" width=\"160px\" height=\"240px\"></center>";
					}
					else if (n == 29) {
						setcolumn += "<a href=\"javascript:void(0)\" onclick=\"hapus('ok')\" class=\"btn btn-danger\"><i class=\"icon-remove icon-white\"></i> Hapus</a>";
					}
					else if (n  > 3 && n < 10) {
						//setcolumn += n;
						for (var m = 0; m < data[n].length; m++) {
							for (var x = 0; x < data[n][m].length; x++) {
								setcolumn += data[n][m][x];
								setcolumn += "<br>";
							}
						}
					}
					else {
						setcolumn += data[n];
					}

					setcolumn +="</td>";
					$('#my_table tr:nth-child('+i+')').append(setcolumn);
					setcolumn = "";
					n = n + 1;
				}

				closeModal();
			}
		});


	});

	$("#my_table").on("click", "td", function(){
		var row_index = $(this).parent().index('tr');
		var col_index = $(this).index('tr:eq('+row_index+') td');
		if (ok == 1) {
			var ichild = col_index + 1;
			$('#my_table td:nth-child('+ichild+')').remove();
			ok = 0;
		}
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
