<html>
<head>
	<title>malasngoding.com</title>
</head>
<body>
<?php error_reporting(E_ALL ^ E_DEPRECATED);
$user1 = $_SESSION['nama'];
include "template/koneksi.php";
$query = mysql_query("SELECT * from admin where username = '$user1'");
$first = true;            
if($query === FALSE) { 
die(mysql_error()); // TODO: better error handling
}

                while($row = mysql_fetch_array($query))
                { 
                    $idadmin = $row['idadmin']; ?>

	<center><h1>Membuat Upload File Dengan CodeIgniter | MalasNgoding.com </h1>
	</center>

	<ul>
		<form class="form-horizontal" action="<?php echo site_url('profile/upload_foto'); ?>" role="form" method="post">  
			<?php foreach ($upload_data as $item => $value):?>
				<!--<li><?php echo $item;?>: <?php echo $value;?></li>-->
				<?php if($first){ 
					$foto = $value; ?>
					<input type="hidden" id="idadmin" name="idadmin" value="<?php echo $idadmin; ?>">
					<input type="hidden" id="foto" name="foto" value="<?php echo $foto; ?>">
					<?php $first=false; ?>
				<?php } ?>
			<?php endforeach; ?> <?php } ?>
		</form>
		<script type="text/javascript">document.getElementsByTagName('form')[0].submit();</script>	
	</ul>	

</body>
</html>