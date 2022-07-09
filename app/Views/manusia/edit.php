<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
    <div class="col text-left">
            <h2 class="my-3">Edit Data Manusia</h2>
            
                <form action="/manusia/update/<?= $manusia['id']?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $manusia['slug'];?>">
                <input type="hidden" name="fotolama" value="<?= $manusia['foto'];?>">
                <div class="form-group row my-2">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= $manusia['nama']?>">
                    </input>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                        </div>
                    </div>    
                </div>
                <div class="form-group row my-2">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file"class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" value="<?= $manusia['foto']?>">
                            <div class="invalid-feedback">
                            <?= $validation->getError('foto'); ?>
                            </div>    
                    </div>
                    </div>
                <div class="form-group row my-2">
                    <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= $manusia['alamat']?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-2">
                        <label for="no_telp" class="col-sm-2 col-form-label">No. Telepon</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" id="no_telp" name="no_telp" value="<?= $manusia['no_telp']?>">
                        <div class="invalid-feedback">
                        <?= $validation->getError('no_telp'); ?>
                        </div>
                        </div>
                </div>
                <fieldset class="form-group row my-2">
                    <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                    <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelamin" value="Laki-Laki">
                        <label class="form-check-label" for="jeniskelamin">
                        Laki-Laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelamin" value="Perempuan">
                        <label class="form-check-label" for="jeniskelamin">
                        Perempuan
                        </label>
                    </div>
                </div>
                    </div>
                </fieldset>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>