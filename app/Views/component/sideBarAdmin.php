<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/profile.jpg" class="img-circle elevation-2" alt="User Image">
          <h2 class="text-profile"></i>Admin</h2>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php if(session()->get('role')=='admin'){ ?>
          <li class="nav-item ">
                <ul class="nav nav-treeview">
                    <li class="nav-item <?= ($title=='Admin | ManageAkun')?'activeLink':'' ?>">
                        <a href="<?=site_url('/admin/manageAkun.html')?>" class="nav-link active">
                        <i class="fas fa-clipboard-list nav-icon"></i>
                        <p>Data Akun</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=site_url('/admin/manageMenu.html')?>" class="nav-link active">
                        <i class="fas fa-utensils nav-icon"></i>
                        <p>Data Menu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=site_url('/admin/manageLokasi.html')?>" class="nav-link active">
                        <i class="fas fa-location-arrow nav-icon"></i>
                        <p>Data Lokasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=site_url('/admin/manageArtikel.html')?>" class="nav-link active">
                        <i class="fas fa-book nav-icon"></i>
                        <p>Artikel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=site_url('/admin/manageVoucher.html')?>" class="nav-link active">
                        <i class="fas fa-exclamation-circle nav-icon"></i>
                        <p>Voucher</p>
                        </a>
                    </li>
                </ul>
            </li>
            
          <li class="nav-item <?= ($title=='Admin | ManageAkun')?'activeLink':'' ?>">
            <a href="<?=site_url('/admin/manageAkun.html')?>" class="nav-link">
             <i class="fas fa-clipboard-list mr-2"></i>
              <p>
                &nbsp;Data Akun
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('/admin/manageMenu.html')?>" class="nav-link">
             <i class="fas fa-utensils mr-2"></i>
              <p>
                &nbsp;Data Menu
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('/admin/manageLokasi.html')?>" class="nav-link">
             <i class="fas fa-location-arrow mr-2"></i>
              <p>
                &nbsp;Data Lokasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('/admin/manageArtikel.html')?>" class="nav-link">
             <i class="fas fa-book mr-2"></i>
              <p>
                &nbsp;Artikel
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('/admin/manageVoucher.html')?>" class="nav-link">
             <i class="fas fa-exclamation-circle mr-2"></i>
              <p>
                &nbsp;Voucher
              </p>
            </a>
          </li>

          <?php }else if(session()->get('role')=='petugas'){?>
          <li class="nav-item <?=site_url('/petugas/managePesanan.html')?>">
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?=site_url('/admin/managePesanan.html')?>" class="nav-link active">
                        <i class="fas fa-utensils nav-icon"></i>
                        <p>Pesanan Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=site_url('/admin/managetopUp.html')?>" class="nav-link active">
                        <i class="fas fa-dollar-sign nav-icon"></i>
                        <p>Top Up</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=site_url('/admin/manageriwayatPesanan.html')?>" class="nav-link active">
                        <i class="fas fa-history nav-icon"></i>
                        <p>Riwayat Pesanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=site_url('/admin/manageriwayatTopup.html')?>" class="nav-link active">
                        <i class="fas fa-history nav-icon"></i>
                        <p>Riwayat Top Up</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item <?=site_url('/petugas/managePesanan.html')?>">
            <a href="<?=site_url('/admin/managePesanan.html')?>" class="nav-link">
             <i class="fas fa-utensils mr-2"></i>
              <p>
                &nbsp;Pesanan Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('/admin/managetopUp.html')?>" class="nav-link">
             <i class="fas fa-dollar-sign mr-2"></i>
              <p>
                &nbsp;Top Up
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('/admin/manageriwayatPesanan.html')?>" class="nav-link">
             <i class="fas fa-history mr-2"></i>
              <p>
                &nbsp;Riwayat Pesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('/admin/manageriwayatTopup.html')?>" class="nav-link">
             <i class="fas fa-history mr-2"></i>
              <p>
                &nbsp;Riwayat Top Up
              </p>
            </a>
          </li>

          <?php } ?>
        <li class="nav-item button-keluar" style="margin-top: 100px;">
            
            <i class="fas fa-sign-out nav-icon"></i>
            <p>Logout</p>   
            </a>
        </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


   <script type="text/javascript">
      $(document).ready(function(){
        $('.button-keluar').on('click',function(){
          console.log('ok')
          var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
              var csrfHash = $('.csrfCafe').val(); // CSRF hash
           $.ajax({
                        type:"post",
                        url:'/app/logout.html',
                        data:{[csrfName]: csrfHash},
                        dataType:"json",
                        success:function(response){
                           $('.csrfCafe').val(response.token);
                            Swal.fire({
                            type: 'success',
                            title: 'Logout!',
                            text: response.data
                          }).then (function() {
                          window.location.href = "/app/login.html";
                        });
                        },
                        error:function(xhr,ajaxOptions,thrownError){
                          alert(xhr.status+"\n"+xhr.responseText+"\n"+thrownError);
                        }
                      
                      });
        })
      })
    </script>