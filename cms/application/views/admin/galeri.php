<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah">
    Add
</button>

<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('admin/home/save_galeri') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Gambar Pada Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input name="judul" class="form-control" type="text" required placeholder="" />
                        <label for="inputJudul">Judul</label>
                    </div>
                    <div class="form-group mb-3">
                        <label for="inputImage" class="form-label">Foto :</label>
                        <input type="file" name="image" class="form-control form-control-lg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <?php
    foreach ($galeri as $g) {
    ?>
        <div class="col-sm-4 mb-4">
            <div class="card">
                <img src="<?= base_url('assets/images/galeri/' . $g->foto) ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $g->judul ?></h5>
                    <p class="card-text">
                        Upload pada tanggal : <?= DateTime::createFromFormat('Y-m-d', $g->tanggal)->format('d-M-y'); ?><br>
                        Oleh : <?= $g->username ?>
                    </p>
                    <div class="">
                        <button class="btn btn-sm btn-icon btn-rounded btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit<?= $g->id_galeri ?>"><i class="ti-pencil-alt text-primary" style="font-size: 18px;"></i></button>
                        <button class="btn btn-sm btn-icon btn-rounded btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#hapus<?= $g->id_galeri ?>"><i class="ti-trash text-danger" style="font-size: 18px;"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit<?= $g->id_galeri ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= site_url('admin/home/edit_galeri/' . $g->id_galeri) ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Gambar Pada Galeri</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input name="judul" class="form-control" type="text" value="<?= $g->judul ?>" required placeholder="" />
                                <label for="inputJudul">Judul</label>
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputImage" class="form-label">Foto :</label>
                                <input type="file" name="imagee" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="hapus<?= $g->id_galeri ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin Ingin Menghapus Carousel Ini</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <a href="<?= site_url('admin/home/delete_galeri/' . $g->id_galeri); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>