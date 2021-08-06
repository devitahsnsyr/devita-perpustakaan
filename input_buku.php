<?php
include 'config/koneksi.php';
include 'library/controller.php';

    $go = new controller();
    $tabel = "tbl_buku";
    $redirect = "?menu=input_buku";
    @$where = "id_buku= $_GET[id]";

    if (isset($_POST['simpan'])) {
        @$field = array('id_buku'=>$_POST['id_buku'],
                'judul'=>$_POST['judul'],
                'noisbn'=>$_POST['noisbn'], 
                'penulis'=>$_POST['penulis'],
                'penerbit'=>$_POST['penerbit'],
                'tahun'=>$_POST['tahun']);
        $go->simpan($con, $tabel, $field, $redirect);
    }
    if (isset($_GET['hapus'])) {
        $go->hapus($con, $tabel, $where, $redirect);
    }
    if (isset($_GET['edit'])) {
        $edit = $go->edit($con, $tabel, $where);
    }
    if (isset($_POST['ubah'])) {
        @$field = array('id_buku'=>$_POST['id_buku'],
                'judul'=>$_POST['judul'],
                'noisbn'=>$_POST['noisbn'], 
                'penulis'=>$_POST['penulis'],
                'penerbit'=>$_POST['penerbit'],
                'tahun'=>$_POST['tahun']);
        $go->ubah($con, $tabel, $field, $where, $redirect);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Buku</title>
</head>
<body>
    <div class="container-fluid" id= "content" >
        <div class="card">
            <div class="card-header">
                <p style="font-size: 20px;">Form Input Buku</p>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Kode Buku</label>
                        <input type="text" name="id_buku" class="form-control" value="<?php echo @$edit['id_buku'] ?>" id="exampleFormControlInput1" placeholder="Masukan Kode Buku" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Judul Buku</label>
                        <input type="text" name="judul" class="form-control" value="<?php echo @$edit['judul'] ?>" id="exampleFormControlInput1" placeholder="Masukan Judul Buku" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">NO ISBN</label>
                        <input type="text" name="noisbn" class="form-control" value="<?php echo @$edit['noisbn'] ?>" id="exampleFormControlInput1" placeholder="Masukan NO ISBN" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Penulis</label>
                        <input type="text" name="penulis" class="form-control" value="<?php echo @$edit['penulis'] ?>" id="exampleFormControlInput1" placeholder="Masukan Nama Penulis" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" value="<?php echo @$edit['penerbit'] ?>" id="exampleFormControlInput1" placeholder="Masukan Nama Penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Tahun Terbit</label>
                        <input type="text" name="tahun" class="form-control" value="<?php echo @$edit['tahun'] ?>" id="exampleFormControlInput1" placeholder="Masukan Tahun Terbit" required>
                    </div>
                    <?php if(@$_GET['id'] ==""){ ?>
                        <input type="submit" class="btn btn-primary"name="simpan" value="Simpan">
                    <?php }else{ ?>
                        <input type="submit" class="btn btn-primary" name="ubah" value="Ubah">
                    <?php } ?>
            </form>
            </div>
        </div>
        <div style="padding:10px;">
           <!-- cari -->
           <div class="mb-3 col-sm-6" style="margin-top: 20px; margin-left:48%; width:250px;">
                <label for="exampleFormControlInput1" class="form-label" style="font-weight: bold;">Pencarian :</label>
                <input type="text" class="form-control" style="margin-top:-35px; margin-left: 100px; "placeholder="Masukan nama distributor">
            </div>
            <div class="btn-distributor" style="margin-top: -55px; margin-left: 85%;">
                <a href="#" type="button" class="btn btn-info" style="color: white;">Cari</a>
                <a href="?menu=input_buku" class="btn btn-success" type="submit">Refresh</a>
            </div>
            <div class="table-responsive mt-3">
                <table align="center" border="1" class="mt-4 table table-striped table-hover bg-white" id="tableAll">
                    <thead>
                        <tr>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>NO ISBN</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
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
                            <td><?php echo $r['id_buku']?></td>
                            <td><?php echo $r['judul']?></td>
                            <td><?php echo $r['noisbn']?></td>
                            <td><?php echo $r['penulis']?></td>
                            <td><?php echo $r['penerbit']?></td>
                            <td><?php echo $r['tahun']?></td>
                            <td><a href="?menu=input_buku&edit&id=<?php echo $r['id_buku']?>"class="btn btn-warning">Edit</a></td>
                            <td><a href="?menu=input_buku&hapus&id=<?php echo $r['id_buku']?>"class="btn btn-danger" onclick="return confirm('Hapus Data?')">Hapus</a></td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
