<?php

namespace App\Controllers;
use App\Models\MenuModel;
use App\Models\ProfileModel;
use App\Models\favMenuModel;
use App\Models\KeranjangMenuModel;
use App\Models\TranksaksiModel;
use App\Models\LoginModel;
use App\Models\E_walletModel;
use App\Models\LokasiModel;
class Admin extends BaseController
{
    protected $MenuModel;
    protected $ProfileModel;
    protected $favMenuModel;
    protected $KeranjangMenuModel;
    protected $TranksaksiModel;
    protected $LoginModel;
    protected $LokasiModel;
    protected $E_walletModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel();
        $this->MenuModel = new MenuModel();
        $this->ProfileModel = new ProfileModel();
        $this->favMenuModel = new favMenuModel();
        $this->KeranjangMenuModel = new KeranjangMenuModel();
        $this->TranksaksiModel = new TranksaksiModel();
        $this->LokasiModel = new LokasiModel();
        $this->E_walletModel = new E_walletModel();
        session();
        
    }
    public function dataAkun()
    {
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        session();
        $data['validation']=\Config\Services::validation();
        $data['title']='Admin | ManageAkun';
        $data['loginUser']=$this->LoginModel->getDataNoAdmin();
        $data['pager'] = $this->LoginModel->pager;
        $data['css']='index.css';
        return view('admin/dataAkun',$data);
    }

    public function dataMenu()
    {
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $data['title']='Admin | ManageMenu';
        $data['menu']=$this->MenuModel->paginate(5,'usermenu');
        $data['pager'] = $this->MenuModel->pager;
        $data['css']='index.css';
        return view('admin/dataMenu',$data);
    }

    public function dataLokasi()
    {
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $data['title']='Admin | ManageLokasi';
        $data['lokasi']=$this->LokasiModel->paginate(5,'userlokasi');
        $data['pager'] = $this->LokasiModel->pager;
        $data['css']='index.css';
        return view('admin/dataLokasi',$data);
    }

    public function dataVoucher()
    {
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $data['title']='Admin | ManageVoucher';
        $data['css']='index.css';
        return view('admin/dataVoucher',$data);
    }

    public function dataArtikel()
    {
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $data['title']='Admin | ManageArtikel';
        $data['css']='index.css';
        return view('admin/dataArtikel',$data);
    }

    public function pesananMasuk()
    {
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $data['title']='Admin | ManagePesanan';
        $data['css']='index.css';
        return view('admin/pesananMasuk',$data);
    }

    public function tambahUser(){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        if(!$this->validate([
            'username'=>[
                'rules'=>'required|is_unique[tb_login.username]',
                'errors'=>[
                    'required'=>'{field}  harus diisi',
                    'is_unique'=>'{field}  sudah terdaftar'
                    
                ]
            ],
            'email'=>[
                    'rules'=>'required|is_unique[tb_login.email]',
                    'errors'=>[
                        'required'=>'{field}  harus diisi',
                        'is_unique'=>'{field}  sudah terdaftar'
                    ]
            ],
             'password'=>[
                    'rules'=>'required|min_length[5]',
                    'errors'=>[
                        'required'=>'{field}  harus diisi',
                        'min_length'=>'isi password minimal 5'
                    ]
            ],
        ])){
            // $validation = \Config\Services::validation();

            // return redirect()->to('/komik')->withInput()->with('validation',$validation);

             return redirect()->to('/admin/manageAkun.html')->withInput();
        }

        $active=0;
        if(!$this->request->getPost('is_active')){
            $active=0;
        }else{
            $active=1;
        }
        $data=[
            'username'=>$this->request->getPost('username'),
            'email'=>$this->request->getPost('email'),
            'password'=>password_hash($this->request->getVar("password"),PASSWORD_BCRYPT),
            'role'=>$this->request->getPost('role'),
            'is_active'=>$active
        ];
        $this->LoginModel->save($data);
        session()->setFlashdata('pesan','Berhasil Menambahkan Data');
        return redirect()->to('/admin/manageAkun.html');
    }
    public function deleteUser($id){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $this->LoginModel->delete($id);
        session()->setFlashdata('pesan','Berhasil Menghapus Data');
        return redirect()->to('/admin/manageAkun.html');
    }

    public function getUserByid(){
        if($this->request->isAJAX()){
            
            $result=$this->LoginModel->getDataLogin($this->request->getGet('id'));
            echo json_encode($result);
       }else{
           exit('request tidak dapat dilakukan');
       }
    }
    public function updateUser(){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $result=$this->LoginModel->getDataLogin($this->request->getPost('id'));
        if($result['email']==$this->request->getPost('email') && $result['username']==$this->request->getPost('username')){
            $rulesUsername='required';
            $rulesEmail='required';
        }else if($result['email']==$this->request->getPost('email') && $result['username']!=$this->request->getPost('username')){
            $rulesUsername='is_unique[tb_login.username]';
            $rulesEmail='required';
        }else if($result['email']!=$this->request->getPost('email') && $result['username']==$this->request->getPost('username')){
            $rulesUsername='required';
            $rulesEmail='is_unique[tb_login.email]';
        }else{
            $rulesUsername='is_unique[tb_login.username]';
            $rulesEmail='is_unique[tb_login.email]';
        }

        
        // if($this->request->getPost('password')==''){
        //     $rulesPass='';
           
        // }else{
        //     $rulesPass='min_length[5]';
        // }
        if(!$this->validate([
            'username'=>[
                'rules'=>$rulesUsername,
                'errors'=>[
                    'is_unique'=>'{field}  sudah terdaftar'
                    
                ]
            ],
            'email'=>[
                    'rules'=>$rulesEmail,
                    'errors'=>[
                        'required'=>'{field}  harus diisi',
                        'is_unique'=>'{field}  sudah terdaftar'
                    ]
            ],
            //  'password'=>[
            //         'rules'=>$rulesPass,
            //         'errors'=>[
            //             'min_length'=>'isi password minimal 5'
            //         ]
            // ],
          
            
            
        ])){
            // $validation = \Config\Services::validation();

            // return redirect()->to('/komik')->withInput()->with('validation',$validation);

             return redirect()->to('/admin/manageAkun.html')->withInput();
        }
        $id=$this->request->getPost('id');
        
     
        if($this->request->getPost('password')==''){
            $data=[
                'id'=>$id,
                'username'=>$this->request->getPost('username'),
                'password'=>$result['password'],
                'role'=>$this->request->getPost('role'),
                'is_active'=>$this->request->getPost('is_active')
            ];
            $this->LoginModel->save($data);
            session()->setFlashdata('pesan','Berhasil Update Data');
            return redirect()->to('/admin/manageAkun.html');
        }else{
            if(strlen($this->request->getPost('password'))<5){
                session()->setFlashdata('lengpass','Input Password minimal 5');
                 return redirect()->to('/admin/manageAkun.html');
            }
            $data=[
                'id'=>$id,
                'username'=>$this->request->getPost('username'),
                'password'=>password_hash($this->request->getPost("password"),PASSWORD_BCRYPT),
                'role'=>$this->request->getPost('role'),
                'is_active'=>$this->request->getPost('is_active')
            ];
            $this->LoginModel->save($data);
            session()->setFlashdata('pesan','Berhasil Update Data');
            return redirect()->to('/admin/manageAkun.html');
        }
    }
    public function getUserProfileByid(){
        if($this->request->isAJAX()){
            
            $result=$this->ProfileModel->getProfileByIdLogin($this->request->getGet('id'));
            echo json_encode($result);
       }else{
           exit('request tidak dapat dilakukan');
       }
    }

    public function tambahMenu(){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
             // ambil gambar
             $filegambar=$this->request->getFile('gambar');
        
            
             // generate nama gambar random
             if($filegambar==''){
                 $namagambar='';
             }else{
                $namagambar=$filegambar->getRandomName();
             // pindahkan file ke folder image
             $filegambar->move('img',$namagambar);
             // ambil nama file
             // $namaSampul=$fileSampul->getName();
             }
             

             $data=[
                 'nama'=>$this->request->getPost('nama_menu'),
                 'gambar'=>$namagambar,
                 'harga'=>$this->request->getPost('harga'),
                 'kategori'=>$this->request->getPost('kategori')
             ];
             $this->MenuModel->save($data);
             session()->setFlashdata('pesan','Berhasil Menambahkan Menu');
        return redirect()->to('/admin/manageMenu.html');

             
    }
    public function deleteMenu($id){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $result=$this->MenuModel->getMenuAdminById($id);
        if($result['gambar']!=''){
            unlink('img/'.$result['gambar']);
        }
        
        $this->favMenuModel->deleteByIdmenu($id);
        $this->MenuModel->delete($id);
        session()->setFlashdata('pesan','Berhasil Delete Menu');
        return redirect()->to('/admin/manageMenu.html');
    }
    public function getMenuByid(){
        if($this->request->isAJAX()){
            
            $result=$this->MenuModel->getMenuAdminById($this->request->getGet('id'));
            echo json_encode($result);
       }else{
           exit('request tidak dapat dilakukan');
       }
    }
    public function updateMenu(){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
             // ambil gambar
             if($this->request->getFile('gambar')==''){
                 $namagambar=$this->request->getPost('gambarLama');
             }else{

             
             $filegambar=$this->request->getFile('gambar');
        
            
             // generate nama gambar random
             $namagambar=$filegambar->getRandomName();
             // pindahkan file ke folder image
             $filegambar->move('img',$namagambar);
             if(!$this->request->getPost('gambarLama')){

             }else{
                unlink('img/'.$this->request->getPost('gambarLama'));
             }
            
             // ambil nama file
             // $namaSampul=$fileSampul->getName();
             }
             $data=[
                 'id'=>$this->request->getPost('id'),
                 'nama'=>$this->request->getPost('nama_menu'),
                 'gambar'=>$namagambar,
                 'harga'=>$this->request->getPost('harga'),
                 'kategori'=>$this->request->getPost('kategori')
             ];
             $this->MenuModel->save($data);
             session()->setFlashdata('pesan','Berhasil Menambahkan Menu');
        return redirect()->to('/admin/manageMenu.html');
        
    }

    public function tambahLokasi(){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $this->LokasiModel->save(['lokasi'=>$this->request->getPost('lokasi')]);
        session()->setFlashdata('pesan','Berhasil Menambahkan Lokasi');
        return redirect()->to('/admin/manageLokasi.html');
    }
    public function editLokasi(){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $this->LokasiModel->save(['id'=>$this->request->getPost('id'),'lokasi'=>$this->request->getPost('lokasi')]);
        session()->setFlashdata('pesan','Berhasil Update Lokasi');
        return redirect()->to('/admin/manageLokasi.html');
    }
    public function deleteLokasi($id){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $this->LokasiModel->delete($id);
        
      
        session()->setFlashdata('pesan','Berhasil Delete Lokasi');
        return redirect()->to('/admin/manageLokasi.html');
    }
    public function getLokasiByid(){
        if($this->request->isAJAX()){
            
            $result=$this->LokasiModel->getLokasiByid($this->request->getGet('id'));
            echo json_encode($result);
       }else{
           exit('request tidak dapat dilakukan');
       }
    }
    public function manageWallet(){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $data['title']='Admin | Wallet';
        $data['css']='index.css';
        $data['cekWallet']=$this->E_walletModel->getWalletByNamaWallet('cafe_grafika');
        return view('admin/dataWallet',$data);
    }
    public function tambahWallet(){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $nama_wallet='cafe_grafika';
        
            $e_wallet=$this->E_walletModel->getWalletByNamaWallet($nama_wallet);
            if($e_wallet){
                $saldoAll=$e_wallet['saldo']+$this->request->getPost('saldo');
                $data=[
                        'id'=>$e_wallet['id'],
                        'saldo'=>$saldoAll
                    ];

                $this->E_walletModel->save($data);
                session()->setFlashdata('pesan','Berhasil Menambahkan Saldo');
                return redirect()->to('/admin/manageWallet.html');
            }else{ 
            $this->E_walletModel->save(['saldo'=>$this->request->getPost('saldo'),'nama_wallet'=> $nama_wallet]);
         
            session()->setFlashdata('pesan','Berhasil Membuat E_wallet');
            return redirect()->to('/admin/manageWallet.html');
            }
        
    }
    public function hapusWallet($nama_wallet){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='petugas'){
           return redirect()->to('/petugas/managePesanan.html');
       }
        $this->E_walletModel->deleteWallet($nama_wallet);
        session()->setFlashdata('pesan','Berhasil Menghapus Wallet');
        return redirect()->to('/admin/manageWallet.html');
    }

}