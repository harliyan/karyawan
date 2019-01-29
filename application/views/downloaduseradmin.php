<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<div class="box-body mdl-cell--12-col">

    <h3 class="mdl-cell mdl-cell--12-col">Data User </h3>
   
    <div class="mdl-cell--12-col panel panel-default ">
        <div class="panel-body">
         
            <table width="100%"  class="table table-condensed" border ="1" border-collapse="collapse">
                <thead>

                    <tr>   
                        <th data-field="nip">NIP</th>
                        <th data-field="nama">Nama</th>
                        <th data-field="alamat">Alamat</th>
                        <th data-field="nomor">Nomor HP</th>
                        <th data-field="email">Email</th>
                        <th data-field="jabatan">Jabatan</th>                   
                        <th data-field="divisi">Divisi</th>
                        <th data-field="divisi">Privileges</th>
                    </tr>    
                </thead>
                <tbody>

                    <?php
                    foreach ($user_admin->result() as $dt) {
                        
                        ?>
                        <tr><td><?php echo $dt->nip; ?></td>
                            <td><?php echo $dt->nama; ?></td>
                            <td><?php echo $dt->alamat; ?></td>
                            <td><?php echo $dt->no_hp; ?></td>
                            <td><?php echo $dt->email; ?></td>
                            <td><?php echo $dt->jabatan; ?></td>                          
                            <td><?php echo $dt->divisi; ?></td>
                           <td><?php echo $dt->privileges; ?></td>
                        </tr>

                    <?php } ?> 
                </tbody>
            </table>
        </div></div>
</div>  

<div class="box-footer clearfix">
    <?php //echo $jum_penguji;  ?>
</div>
</div>    

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>