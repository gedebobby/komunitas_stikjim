<?php

namespace App\Controllers;

use App\Models\M_komunitas;
use App\Models\M_user;
use App\Libraries\Hash;

class Auth extends BaseController
{
    protected $Mkomunitas;

    public function __construct() {

        $this->Mkomunitas = new M_komunitas();
        $this->Muser = new M_user();
        $this->validasi = \Config\Services::validation();
    }

    public function index()
    {
        if (session()->has('id_user')) {
            return redirect()->back();
        };
        $data = [
            'judul' => 'Login',
            'validasi' => $this->validasi
        ];
        return view('auth/login', $data);
    }

    public function registrasi()
    {   
        // session();
        $komunitas = $this->Mkomunitas->getDataKomunitas();
        $angkatan = $this->Mkomunitas->getDataAngkatan();
        $data = [
            'judul' => 'Registrasi',
            'validasi' => $this->validasi,
            'komunitas' => $komunitas,
            'angkatan' => $angkatan
        ];

        return view('auth/registrasi', $data);
    }

    public function ngetest()
    {
        $data = [
            'id_komunitas' => $this->request->getPost('id_komunitas')
        ];

        $jml = count($data['id_komunitas']);

        for ($i=0; $i < $jml; $i++) { 
           echo $i;
        }

        // dd($data);
        // dd($jml);
    }

    public function daftar()
    {
        if (!$this->validate([
            "nama" => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama wajib diisi'
                ]
            ],
            "nim" => [
                'rules' => 'required|is_unique[tb_user.nim]|is_natural',
                'errors' => [
                    'required' => 'NIM wajib diisi',
                    'is_unique' => 'NIM sudah terdaftar',
                    'is_natural' => 'NIM harus berupa angka'
                ]
            ],
            // "tahun_angkatan" => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tahun Angkatan wajib diisi'
            //     ]
            // ],
            // "komunitas" => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Komunitas wajib diisi'
            //     ]
            // ],
            "email" => [
                'rules' => 'required|valid_emails',
                'errors' => [
                    'required' => 'Email wajib diisi',
                    'valid_emails' => 'Email Harus Valid'
                ]
            ],
            "password" => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password wajib diisi',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
            "password2" => [
                'rules' => 'required|min_length[8]|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password wajib diisi',
                    'min_length' => 'Password minimal 8 karakter',
                    'matches' => 'Konfirmasi password salah'
                ]
            ],
            "no_ponsel" => [
                'rules' => 'required|is_unique[tb_user.no_ponsel]|is_natural',
                'errors' => [
                    'required' => 'Nomor Telepon wajib diisi',
                    'is_unique' => 'Nomor Telepon telah terdaftar',
                    'is_natural' => 'Nomor Telepon harus berupa angka'
                ]
            ]
        ])) {

            return redirect()->to('/auth/registrasi')->withInput();
        }

        $jml = count($_POST['id_komunitas']);

        for ($i=0; $i < $jml; $i++) { 

            $data = [
                'nama' => htmlSpecialchars($this->request->getPost('nama')),
                'nim' => htmlSpecialchars($this->request->getPost('nim')),
                'id_angkatan' => htmlSpecialchars($this->request->getPost('id_angkatan')),
                'id_komunitas' => htmlSpecialchars($this->request->getPost('id_komunitas')[$i]),
                'email' => htmlSpecialchars($this->request->getPost('email')),
                'password' => Hash::hash($this->request->getPost('password')),
                'no_ponsel' => htmlSpecialchars($this->request->getPost('no_ponsel'))            
            ];

            $save = $this->Muser->save($data);
        }

        // $data = [
        //     'nama' => htmlSpecialchars($this->request->getPost('nama')),
        //     'nim' => htmlSpecialchars($this->request->getPost('nim')),
        //     'id_angkatan' => htmlSpecialchars($this->request->getPost('id_angkatan')),
        //     'id_komunitas' => htmlSpecialchars($this->request->getPost('id_komunitas')),
        //     'email' => htmlSpecialchars($this->request->getPost('email')),
        //     'password' => Hash::hash($this->request->getPost('password')),
        //     'no_ponsel' => htmlSpecialchars($this->request->getPost('no_ponsel'))            
        // ];

        // dd($data);

        // $save = $this->Muser->save($data);

        if($save){
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Registrasi Berhasil, silahkan login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
          </div>');

          return redirect()->to('/auth');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Registrasi Gagagl
          </div>');

          return redirect()->to('/auth/registrasi');
        }
    }

    public function login_user()
    {
        $validate = $this->validate([
            "nim" => [
                'rules' => 'required|is_not_unique[tb_user.nim]|is_natural',
                'errors' => [
                    'required' => 'NIM wajib diisi',
                    'is_not_unique' => 'NIM belum terdaftar',
                    'is_natural' => 'NIM harus berupa angka'
                ]
            ],
            "password" => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password wajib diisi',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ]
        ]);

        if (!$validate) {
            return redirect()->to('/auth')->withInput();
        } else {
            $nim = htmlSpecialchars($this->request->getPost('nim'));
            $pass = htmlSpecialchars($this->request->getPost('password'));
            $user = $this->Muser->where('nim', $nim)->first();
            $cek_password = Hash::cek_password($pass, $user['password']);
            // $cek_password = password_verify($pass, $user['password']);

            // dd($pass);

            if (!$cek_password) {
                session()->setFlashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                NIM atau password salah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                </button>
                </div>');

                return redirect()->to('/auth')->withInput();

            } else {
                session()->set([
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'nim' => $user['nim'],
                    'no_ponsel' => $user['no_ponsel'],
                    'komunitas' => $user['id_komunitas'],
                    'email' => $user['email']
                ]);

                return redirect()->to('/user');
            }
        }
    }

    function logout(){
        if (session()->has('id_user')) {
            session()->remove('id_user');
            return redirect()->to('/auth');
        }
    }

    // --------------------------------------------------------------------

    public function login_admin()
    {
        if (session()->has('username')) {
            return redirect()->back();
        }
        $data = [
            'judul' => 'Login Admin',
            'validasi' => $this->validasi
        ];
        return view('auth/login_admin', $data);
    }

    public function LoginAdmin()
    {
        $validate = $this->validate([
            "username" => [
                'rules' => 'required|is_not_unique[tb_admin.username]',
                'errors' => [
                    'required' => 'NIM wajib diisi',
                    'is_not_unique' => 'Username belum terdaftar'
                ]
            ],
            "password" => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password wajib diisi',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ]
        ]);

        if (!$validate) {
            return redirect()->to('/auth/login_admin')->withInput();
        } else {
            $username = htmlSpecialchars($this->request->getPost('username'));
            $pass = htmlSpecialchars($this->request->getPost('password'));
            $user = $this->Mkomunitas->getAdminRow($username)->getRowArray();
            $cek_password = Hash::cek_password($pass, $user['password']);
            // $cek_password = password_verify($pass, $user['password']);

            // dd($user['username']);

            if (!$cek_password) {
                session()->setFlashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                NIM atau password salah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                </button>
                </div>');

                return redirect()->to('/auth/login_admin')->withInput();

            } else {
                session()->set([
                    'id_admin' => $user['id_admin'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'id_komunitas' => $user['id_komunitas']
                ]);

                return redirect()->to('/admin');
            }
        } 
    }

    function logout_(){
        if (session()->has('username')) {
            session()->remove('username');
            session_destroy();
            return redirect()->to('/auth/login_admin');
        }
    }
}