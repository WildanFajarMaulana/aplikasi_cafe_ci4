<?php

namespace App\Controllers;
use App\Models\MenuModel;
use App\Models\ProfileModel;
use App\Models\favMenuModel;
use App\Models\KeranjangMenuModel;
use App\Models\TranksaksiModel;
use App\Models\LoginModel;
use App\Models\LoginTokenModel;
use App\Models\RiwayatSaldoModel;
use App\Models\LokasiModel;
class User extends BaseController
{
    protected $MenuModel;
    protected $ProfileModel;
    protected $favMenuModel;
    protected $KeranjangMenuModel;
    protected $TranksaksiModel;
    protected $LoginModel;
    protected $RiwayatSaldoModel;
    protected $LokasiModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel();
        $this->MenuModel = new MenuModel();
        $this->ProfileModel = new ProfileModel();
        $this->favMenuModel = new favMenuModel();
        $this->KeranjangMenuModel = new KeranjangMenuModel();
        $this->TranksaksiModel = new TranksaksiModel();
        $this->email = \Config\Services::email();
        $this->LoginTokenModel = new LoginTokenModel();
        $this->RiwayatSaldoModel = new RiwayatSaldoModel();
        $this->LokasiModel = new LokasiModel();

         

    }
 
    public function index()
    {
        if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['title']='Mau Cafe | Profile';
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
         if(@$data['profilByIdLogin']){
             $dataCekpin=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];
             $this->ProfileModel->save($dataCekpin);
         }else{

         }
        $data['css']='profile.css';
        $data['js']='profile.js'; 
        
        return view('user/profile',$data);
    }

    public function riwayat()
    {
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
          if(@$data['profilByIdLogin']){
             $dataCekpin=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];
             $this->ProfileModel->save($dataCekpin);
         }else{
            
         }
        $data['title']='Mau Cafe | Riwayat';
        $data['css']='riwayat.css';
        $data['js']='riwayat.js'; 
        $data['tampildata']=$this->TranksaksiModel->cekTranksaksiByIdStatus2(@$data['profilByIdLogin']['id'],'diproses','dikonfirmasi');
                
        return view('user/riwayat',$data);
    }

    public function keranjang()
    {
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
        $data['tampildata']=$this->KeranjangMenuModel->getKeranjangUser(@$data['profilByIdLogin']['id']);
        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
          if(@$data['profilByIdLogin']){
             $dataCekpin=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];
             $this->ProfileModel->save($dataCekpin);
         }else{
            
         }
        $data['title']='Mau Cafe | Keranjang';
        $data['js']='keranjang.js'; 
        $data['css']='keranjang.css';
        $data['cekTranksaksiByIdStatus']=$this->TranksaksiModel->cekTranksaksiByIdStatus2(@$data['profilByIdLogin']['id'],'diproses','dikonfirmasi');
        $data['lokasi']=$this->LokasiModel->getLokasi();
        return view('user/keranjang',$data);
    }

    public function menu()
    {
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));

        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
          if(@$data['profilByIdLogin']){
             $dataCekpin=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];
             $this->ProfileModel->save($dataCekpin);
         }else{
            
         }
         $data['title']='Mau Cafe | Menu';
        $data['css']='menu.css';
        $data['js']='menu.js'; 
        
        return view('user/menu',$data);
    }

    public function beranda()
    {
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
          if(@$data['profilByIdLogin']){
             $dataCekpin=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];
             $this->ProfileModel->save($dataCekpin);
         }else{
            
         }
        $data['js']='beranda.js'; 
        $data['title']='Mau Cafe | Beranda';
        $data['css']='beranda.css';
         $data['cekTranksaksiByIdStatus']=$this->TranksaksiModel->cekTranksaksiById(@$data['profilByIdLogin']['id']);
        return view('user/beranda',$data);
    }
    public function hapusAlertPemesanan(){
        if($this->request->isAJAX()){
            
             $data=[
                'id'=>$this->request->getPost('id'),
                'show_pemesanan'=>1
             ];
             $this->TranksaksiModel->save($data);
             $msg=[
                'success'=>'berhasil'
             ];
             $msg['token']=csrf_hash();
             echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function getAlertPemesanan(){
         if($this->request->isAJAX()){
               
                $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                $data['cekTranksaksiByIdStatus']=$this->TranksaksiModel->cekTranksaksiById($data['profilByIdLogin']['id']);
                $msg=[
                    'data'=>view('user/alertPemesanan',$data)
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }
    public function getDataMinuman(){
        if($this->request->isAJAX()){
                $data['tampildata']=$this->MenuModel->getMenuKategori('minuman');
                $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                
                $data['kategori']='minuman';
                $msg=[
                    'data'=>view('user/kategoriMinuman',$data)
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }

    public function getDataMakanan(){
          if($this->request->isAJAX()){
                $data=[
                    'tampildata'=>$this->MenuModel->getMenuKategori('makanan')
                ];
                $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));

                
                $data['kategori']='makanan';
                $msg=[
                    'data'=>view('user/kategoriMakanan',$data)
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }
    public function getRiwayatProses(){
          if($this->request->isAJAX()){
                $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                $data=[
                    'tampildata'=>$this->TranksaksiModel->cekTranksaksiByIdStatus2(@$data['profilByIdLogin']['id'],'diproses','dikonfirmasi')
                ];
                

                
                $data['status']='diprosesDanKonfirmasi';
                $msg=[
                    'data'=>view('user/riwayatUser',$data)
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }
    public function getRiwayatSelesai(){
          if($this->request->isAJAX()){
               $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));

                $data=[
                    'tampildataselesai'=>$this->TranksaksiModel->getTranksaksiSelesai(@$data['profilByIdLogin']['id'],'selesai')
                ];
             
                
                $data['status']='selesai';
                $msg=[
                    'data'=>view('user/riwayatUser',$data)
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }

    public function getDataMenuFav(){
        if($this->request->isAJAX()){
                $data['tampildata']=$this->favMenuModel->getMenu();
                $data['kategori']='all';
                 $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                $data['cekTranksaksiByIdStatus']=$this->TranksaksiModel->cekTranksaksiById(@$data['profilByIdLogin']['id']);
                $msg=[
                    'data'=> view('user/kategoriFav',$data)
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }

    public function getDataMinumanNew(){
        if($this->request->isAJAX()){
                $data['tampildata']=$this->MenuModel->getMenuKategori('minuman');
                $data['kategori']='minuman';
                 $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                
                $msg=[
                    'data'=>view('user/minumanKategoriNew',$data)
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }

    public function getDataMakananNew(){
        if($this->request->isAJAX()){
                $data=[
                    'tampildata'=>$this->MenuModel->getMenuKategori('makanan')
                ];
                 $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                
                $data['kategori']='makanan';
                $msg=[
                    'data'=>view('user/makananKategoriNew',$data)
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }

    public function getPopupMenu(){
        if($this->request->isAJAX()){
                $msg=[
                    'data'=>$this->MenuModel->getMenuById($this->request->getPost('id'))
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }

    public function likeMenu(){
        if($this->request->isAJAX()){
            $profilByIdLogin=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                $data=[
                    'id_menu'=>$this->request->getPost('id_menu'),
                    'id_pembeli'=>@$profilByIdLogin['id'],
                    'rate'=>'1'
                ];
                $this->favMenuModel->save($data);
                $msg=[
                    'data'=>'success'
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);

        }else{
            exit("maaf tidak dapat diproses");
        }
    }
     public function deleteLikeMenu(){
        if($this->request->isAJAX()){
            $profilByIdLogin=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                $this->favMenuModel->deleteFavMenu(@$profilByIdLogin['id'],$this->request->getPost('id_menu'));
                $msg=[
                    'data'=>'deleted'
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);

        }else{
            exit("maaf tidak dapat diproses");
        }
    }

    
    public function viewTambahProfile(){
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));

        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
        if(@$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }

        
        $data['title']='Mau Cafe | tambahProfile';
        $data['css']='editprofil.css';
        $data['js']='tambahprofil.js'; 
        return view('user/tambahprofile',$data);
        
        
    }
    public function tambahProfile(){
         if($this->request->isAJAX()){
            $validation=\Config\Services::validation();
            $valid=$this->validate([
                'nama'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'{field}  harus diisi'
                        
                    ]
                ],
                'nomor'=>[
                        'rules'=>'required|is_unique[tb_profile.nomor]',
                        'errors'=>[
                            'required'=>'{field}  harus diisi',
                            'is_unique'=>'{field}  sudah terdaftar'
                        ]
                ],
                 'alamat'=>[
                        'rules'=>'required',
                        'errors'=>[
                            'required'=>'{field}  harus diisi'
                        ]
                ],
                 'foto'=>[
                        'rules'=>'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                        'errors'=>[
                            'max_size'=>'ukuran gambar terlalu besar',
                            'is_image'=>'yg anda pilih bukan gambar',
                            'mime_in'=>'yang anda pilih bukan gambar'
                        ]
                ]
            ]);

              if(!$valid){
                $msg=[
                    'error'=>[
                        'nama'=>$validation->getError('nama'),
                        'nomor'=>$validation->getError('nomor'),
                        'alamat'=>$validation->getError('alamat'),
                        'foto'=>$validation->getError('foto')
                    ]
                ];
               
              }else{
                // ambil gambar
                $fileFoto=$this->request->getFile('foto');
                if($fileFoto==''){
                    $namaFoto='default.jpg';
                }else{
                // generate nama Foto random
                $namaFoto=$fileFoto->getRandomName();
                // pindahkan file ke folder image
                $fileFoto->move('img',$namaFoto);
                // ambil nama file
                // $namaFoto=$fileFoto->getName();
                }
                $data=[
                    'id_login'=>session()->get('id'),
                    'nama'=>$this->request->getPost("nama"),
                    'email'=>session()->get('email'),
                    'nomor'=>$this->request->getPost("nomor"),
                    'foto'=>$namaFoto,
                    'alamat'=>$this->request->getPost("alamat"),
                    'saldo'=>0
                ];

                
                $this->ProfileModel->save($data);

                $msg=[
                    'success'=>'Profile Berhasil Ditambahkan'
                 ];
            
              }
              $msg['token']=csrf_hash();
              echo json_encode($msg);




        }else{
            exit('request tidak dapat dilakukan');
        }
    }

    public function pinProfile(){
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
         $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
         if(@$data['profilByIdLogin']['pin']!='0'){
             return redirect()->to('/app/profile.html');
         }
         if(@!$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }else{

        $data['title']='Mau Cafe | Pin';
        $data['css']='pin.css';
        $data['js']='pin.js';
         
        return view('user/pinProfile',$data);
        }


    }
    public function tambahPinProfile(){
        if($this->request->isAJAX()){
            $first=$this->request->getPost('first');
            $second=$this->request->getPost('second');
            $third=$this->request->getPost('third');
            $fourth=$this->request->getPost('fourth');


            $samefirst=$this->request->getPost('samefirst');
            $samesecond=$this->request->getPost('samesecond');
            $samethird=$this->request->getPost('samethird');
            $samefourth=$this->request->getPost('samefourth');

            $allpin=$first.$second.$third.$fourth;
            
           
            $konfirmasipin=$samefirst.$samesecond.$samethird.$samefourth;

            if($konfirmasipin!=$allpin){
                $msg=[
                    'errorPin'=>'Pin Tidak Sama'
                ];
              $msg['token']=csrf_hash();
              echo json_encode($msg);
            }else{

                $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));

                $datas=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'pin'=>$allpin,
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];

                // $dataCekpin=[
                //     'id'=>@$data['@profilByIdLogin']['id'],
                    
                // ];
                // $this->ProfileModel->save($dataCekpin);
                $this->ProfileModel->save($datas);
                $msg=[
                    'success'=>'Pin Ditambahkan'
                ];     
                // if(@$data['profilByIdLogin']['pin']=='0'){
                //  }
                // }else{
                //      $msg=[
                //         'error'=>'Pin Sudah Ada ,Silahkan Ganti Di Profil'
                //      ];
                // }  
              $msg['token']=csrf_hash();
              echo json_encode($msg); 
            }
           
                
            
             

        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function viewVerifikasiPin(){
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
         if(@!$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }
        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
          if(@$data['profilByIdLogin']){
             $dataCekpin=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];
             $this->ProfileModel->save($dataCekpin);
         }else{
            
         }
        $data['title']='Mau Cafe | Verifikasi Pin';
        $data['css']='pin.css';
        $data['js']='verifikasiPin.js'; 
        
        return view('user/verifikasiPin',$data);
    }
    public function verifikasiPinTranksaksi($total_pembayaran,$lokasi,$payment){

        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
          if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
         if(@!$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }
        if(@$data['profilByIdLogin']['pinTranksaksi']==0){
            return redirect()->to('/app/keranjang.html');
        }
         if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
        $data['title']='Mau Cafe | Verifikasi Pin Tranksaki';
        $data['css']='pin.css';
        $data['js']='verifikasiPinTranksaksi.js';
        $data['total_pembayaran']=$total_pembayaran;
        $data['lokasi']=trim($lokasi);
        $data['payment']=$payment;    

        return view('user/verifikasiPinTranksaksi',$data);
    }
     public function verifikasiPinKirimSaldo($nomor,$saldo){

        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
          if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
         if(@!$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }
        if(@$data['profilByIdLogin']['pinKirimSaldo']==0){
            return redirect()->to('/app/kirimSaldo.html');
        }
         if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
        $data['title']='Mau Cafe | Verifikasi Pin Saldo';
        $data['css']='pin.css';
        $data['js']='verifikasiPinSaldo.js';
        $data['nomor']=$nomor;
        $data['saldo']=$saldo;    
      
        
        return view('user/verifikasiPinSaldo',$data);
    }
    public function prosesVerifikasiPinSaldo(){
        if($this->request->isAJAX()){
             $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
             $first=$this->request->getPost('first');
             $second=$this->request->getPost('second');
             $third=$this->request->getPost('third');
             $fourth=$this->request->getPost('fourth');
             $saldoInput=$this->request->getPost('saldo');
             $allpin=$first.$second.$third.$fourth;
             if($allpin==$data['profilByIdLogin']['pin']){
                if($data['profilByIdLogin']['saldo']>=$this->request->getPost('saldo')){
                    $userTerimaSaldo=$this->ProfileModel->getUserByNomor($this->request->getPost('nomor'));
                    $saldoPenerima=$userTerimaSaldo['saldo'];
                    $saldoPengirim=$data['profilByIdLogin']['saldo'];

                    $dataUserTerimaSaldo=[
                        'id'=>$userTerimaSaldo['id'],
                        'saldo'=>$saldoPenerima +=$saldoInput
                    ];
                    $dataPengirimSaldo=[
                        'id'=> $data['profilByIdLogin']['id'],
                        'saldo'=> $saldoPengirim -=$saldoInput
                    ];
                    $dataRiwayat=[
                        'id_pembeli'=>$data['profilByIdLogin']['id'],
                        'id_penerima'=>$userTerimaSaldo['id'],
                        'deskripsi'=>'Mengirim Saldo',
                        'saldo'=>$this->request->getPost('saldo')
                    ];
                    $this->RiwayatSaldoModel->save($dataRiwayat);
                    $this->ProfileModel->save($dataUserTerimaSaldo);
                    $this->ProfileModel->save($dataPengirimSaldo);
                    $msg=[
                        'success'=>'Berhasil Mengirim Saldo'
                    ];
                }else{
                   $msg=[
                    'errorSaldo'=>'Saldo Anda Tidak Cukup'
                    ]; 
                }
             }else{
                 $msg=[
                    'error'=>'Pin Anda Salah'
                ];
             }
             $msg['token']=csrf_hash();
             echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');  
        }
    }
    public function prosesVerifikasiPinTranksaksi(){
        if($this->request->isAJAX()){
             $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
             $first=$this->request->getPost('first');
             $second=$this->request->getPost('second');
             $third=$this->request->getPost('third');
             $fourth=$this->request->getPost('fourth');

             $allpin=$first.$second.$third.$fourth;
             if($allpin==@$data['profilByIdLogin']['pin']){
                if(trim($this->request->getPost('payment'))=='e_wallet'){ 
                    if($data['profilByIdLogin']['saldo']>=$this->request->getPost('total_pembayaran')){
                        $profileLogin=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                        $data=[
                            'id'=>@$profileLogin['id'],
                            'pinTranksaksi'=>'0'
                        ];
                        $this->ProfileModel->save($data);

                        $dataTranksaksi=[
                        'id_pembeli'=>@$profileLogin['id'],
                        'nama_pembeli'=>@$profileLogin['nama'],
                        'payment'=>$this->request->getPost('payment'),
                        'total_pembayaran'=>$this->request->getPost('total_pembayaran'),
                        'pengiriman'=>$this->request->getPost('lokasi'),
                        'status_tranksaksi'=>'diproses'
                      ];
                        $this->TranksaksiModel->save($dataTranksaksi);


                        $msg=[
                            'success'=>'Silahkan Tunggu'
                        ];
                    }else{
                        $msg=[
                            'errorSaldo'=>'Saldo Tidak Cukup'
                        ];
                    }
                }else{
                    @$profileLogin=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                    $data=[
                        'id'=>@$profileLogin['id'],
                        'pinTranksaksi'=>'0'
                    ];
                    $this->ProfileModel->save($data);

                    $dataTranksaksi=[
                    'id_pembeli'=>@$profileLogin['id'],
                    'nama_pembeli'=>@$profileLogin['nama'],
                    'payment'=>$this->request->getPost('payment'),
                    'total_pembayaran'=>$this->request->getPost('total_pembayaran'),
                    'pengiriman'=>$this->request->getPost('lokasi'),
                    'status_tranksaksi'=>'diproses'
                  ];
                    $this->TranksaksiModel->save($dataTranksaksi);


                    $msg=[
                        'success'=>'Silahkan Tunggu'
                    ];
                }
             }else{
                 $msg=[
                    'error'=>'Pin Anda Salah'
                ];
             }
             $msg['token']=csrf_hash();
             echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');  
        }
    }
    public function kirimDataToPinTranksaksi(){
        if($this->request->isAJAX()){
            $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
            $total_pembayaran=$this->request->getPost('total_pembayaran');
            $lokasi=$this->request->getPost('lokasi');
            $payment=$this->request->getPost('payment');
        if($payment=='e_wallet'){
            if($data['profilByIdLogin']['saldo']>=$total_pembayaran){
                $data=[
                        'id'=>@$data['profilByIdLogin']['id'],
                        'pinTranksaksi'=>'1'
                    ];
                $this->ProfileModel->save($data);
                $msg=[
                    'total_pembayaran'=>$total_pembayaran,
                    'lokasi'=>$lokasi,
                    'payment'=>$payment
                ];

            }else{
                $msg=[
                    'errorSaldo'=>'Saldo Anda Tidak Cukup'
                ];
            }

        }else{
            $data=[
                        'id'=>@$data['profilByIdLogin']['id'],
                        'pinTranksaksi'=>'1'
                    ];
                $this->ProfileModel->save($data);
                $msg=[
                    'total_pembayaran'=>$total_pembayaran,
                    'lokasi'=>$lokasi,
                    'payment'=>$payment
                ];
        }
            $msg['token']=csrf_hash();
            echo json_encode($msg);

        }else{
            exit('request tidak dapat dilakukan');
        }
    }
      public function kirimDataToPinSaldo(){
        if($this->request->isAJAX()){
            $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
            $nomor=$this->request->getPost('nomor');
            $saldo=$this->request->getPost('saldo');
           if($data['profilByIdLogin']['saldo']>=$saldo){
                $data=[
                        'id'=>@$data['profilByIdLogin']['id'],
                        'pinKirimSaldo'=>'1'
                    ];
                $this->ProfileModel->save($data);

                $msg=[
                    'nomor'=>$nomor,
                    'saldo'=>$saldo
                    
                ];
           }else{
            $msg=[
                'errorSaldo'=>'Saldo Anda Tidak Cukup'
            ];
           }
           $msg['token']=csrf_hash();
            echo json_encode($msg);

        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function verifikasiPin(){
        if($this->request->isAJAX()){
             $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
             $first=$this->request->getPost('first');
             $second=$this->request->getPost('second');
             $third=$this->request->getPost('third');
             $fourth=$this->request->getPost('fourth');

             $allpin=$first.$second.$third.$fourth;
             if($allpin==@$data['profilByIdLogin']['pin']){
                $data=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'1'
                ];
                $this->ProfileModel->save($data);
                $msg=[
                    'success'=>'Berhasil Verifikasi'
                ];
             }else{
                 $msg=[
                    'error'=>'Pin Anda Salah'
                ];
             }
             $msg['token']=csrf_hash();
             echo json_encode($msg);
        }else{
             exit('request tidak dapat dilakukan');
        }
    }
    public function viewEditProfile(){
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
        if(@!$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }
        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
         if(@$data['profilByIdLogin']){
             $dataCekpin=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];
             $this->ProfileModel->save($dataCekpin);
         }else{
            
         }
        
        $data['title']='Mau Cafe | editProfile';
        $data['css']='editprofil.css';
        $data['js']='editProfile.js'; 
        
        return view('user/editProfile',$data);
    }
    public function editProfile(){
         if($this->request->isAJAX()){
            $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
            $validation=\Config\Services::validation();
            if($this->request->getPost('nomor')==$data['profilByIdLogin']['nomor']){
                $rules='required';
            }else{
                $rules='required|is_unique[tb_profile.nomor]';
            }
            $valid=$this->validate([
                'nama'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'{field}  harus diisi'
                        
                    ]
                ],
                'nomor'=>[
                        'rules'=>$rules,
                        'errors'=>[
                            'required'=>'{field}  harus diisi',
                            'is_unique'=>'{field}  sudah terdaftar'
                        ]
                ],
                 'alamat'=>[
                        'rules'=>'required',
                        'errors'=>[
                            'required'=>'{field}  harus diisi'
                        ]
                ],
                 'foto'=>[
                        'rules'=>'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                        'errors'=>[
                            'max_size'=>'ukuran gambar terlalu besar',
                            'is_image'=>'yg anda pilih bukan gambar',
                            'mime_in'=>'yang anda pilih bukan gambar'
                        ]
                ]
            ]);

              if(!$valid){
                $msg=[
                    'error'=>[
                        'nama'=>$validation->getError('nama'),
                        'nomor'=>$validation->getError('nomor'),
                        'alamat'=>$validation->getError('alamat'),
                        'foto'=>$validation->getError('foto')
                    ]
                ];
                $msg['token']=csrf_hash();
                 echo json_encode($msg);
               
              }else{
                $fotoUser=$this->request->getFile('foto');
                if($fotoUser==''){
                    $namaFotoUser=$this->request->getPost('fotoLama');
                }else{

                // generate nama sampul random
                $namaFotoUser=$fotoUser->getRandomName();
                // pindahkan file ke folder image
                $fotoUser->move('img',$namaFotoUser);
              
                }

                $data=[
                    'id'=>$data['profilByIdLogin'],
                    'nama'=>$this->request->getPost("nama"),
                    'nomor'=>$this->request->getPost("nomor"),
                    'foto'=>$namaFotoUser,
                    'alamat'=>$this->request->getPost("alamat")
                    
                ];

                
                $this->ProfileModel->save($data);

                $msg=[
                    'success'=>'Profile Berhasil Diupdate'
                 ];
            
             $msg['token']=csrf_hash();
              echo json_encode($msg);
            }



        }else{
            exit('request tidak dapat dilakukan');
        }
    }

    public function tambahKeranjang(){
        if($this->request->isAJAX()){
            $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
            $id_menu=$this->request->getPost('id_menu');

            $id_pembeli=@$data['profilByIdLogin']['id'];
            $jumlah=$this->request->getPost('jumlah');
            $harga=$this->request->getPost('harga');
            $nama_menu=$this->request->getPost('nama_menu');
            $gambar_menu=$this->request->getPost('gambar_menu');
            $data=[
              'id_menu'=>$id_menu,
              'id_pembeli'=>$id_pembeli,
              'nama_menu'=>$nama_menu,
              'gambar_menu'=>$gambar_menu,
              'jumlah'=>$jumlah,
              'harga'=>$harga,
              'total_harga'=>$jumlah*$harga,
              'status'=>'masuk'
            ];
            $cekDataKeranjang=$this->KeranjangMenuModel->cekDataKeranjangByIdPembeliDanIdMenu($id_menu,$id_pembeli);
            $id_login=session()->get('id');
            $profilByIdPembeli=$this->ProfileModel->getProfileByIdLogin($id_login);
            $prosesTranksaksi=$this->TranksaksiModel->cekTranksaksiByIdStatus2(@$profilByIdPembeli['id'],'diproses','dikonfirmasi');
            if($prosesTranksaksi){
                 $msg=[
                        'errorTranksaksi'=>'Anda Sedang Melakukan Tranksaksi Mohon Tunggu'
                 ];
            }else{
                if($jumlah=='0'){
                     $msg=[
                            'errorJumlah'=>'Inputkan Jumlah Menu'
                     ];
                }else{
                   if(!$cekDataKeranjang){

                    $this->KeranjangMenuModel->save($data);
                     $msg=[
                            'success'=>'Menu Dimasukkan Ke Keranjang'
                     ];
                    }else{
                     $msg=[
                            'errorKeranjang'=>'Menu Suda Ada Di Keranjang'
                     ];
                    } 
                }
            }
            
            $msg['token']=csrf_hash();
            echo json_encode($msg);
        
        }else{
             exit('request tidak dapat dilakukan');
        }
    }
    public function getStatustranksaksi(){
        if($this->request->isAJAX()){
                $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                $data['cekTranksaksiByIdStatus']=$this->TranksaksiModel->cekTranksaksiByIdStatus2(@$data['profilByIdLogin']['id'],'diproses','dikonfirmasi');
                $data['totalPesanan']=$this->TranksaksiModel->sumPesanan(@$data['profilByIdLogin']['id'],'diproses','dikonfirmasi');
                
                $msg=[
                    'data'=>$data['cekTranksaksiByIdStatus'],
                    'dataPesanan'=>$data['totalPesanan']
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function getKeranjangUser(){
        if($this->request->isAJAX()){
                 $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));

                 $data=[
                    'tampildata'=>$this->KeranjangMenuModel->getKeranjangUser(@$data['profilByIdLogin']['id']),
                    'total_pembayaran'=>$this->KeranjangMenuModel->sumKeranjangByIdPembeli(@$data['profilByIdLogin']['id']),
                    'getProfileByIdLogin'=>$this->ProfileModel->getProfileByIdLogin(session()->get('id'))
                ];
                
                $msg=[
                    'data'=>view('user/keranjangUser',$data)
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    // public function tranksaksi(){
    //       if($this->request->isAJAX()){
    //           $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
    //           $data=[
    //             'id_pembeli'=>@$data['profilByIdLogin']['id'],
    //             'nama_pembeli'=>@$data['profilByIdLogin']['nama'],
    //             'payment'=>$this->request->getPost('payment'),
    //             'total_pembayaran'=>$this->request->getPost('total_pembayaran'),
    //             'pengiriman'=>$this->request->getPost('lokasi'),
    //             'status_tranksaksi'=>'diproses'
    //           ];
    //           $this->TranksaksiModel->save($data);

    //             echo json_encode($msg);
    //     }else{
    //         exit('request tidak dapat dilakukan');
    //     }   
    // }
    public function editTambahJumlahMenuKeranjang(){
        if($this->request->isAJAX()){
              $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                
              $data['menuUser']=$this->KeranjangMenuModel->getKeranjangUserByMenu($this->request->getPost('id_menu'),@$data['profilByIdLogin']['id']);
              $jumlahMenu=$data['menuUser']['jumlah']+1;

              $data=[
                'id'=>$data['menuUser']['id'],
                'jumlah'=>$jumlahMenu,
                'total_harga'=>$jumlahMenu*$data['menuUser']['harga']
              ];
              $this->KeranjangMenuModel->save($data);
               
                
             
                $msg=[
                    'data'=>'sukses'
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
      public function editKurangJumlahMenuKeranjang(){
        if($this->request->isAJAX()){
              $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                
              $data['menuUser']=$this->KeranjangMenuModel->getKeranjangUserByMenu($this->request->getPost('id_menu'),@$data['profilByIdLogin']['id']);
              
              if($data['menuUser']['jumlah']==1){
                    $msg=[
                    'error'=>'batas Maximum Pengurangan Menu'
                ];
              }else{
                  $jumlahMenu=$data['menuUser']['jumlah']-1;
                  $data=[
                    'id'=>$data['menuUser']['id'],
                    'jumlah'=>$jumlahMenu,
                    'total_harga'=>$jumlahMenu*$data['menuUser']['harga']
                  ];
                  $this->KeranjangMenuModel->save($data);
                   $msg=[
                    'data'=>'sukses'
                    ];
              }
               
                
             
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function hapusMenuKeranjang(){
        if($this->request->isAJAX()){

            $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
            $this->KeranjangMenuModel->deleteMenuKeranjang($this->request->getPost('id'),@$data['profilByIdLogin']['id']);
            $msg=[
                'success'=>'Menu Berhasil Dihapus'
            ];
            $msg['token']=csrf_hash();
            echo json_encode($msg);
        }else{
             exit('request tidak dapat dilakukan');
        }
    }
    public function viewUbahPassword(){
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
         if(@!$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }
        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
         if(@$data['profilByIdLogin']){
             $dataCekpin=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];
             $this->ProfileModel->save($dataCekpin);
         }else{
            
         }
        
        $data['title']='Mau Cafe | Ubah Sandi';
        $data['css']='editprofil.css';
        $data['js']='ubahSandi.js'; 
        
        return view('user/ubahPassword',$data);
    }
    public function ubahPassword(){
        if($this->request->isAJAX()){
             $data['dataLoginByUser']=$this->LoginModel->getDataLogin(session()->get('id'));
             $passwordLama=$this->request->getPost('passwordLama');
            if(password_verify($passwordLama,$data['dataLoginByUser']['password'])){
                $validation=\Config\Services::validation();
                 $valid=$this->validate([
                     'passwordBaru'=>[
                            'rules'=>'required|min_length[5]',
                            'errors'=>[
                                'required'=>'{field}  harus diisi',
                                'min_length'=>'isi password minimal 5'
                            ]
                    ],
                     'konfirmasiPasswordBaru'=>[
                            'rules'=>'required|matches[passwordBaru]',
                            'errors'=>[
                                'required'=>'{field}  harus diisi',
                                'matches'=>'{field}  tidak sama'
                            ]
                    ]
                ]);
                if(!$valid){
                    $msg=[
                        'error'=>[
                            'passwordBaru'=>$validation->getError('passwordBaru'),
                            'konfirmasiPasswordBaru'=>$validation->getError('konfirmasiPasswordBaru')
                        ]
                    ];
               
                }else{
                    $data=[
                        'id'=>$data['dataLoginByUser']['id'],
                        'password'=>password_hash($this->request->getPost("passwordBaru"),PASSWORD_BCRYPT)
                    ];
                    $this->LoginModel->save($data);
                    $msg=[
                        'success'=>'Password Berhasil Diganti'
                    ];

                }
            }else{
                $msg=[
                    'errorPasswordLama'=>'Password Lama Yang Anda Masukkan Salah'
                ];
            }
            $msg['token']=csrf_hash();
            echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function getKeranjangByPembeli(){
        if($this->request->isAJAX()){
             $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
             $totalKeranjangByPembeli=$this->KeranjangMenuModel->totalKeranjangById(@$data['profilByIdLogin']['id']);

             $msg=[
                'data'=>$totalKeranjangByPembeli
             ];
             $msg['token']=csrf_hash();
             echo json_encode($msg);

        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function viewKeamanan(){
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
         if(@!$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }
        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
         if(@$data['profilByIdLogin']){
             $dataCekpin=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];
             $this->ProfileModel->save($dataCekpin);
         }else{
            
         }
        
        $data['title']='Mau Cafe | Keamanan';
        $data['css']='profile.css';
        $data['js']='profil.js'; 
        
        return view('user/keamanan',$data);
    }

    public function viewUbahPin(){
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
        if(@$data['profilByIdLogin']['cekPin']!=1){
            return redirect()->to('/app/keamanan.html');
        }
          if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
        
         if(!$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }else{

        $data['title']='Mau Cafe | Ubah Pin';
        $data['css']='pin.css';
        $data['js']='pin.js'; 
        return view('user/ubahPin',$data);
        }

    }
     public function viewNewEmail(){
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
        if(@$data['profilByIdLogin']['cekMail']!=1){
            return redirect()->to('/app/keamanan.html');
        }
          if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
        
         if(!$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }else{

        $data['title']='Mau Cafe | Ubah Email';
        $data['css']='editProfil.css';
        $data['js']='newEmail.js'; 
        return view('user/newEmail',$data);
        }
                
    }
    public function newEmail(){
         if($this->request->isAJAX()){

            $validation=\Config\Services::validation();
            $valid=$this->validate([
                'email'=>[
                        'rules'=>'required|is_unique[tb_login.email]',
                        'errors'=>[
                            'required'=>'{field}  harus diisi',
                            'is_unique'=>'{field} sudah terdaftar'
                        ]
                ]
                
            ]);
            if(!$valid){
                 $msg=[
                    'errorValid'=>[
                        'email'=>$validation->getError('email')
                    ]
                ];
            }else{
                $this->LoginTokenModel->deleteByEmail(session()->get('email'));
                $dataEmail=[
                    'id'=>session()->get('id'),
                    'email'=>$this->request->getPost('email')
                ];
                $this->LoginModel->save($dataEmail);
                $profileUser=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                $dataProfile=[
                    'id'=>$profileUser['id'],
                    'email'=>$this->request->getPost('email')
                ];  
                $this->ProfileModel->save($dataProfile);
                $msg=[
                    'success'=>'Email Berhasil Diganti'
                ];

             
            }
                    $msg['token']=csrf_hash();
                    echo json_encode($msg);
        }else{
             exit('request tidak dapat dilakukan');
        }
    }
     public function viewUbahEmail(){
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
         $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
         if(@!$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }
        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
          if(@$data['profilByIdLogin']){
             $dataCekpin=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];
             $this->ProfileModel->save($dataCekpin);
         }else{
            
         }
    
       
      
            $data['title']='Mau Cafe | Ubah Email';
            $data['css']='editprofil.css';
            $data['js']='ubahEmail.js'; 
            
            return view('user/sendUbahEmail',$data);

                
    }
    public function ubahEmail(){
         if($this->request->isAJAX()){

            $validation=\Config\Services::validation();
            $valid=$this->validate([
                'email'=>[
                        'rules'=>'required',
                        'errors'=>[
                            'required'=>'{field}  harus diisi'
                        ]
                ]
                
            ]);
            if(!$valid){
                 $msg=[
                    'errorValid'=>[
                        'email'=>$validation->getError('email')
                        
                    ]
                ];
            }else{

              if($this->request->getPost('email')){
                    $userByEmail=$this->LoginModel->getUser($this->request->getPost('email'));
                    if($userByEmail){
                        
                        $token=base64_encode(random_bytes(32));
                        $data=[
                            'email'=>$this->request->getPost('email'),
                            'token'=>$token,
                            'type'=>'ubahEmail',
                            'time'=>time()
                        ];
                        
                            $this->sendEmail($token,$this->request->getPost("email"),'ubahEmail');
                            $this->LoginTokenModel->save($data);
                            $msg=[
                                'success'=>'Email Telah Dikirim'
                            ];
                           
                        
                     }else{
                         $msg=[
                                'error'=>'Email Tidak Terdaftar'
                            ];
                      
                     }
                }
            }
                    $msg['token']=csrf_hash();
                    echo json_encode($msg);
        }else{
             exit('request tidak dapat dilakukan');
        }
    }

    public function viewUbahPinEmail(){
         if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
         $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
         if(@!$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }
        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
          if(@$data['profilByIdLogin']){
             $dataCekpin=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];
             $this->ProfileModel->save($dataCekpin);
         }else{
            
         }
      
        
        $data['title']='Mau Cafe | Ubah Pin';
        $data['css']='editprofil.css';
        $data['js']='ubahPinEmail.js'; 
        
        return view('user/sendEmailPin',$data);
    }

    public function ubahPinEmail(){
         if($this->request->isAJAX()){

            $validation=\Config\Services::validation();
            $valid=$this->validate([
                'email'=>[
                        'rules'=>'required',
                        'errors'=>[
                            'required'=>'{field}  harus diisi'
                        ]
                ]
                
            ]);
            if(!$valid){
                 $msg=[
                    'errorValid'=>[
                        'email'=>$validation->getError('email')
                        
                    ]
                ];
            }else{

              if($this->request->getPost('email')){
                    $userByEmail=$this->LoginModel->getUser($this->request->getPost('email'));
                    if($userByEmail){
                        
                        $token=base64_encode(random_bytes(32));
                        $data=[
                            'email'=>$this->request->getPost('email'),
                            'token'=>$token,
                            'type'=>'pinEmail',
                            'time'=>time()
                        ];
                        $userEmailType=$this->LoginTokenModel->getUserByEmailAndType($this->request->getPost('email'),'pinEmail');
                        if(!$userEmailType){
                            $this->sendEmail($token,$this->request->getPost("email"),'pinEmail');
                            $this->LoginTokenModel->save($data);
                            $msg=[
                                'success'=>'Email UbahPin Telah Dikirim'
                            ];
                           
                        }else{
                            $msg=[
                                'success'=>'Silahkan Cek Email Anda ,link telah dikirim atau tunggu selama 24 jam'
                            ];
                            
                        }
                     }else{
                         $msg=[
                                'error'=>'Email Tidak Terdaftar'
                            ];
                      
                     }
                }
            }
                    $msg['token']=csrf_hash();
                    echo json_encode($msg);
        }else{
             exit('request tidak dapat dilakukan');
        }
    }

     public function sendEmail($token,$email,$type){
       
        $this->email->setFrom('cafeSmkn4malang@gmail.com','cafeSmkn4');
        $this->email->setTo($email);

        
        if($type=='pinEmail'){
        $this->email->setSubject('Ganti Pin ');
        $this->email->setMessage('Click this link to change your pin : 
        <a href="'.base_url().'/user/verify?email='.$email.'&token='.urlencode($token).'&type='.$type.'">Activate</a> ');    
        }
         if($type=='ubahEmail'){
        $this->email->setSubject('Ganti Email ');
        $this->email->setMessage('Click this link to change your email : 
        <a href="'.base_url().'/user/verify?email='.$email.'&token='.urlencode($token).'&type='.$type.'">Activate</a> ');    
        }
        
        if($this->email->send()){
            
            return true;
        }else{
          
            return false;
        }

   
            
 }
    public function verify(){
        $email = $this->request->getGet('email');
        $token = $this->request->getGet('token');
        $type  = $this->request->getGet('type');
        $user=$this->LoginModel->getUser($email);
        $userProfile=$this->ProfileModel->getProfileByEmailLogin($email);
        if ($user) {
            $usertoken=$this->LoginTokenModel->getUserByEmailAndTypeAndToken($email,$token,$type);


            if ($usertoken) {
                if(time() - $usertoken['time'] <(60*60*24)){
                
                    if(@$usertoken['type']=='pinEmail'){
                         // session
                        session()->set([
                           'email' => $user['email'],
                           'role' => $user['role'],
                           'id'=>$user['id']
                        ]);
                         $dataCekpin=[
                        'id'=>$userProfile['id'],
                        'cekPin'=>'1'
                        ];
                        $this->ProfileModel->save($dataCekpin);
                        $this->LoginTokenModel->deleteByEmailAndTypeAndToken($email,$token,$type);
                        return redirect()->to('/app/ubahPin.html');

                    }else if(@$usertoken['type']=='ubahEmail'){
                          session()->set([
                           'email' => $user['email'],
                           'role' => $user['role'],
                           'id'=>$user['id']
                        ]);
                          $dataCekpin=[
                        'id'=>$userProfile['id'],
                        'cekMail'=>'1'
                        ];
                        $this->ProfileModel->save($dataCekpin);
                        return redirect()->to('/app/newEmail.html');
                    }else{
                        exit('request tidak dapat dilakukan');   
                    }

                }else{
                    $this->LoginModel->delete($user['id']);
                    $this->LoginTokenModel->deleteByEmailAndTypeAndToken($email,$token,$type);
                    session()->setFlashdata('flashdataInput',' Flashdata ');
                    session()->setFlashdata('pesanGagal','token expired  ');
                    if($this->request->getGet('type')=='pinEmail'){
                        return redirect()->to('/app/ubahPinEmail.html');
                    }else if($this->request->getGet('type')=='ubahEmail'){
                        return redirect()->to('/app/ubahEmail.html');
                    }
                }
            }else{
                session()->setFlashdata('flashdataInput',' Flashdata ');
              session()->setFlashdata('pesanGagal','wrong token');
               if($this->request->getGet('type')=='pinEmail'){
                        return redirect()->to('/app/ubahPinEmail.html');
                }else if($this->request->getGet('type')=='ubahEmail'){
                        return redirect()->to('/app/ubahEmail.html');
                }
            }
        }else{
            session()->setFlashdata('flashdataInput',' Flashdata ');
           session()->setFlashdata('pesanGagal','Email Tidak Terdaftar');
            session()->destroy();
            return redirect()->to('/app/login.html'); 
        }
    }
    public function kirimSaldo(){
        if(!session()->get('id') && !session()->get('email')){
             return redirect()->to('/app/login.html'); 
        }
        if(session()->get('role')=='petugas'){
            return redirect()->to('/petugas/managePesanan.html');
        }
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin/manageAkun.html');
        }
        $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
        if(@$data['profilByIdLogin']['pin']=='0'){
            return redirect()->to('/app/pinProfile.html');  
         }
        if(@!$data['profilByIdLogin']){
            return redirect()->to('/app/profile.html');
        }
          if(@$data['profilByIdLogin']){
             $dataCekpin=[
                    'id'=>@$data['profilByIdLogin']['id'],
                    'cekPin'=>'0',
                    'pinTranksaksi'=>'0',
                    'cekMail'=>0,
                    'pinKirimSaldo'=>0
                ];
             $this->ProfileModel->save($dataCekpin);
         }else{
            
         }
        $data['title']='Mau Cafe | Kirim Saldo';
        $data['css']='kirimsaldo.css';
        $data['js']='kirimsaldo.js'; 
                
        return view('user/kirimSaldo',$data);
    }
    public function getUserByNomor(){
        if($this->request->isAJAX()){
             $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
            $data['getUserByNomor']=$this->ProfileModel->getUserByNomor($this->request->getPost('nomor'));
            if($data['getUserByNomor']){
                if($data['getUserByNomor']['nomor']==$data['profilByIdLogin']['nomor']){
                    $msg=[
                    'error'=>'Tidak Bisa Mengirim Ke Nomor Sendiri'
                ];
                }else{
                    $msg=[
                        'data'=>$data['getUserByNomor']
                    ];
                }

            }else{
                  $msg=[
                    'error'=>'Nomor Yang Anda Cari Tidak Ada'
                ];
            }
            $msg['token']=csrf_hash();
            echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function searchLokasi(){
        if($this->request->isAJAX()){
                $data['searchLokasi']=$this->LokasiModel->getLokasiByKeyword($this->request->getPost('keyword'));
              
                $msg=[
                    'data'=>view('user/searchLokasi',$data)
                ];
                $msg['token']=csrf_hash();
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }
    public function formPesan(){
         if($this->request->isAJAX()){
                $data['profilByIdLogin']=$this->ProfileModel->getProfileByIdLogin(session()->get('id'));
                  $data['tampildata']=$this->KeranjangMenuModel->getKeranjangUser(@$data['profilByIdLogin']['id']);
                $msg=[
                    'data'=>view('user/formPesan',$data)
                ];
               
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }
}
