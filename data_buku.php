<?php
include 'config/koneksi.php';
include 'library/controller.php';

    $go = new controller();
    $tabel = "tbl_buku";
    @$field = array('id_buku'=>$_POST['id_buku'],
                'judul'=>$_POST['judul'],
                'noisbn'=>$_POST['noisbn'], 
                'penulis'=>$_POST['penulis'],
                'penerbit'=>$_POST['penerbit'],
                'tahun'=>$_POST['tahun']);           
    $redirect = "?menu=semua_data_buku";
    @$where = "id_buku= $_GET[id]";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
        <p style="font-size: 20px;">LAPORAN SEMUA BUKU</p>
	    </div>
	    <div class="card-body">
            <div style="padding:0px;">
                
                <div class="table-responsive mt-3">
                    <table align="center" border="1" class="mt-4 table table-striped table-hover bg-white" id="tableAll">
                        <thead>
                            <tr>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>NO ISBN</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM tbl_buku ";
                                $jalan = mysqli_query($con, $sql);
                                while($r = mysqli_fetch_array($jalan)){
                            ?>
                            <tr>
                                <td><?php echo $r['id_buku']?></td>
                                <td><?php echo $r['judul']?></td>
                                <td><?php echo $r['noisbn']?></td>
                                <td><?php echo $r['penulis']?></td>
                                <td><?php echo $r['penerbit']?></td>
                                <td><?php echo $r['tahun']?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
	    </div>
    </div>
</body>
</html>