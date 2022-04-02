<?= $this->extend('template/template_admin'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-utensils mr-2"></i> PESANAN MASUK</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php if(session()->getFlashdata('pesan')){ ?>
      <div class="alert alert-primary"><?= session()->getFlashdata('pesan') ?></div>
    <?php } ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-header border-0">
                <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dddddd;">Menu</button>
                <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dddddd;">Harga</button>
                <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dddddd;">Tanggal</button>
                <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dddddd;">Tanggal</button>
              
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Deby Saputra Pratama</a>
                  <a class="dropdown-item" href="#">Rangga Adi Pradana</a>
                </div>

              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Hp</th>
                    <th>Pesanan</th>
                    <th>Harga</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    <th colspan="3">Konfirmasi</th>
                  </tr>
                  </thead>
                  <tbody>

                  <tr>
                    <td>Deby Saputra Pratama</td>
                    <td>debysaputra.p@gmail.com	</td>
                    <td>08xxxxxxxxxx</td>
                    <td>Lorem ipsum dolor</td>
                    <td>10.000</td>
                    <td>lab rpl 1</td>
                    <td>01/02/2022</td>
                    <td><a  class="btn" title="Detail" data-toggle="modal" data-target="#modalDetail"><i class="fas fa-utensils bg-primary text-white rounded" style="padding: 0.35rem !important;"></i></a></td>
                    <td><a  class="btn" data-toggle="tooltip" title="Konfirmasi"><i class="fas fa-check bg-success text-white rounded" style="padding: 0.35rem !important;"></i></a></td>
                    <td><a class="btn" data-toggle="tooltip" title="Delete" onclick="return confirm('apakah anda yakin')"><i class="fas fa-times bg-danger text-white rounded" style="padding: 0.35rem !important;"></i></a></td>
                  </tr>

                    <tr>
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
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- Create Modal -->
              <div class="modal fade" id="modalCreate" role="dialog" aria-labelledby="createModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <div class="modal-body">
                        <form action="/admin/tambahUser.html" method="post">
                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                          </div>

                            <label>Role</label><br>
                           <select class="form-group" name="role">
                            <option value="user">User</option>
                            <option value="petugas">Petugas</option>
                           </select>
                           <br>
                           <label>Active</label><br>
                           <input type="radio" name="is_active">
                      
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                      </div>
                      </form>
                  </div>
                </div>
              </div>

              <!-- Update Modal -->
              <div class="modal fade" id="modalUpdate" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <div class="modal-body">
                        <form action="">
                          <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>No. HP</label>
                            <input type="text" name="" class="form-control">
                          </div>
                        </form>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                      </div>
  
                  </div>
                </div>
              </div>

              <!-- Pop Up Profile -->
              <div class="modal fade" id="modalDetail" role="dialog" aria-labelledby="detailModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">PROFILE</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <div class="modal-body">
                        <div class="pfimg">
                          <img class="pfmodal" src="/img/profile.jpg" alt="">
                          <h4 class="txtname">Rangga Adi Pradana</h4>
                        </div>

                        <div class="form-group">
                          <p><i class="far fa-envelope fa-xl"></i>ranggapradana161@gmail.com</p>
                        </div>

                        <div class="form-group">
                          <p><i class="fas fa-mobile-alt fa-xl"></i>08xxxxxxxxxx</p>
                        </div>
                      </div>
                    
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
    </div>
    <!-- /.content -->
  </div>       

<?= $this->endSection(); ?>
    