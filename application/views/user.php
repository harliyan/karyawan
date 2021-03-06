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
    	$hak = $row['privileges'];
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header">
	<h1>
        User
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard1') ?>"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">User</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
	
    <div class="box-body">
		<div class="pull-right">
			<a href="<?php echo site_url('pdfreport/cetakpdf_user') ?>" class="btn btn-primary btn-flat"><i class="fa fa-download"></i> Download</a>
			<?php if($hak == 'admin'){ ?>
			<a href="<?php echo site_url('user/tambah') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Data</a>
			<?php } ?>
		</div>
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr class="text-blue">
					<th class="col-sm-0">No.</th>
					<th class="col-sm-0">NIP</th>
					<th class="col-sm-0">Username</th>
					<th class="col-sm-2">Nama</th>
					<th class="col-sm-2">Alamat</th>
					<th class="col-sm-2">No. HP</th> 
					<th class="col-sm-1">Email</th>
					<th class="col-sm-1">Jabatan</th>		
					<th class="col-sm-1">Divisi</th>
					<th class="col-sm-0">Privileges</th>
					<?php if($hak == 'admin'){ ?>
					<th class="col-sm-2">Opsi</th> <?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($user_admin as $u){ 
					?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $u -> nip ?></td>
						<td><?php echo $u -> username ?></td>
						<td><?php echo $u -> nama ?></td>
						<td><?php echo $u -> alamat?></td>
						<td><?php echo $u -> no_hp ?></td>
						<td><?php echo $u -> email ?></td>
						<td><?php echo $u -> jabatan ?></td>
						<td><?php echo $u -> divisi ?></td>
						<td><?php echo $u -> privileges ?></td>
						<td><?php if($hak == 'admin'){ ?>
							<?php echo anchor('user/edit/'.$u->nip,'<i class="fa fa-pencil"></i> Edit'); ?> |
							<?php echo anchor('user/hapus/'.$u->nip,'<i class="fa fa-trash"></i> Hapus'); ?> <?php }} ?>
						</td>
					<?php
					}
					?>
			</tbody>
		</table>
	</div>
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