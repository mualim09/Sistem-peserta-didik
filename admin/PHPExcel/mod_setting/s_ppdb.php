<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="?pg=setting" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>PPDB Online</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href='.'>Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="?pg=setting">Settings</a></div>
              <div class="breadcrumb-item">PPDB Online</div>
            </div>
          </div>



          <td><div class="section-body">
           
			<h2 class="section-title">Pengaturan Aplikasi PPDB Online</h2>
            <p class="section-lead">
              Silahkan Sesuaikan Pengaturan PPDB Online Disini
            </p>
			
			 </td>
                                    
<div class="row">
<div class="col-lg-12">
<div class="card">

  <div class="card-body">
    <ul class="nav nav-tabs" id="myTab5" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab5" data-toggle="tab" href="#home5" role="tab" aria-controls="home" aria-selected="true">
          <i class="fas fa-home"></i> Jenis Pembayaran</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="false">
          <i class="fas fa-id-card"></i> Info Pembayaran</a>
      </li>
      
	  <li class="nav-item">
        <a class="nav-link" id="kepala-tab5" data-toggle="tab" href="#kepala5" role="tab" aria-controls="kepala" aria-selected="false">
          <i class="fas fa-card"></i> Waktu PPDB</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent5">
      <div class="tab-pane fade show active" id="home5" role="tabpanel" aria-labelledby="home-tab5">


    

    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambah">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Biaya</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode Biaya</label>
                            <input type="text" name="id_biaya" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Nama Biaya</label>
                            <input type="text" name="nama" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Rp</label>
                            <input type="text" name="jumlah" class="form-control" required="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>



</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4><button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambahdata">
        <i class="far fa-edit"></i> Tambah Data
    </button></h4>
                <div class="card-header-action">
                    <?php $query = mysqli_query($koneksi, "select sum(jumlah) as total from biaya");
                    $total = mysqli_fetch_array($query);
                    ?>
                    <b>Total Biaya Rp. <?= $total['total'] ?></b>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Kode Biaya</th>
                                <th>Nama Biaya</th>
                                <th>Jumlah Biaya</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from biaya");
                            $no = 0;
                            while ($biaya = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $biaya['id_biaya'] ?></td>
                                    <td><?= $biaya['nama_biaya'] ?></td>
                                    <td><?= $biaya['jumlah'] ?></td>
                                    <td>
                                        <?php if ($biaya['status'] == 1) { ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Non Aktif</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button data-id="<?= $biaya['id_biaya'] ?>" class="hapus btn btn-danger">Hapus</button>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form id="form-edit<?= $no ?>">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" value="<?= $biaya['id_biaya'] ?>" name="id_biaya" class="form-control" required="">
                                                            <div class="form-group">
                                                                <label>Nama Biaya</label>
                                                                <input type="text" name="nama" value="<?= $biaya['nama_biaya'] ?>" class="form-control" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jumlah Biaya Rp.</label>
                                                                <input type="text" name="jumlah" value="<?= $biaya['jumlah'] ?>" class="form-control" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="control-label">Status biaya</div>
                                                                <label class="custom-switch mt-2">
                                                                    <input type="checkbox" name="status" class="custom-switch-input" value='1' <?php if ($biaya['status'] == 1) {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span class="custom-switch-description"> Pilih Status</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <script>
                                    $('#form-edit<?= $no ?>').submit(function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'POST',
                                            url: 'mod_biaya/crud_biaya.php?pg=ubah',
                                            data: $(this).serialize(),
                                            success: function(data) {

                                                iziToast.success({
                                                    title: 'Jos . . . ',
                                                    message: 'Data Berhasil diubah',
                                                    position: 'topRight'
                                                });
                                                setTimeout(function() {
                                                    window.location.reload();
                                                }, 2000);
                                                $('#modal-edit<?= $no ?>').modal('hide');
                                                //$('#bodyreset').load(location.href + ' #bodyreset');
                                            }
                                        });
                                        return false;
                                    });
                                </script>
                            <?php }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_biaya/crud_biaya.php?pg=tambah',
            data: $(this).serialize(),
            success: function(data) {

                iziToast.success({
                    title: 'Jos . . .',
                    message: 'Data Berhasil ditambahkan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
                $('#tambahdata').modal('hide');
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

    $('#table-1').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan menghapus data ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_biaya/crud_biaya.php?pg=hapus',
                    method: "POST",
                    data: 'id_biaya=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Horee!',
                            message: 'Data Berhasil dihapus',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        })

    });
</script>
		 </div>
		  

      <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab5">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>INFO PEMBAYARAN</h4>
            </div>
            <form id="infobayar">
                <div class="card-body">
                    <div class="form-group">
                        <label>Isi dengan cara pembayaran</label>
                        <textarea name="info" class="summernote" required><?= $setting['infobayar'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Info</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


		 </div>
<script>
    $('#infobayar').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_setting/crud_setting.php?pg=infobayar',
            data: $(this).serialize(),
            success: function(data) {
                if (data == 'ok') {
                    iziToast.success({
                        title: 'Jos . . .',
                        message: 'Data Berhasil ditambahkan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#tambahdata').modal('hide');
                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'Data Gagal ditambahkan atau username sudah ada',
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
</script>		  

      
      <div class="tab-pane fade" id="contact5" role="tabpanel" aria-labelledby="contact-tab5">


    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambah">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data kontak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Kontak</label>
                            <input type="text" name="nama" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>No Whatsapp</label>
                            <input type="number" name="nohp" class="form-control" required="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-12">
        <div class="card">
<div class="card-header">
<button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambahdata">
<i class="far fa-edit"></i> Tambah Data
</button>
            </div>
			
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>

                                <th>Nama kontak</th>
                                <th>No kontak</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from kontak");
                            $no = 0;
                            while ($kontak = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>

                                    <td><?= $kontak['nama_kontak'] ?></td>
                                    <td><?= $kontak['no_kontak'] ?></td>
                                    <td>
                                        <?php if ($kontak['status'] == 1) { ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Non Aktif</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button data-id="<?= $kontak['id_kontak'] ?>" class="hapus btn btn-danger">Hapus</button>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form id="form-edit<?= $no ?>">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" value="<?= $kontak['id_kontak'] ?>" name="id_kontak" class="form-control" required="">
                                                            <div class="form-group">
                                                                <label>Nama kontak</label>
                                                                <input type="text" name="nama" value="<?= $kontak['nama_kontak'] ?>" class="form-control" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>No kontak</label>
                                                                <input type="text" name="nohp" value="<?= $kontak['no_kontak'] ?>" class="form-control" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="control-label">Status kontak</div>
                                                                <label class="custom-switch mt-2">
                                                                    <input type="checkbox" name="status" class="custom-switch-input" value='1' <?php if ($kontak['status'] == 1) {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span class="custom-switch-description"> Pilih Status</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                            <?php }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

		
		 </div>
		  
      <div class="tab-pane fade" id="kepala5" role="tabpanel" aria-labelledby="kepala-tab5">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>INFO WAKTU PPDB</h4>
            </div>
            <form id="syarat">
                <div class="card-body">
                    <div class="form-group">
                        <label>Kapan PPDB Mulai Dibuka??</label>
                        <input type="date" name="tgl_pengumuman" class="form-control" value="<?= $setting['tgl_pengumuman'] ?>" >
                    </div>
					
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
		 </div>
		  

	   </div>
    </div>
  </div>
</div>
</div>									
	
<script>
    $('#syarat').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_setting/crud_setting.php?pg=aktifppdb',
            data: $(this).serialize(),
            success: function(data) {
                if (data == 'ok') {
                    iziToast.success({
                        title: 'Jos . . .',
                        message: 'Data Berhasil ditambahkan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#tambahdata').modal('hide');
                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'Data Gagal ditambahkan ',
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
</script>
							
									

	

 
</section>
