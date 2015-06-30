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
							var vurl=ci_baseurl+"/komparasi/autocomp";
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
				var base_url=window.location.protocol+"//"+window.location.host+"/";
				var inner_html = '<a><div class="list_item_container_auto"><div class="image_auto"><img src="' + base_url + 'asset/img/' + item.image + '"></div><div class="label_auto">' + item.label + '</div><div class="description_auto">' + item.nama + '</div></div></a>';
        return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
    };

	$('#add_compare').click(function(){
		openModal();
		var rowIndex = $('tr:last-child').parent().children().index($('tr:last-child')) + 1;
		//var colIndex = $('td:last-child').parent().children().index($('td:last-child')) + 1;
		var ci_baseurl = "<?php echo base_url(); ?>";
		var vurl=ci_baseurl+"/komparasi/add_compare";
		//var vurl=window.location.protocol+"//"+window.location.host+"/komparasi/add_compare";
		var nip = $("#autocomp").val();
		var datareq = "term="+nip;
		var n = 0;
		var setcolumn = "";
		var base_url=ci_baseurl+"/asset/img/";
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
						setcolumn += "<img src=\""+base_url+data[0]+"\" class=\"img-thumbnail img-responsive\">";
					}
					else if (n == 13) {
						setcolumn += "<center><a href=\"javascript:void(0)\" onclick=\"hapus('ok')\" class=\"btn btn-danger\"><i class=\"icon-remove icon-white\"></i> Hapus</a></center>";
					}
					else if (n  > 6 && n < 13) {
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

	$('.subnavbar').find ('li').each (function (i) {
		var mod = i % 3;
		if (mod === 2) {
			$(this).addClass ('subnavbar-open-right');
		}
	});

});
