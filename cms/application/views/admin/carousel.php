<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah">
    Add
</button>

<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('admin/home/save_carousel') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Carousel</h5>
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
    foreach ($carousel as $c) {
    ?>
        <div class="col-sm-4 mb-4">
            <div class="card">
                <img src="<?= base_url('assets/images/carousel/' . $c->foto) ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $c->judul ?></h5>
                    <div class="">
                        <button class="btn btn-sm btn-icon btn-rounded btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit<?= $c->id_carousel ?>"><i class="ti-pencil-alt text-primary" style="font-size: 18px;"></i></button>
                        <button class="btn btn-sm btn-icon btn-rounded btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#hapus<?= $c->id_carousel ?>"><i class="ti-trash text-danger" style="font-size: 18px;"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit<?= $c->id_carousel ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= site_url('admin/home/edit_carousel/'.$c->id_carousel) ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Carousel</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input name="judul" class="form-control" type="text" value="<?= $c->judul ?>" required placeholder="" />
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
        <div class="modal fade" id="hapus<?= $c->id_carousel ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a href="<?= site_url('admin/home/delete_carousel/' . $c->id_carousel); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>