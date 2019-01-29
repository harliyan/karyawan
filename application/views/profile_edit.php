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
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header">
	<h1>
        Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard1') ?>"><i class="fa fa-id-card"></i> Home</a></li>
        <li><a href="<?php echo site_url('profile') ?>">Profile</a></li>
		<li class="active">Edit</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
    <?php foreach($user_admin as $u){ 
    	
	?>
	<h3 class="box-title margin text-center">Edit Profile</h3>
	<center> <div class="batas"> </div></center>
	<hr/>

	<form class="form-horizontal" action="<?php echo site_url(). '/profile/update'; ?>" role="form" method="post">             
	<div class="form-group">
		<label class="col-sm-4 control-label">NIP </label>
		<div class="col-sm-5">
			<input type="hidden" class="form-control" name="idadmin" value="<?php echo $u->idadmin ?>" readonly>
			<input type="text" class="form-control" name="nip" value="<?php echo $u->nip ?>" readonly>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Username</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $u->username ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Password</label>
		<div class="col-sm-5">
			<input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $u->password ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Nama</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="nama" placeholder="Nama Pegawai" value="<?php echo $u->nama ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Nomor HP</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="nama" placeholder="Nomor HP" value="<?php echo $u->no_hp ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Alamat</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $u->alamat ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Email</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $u->email ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Jabatan </label>
		<div class="col-sm-5">

			<select name="jabatan" class="form-control" readonly>
				<option value="<?php echo $u->jabatan ?>"><?php echo $u->jabatan ?></option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Divisi </label>
		<div class="col-sm-5">
			<select name="divisi" class="form-control" readonly>
				<option value="<?php echo $u->divisi ?>"><?php echo $u->divisi ?></option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-4 control-label">Privileges </label>
		<div class="col-sm-5">
			<select name="privileges" class="form-control" readonly>
				<option value="<?php echo $u->privileges ?>"><?php echo $u->privileges ?></option>
			</select>
		</div>
	</div>	
	  
	  <div class="form-group">
		<label class="col-sm-4 control-label">  </label>
		<div class="col-sm-5">
			<button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
			<a href="<?php echo site_url('profile') ?>" class="btn btn-danger btn-block btn-flat">Cancel</a>
		</div>
	  </div> 
	</form> 
	<?php } ?>
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