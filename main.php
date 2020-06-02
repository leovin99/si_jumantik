<?php 
$title = "Si-Jumantik | Home";
header("Cache-Control: no-store, no-cache, must-revalidate");
require_once("cek_login.inc.php"); 
require_once("connection.inc.php");
require_once("function.inc.php"); 
require_once("header.inc.php"); 
?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">Dashboard</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">

				<div class="panel-heading">Selamat Datang <?php echo $_SESSION['myname']; ?></div>

				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">

							<div class="container">
								<div class="row">

									<div class="col-sm-6">
										<p>Pencarian marker berdasarkan tanggal:</p>
										<form action="cariTanggal">
											<small>Tanggal input awal:</small>
											<input type="date" name="inputTanggal" id="tanggalAwal"><br><br>
											<small>Tanggal input akhir:</small>
											<input type="date" name="inputTanggal" id="tanggalAkhir"><br><br>
											<input type="button" value="Submit" id="tanggalCari">
										</form><br>
									</div>

									<div class="col-sm-6">
										<p>Filter berdasarkan indikasi jentik:</p>
										<form>
											<input type="radio" name="btnRadio" id="semua" checked> <small>Semua</small><br>
											<input type="radio" name="btnRadio" id="bebas_jentik"> <small>Bebas Jentik</small><br>
											<input type="radio" name="btnRadio" id="terindikasi_jentik"> <small>Terindikasi Jentik</small>	
										</form>
									</div>

								</div>
							</div>
							
							<div id='map_canvas'></div>

						</div>						
					</div>
				</div>

			</div>
		</div>
	</div>

</div>

    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAAgY3Vew0LpTLCBR_Sg98TKXrW_8Yk_4o&libraries=geometry"></script>
    <script type='text/javascript'>
		$(window).resize(function () {
          var h = $(window).height(),
            offsetTop = 105;
        
          $('#map_canvas').css('height', (h - offsetTop));
        }).resize();
		
		var map, infoWindow, marker, myMarker;
		var gmarkers = [];
		var map = null;
		var circle = null;
		var geocoder = new google.maps.Geocoder(); //geocoding
		var bounds = new google.maps.LatLngBounds();
		var infoWindow = new google.maps.InfoWindow;

		var customIcons = {
			bebas_jentik: {
				iconku: 'icon/bebasJentik.png'
			},
			terindikasi_jentik: {
				iconku: 'icon/terindikasiJentik.png'
			},
		};
		
        $(function() {				
			//---> mengatasi multiple load Google Maps API
			if(!window.google||!window.google.maps){
				
				var script = document.createElement('script');
				script.type = 'text/javascript';
				script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAAgY3Vew0LpTLCBR_Sg98TKXrW_8Yk_4o&libraries=geometry&callback=initMap';
				document.body.appendChild(script);
			}
			else{
				initMap();
			}
		});
		
		$("#bebas_jentik").click(function(){
			cr = $("#bebas_jentik").is(':checked');
			// alert(cr); 			 
			if (cr == true){
				for(i = 0; i < gmarkers.length; i++){
					marker = gmarkers[i];
					// alert();
					if(marker.mag[0] == "bebas_jentik"){
						marker.setVisible(true);
					}
					else{
						marker.setVisible(false);
					}
				}
			}else
			{
				for(i = 0; i < gmarkers.length; i++){
					marker = gmarkers[i];
					marker.setVisible(true);
				}
			}
		});

		$("#terindikasi_jentik").click(function(){
			cs = $("#terindikasi_jentik").is(':checked');		 
			if (cs == true){
				for(i = 0; i < gmarkers.length; i++){
					marker = gmarkers[i];
					// alert();
					if(marker.mag[0] == "terindikasi_jentik"){
						marker.setVisible(true);
					}
					else{
						marker.setVisible(false);
					}
				}
			}else
			{
				for(i = 0; i < gmarkers.length; i++){
					marker = gmarkers[i];
					marker.setVisible(true);
				}
			}
		});

		$("#semua").click(function(){
			cs = $("#semua").is(':checked');		 
			if (cs == true){
				for(i = 0; i < gmarkers.length; i++){
					marker = gmarkers[i];
					marker.setVisible(true);
				}
			}
		});
		
		//---> membuat marker dan push to gmarkers (array)
		function createMarker(latlng, name, icon, html, kat) {
			var contentString = html;
			var marker = new google.maps.Marker({
				position: latlng,
				title: name,
				icon: icon.iconku,
				animation: google.maps.Animation.DROP,
				mag: kat,
			});
			
			//menempatkan dan menampilkan info window untuk marker
			google.maps.event.addListener(marker, 'click', function() {
				infoWindow.setContent(contentString); 
				infoWindow.open(map,marker);
			});
			
			gmarkers.push(marker);
			//alert(gmarkers.length);

			map.setCenter(marker.position);
			//map.zoom(12);
		}

		//---> mendefinisikan fungsi initMap()
		function initMap(){
			map = new google.maps.Map(document.getElementById('map_canvas'), {
			   center: new google.maps.LatLng(-8.676488,115.211177),
			   zoom: 12,
			   mapTypeId: google.maps.MapTypeId.ROADMAP
			});
			
			// Bagian ini digunakan untuk mendapatkan data format JSON yang dibentuk dalam getmarker.php
			// berbasis Ajax
			$.ajax({
				url: "getmarker.php",
				type: "GET",
				dataType: "json",
				//cache: true,
                success: function(result){
					for(i=0; i < result.data.marker.length;i++){
						var point = new google.maps.LatLng(parseFloat(result.data.marker[i].lat),parseFloat(result.data.marker[i].lng));
						
						if (result.data.marker[i].category == "terindikasi_jentik"){
							var content = '<h4>'+result.data.marker[i].nama+'</h4>' +
								'<b>NIK</b>' +
								'<p>'+result.data.marker[i].nik+'</P>' +
								'<b>Lokasi</b>' +
								'<p>'+result.data.marker[i].alamat+', '+result.data.marker[i].banjar+', '+result.data.marker[i].desa+'</p>'+
								'<b>Tanggal</b>' +
								'<p>'+result.data.marker[i].tanggal+'</p>' +
								'<b>TPA Dalam</b>' +
								'<p>'+result.data.marker[i].tpa_dalam+'</p>' +
								'<b>TPA Luar</b>' +
								'<p>'+result.data.marker[i].tpa_luar+'</p>';
						}else{
							var content = '<h4>'+result.data.marker[i].nama+'</h4>' +
								'<b>NIK</b>' +
								'<p>'+result.data.marker[i].nik+'</P>' +
								'<b>Lokasi</b>' +
								'<p>'+result.data.marker[i].alamat+', '+result.data.marker[i].banjar+', '+result.data.marker[i].desa+'</p>'+
								'<b>Tanggal</b>' +
								'<p>'+result.data.marker[i].tanggal+'</p>';
						}
						
						var type = result.data.marker[i].category;
						var asd = [result.data.marker[i].category];
						//membuat marker
						createMarker(point,result.data.marker[i].name,customIcons[type],content,asd);
					}
			
					if (gmarkers.length > 0){
						for (var i=0; i<gmarkers.length;i++) {
							bounds.extend(gmarkers[i].getPosition());
							gmarkers[i].setMap(map);
						}
						//now fit the map to the newly inclusive bounds
						map.fitBounds(bounds);
					}
                }
			});
			
			google.maps.event.addListener(map, 'click', function() {
				infoWindow.close();
			});
			
			setDefaultMarker();
			
		} //akhir initMap()

		$("#tanggalCari").click(function(){
			removeMarkers();
			var tglAwal = $("#tanggalAwal").val();
			var tglAkhir = $("#tanggalAkhir").val();
			var datastring = 'tgl1='+tglAwal+'&tgl2='+tglAkhir;
			// alert (datastring);
			$.ajax({
				url: "getmarker.php",
				type: "GET",
				dataType: "json",
				data: datastring,
				//cache: true,
                success: function(result){
					for(i=0; i < result.data.marker.length;i++){
						var point = new google.maps.LatLng(parseFloat(result.data.marker[i].lat),parseFloat(result.data.marker[i].lng));
					
						if (result.data.marker[i].category == "terindikasi_jentik"){
							var content = '<h4>'+result.data.marker[i].nama+'</h4>' +
								'<b>NIK</b>' +
								'<p>'+result.data.marker[i].nik+'</P>' +
								'<b>Lokasi</b>' +
								'<p>'+result.data.marker[i].alamat+', '+result.data.marker[i].banjar+', '+result.data.marker[i].desa+'</p>'+
								'<b>Tanggal</b>' +
								'<p>'+result.data.marker[i].tanggal+'</p>' +
								'<b>TPA Dalam</b>' +
								'<p>'+result.data.marker[i].tpa_dalam+'</p>' +
								'<b>TPA Luar</b>' +
								'<p>'+result.data.marker[i].tpa_luar+'</p>';
						}else{
							var content = '<h4>'+result.data.marker[i].nama+'</h4>' +
								'<b>NIK</b>' +
								'<p>'+result.data.marker[i].nik+'</P>' +
								'<b>Lokasi</b>' +
								'<p>'+result.data.marker[i].alamat+', '+result.data.marker[i].banjar+', '+result.data.marker[i].desa+'</p>'+
								'<b>Tanggal</b>' +
								'<p>'+result.data.marker[i].tanggal+'</p>';
						}
						
						var type = result.data.marker[i].category;
						var asd = [result.data.marker[i].category];
						//membuat marker
						createMarker(point,result.data.marker[i].name,customIcons[type],content,asd);
					}
			
					if (gmarkers.length > 0){
						for (var i=0; i<gmarkers.length;i++) {
							bounds.extend(gmarkers[i].getPosition());
							gmarkers[i].setMap(map);
						}
						//now fit the map to the newly inclusive bounds
						map.fitBounds(bounds);
					}
                }
			});

		});

		//---> menset default marker
		function setDefaultMarker(){
			if (myMarker != null){
				myMarker.setMap(null);
			}
			
			myMarker = new google.maps.Marker({
				position: new google.maps.LatLng(-8.676156560668673,115.20589841265871),
				icon: 'icon/position.png',
			}); 
			
			myMarker.setMap(map);
		}

		function removeMarkers(){
     	var i;
     	for(i=0;i<gmarkers.length;i++){
				gmarkers[i].setMap(null);
			}
			gmarkers = [];
		}
    </script>

<?php include("footer.inc.php"); ?> 