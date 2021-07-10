<?= $this->extend('template/template_backEnd') ?>

<?= $this->section('content') ?>

<div class="col-sm">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Daftar <?= esc($subtitle) ?></h3>

            <!-- <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div> -->
            <div class="card-tools m-1">
                <button type="button" class="btn btn-tool btn-primary box-solid" data-toggle="modal" data-target="#tambah"><i class=" fas fa-plus mt-2"></i>
                    Tambah
                </button>
            </div>
        </div>

        <!-- Card -->
        <div class="card-body card-primary p-0 justify-content-center text-center">
            <table class="table  table-sm ">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px">No</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center"><?= esc($subtitle) ?></th>

                        <th class="text-center" style="width:320px;">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($ta as $key => $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['tahun']; ?></td>
                            <td><?= $value['ta']; ?></td>

                            <td class="text-center">

                                <a href="<?= base_url('Ppdb/Cetaklaporan' . '/' . $value['tahun']) ?>" class="btn btn-info btn-sm" target="_blank"> <i class="fas fa-print">
                                    </i>
                                    Print</a>
                            </td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= $this->endsection() ?>