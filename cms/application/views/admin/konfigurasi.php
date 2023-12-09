<form action="<?= base_url('admin/konfigurasi/update') ?>" method="post">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label>Judul Web</label>
                    <input name="judul" class="form-control" type="text" value="<?= $konfig->judul_web ?>" required onchange="this.form.submit()"/>
                </div>
                <div class="form-group mb-3">
                    <label>Profile Web</label>
                    <textarea name="profile" class="form-control" type="text" style="height: 100px" onchange="this.form.submit()"><?= $konfig->profil_web ?></textarea>
                </div>
                <div class="form-group mb-3">
                    <label>Instagram</label>
                    <input name="instagram" class="form-control" type="text" value="<?= $konfig->instagram ?>" onchange="this.form.submit()"/>
                </div>
                <div class="form-group mb-3">
                    <label>Twitter</label>
                    <input name="twitter" class="form-control" type="text" value="<?= $konfig->twitter ?>" onchange="this.form.submit()"/>
                </div>
                <div class="form-group mb-3">
                    <label>Facebook</label>
                    <input name="facebook" class="form-control" type="text" value="<?= $konfig->facebook ?>" onchange="this.form.submit()"/>
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input name="email" class="form-control" type="email" value="<?= $konfig->email ?>" onchange="this.form.submit()"/>
                </div>
                <div class="form-group mb-3">
                    <label>Whatsapp</label>
                    <input name="whatsapp" class="form-control" type="text" value="<?= $konfig->whatsapp ?>" onchange="this.form.submit()"/>
                </div>
                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control" type="text" value="<?= $konfig->alamat ?>" onchange="this.form.submit()"/>
                </div>
            </div>
        </div>
    </div>
    <!-- <input class="btn btn-primary mt-4" type="submit" value="Save"> -->
</form>