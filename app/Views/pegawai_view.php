<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <!-- CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
<!-- CSS MANUAL -->
 <style>
    .card{
        width: 100%;
        max-width: 900px;
        margin: 40px 100px;
    }
 </style>
</head>
<body>
    <!-- CONTAINER -->
    <div class="container">
        <!-- CARD -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                Data Pegawai
            </div>
            <div class="card-body">
                <!-- TOMBOL PENCARIAN -->
                 <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="kata kunci" placeholder="masukan kata kunci" aria-label="masukan kata kunci" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                    </div>
                 </form> 

                 <!-- Button trigger modal : tambah data -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                + Tambah Data Pegawai
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data Pegawai</h1>
                        <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- alert isian error -->
                         <div class="alert alert-danger error" role="alert" style="display:none;"></div>
                        <!-- alert sukses -->
                        <div class="alert alert-primary sukses" role="alert" style="display: none;"></div>
                        <!-- FORM INPUT -->
                        <input type="hidden" id="inputId">
                        <div class="mb-3 row">
                            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputBidang" class="col-sm-2 col-form-label">Bidang</label>
                            <div class="col-sm-10">
                                <select id="inputBidang" class="form-select">
                                    <option value="Finance">Finance</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="HR">HR</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputAlamat">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="tombolSimpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
            <!-- Tabel View Data -->
             <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Bidang</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nama Pegawai 1</td>
                        <td>Pegawai1@example.com</td>
                        <td>Finance</td>
                        <td>Alamat Pegawai 1</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm">Edit</button>
                            <button type="button" class="btn-danger btn sm">Hapus</button>
                        </td>
                    </tr>
                </tbody>
             </table>

            </div>
        </div>
    </div>
    <!-- JAVA SCRIPT BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- jQuery -->
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- SCRIPT TAMBAHAN -->
    <script>
    function bersihkan(){
        $('#inputNama').val('');
        $('#inputEmail').val('');
        $('#inputAlamat').val('');
    }
    $('.tombol-tutup').on('click',function(){
        if($('.sukses').is(":visible")){
            window.location.href = "<?php echo current_url(). "?" .$_SERVER['QUERY_STRING'] ?>";
        }
        $('.alert').hide();
        bersihkan();
    });
        $('#tombolSimpan').on('click',function(){
            var $nama = $('#inputNama').val();
            var $email = $('#inputEmail').val();
            var $bidang = $('#inputBidang').val();
            var $alamat = $('#inputAlamat').val();

            $.ajax({
                url: "<?php echo site_url('pegawai/simpan') ?>",
                type: "POST",
                data: {
                    nama: $nama,
                    email: $email,
                    bidang: $bidang,
                    alamat: $alamat
                },
                success: function(hasil){
                    var $obj = $.parseJSON(hasil);
                    if ($obj.sukses == false) {
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html($obj.error);
                    }else{
                        $('.error').hide();
                        $('.sukses').show();
                        $('.sukses').html($obj.sukses);
                        bersihkan();
                    }
                }
            });
        });
    </script>
</body>
</html>