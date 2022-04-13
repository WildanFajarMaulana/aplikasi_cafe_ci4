<?= $this->extend('template/template_admin'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-utensils mr-2"></i> DATA MENU</h1>
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
                        <div class="card-header border-0">


                            <a class="btn btn-primary" data-toggle="modal" data-target="#modalCreate"
                                style="border-radius: 15px; float: right;"><i class="fas fa-plus"
                                    style="margin-right: 5px; "></i>Create</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Nama Menu</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($menu){?>
                                    <?php $no=1;foreach($menu as $m){ ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td> <?= $m['nama'] ?></td>
                                        <td><img src="/img/<?= $m['gambar'] ?>" alt="" width="150"></td>
                                        <td> <?= $m['harga'] ?></td>
                                        <td> <?= $m['kategori'] ?></td>
                                        <td><a class="btn button-update" data-id="<?= $m['id'] ?>" data-toggle="modal"
                                                data-target="#modalUpdate" title="Edit"><i class="fas fa-pen"></i></a>
                                        </td>
                                        <td><a href="/admin/deleteMenu/<?= $m['id'] ?>.html"
                                                onclick="return confirm('Yakin Untuk Menghapusnya?');" class="btn"
                                                data-toggle="tooltip" title="Delete"><i
                                                    class="fas fa-trash-alt"></i></a></td>


                                    </tr>
                                    <?php } ?>
                                    <?php }else{?>
                                    <div
                                        style="position:absolute;margin: auto;left: 50%;top: 150%;transform: translate(-50%, -50%); text-align:center">
                                        <p>Anda Belum
                                            Menambahkan Menu</p>
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
                                        <h5 class="modal-title">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="/admin/tambahMenu.html" method="post"
                                            enctype="multipart/form-data">
                                            <?= csrf_field() ?>
                                            <div class="form-group">
                                                <label>Nama Menu</label>
                                                <input type="text" name="nama_menu" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file" name="gambar" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="text" name="harga" class="form-control">
                                            </div>

                                            <label>Kategory</label><br>
                                            <select class="form-group" name="kategori">
                                                <option value="makanan">Makanan</option>
                                                <option value="minuman">Minuman</option>
                                            </select>


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
                                        <h5 class="modal-title">Update Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="/admin/updateMenu.html" method="post"
                                            enctype="multipart/form-data">
                                            <?= csrf_field() ?>
                                            <div class="form-group">
                                                <label>Nama Menu</label>

                                                <input type="hidden" name="id" id="id" class="form-control">
                                                <input type="text" name="nama_menu" id="nama_menu" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <br>
                                                <img class="pfmodal" src="" alt="" width="150">
                                                <input type="hidden" name="gambarLama" id="gambarLama"
                                                    class="form-control">
                                                <input type="file" name="gambar" id="gambar" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="text" name="harga" id="harga" class="form-control">
                                            </div>

                                            <label>Kategory</label><br>
                                            <select class="form-group" name="kategori" id="kategori">
                                                <option value="makanan">Makanan</option>
                                                <option value="minuman">Minuman</option>
                                            </select>


                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    </form>
                                </div>
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
        <?= $pager->links('usermenu','paging') ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    <!-- /.content -->
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
$('.button-update').on('click', function() {


    let id = $(this).attr('data-id')


    $.ajax({
        type: "get",
        url: '/admin/getMenuByid.html',
        data: {
            id: id

        },
        dataType: "json",
        success: function(response) {
            console.log(response)
            console.log(response.id)
            $('#id').val(response.id)
            $('#nama_menu').val(response.nama)
            $('#harga').val(response.harga)
            $('#gambarLama').val(response.gambar)
            $('.pfmodal').attr('src', `/img/${response.gambar}`)
            if (response.kategori == 'makanan') {
                $('#kategori').val('makanan').attr("selected", "selected");
            } else if (response.kategori == 'minuman') {
                $('#kategori').val('minuman').attr("selected", "selected");
            }




        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
})
</script>
<?= $this->endSection(); ?>