<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mt-2">Daftar Manusia</h3>
            <a href="/manusia/create" class="btn btn-primary my-4"> Tambah Data</a>
            <?php if(session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('message') ; ?>
            </div>
                <?php endif; ?>
                <?php if(session()->getFlashdata('delete')) : ?>
                <div class="alert alert-warning" role="alert">
                <?= session()->getFlashdata('delete') ; ?>
            </div>
                <?php endif; ?>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
                <?php foreach($manusia as $m): ?>
                <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><img src="/img/<?= $m['foto']; ?>" alt="" width="100"></td>
                <td><?= $m['nama']; ?></td>
                <td><?= $m['alamat']; ?></td>
                <td>
                    <a href="/manusia/edit/<?= $m['slug'];?>" class="btn btn-warning">Edit</a>
                    <a href="/manusia/delete/<?= $m['id'];?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
                    <a href="/manusia/<?= $m['slug']?>" class="btn btn-success">Detail</a>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>