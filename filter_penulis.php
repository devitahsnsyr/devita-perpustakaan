<?php
include "config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Nama Penulis</title>
</head>
<body>
    <div class="container-fluid" id= "content" >
    <div class="card">
        <div class="card-header">
        <p style="font-size: 20px;">Form Filter Buku Berdasarkan Penulis</p>
	    </div>
	    <div class="card-body">
            <label for="exampleFormControlInput1" class="form-label fw-bold">Nama Penulis</label>
            <form action="" method="POST" enctype="multipart/form-data">
                <fieldset class="form-group">
                    <select class="form-select" id="basicSelect" name="penulis">
                        <option value="" selected disabled>Pilih Nama Penulis</option>
                            <?php
                            $no = 0;
                            $sql = "SELECT * FROM tbl_buku GROUP BY penulis";
                            $jalan = mysqli_query($con, $sql);
                            while($r = mysqli_fetch_assoc($jalan)){
                                $no++
                            ?>
                        <option value="<?php echo $r['penulis'] ?>"><?php echo $r['penulis']?></option>
                            <?php } ?>
                            <?php if ($no == ""){
                                echo "<tr><td colspan='7'>No Record</td></tr>";
                            }?>
                    </select>
                </fieldset>
                <input class="btn btn-primary mt-3" type="submit" name="lihat" value="lihat">
            </form>

            <div style="padding: 20px;">
                <div class="table-responsive mt-3">
                    <table align="center" border="1" class="mt-4 table table-stripped table-hover bg-white" id="tableAll">
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
                                if(isset($_POST['lihat'])){
                                @$penulis = $_POST['penulis'];
                                $barang = mysqli_query($con,"SELECT * FROM tbl_buku WHERE penulis = '$penulis' ");
                                while($b = mysqli_fetch_array($barang)){
                            ?>
                            <tr>
                                <td><?php echo $b['id_buku']?></td>
                                <td><?php echo $b['judul']?></td>
                                <td><?php echo $b['noisbn']?></td>
                                <td><?php echo $b['penulis']?></td>
                                <td><?php echo $b['penerbit']?></td>
                                <td><?php echo $b['tahun']?></td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
	    </div>
    </div>
</body>
</html>