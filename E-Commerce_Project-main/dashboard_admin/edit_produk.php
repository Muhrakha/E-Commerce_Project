<?php 
require_once '../dbkoneksi.php';
$_idedit = $_GET['idedit'];  
  $sql = "SELECT * FROM produk WHERE id=?";
  $st = $dbh->prepare($sql);
  $st->execute([$_idedit]);
  $result = $st->fetch();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Toko Alat Tulis</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">           
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
            </form>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="list_produk.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Produk
                            </a>
                            <a class="nav-link collapsed" href="list_jenis_produk.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Jenis Produk
                            </a>
                            <a class="nav-link" href="daftar_pesanan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Daftar Pesanan
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                    <a class="nav-link" href="../landingpage/index.html">
                        Kembali ke Home
                    </a>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <form method="POST" action="proses_produk.php">
                            <input type="hidden" name="idedit" value="<?=$result['id']?>">
                            <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-4 col-form-label">Nama</label> 
                                <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    </div> 
                                    <input id="nama" name="nama" type="text" class="form-control"
                                    value="<?=$result['nama']?>">>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stok" class="col-4 col-form-label">Stok</label> 
                                <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-sort-numeric-asc"></i>
                                    </div>
                                    </div> 
                                    <input id="stok" name="stok" type="number" class="form-control"
                                    value="<?=$result['stok']?>">>
                                </div>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="harga" class="col-4 col-form-label">Harga</label> 
                                <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-sort-numeric-asc"></i>
                                    </div>
                                    </div> 
                                    <input id="harga" name="harga" type="number" class="form-control"
                                    value="<?=$result['harga']?>">>
                                </div>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="produk_id" class="col-4 col-form-label">Merk</label> 
                                <div class="col-8">
                                <div class="input-group">
                                    <?php 
                                            $sqljenis = "SELECT * FROM merk";
                                            $rsjenis = $dbh->query($sqljenis);
                                    ?>
                                    <select id="merk_id" name="merk_id" class="custom-select col-12 my-2"
                                    value="<?=$result['merk_id']?>">>
                                        <?php 
                                            foreach($rsjenis as $rowjenis){
                                        ?>
                                        <option value="<?=$rowjenis['id']?>"><?=$rowjenis['nama_merk']?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                <input type="submit" name="proses" type="submit" 
                                class="btn btn-success" value="Update"/>
                                <a class="btn btn-warning my-2" href="list_produk.php" role="button">Kembali</a>
                                </div>
                            </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Muhammad Rakha Ramadhan 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
