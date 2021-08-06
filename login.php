<?php
    include "config/koneksi.php";
    include "library/controller.php";
    
    $tabel = 'tbl_user';
    @$username = $_POST['user'];
    @$password = $_POST['pass'];
	@$akses = $_POST['akses'];
    
    $go = new controller();

    if (isset($_POST['login'])) {
        $go->login($con, $tabel, $username, $password, $akses);
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <title>Login</title>
</head>
<body>
	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <form class="border shadow p-3 rounded" style="width: 450px;" method="post">
                <h1 class="text-center p-3">Form Login</h1>
                <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Username</label>
                      <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                </div>
				<select class="form-select mb-3" name="akses" required>
                    <option></option>
                    <option value="guru">Guru</option>
                    <option value="siswa">Siswa</option>
		        </select>		 
		  <button type="submit" class="btn btn-dark" name="login" value="LOGIN" style="width: 100%;">LOGIN</button>
        </main>
    </div>
</body>
</html>