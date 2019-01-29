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
        Manager
        <small> Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard1') ?>"><i class="fa fa-institution"></i> Home</a></li>
        <li><a href="<?php echo site_url('manager') ?>">Manager</a></li>
		<li class="active">Edit</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
    <?php foreach($pegawai as $p){ ?>
	<h3 class="box-title margin text-center">Edit Data Pegawai</h3>
	<center> <div class="batas"> </div></center>
	<hr/>

	<form class="form-horizontal" action="<?php echo site_url(). '/manager/update'; ?>" role="form" method="post">             
	<div class="form-group">
		<label class="col-sm-4 control-label">NIP </label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="nip" value="<?php echo $p->nip ?>" readonly>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Nama</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="nama" placeholder="Nama Pegawai" value="<?php echo $p->nama ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Alamat</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $p->alamat ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">No. HP</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="no_hp" placeholder="Nomor HP" value="<?php echo $p->no_hp ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Email</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $p->email ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Jabatan </label>
		<div class="col-sm-5">
			<select name="jabatan" class="form-control" required>
				<option value="<?php echo $p->jabatan ?>"><?php echo $p->jabatan ?></option>
				<?php if($p->jabatan == 'Staff'){ ?>
					<option value="Manager">Manager</option>
				<?php } else if($p->jabatan == 'Manager'){ ?>
					<option value="Staff">Staff</option>				
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Divisi </label>
		<div class="col-sm-5">
			<select name="divisi" class="form-control">
				<option value="<?php echo $p->divisi ?>"><?php echo $p->divisi ?></option>
				<?php if($p->divisi == 'Support'){ ?>
					<option value="IT">IT</option>
					<option value="Keuangan">Keuangan</option>
					<option value="HRD">HRD</option>
					<option value="General Manager">General Manager</option>
				<?php } else if($p->divisi == 'IT'){ ?>
					<option value="Support">Support</option>
					<option value="Keuangan">Keuangan</option>
					<option value="HRD">HRD</option>
					<option value="General Manager">General Manager</option>
				<?php } else if($p->divisi == 'General Manager'){ ?>
					<option value="Support">Support</option>
					<option value="IT">IT</option>
					<option value="Keuangan">Keuangan</option>
					<option value="HRD">HRD</option>
				<?php } else if($p->divisi == 'Keuangan'){ ?>
					<option value="Support">Support</option>
					<option value="IT">IT</option>
					<option value="HRD">HRD</option>
					<option value="General Manager">General Manager</option>
				<?php } else { ?>
					<option value="Support">Support</option>
					<option value="IT">IT</option>
					<option value="Keuangan">Keuangan</option>
					<option value="General Manager">General Manager</option>
				<?php } ?>
			</select>
		</div>
	</div>
	  
	  <div class="form-group">
		<label class="col-sm-4 control-label">  </label>
		<div class="col-sm-5">
			<button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
			<a href="<?php echo site_url('manager') ?>" class="btn btn-danger btn-block btn-flat">Cancel</a>
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