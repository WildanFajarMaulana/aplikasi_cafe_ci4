
<?php use App\Models\KeranjangMenuModel;
use App\Models\ProfileModel;
$request = \Config\Services::request();
$keranjang=new KeranjangMenuModel;
$ProfileModel=new ProfileModel;?>

<?php   
$data['profilByIdLogin']=$ProfileModel->getProfileByIdLogin(session()->get('id'));
$totalKeranjangByPembeli=$keranjang->totalKeranjangById(@$data['profilByIdLogin']['id']); ?>
 <!-- button-bar -->
        <section class="button-bar">
            <div class="wrap-icon-button-bar">
              
              <a href="/app/beranda.html">
                <div class="icon-bar <?= ($request->uri->getSegment(2)=='beranda.html')?'active-menu':'' ?>">
                  <i class="fas fa-home-alt"></i>
                </div>
              </a>

              <a href="/app/menu.html">
                <div class="icon-bar <?= ($request->uri->getSegment(2)=='menu.html')?'active-menu':'' ?>">
                  <i class="fas fa-utensils-alt"></i>
                </div>
              </a>

              <a href="/app/keranjang.html">
                <div class="icon-bar">
                  <i class="fas fa-cart-plus "><span class="" id="totalkeranjang" ></span></i>
                </div>
              </a>

              <a href="/app/riwayat.html">
                <div class="icon-bar <?= ($request->uri->getSegment(2)=='riwayat.html')?'active-menu':'' ?>">
                   <i class="fas fa-clipboard-list"><span class="" id="totalPesanan" ></span></i>
                </div>
              </a>
              
              <a href="/app/profile.html">
                <div class="icon-bar <?= ($request->uri->getSegment(2)=='profile.html')?'active-menu':'' ?>">
                  <i class="fas fa-user-alt"></i>
                </div>
              </a>
            </div>
        </section>
      <!-- end-button-bar -->