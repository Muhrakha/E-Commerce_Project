<?php 
require_once '../dbkoneksi.php';
$sql = "SELECT * FROM pesanan";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="proses_pesanan.php">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="tanggal" name="tanggal" type="date"  />
                                                        <label for="tanggal">Tanggal</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="quantity" type="number" name="quantity" />
                                                        <label for="quantity">Quantity</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <?php 
                                                    $sqljenis = "SELECT * FROM produk";
                                                    $rsjenis = $dbh->query($sqljenis);
                                                ?>
                                                <select id="produk_id" name="produk_id" class="custom-select col-12 my-2"
                                                value="">>
                                                    <?php 
                                                        foreach($rsjenis as $rowjenis){
                                                    ?>
                                                    <option value="<?=$rowjenis['id']?>"><?=$rowjenis['nama']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="row mb-3">
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" name="proses" type="submit" 
                                                class="btn btn-success" value="Simpan"/></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer py-3">
                                        <div class="small text-left"><a href="../landingpage/index.html" >Home</a> <a href="./daftar_pesanan.php" style="text-align: right;">  Daftar Pesanan</a></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
    </body>
</html>
