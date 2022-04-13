<?php

namespace App\Controllers;
use App\Models\MenuModel;
use App\Models\ProfileModel;
use App\Models\favMenuModel;
use App\Models\KeranjangMenuModel;
use App\Models\TranksaksiModel;
use App\Models\LoginModel;
use App\Models\RiwayatSaldoModel;
use App\Models\E_walletModel;
class Petugas extends BaseController
{
    protected $MenuModel;
    protected $ProfileModel;
    protected $favMenuModel;
    protected $KeranjangMenuModel;
    protected $TranksaksiModel;
    protected $LoginModel;
    protected $riwayatSaldoModel;
    protected $E_walletModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel();
        $this->MenuModel = new MenuModel();
        $this->ProfileModel = new ProfileModel();
        $this->favMenuModel = new favMenuModel();
        $this->KeranjangMenuModel = new KeranjangMenuModel();
        $this->TranksaksiModel = new TranksaksiModel();
        $this->riwayatSaldoModel = new RiwayatSaldoModel();
        $this->E_walletModel = new E_walletModel();
        session();
        
    }
    public function pesananMasuk()
    {
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='admin'){
           return redirect()->to('/admin/manageAkun.html');
       }
        $data['title']='Petugas | ManagePesanan';
        $data['css']='index.css';
        $data['pesananMasuk']=$this->TranksaksiModel->getByStatusPesan();
        $data['pager'] = $this->TranksaksiModel->pager;
        return view('petugas/pesananMasuk',$data);
    }

    public function topUp()
    {
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='admin'){
           return redirect()->to('/admin/manageAkun.html');
       }
        $data['title']='Petugas | TopUp';
        $data['css']='index.css';
        return view('petugas/topUp',$data);
    }
    
    public function riwayatPesanan()
    {
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='admin'){
           return redirect()->to('/admin/manageAkun.html');
       }
        $data['title']='Petugas | RiwayatPesanan';
        $data['css']='index.css';
        $data['riwayatPesanan']=$this->TranksaksiModel->getRiwayatPesananSelesai();
        $data['pager'] = $this->TranksaksiModel->pager;
        return view('petugas/riwayatPesanan',$data);
    }

    public function riwayatopUp()
    {
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='admin'){
           return redirect()->to('/admin/manageAkun.html');
       }
        $data['title']='Petugas | RiwayatTopup';
        $data['css']='index.css';
        $data['riwayatTopUp']=$this->riwayatSaldoModel->getRiwayatBydeskripsi();
        $data['pager'] = $this->riwayatSaldoModel->pager;
        return view('petugas/riwayatopup',$data);
    }

    public function konfirmasiPesanan(){
      if($this->request->isAJAX()){
        $prosesTranksaksi=$this->TranksaksiModel->cekTranksaksiByIdStatusPemesanan($this->request->getPost('id_pembeli'),'diproses');
        
        $data=[
            'id_tranksaksi'=>$prosesTranksaksi['id_tranksaksi'],
            'status_tranksaksi'=>'dikonfirmasi',
            'id_petugas'=>$_SESSION['id']
        ];
        $this->TranksaksiModel->save($data);
        $msg=[
            'success'=>'Pesanan Berhasil Dikonfirmasi'
        ];
        $msg['token']=csrf_hash();
        echo json_encode($msg);
      }else{
          exit('request tidak dapat dilakukan');
      }
       
    }
    public function akhiriPesanan(){
        if($this->request->isAJAX()){
            $prosesTranksaksi=$this->TranksaksiModel->cekTranksaksiByIdStatusPemesanan($this->request->getPost('id_pembeli'),'dikonfirmasi');
            $profilByIdPembeli=$this->ProfileModel->getProfileByIdPembeli($this->request->getPost('id_pembeli'));
           
            $data=[
                'id_tranksaksi'=>@$prosesTranksaksi['id_tranksaksi'],
                'status_tranksaksi'=>'selesai',
                'id_petugas'=>$_SESSION['id']
            ];
            $dataSaldoUser=[
                'id'=>@$profilByIdPembeli['id'],
                'saldo'=>@$profilByIdPembeli['saldo']-@$prosesTranksaksi['total_pembayaran']
            ];
            $nama_wallet='cafe_grafika';
            $e_wallet=$this->E_walletModel->getWalletByNamaWallet($nama_wallet);
            $dataE_wallet=[
                'id'=>@$e_wallet['id'],
                'saldo'=>@$e_wallet['saldo']+@$prosesTranksaksi['total_pembayaran']
            ];
    
    
            $dataRiwayatSaldo=[
                'id_pembeli'=>@$profilByIdPembeli['id'],
                'deskripsi'=>'Saldo Anda Telah Terpotong',
                'r_saldo'=>@$prosesTranksaksi['total_pembayaran']
            ];
            
            if(trim($this->request->getPost('payment'))==trim('e_wallet')){
               
                $this->riwayatSaldoModel->save($dataRiwayatSaldo);
                $this->KeranjangMenuModel->deleteByidPembeli($this->request->getPost('id_pembeli'));
                $this->ProfileModel->save($dataSaldoUser);
                $this->E_walletModel->save($dataE_wallet);
                $this->TranksaksiModel->save($data);
                $msg=[
                    'success'=>'Pesanan Berhasil Dikonfirmasi'
                ];
                
            }else{
                $this->TranksaksiModel->save($data);
                $this->KeranjangMenuModel->deleteByidPembeli($this->request->getPost('id_pembeli'));
                $msg=[
                    'success'=>'Pesanan Berhasil Dikonfirmasi'
                ];
               
               
            }
            $msg['token']=csrf_hash();
            echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
        }
       
        
       
      
       
       
    
        



    }
    public function generateSaldo(){
        if($this->request->isAJAX()){
            $nama_wallet='cafe_grafika';
        
            $e_wallet=$this->E_walletModel->getWalletByNamaWallet($nama_wallet);
            if(trim($this->request->getGet('generateSaldo'))<=$e_wallet['saldo']){
                $msg=[
                    'success'=>$this->request->getGet('generateSaldo')
                ];
            }else{
                $msg=[
                    'error'=>'Gagal Generate,Saldo E_wallet Sedang Kosong'
                ];
            }
            
            echo json_encode($msg);
       }else{
           exit('request tidak dapat dilakukan');
       }
    }
    public function prosesTopup(){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='admin'){
           return redirect()->to('/admin/manageAkun.html');
       }
        $getUserByNomor=$this->ProfileModel->getUserByNomor($this->request->getPost('nomor'));
        $nama_wallet='cafe_grafika';
        
            $e_wallet=$this->E_walletModel->getWalletByNamaWallet($nama_wallet);
        if($getUserByNomor){
            $dataUser=[
                'id'=>$getUserByNomor['id'],
                'saldo'=>$getUserByNomor['saldo']+$this->request->getPost('saldo')
            ];
            $dataRiwayatSaldo=[
                'id_pembeli'=>@$getUserByNomor['id'],
                'id_petugas'=>$_SESSION['id'],
                'deskripsi'=>'Top Up',
                'r_saldo'=>$this->request->getPost('saldo')
            ];
            $dataWallet=[
                'id'=>$e_wallet['id'],
                'saldo'=>$e_wallet['saldo']-$this->request->getPost('saldo')
            ];
            $this->riwayatSaldoModel->save($dataRiwayatSaldo);
            $this->ProfileModel->save($dataUser);
            $this->E_walletModel->save($dataWallet);
            session()->setFlashdata('pesan','Top Up Berhasil');
            return redirect()->to('/petugas/managetopUp.html');
            
        }else{
            session()->setFlashdata('pesanError','Nomor Tidak Terdaftar');
            return redirect()->to('/petugas/managetopUp.html');
        }
    }
    public function getDataPesanan(){
        if($this->request->isAJAX()){
                $data['pesananMasuk']=$this->TranksaksiModel->getByStatusPesan();
                
                
               
                $msg=[
                    'data'=>view('petugas/getDataPesanan',$data)
                ];
               
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }
    public function getDetailKeranjangByidpembeli(){
        if($this->request->isAJAX()){
                $data['keranjangDetail']=$this->KeranjangMenuModel->getKeranjangByIdPembeli($this->request->getGet('id_pembeli'));
                
                
               
                $msg=[
                    'data'=>view('petugas/getDetailKeranjang',$data),
                    'all'=> $data['keranjangDetail']
                ];
               
                echo json_encode($msg);
        }else{
            exit("maaf tidak dapat diproses");
        }
    }
    public function deletePesanan($id){
        if(!session()->get('id') && !session()->get('email')){
            return redirect()->to('/app/login.html'); 
       }
       if(session()->get('role')=='user'){
           return redirect()->to('/app/beranda.html');
       }
       if(session()->get('role')=='admin'){
           return redirect()->to('/admin/manageAkun.html');
       }
       
       $this->TranksaksiModel->deletePesanan($id);
      
      
        session()->setFlashdata('pesan','Berhasil Delete Pesanan');
        return redirect()->to('/petugas/managePesanan.html');
    }
    

    
}