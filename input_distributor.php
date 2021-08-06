<?php
include 'config/koneksi.php';
include 'library/controller.php';

    $go = new controller();
    $tabel = "tbl_distributor";
    @$field = array('nama_distributor'=>$_POST['nama_distributor'],
                'alamat'=>$_POST['alamat'], 
                'telpon'=>$_POST['telpon']);
    $redirect = "?menu=input_distributor";
    @$where = "id_distributor = $_GET[id]";

    if (isset($_POST['simpan'])) {
        $go->simpan($con, $tabel, $field, $redirect);
    }
    if (isset($_GET['hapus'])) {
        $go->hapus($con, $tabel, $where, $redirect);
    }
    if (isset($_GET['edit'])) {
        $edit = $go->edit($con, $tabel, $where);
    }
    if (isset($_POST['ubah'])) {
        $go->ubah($con, $tabel, $field, $where, $redirect);
    }

    if(isset($_GET['search']))
    {
        // set $connect
        $search = mysqli_real_escape_string($con, $_GET['search']);
        $query = "SELECT * FROM tbl_distributor WHERE nama_distributor LIKE '$search'";
        $result = mysqli_query($con, $query);
        // cek $result dan tampilkan jika ada hasil
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Input Distributor</title>
    </head>
    <body>
        <div class="container-fluid" id= "content" >
            <div class="card">
                <div class="card-header">
                <p style="font-size: 20px;">Form Distributor</p>
            </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fw-bold">Nama Distributor</label>
                            <input type="text" name="nama_distributor" class="form-control" value = "<?php echo @$edit['nama_distributor'] ?>" id="exampleFormControlInput1" placeholder="Masukan Nama Distributor" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fw-bold">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value = "<?php echo @$edit['alamat'] ?>" id="exampleFormControlInput1" placeholder="Masukan Alamat Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fw-bold">Telpon</label>
                            <input type="number" name="telpon" class="form-control" value = "<?php echo @$edit['telpon'] ?>" id="exampleFormControlInput1" placeholder="Masukan Telpon" required>
                        </div>
                        <?php if(@$_GET['id'] ==""){ ?>
                            <input type="submit" class="btn btn-primary"name="simpan" value="Simpan">
                        <?php }else{ ?>
                            <input type="submit" class="btn btn-primary" name="ubah" value="Ubah">
                        <?php } ?>
                    </form>
                </div>
            </div>
                <!-- cari -->
            <div class="mb-3 col-sm-6" style="margin-top: 20px; margin-left:49%; width:250px;">
                <label for="exampleFormControlInput1" class="form-label" style="font-weight: bold;">Pencarian :</label>
                <input type="text" class="form-control" style="margin-top:-35px; margin-left: 100px; "placeholder="Masukan nama distributor">
            </div>
            <div class="btn-distributor" style="margin-top: -55px; margin-left: 85%;">
                <a href="#" type="button" class="btn btn-info" style="color: white;">Cari</a>
                <a href="?menu=input_distributor" class="btn btn-success" type="submit">Refresh</a>
            </div>
            <!-- tabel distributor -->
                <div class="table-responsive mt-3">
                    <table align="center" border="1" class="mt-4 table table-striped table-hover bg-white" id="tableAll">
                        <thead>
                            <tr>
                                <th>Nama Distributor</th>
                                <th>Alamat</th>
                                <th>Telpon</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = $go->tampil($con, $tabel);
                            $no = 0;
                            if($data==""){
                                echo "<tr><td colspan='4'>No Data</td></tr>";
                            }else{
                            foreach($data as $r){
                            $no++
                            ?>
                            <tr>
                                <td><?php echo $r['nama_distributor']?></td>
                                <td><?php echo $r['alamat']?></td>
                                <td><?php echo $r['telpon']?></td>
                                <td><a href="?menu=input_distributor&edit&id=<?php echo $r['id_distributor']?> "class="btn btn-warning">Edit</a></td>
                                <td><a href="?menu=input_distributor&hapus&id=<?php echo $r['id_distributor']?> "class="btn btn-danger" onclick="return confirm('Hapus Data?')">Hapus</a></td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>