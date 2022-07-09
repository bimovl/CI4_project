<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
    <div class="col text-left">
            <h2 class="mt-2">Detail Manusia</h2>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="/img/<?= $manusia['foto'] ?>" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $manusia['nama']?></h5>
                    <p class="card-text"><b>Alamat : </b> <?= $manusia['alamat']?></p>
                    <p class="card-text"><b>Jenis Kelamin : </b> <?= $manusia['jeniskelamin']?></p>
                    <p class="card-text"><b>Nomor Telepon : </b> <?= $manusia['no_telp']?></p>
                
                <a href="/manusia" class="btn btn-primary"> Kembali Ke Daftar</a>

                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>