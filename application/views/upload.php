<?php
$this->load->view('template/head');

?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />

<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
error_reporting(E_ALL ^ E_DEPRECATED);
$user1 = $_SESSION['nama'];
include "template/koneksi.php";
$query = mysql_query("SELECT * from admin where username = '$user1'");
                
if($query === FALSE) { 
die(mysql_error()); // TODO: better error handling
}

                while($row = mysql_fetch_array($query))
                { 
                    $foto = $row['foto'];
                    $nip = $row['nip'];

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header">
	<h1>
        Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard1') ?>"><i class="fa fa-user-secret"></i> Home</a></li>
        <li class="active">Profile</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
    <div class="row"><h2 class="col-lg-1 margin text-right">Profile</h2></div>
	<center> <div class="batas"> </div></center>
	            
	<!--<div class="row">
		<center>
			<img src="<?php echo base_url('gambar/'.$foto) ?>" class="img-circle" alt="User Image"/><br>
			<?php } ?>
			<?php echo form_open_multipart('upload/aksi_upload'); ?>
				<div class="col-sm-12 control-label"> <input type="file" name="berkas" /> <br>
				<input type="submit" value="Upload" /></div>
			</form> 
		</center>		
	</div>-->
	<!--<form class="form-horizontal" action="<?php echo form_open_multipart('upload/aksi_upload'); ?>" role="form" method="post">-->
	
	
	<?php echo form_open_multipart('upload/aksi_upload'); ?>
	<div class="form-group">
	<div class="col-sm-8">
	<div class="col-sm-3"><input type="hidden" name="nip" value="<?php echo $nip; ?>"><br>
	 <img src="<?php echo base_url('gambar/'.$foto) ?>" class="img-circle" alt="User Image" width="160"/><br><br><br>
	</div>
	<div class="col-sm-5">
		<br><br><input type="file" name="berkas"/><br>
	</div>
	<div class="col-sm-5">
		<input type="submit" value="Upload"/>
	</div>
	</div></div>
	</form>
	
	
</section><!-- /.content -->


<?php
$this->load->view('template/js');
?>

<!--tambahkan custom js disini-->
<!-- jQuery UI 1.11.2 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/js/raphael-min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.min.js') ?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/knob/jquery.knob.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script>

<?php
$this->load->view('template/foot');
?>