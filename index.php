<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Tugas KL PAP</title>

  <!-- CSS  -->
 
  <link href="css/materialize.css" type="text/css" rel="stylesheet" />
  <link href="css/style.css" type="text/css" rel="stylesheet"/>
  <script>
  function submit()
{
alert("Terimakasih sudah mendaftar");
 document.getElementById("myform").reset();
return true;
}
function reset() {
    document.getElementById("myform").reset();
}
</script>
</head>
<body class="grey lighten-4">

  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
  
    <div class="container">
		<br><br>	
	   <div class="white">
			 <div class="row">
			 
				<div class="col s12">
				<img src="header_bca.png" class="responsive-img" align="center" height="100px" width="20000px">
					<h2 class="valign">Pendaftaran Nasabah Bank BCA<h2>
				</div>
				<div class="col s4">
					<h1  align="center">Nama Nasabah </h1>
					<h1>Alias (apabila ada)</h1>
					<h1>Jenis Kelamin</h1>
					<h1>Tanggal Lahir</h1>
					<h1>Tanda Pengenal</h1>
					<h1>Bertindak Sebagai</h1>
					<h1 style="margin-bottom:80px;">Alamat</h1>
					<h1>No Telephone</h1>
					<h1>No Handphone</h1>
					<h1>Upload Foto</h1>
					
					
				</div>
				<div class="col s8">
					<div class="row">
						<form class="col s12" id="myform" onSubmit="return submit()">
						  <div class="row">
							<div class="input-field col s12">
							  <i class="mdi-action-account-circle prefix"></i>
							  <input id="icon_prefix" type="text"  class="validate" length="120">
							  
							  <label for="icon_prefix">Nama Lengkap</label>
							</div>
							<div class="input-field col s12">
							  <i class="mdi-action-account-box prefix"></i>
							  <input id="icon_telephone" type="tel" class="validate" length="13">
							  <label for="icon_telephone">Alias</label>
							</div>
							<div class="input-field col s12">	
								<p style="margin-top:-6px;">
									 <input name="group1" type="radio" id="test1"  />
									 <label for="test1" style="margin-right:50px;">Laki - Laki</label>
									 <input name="group1" type="radio" id="test2" />
									<label for="test2" >Perempuan</label>	
								</p>
							</div>
							<div class="input-field col s12">
					
								<input type="date" class="datepicker" placeholder="Tanggal lahir" style="margin-top:31px;">
								
							</div>
						   <div class="input-field col s12">
							<select>
							  <option value="" disabled selected>Pilih Tanda Pengenal </option>
							  <option value="1">KTP (Kartu Tanda Penduduk)</option>
							  <option value="2">SIM (Surat Ijin Mengemudi)</option>
							  <option value="3">lain - lain</option>
							</select>
							<label>Tanda Pengenal</label>
						  </div>
						   <div class="input-field col s12">
							<select>
							  <option value="" disabled selected>Pilih Bertindak Sebagai</option>
							  <option value="1">Pribadi/Perseorangan</option>
							  <option value="2">Publik/Organisasi</option>
							  <option value="3">lain - lain</option>
							</select>
							<label>Bertindak Sebagai</label>
						  </div>
						   <div class="input-field col s6" >
						   
						   <!---->
							<select class="browser-default" name="prop" id="prop" style="margin-top:-10px;" onchange="ajaxkota(this.value)">
							  <option value="">Pilih Provinsi</option>
							 <?php 
								$queryProvinsi=mysql_query("SELECT * FROM inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama");
								while ($dataProvinsi=mysql_fetch_array($queryProvinsi)){
									echo '<option value="'.$dataProvinsi['lokasi_propinsi'].'">'.$dataProvinsi['lokasi_nama'].'</option>';
								}
							?>
							</select>
							
						  </div>

						 <div class="input-field col s6">
								<select class="browser-default" style="margin-top:-10px; name="kota" id="kota" onchange="ajaxkec(this.value)">
							  <option value="">Pilih Kota</option>
								
							</select>
							
						  </div>
						  <div class="input-field col s6">
								<select class="browser-default" name="kec" id="kec" onchange="ajaxkel(this.value)">
							  <option value="">Pilih Kecamatan</option>
							</select>
							
						  </div>
						   <div class="input-field col s6">
								<select class="browser-default" name="kel" id="kel">
							 <option value="">Pilih Kelurahan/Desa</option>
							</select>
							
						  </div>
						  <div class="input-field col s12">
							  <i class="mdi-communication-phone prefix"></i>
							  <input id="icon_telephone" type="tel" class="validate" length="13">
							  <label for="icon_telephone">+kode</label>
							</div>
							<div class="input-field col s12">
							  <i class="mdi-hardware-smartphone prefix"></i>
							  <input id="icon_hp" type="tel" class="validate" length="13">
							  <label for="icon_hp">+62</label>
							</div>
						  <div class="file-field input-field col s12">
						 
						   <i class="mdi-image-photo-library prefix"></i>
							  <input class="file-path validate" type="text"/>
							  <div class="btn">
								<span>File</span>
								<input type="file" />
							  </div>
							</div>
						  </div>
						  <div class="progress">
							  <div class="determinate" style="width: 100%"></div>
						  </div>
						  <div class="file-field input-field col s11" style="margin-top:-5px;margin-left:-50px">
							  <input style="margin-top:-5px;margin-left:-10px" type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
							  <label for="filled-in-box">Saya menyetujui ketentuan - ketentuan dan tata tertib yang berlaku dalam menjadi nasabah bank BCA, dan saya bertanggung jawab atas kebenaran data - data ini</label>
						</div>
						<div class="input-field col s6" style="margin-top:30px;margin-left:-5px">
						<a class="waves-effect waves-light btn" onClick="submit()">Submit</a>
						<a class="waves-effect light-blue lighten-1 btn" onclick="reset()" value="reset form">Reset</a>
						</div>
						
						</form>
					  </div>
				</div>
    </div>
	   </div>
    </div>
	<br><br>
  </div>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
	 Best View <a class="orange-text text-lighten-3">Google Chrome</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  

   <script src="js/ajax_kota.js"></script>
  
 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/pickadate.js"></script>
  <script src="js/init.js"></script>
  </body>
</html>
