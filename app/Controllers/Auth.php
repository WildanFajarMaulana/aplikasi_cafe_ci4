<?php

namespace App\Controllers;
use App\Models\LoginModel;
use App\Models\LoginTokenModel;
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
class Auth extends BaseController
{
    protected $LoginModel;
    protected $LoginTokenModel;
    public function __construct(){
        $this->LoginModel = new LoginModel();
        $this->LoginTokenModel = new LoginTokenModel();
        $this->email = \Config\Services::email();
    }
    // public function admin(){
    //     if($this->request->getPost()){

    //         $email=$this->request->getPost('email');
    //         $password=$this->request->getPost('password');

    //         $user=$this->LoginModel->getUser($email);
    //         if ($user) {
    //             if ($user['is_active']==1) {
    //                 if($user['role']=='admin'){
    //                     if($password==$user['password']){
    //                         session()->set([
    //                          'email' => $user['email'],
    //                          'role' => $user['role'],
    //                          'id'=>$user['id']
    //                          ]);
    //                     }
    //                      if($user['role']=='admin'){
    //                          return redirect()->to('/admin/manageAkun.html');
    //                         }else{
    //                          session()->setFlashdata('pesan','Email/Username Belum Terdaftar'); 
    //                          return redirect()->to('/admin/login.html');
    //                     }
    //                 }else{
    //                     if (password_verify($password, $user['password'])) {

    //                         // session
    //                         session()->set([
    //                          'email' => $user['email'],
    //                          'role' => $user['role'],
    //                          'id'=>$user['id']
    //                          ]);
    //                         if($user['role']=='petugas'){
    //                          return redirect()->to('admin/menuPetugas');
    //                         }else{
    //                          session()->setFlashdata('pesan','Email/Username Belum Terdaftar'); 
    //                          return redirect()->to('/admin/login.html');
    //                         }
                            
    //                     }else{
    //                          session()->setFlashdata('pesan','password salah');
    //                         return redirect()->to('/admin/login.html');
    //                     }

    //                 }
                            
                    
                        
                        
    //                 }
                    
    //             else{
    //             session()->setFlashdata('pesan',' Akun nggk aktif');
    //             return redirect()->to('/admin/login.html');
    //             }
    //         }else
    //         {
    //             session()->setFlashdata('pesan','Email/Username Belum Terdaftar');
    //             return redirect()->to('/admin/login.html');
    //         }
    //     }else{
    //         $data['title']='Mau Cafe | Login';
    //         $data['js']='login.js';
    //         return view('auth/admin',$data);
    //     }
    // }   




























    public function tampilanAwal(){
        if(session()->get('id') && session()->get('email')){
             return redirect()->to('/app/beranda.html'); 
        }
        return view('auth/index');
    }
    public function index()
    {
        if(session()->get('id') && session()->get('email')){
             return redirect()->to('/app/beranda.html'); 
        }
        $data['title']='Mau Cafe | Login';
        $data['js']='login.js';
        return view('auth/login',$data);
    }
    public function register(){
        if(session()->get('id') && session()->get('email')){
             return redirect()->to('/app/beranda.html'); 
        }
        $data['title']='Mau Cafe | Register';
        $data['js']='register.js';
        return view('auth/register',$data);
    }
    public function lupaPassword(){
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
                            'type'=>'lupaPassword',
                            'time'=>time()
                        ];
                        $userEmailType=$this->LoginTokenModel->getUserByEmailAndType($this->request->getPost('email'),'lupaPassword');
                        if(!$userEmailType){
                            $this->sendEmail($token,$this->request->getPost("email"),'lupaPassword');
                            $this->LoginTokenModel->save($data);
                            $msg=[
                                'success'=>'Email lupaPassword Telah Dikirim'
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
             $email = $this->request->getGet('email');
            $token = $this->request->getGet('token');
            $type  = $this->request->getGet('type');

            $usertokenPassword=$this->LoginTokenModel->getUserByEmailAndTypeAndToken($email,$token,$type);
            if($usertokenPassword){
                session();
                 $data['usertokenPasswordGet']=$this->LoginTokenModel->getUserByEmailAndTypeAndToken($email,$token,$type);
                 $data['validation']=\Config\Services::validation();
                 $data['emailNewPassword']=$this->request->getGet('email');
                  $data['title']='Mau Cafe | NewPassword';
                  $data['js']='newpassword.js';
                return view('auth/newPassword',$data);
            }else{
                 $data['title']='Mau Cafe | lupaPassword';
                 $data['js']='lupapassword.js';
                return view('auth/lupaPassword',$data);
            }
            
           
        }
       
    }
    public function prosesLogin(){

        if($this->request->isAJAX()){

            $validation=\Config\Services::validation();
            $valid=$this->validate([
                'email'=>[
                        'rules'=>'required',
                        'errors'=>[
                            'required'=>'{field}  harus diisi'
                        ]
                ],
                 'password'=>[
                        'rules'=>'required|',
                        'errors'=>[
                            'required'=>'{field}  harus diisi'
                          
                        ]
                ]
            ]);

              if(!$valid){
                $msg=[
                    'errorValid'=>[
                        'email'=>$validation->getError('email'),
                        'password'=>$validation->getError('password')
                    ]
                ];
               
              }else{

                 $email=$this->request->getPost('email');
                $password=$this->request->getPost('password');

                $user=$this->LoginModel->getUser($email);
                if ($user) {
                    if ($user['is_active']==1) {
                        if (password_verify($password, $user['password'])) {
                            // cookie

                               if($this->request->getPost("remember")) {
                                setcookie ("user_login",$this->request->getPost("email"),time()+ (10 * 365 * 24 * 60 * 60));
                                setcookie ("userpassword",$this->request->getPost("password"),time()+ (10 * 365 * 24 * 60 * 60));
                              } else {
                                if(isset($_COOKIE["user_login"])) {
                                 setcookie ("user_login","");
                               }
                               if(isset($_COOKIE["userpassword"])) {
                                 setcookie ("userpassword","");
                               }
                             }
                            // session
                            session()->set([
                             'email' => $user['email'],
                             'role' => $user['role'],
                             'id'=>$user['id']
                             ]);
                            if($user['role']=='user'){
                             $msg=[
                                'successUser'=>'anda login sebagai user'
                             ];    
                            }else if($user['role']=='petugas'){
                             $msg=[
                                'successPetugas'=>'anda login sebagai Petugas'
                             ];    
                            }else if($user['role']=='admin'){
                             $msg=[
                                'successAdmin'=>'anda login sebagai Admin'
                             ];    
                            }else{
                               $msg=[
                                'successNull'=>'null'
                             ]; 
                            }
                        }else{
                             $msg=[
                                'errorPassword'=>'Password Salah'
                             ];  
                                
                        }
                            
                            
                        }
                        
                    else{
                     $msg=[
                                'errorAktif'=>'Account tidak aktif'
                     ];  
                    }
                }else
                {
                     $msg=[
                                'errorEmail'=>'Email/Username Tidak Terdaftar'
                     ];  
                }
                
              }
                $msg['token']=csrf_hash();
              echo json_encode($msg);
        }else{
            exit("request tidak dapat dilakukan");
        }
        
    }
    public function prosesRegister(){
        if($this->request->isAJAX()){
            $validation=\Config\Services::validation();
            $valid=$this->validate([
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
                 'konfirmasiPassword'=>[
                        'rules'=>'required|matches[password]',
                        'errors'=>[
                            'required'=>'{field}  harus diisi',
                            'matches'=>'{field}  tidak sama'
                        ]
                ]
            ]);

              if(!$valid){
                $msg=[
                    'error'=>[
                        'username'=>$validation->getError('username'),
                        'email'=>$validation->getError('email'),
                        'password'=>$validation->getError('password'),
                        'konfirmasiPassword'=>$validation->getError('konfirmasiPassword')
                    ]

               
              
                ];

               
              }else{
                $data=[
                    'username'=>$this->request->getPost("username"),
                    'email'=>$this->request->getPost("email"),
                    'password'=>password_hash($this->request->getPost("password"),PASSWORD_BCRYPT),
                    'role'=>'user',
                    'is_active'=>'0'
                ];

                $token=base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $this->request->getPost("email"),
                    'token' =>$token,
                    'type'=>'verify',
                    'time'=>time()
                ];

                $this->sendEmail($token,$this->request->getPost("email"),'verify');
                $this->LoginTokenModel->save($user_token);
                $this->LoginModel->save($data);

                $msg=[
                    'success'=>'Registrasi Berhasil Silahkan Aktivasi Email Anda'
                 ];
            
              }
              
                $msg['token']=csrf_hash();

              echo json_encode($msg);




        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function prosesNewPassword(){
        if($this->request->isAJAX()){
            $password=$this->request->getPost('password');


            $validation=\Config\Services::validation();

            $valid=$this->validate([
               
                 'password'=>[
                        'rules'=>'required|min_length[5]',
                        'errors'=>[
                            'required'=>'{field}  harus diisi',
                            'min_length'=>'isi password minimal 5'
                        ]
                ],
                 'konfirmasiPassword'=>[
                        'rules'=>'required|matches[password]',
                        'errors'=>[
                            'required'=>'{field}  harus diisi',
                            'matches'=>'{field}  tidak sama'
                        ]
                ]
            ]);
            if(!$valid){
                $msg=[
                    'error'=>[
                        'errorPassword'=>$validation->getError('password'),
                        'errorKonfirmasiPassword'=>$validation->getError('konfirmasiPassword')
                    ]
                ];
            }else{
                $userEmail=$this->LoginModel->getUser($this->request->getPost('emailNewPassword'));
                if($userEmail){
                    $usertoken=$this->LoginTokenModel->getUserByEmailAndTypeAndToken($this->request->getPost('emailNewPassword'),$this->request->getPost('tokenNewPassword'),$this->request->getPost('typeNewPassword'));
                    if($usertoken){
                        if(time() - $usertoken['time'] <(60*60*24)){

                            $data=[
                            'id'=>$userEmail['id'],
                            'password'=>password_hash($this->request->getVar("password"),PASSWORD_BCRYPT)
                    
                            ];
                           
                            $this->LoginModel->save($data);
                            $this->LoginTokenModel->deleteByEmailAndTypeAndToken($this->request->getPost('emailNewPassword'),$this->request->getPost('tokenNewPassword'),$this->request->getPost('typeNewPassword'));
                             $msg=[
                                'success'=>'Berhasil Mengganti Password'
                            ];
                        }else{
                            $this->LoginModel->delete($userEmail['id']);
                            $this->LoginTokenModel->deleteByEmailAndTypeAndToken($this->request->getPost('emailNewPassword'),$this->request->getPost('tokenNewPassword'),$this->request->getPost('typeNewPassword')); 
                            $msg=[
                                'errorToken'=>'Token Expired'
                            ];  
                        }
                    }
                } 

                 
            } 

           $msg['token']=csrf_hash();
           echo json_encode($msg);
          
        }else{
            exit("request tidak dapat dilakukan");
        }
    }
    public function sendEmail($token,$email,$type){
        if(session()->get('id') && session()->get('email')){
             return redirect()->to('/app/beranda.html'); 
        }
        $this->email->setFrom('cafeSmkn4malang@gmail.com','cafeSmkn4');
        $this->email->setTo($email);

        
        if($type=='verify'){

        $this->email->setSubject('Email verif');
        $this->email->setMessage('Click this link to verify your account : 
        <a href="'.base_url().'/auth/verify?email='.$email.'&token='.urlencode($token).'&type='.$type.'">Activate</a> ');
        
            
        }else if($type=='lupaPassword'){
        $this->email->setSubject('lupaPassword');
      
        $this->email->setMessage('Click this link to input new password for your account :
        <a href="'.base_url().'/auth/lupaPassword?email='.$email.'&token='.urlencode($token).'&type='.$type.'">new password</a> ');
        
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
        if ($user) {
            $usertoken=$this->LoginTokenModel->getUserByEmailAndTypeAndToken($email,$token,$type);


            if ($usertoken) {
                if(time() - $usertoken['time'] <(60*60*24)){
                    $data=[
                        'id'=>$user['id'],
                        'is_active'=>'1'
                    ];

                    $this->LoginModel->save($data);
                    $this->LoginTokenModel->deleteByEmailAndTypeAndToken($email,$token,$type);
                    // $this->LoginTokenModel->delete($usertoken['id']);


                    session()->setFlashdata('flashdataInput',' Flashdata ');
                    session()->setFlashdata('pesan',$email.' Berhasil di Aktivasi ');
                    return redirect()->to('/app/login.html');
                }else{
                    $this->LoginModel->delete($user['id']);
                    $this->LoginTokenModel->deleteByEmailAndTypeAndToken($email,$token,$type);
                    session()->setFlashdata('flashdataInput',' Flashdata ');
                    session()->setFlashdata('pesanGagal','token expired  ');
                    return redirect()->to('/app/login.html');
                }
            }else{
                session()->setFlashdata('flashdataInput',' Flashdata ');
              session()->setFlashdata('pesanGagal','wrong token');
              return redirect()->to('/app/login.html'); 
            }
        }else{
            session()->setFlashdata('flashdataInput',' Flashdata ');
           session()->setFlashdata('pesanGagal','aktivasi fail');
            return redirect()->to('/app/login.html'); 
        }
    }
    // public function prosesEmailPin(){
    //      $validation=\Config\Services::validation();
    //         $valid=$this->validate([
    //             'email'=>[
    //                     'rules'=>'required',
    //                     'errors'=>[
    //                         'required'=>'{field}  harus diisi'
    //                     ]
    //             ]
                
    //         ]);
    //         if(!$valid){
    //              $msg=[
    //                 'errorValid'=>[
    //                     'email'=>$validation->getError('email')
                        
    //                 ]
    //             ];
    //         }else{

    //           if($this->request->getPost('email')){
    //                 $userByEmail=$this->LoginModel->getUser($this->request->getPost('email'));
    //                 if($userByEmail){
                        
    //                     $token=base64_encode(random_bytes(32));
    //                     $data=[
    //                         'email'=>$this->request->getPost('email'),
    //                         'token'=>$token,
    //                         'type'=>'lupaPassword',
    //                         'time'=>time()
    //                     ];
    //                     $userEmailType=$this->LoginTokenModel->getUserByEmailAndType($this->request->getPost('email'),'lupaPassword');
    //                     if(!$userEmailType){
    //                         $this->sendEmail($token,$this->request->getPost("email"),'lupaPassword');
    //                         $this->LoginTokenModel->save($data);
    //                         $msg=[
    //                             'success'=>'Email lupaPassword Telah Dikirim'
    //                         ];
                           
    //                     }else{
    //                         $msg=[
    //                             'success'=>'Silahkan Cek Email Anda ,link telah dikirim atau tunggu selama 24 jam'
    //                         ];
                            
    //                     }
    //                  }else{
    //                      $msg=[
    //                             'error'=>'Email Tidak Terdaftar'
    //                         ];
                      
    //                  }
    //             }
    //         }
    //             echo json_encode($msg);
    // }

     public function logout(){
        if($this->request->isAJAX()){
        
            session()->destroy();
            $msg=[
                'data'=>'Logout Berhasil'
            ];

            $msg['token']=csrf_hash();
            echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
        }
        
    }
    public function logoutAdminPetugas(){
        session()->destroy();
        return redirect()->to('/app/login.html');
    }

}
