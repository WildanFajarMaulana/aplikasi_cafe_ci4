<?php

namespace App\Controllers;
use App\Models\MenuModel;
use App\Models\ProfileModel;
use App\Models\favMenuModel;
use App\Models\KeranjangMenuModel;
use App\Models\TranksaksiModel;
use App\Models\LoginModel;
class Admin extends BaseController
{
    protected $MenuModel;
    protected $ProfileModel;
    protected $favMenuModel;
    protected $KeranjangMenuModel;
    protected $TranksaksiModel;
    protected $LoginModel;

    public function __construct()
    {
        $this->LoginModel = new LoginModel();
        $this->MenuModel = new MenuModel();
        $this->ProfileModel = new ProfileModel();
        $this->favMenuModel = new favMenuModel();
        $this->KeranjangMenuModel = new KeranjangMenuModel();
        $this->TranksaksiModel = new TranksaksiModel();
        
    }
    public function dataAkun()
    {
        $data['title']='Admin | ManageAkun';
        $data['loginUser']=$this->LoginModel->findAll();
        $data['css']='index.css';
        return view('admin/dataAkun',$data);
    }

    public function dataMenu()
    {
        $data['title']='Admin | ManageMenu';
        $data['css']='index.css';
        return view('admin/dataMenu',$data);
    }

    public function dataLokasi()
    {
        $data['title']='Admin | ManageLokasi';
        $data['css']='index.css';
        return view('admin/dataLokasi',$data);
    }

    public function dataVoucher()
    {
        $data['title']='Admin | ManageVoucher';
        $data['css']='index.css';
        return view('admin/dataVoucher',$data);
    }

    public function dataArtikel()
    {
        $data['title']='Admin | ManageArtikel';
        $data['css']='index.css';
        return view('admin/dataArtikel',$data);
    }

    public function pesananMasuk()
    {
        $data['title']='Admin | ManagePesanan';
        $data['css']='index.css';
        return view('admin/pesananMasuk',$data);
    }

    public function tambahUser(){
        $active;
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
}
