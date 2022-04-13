<?= $this->extend('template/template_admin'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-exclamation-circle mr-2"></i> DATA WALLET</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('pesan')){ ?>
            <div class="alert alert-primary"><?= session()->getFlashdata('pesan') ?></div>
            <?php } ?>
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">

                        <?php if(!$cekWallet){?>
                        <div class="card-header border-0">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#modalCreate"
                                style="border-radius: 15px; float: right;"><i class="fas fa-plus"
                                    style="margin-right: 5px; "></i>Create</a>
                        </div>
                        <?php }else{}?>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Wallet</th>
                                        <th>Total Saldo</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php if ($cekWallet){?>
                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td><?= @$cekWallet['nama_wallet']?></td>
                                        <td>Rp.<?= @$cekWallet['saldo']?></td>
                                        <td><?= @$cekWallet['created_at']?></td>
                                        <td><a class="btn" data-toggle="modal" data-target="#modalUpdate"
                                                title="Edit"><i class="fas fa-plus"></i></a></td>
                                        <td><a onclick="return confirm('Yakin Untuk Menghapusnya?');"
                                                href="/admin/hapusWallet/<?= @$cekWallet['nama_wallet']?>.html"
                                                class="btn" data-toggle="tooltip" title="Delete"><i
                                                    class="fas fa-trash-alt"></i></a></td>


                                    </tr>
                                    <?php }else{?>

                                    <div
                                        style="position:absolute;margin: auto;left: 50%;top: 150%;transform: translate(-50%, -50%); text-align:center">
                                        <p>Anda Belum
                                            Menambahkan Wallet</p>
                                    </div>
                                    <?php }?>

                                    <!-- <tr>
                                        <th class="pag" colspan="10">
                                            <div class="pagination">
                                                <a href=""><i class="fas fa-chevron-left"></i></a>
                                                <a href="">1</a>
                                                <a href="">2</a>
                                                <a href="">3</a>
                                                <a href="">4</a>
                                                <a href="">5</a>
                                                <a href="">6</a>
                                                <a href=""><i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </th>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Create Modal -->
                        <div class="modal fade" id="modalCreate" role="dialog" aria-labelledby="createModal"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Buat Wallet</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="/admin/tambahWallet.html" method="post">
                                            <?= csrf_field()?>
                                            <div class="form-group">
                                                <label>Saldo</label>
                                                <input type="text" name="saldo" class="form-control"
                                                    onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                            </div>



                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Update Modal -->
                        <div class="modal fade" id="modalUpdate" role="dialog" aria-labelledby="createModal"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Saldo Wallet</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="/admin/tambahWallet.html" method="post">
                                            <?= csrf_field()?>
                                            <div class="form-group">
                                                <label>Saldo</label>
                                                <input type="text" name="saldo" class="form-control"
                                                    onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                            </div>



                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <?= $this->endSection(); ?>