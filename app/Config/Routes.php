<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::tampilanAwal');
$routes->get('/app/', 'Auth::tampilanAwal');


// auth routes
$routes->get('/app/login.html','Auth::index');
$routes->get('/app/register.html','Auth::register');
$routes->get('/app/lupapass.html','Auth::lupaPassword');
$routes->post('/app/lupapassword.html','Auth::lupaPassword');
$routes->post('/app/proseslogin.html','Auth::prosesLogin');
$routes->post('/app/prosesregister.html','Auth::prosesRegister');
$routes->post('/app/prosesnewpassword.html','Auth::prosesNewPassword');
$routes->post('/app/logout.html','Auth::logout');
$routes->get('/logout.html','Auth::logoutAdminPetugas');



// user routes
$routes->get('/app/profile.html','User::index');
$routes->get('/app/riwayat.html','User::riwayat');
$routes->get('/app/keranjang.html','User::keranjang');
$routes->get('/app/menu.html','User::menu');
$routes->get('/app/beranda.html','User::beranda');
$routes->get('/app/dataMinuman.html','User::getDataMinuman');
$routes->get('/app/dataMakanan.html','User::getDataMakanan');
$routes->get('/app/dataMenuFav.html','User::getDataMenuFav');
$routes->get('/app/dataMinumanNew.html','User::getDataMinumanNew');
$routes->get('/app/dataMakananNew.html','User::getDataMakananNew');
$routes->get('/app/tambahProfile.html','User::viewTambahProfile');
$routes->get('/app/pinProfile.html','User::pinProfile');
$routes->get('/app/keranjangUser.html','User::getKeranjangUser');
$routes->get('/app/editProfile.html','User::viewEditProfile');
$routes->get('/app/ubahPasswordUser.html','User::viewUbahPassword');
$routes->get('/app/getKeranjangByPembeli.html','User::getKeranjangByPembeli');
$routes->get('/app/keamanan.html','User::viewKeamanan');
$routes->get('/app/ubahPin.html','User::viewUbahPin');
$routes->get('/app/verifikasiPin.html','User::viewVerifikasiPin');
$routes->get('/app/ubahPinEmail.html','User::viewUbahPinEmail');
$routes->get('/app/ubahEmail.html','User::viewUbahEmail');
$routes->get('/app/newEmail.html','User::viewNewEmail');
$routes->get('/app/riwayatSelesai.html','User::getRiwayatSelesai');
$routes->get('/app/riwayatProses.html','User::getRiwayatProses');
$routes->get('/app/verifikasiPinTranksaksi/(:any)/(:any)/(:any).html','User::verifikasiPinTranksaksi/$1/$2/$3');
$routes->get('/app/verifikasiPinKirimSaldo/(:any)/(:any).html','User::verifikasiPinKirimSaldo/$1/$2');
$routes->get('/app/getAlertPemesanan.html','User::getAlertPemesanan');
$routes->get('/app/getStatustranksaksi.html','User::getStatustranksaksi');
$routes->get('/app/kirimSaldo.html','User::kirimSaldo');
$routes->get('/app/formPesan.html','User::formPesan');



$routes->post('/app/dataPopupMinuman.html','User::getPopupMenu');
$routes->post('/app/likeMenu.html','User::likeMenu');
$routes->post('/app/deleteLikeMenu.html','User::deleteLikeMenu');
$routes->post('/app/prosesProfile.html','User::tambahProfile');
$routes->post('/app/tambahPinProfile.html','User::tambahPinProfile');
$routes->post('/app/tambahKeranjang.html','User::tambahKeranjang');
$routes->post('/app/plusKeranjang.html','User::editTambahJumlahMenuKeranjang');
$routes->post('/app/minKeranjang.html','User::editKurangJumlahMenuKeranjang');
$routes->post('/app/hapusMenuKeranjang.html','User::hapusMenuKeranjang');
$routes->post('/app/prosesEditProfile.html','User::editProfile');
$routes->post('/app/prosesUbahPassword.html','User::ubahPassword');
$routes->post('/app/prosesVerifikasiPin.html','User::verifikasiPin');
$routes->post('/app/prosesUbahPinEmail.html','User::ubahPinEmail');
$routes->post('/app/prosesUbahEmail.html','User::ubahEmail');
$routes->post('/app/prosesNewEmail.html','User::newEmail');
$routes->post('/app/prosesTranksaksi.html','User::tranksaksi');
$routes->post('/app/kirimDataToPinTranksaksi.html','User::kirimDataToPinTranksaksi');
$routes->post('/app/kirimDataToPinSaldo.html','User::kirimDataToPinSaldo');
$routes->post('/app/prosesVerifikasiPinTranksaksi.html','User::prosesVerifikasiPinTranksaksi');
$routes->post('/app/hapusAlertPemesanan.html','User::hapusAlertPemesanan');
$routes->post('/app/getUserByNomor.html','User::getUserByNomor');
$routes->post('/app/prosesVerifikasiPinSaldo.html','User::prosesVerifikasiPinSaldo');
$routes->post('/app/searchLokasi.html','User::searchLokasi');



// // auth routes admin
// $routes->get('/admin/login.html','Auth::admin');
// $routes->post('/admin/login.html','Auth::admin');


// admin && peugas 

// admin  

$routes->get('/admin/manageAkun.html','Admin::dataAkun');
$routes->get('/admin/manageMenu.html','Admin::dataMenu');
$routes->get('/admin/manageLokasi.html','Admin::dataLokasi');
$routes->get('/admin/manageArtikel.html','Admin::dataArtikel');
$routes->get('/admin/manageVoucher.html','Admin::dataVoucher');
$routes->get('/admin/deleteUser/(:any).html','Admin::deleteUser/$1');
$routes->get('/admin/deleteMenu/(:any).html','Admin::deleteMenu/$1');
$routes->get('/admin/hapusWallet/(:any).html','Admin::hapusWallet/$1');
$routes->get('/admin/deleteLokasi/(:any).html','Admin::deleteLokasi/$1');
$routes->get('/admin/getUserByid.html','Admin::getUserByid');
$routes->get('/admin/getMenuByid.html','Admin::getMenuByid');
$routes->get('/admin/getLokasiByid.html','Admin::getLokasiByid');
$routes->get('/admin/getUserProfileByid.html','Admin::getUserProfileByid');
$routes->get('/admin/manageWallet.html','Admin::manageWallet');


$routes->post('/admin/tambahUser.html','Admin::tambahUser');
$routes->post('/admin/updateUser.html','Admin::updateUser');

$routes->post('/admin/tambahMenu.html','Admin::tambahMenu');
$routes->post('/admin/updateMenu.html','Admin::updateMenu');

$routes->post('/admin/tambahLokasi.html','Admin::tambahLokasi');
$routes->post('/admin/editLokasi.html','Admin::editLokasi');

$routes->post('/admin/tambahWallet.html','Admin::tambahWallet');

// PETUGAS


$routes->get('/petugas/managePesanan.html','Petugas::pesananMasuk');
$routes->get('/petugas/managetopUp.html','Petugas::topUp');
$routes->get('/petugas/manageriwayatPesanan.html','Petugas::riwayatPesanan');
$routes->get('/petugas/manageriwayatTopup.html','Petugas::riwayatopup');
$routes->get('/petugas/generateSaldo.html','Petugas::generateSaldo');
$routes->get('/petugas/getDataPesanan.html','Petugas::getDataPesanan');

$routes->get('/petugas/deletePesanan/(:any).html','petugas::deletePesanan/$1');

$routes->get('/petugas/getDetailKeranjangByidpembeli.html','Petugas::getDetailKeranjangByidpembeli');
$routes->post('/petugas/konfirmasiPesanan.html','Petugas::konfirmasiPesanan');
$routes->post('/petugas/akhiriPesanan.html','Petugas::akhiriPesanan');
$routes->post('/petugas/prosesTopup.html','Petugas::prosesTopup');















/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}