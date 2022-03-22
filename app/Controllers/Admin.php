<?php

namespace App\Controllers;

use App\Models\M_komunitas;
use App\Models\M_user;
use App\Models\M_absensi;
use App\Libraries\Hash;

class Admin extends BaseController
{

    protected $Mkomunitas;
    protected $validasi;

    public function __construct() {

        $this->Mkomunitas = new M_komunitas();
        $this->Muser = new M_user();
        $this->Mabsen = new M_absensi();
        $this->validasi = \Config\Services::validation();
    }

    public function index()
    {
        if (session()->get('role') == 'admin') {
            
            $jmlAnggota = $this->Mkomunitas->getJumlahAnggota();

        } elseif (session()->get('role') == 'koordinator') {
            
            $idkomunitas = session()->get('id_komunitas');
            $jmlAnggota = $this->Mkomunitas->getJumlahAnggotaKomunitas($idkomunitas);

        } else {
            echo "error";
        }

        $jmlKomunitas = '3';
        
        $data = [
            'judul' => 'Dashboard',
            'jmlAnggota' => $jmlAnggota,
            'jmlKomunitas' => $jmlKomunitas
            
        ];
        return view('dashboard', $data);
    }

    // ---------------  ADMIN & USER --------------------
    public function useradmin()
    {
        session();

        $admin = $this->Mkomunitas->getDataAdmin();
        $komunitas = $this->Mkomunitas->getDataKomunitas();
        $data = [
            'judul' => "Data Admin",
            'admin' => $admin,
            'komunitas' => $komunitas,
            'validasi' => $this->validasi
        ];
        return view('admin/admin_user', $data);
    }

    public function input_admin()
    {

        if (!$this->validate([
            
            'username' => [
                'rules' => 'required|is_unique[tb_admin.username]',
                'errors' => [
                    'required' => 'Username Wajib Diisi',
                    'is_unique' => 'Username telah terdaftar'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role Wajib Diisi'
                ]
            ]

        ])) {
            return redirect()->to('/admin/useradmin')->withInput();
        };

        $data = [
            "username" => htmlSpecialchars($this->request->getPost('username')),
            "password" => htmlSpecialchars(password_hash($this->request->getPost('password'), PASSWORD_BCRYPT)),
            "role" => htmlSpecialchars($this->request->getPost('role')),
            "id_komunitas" => htmlSpecialchars($this->request->getPost('id_komunitas'))
        ];

        $add = $this->Mkomunitas->addAdmin("tb_admin", $data);

        if($add){
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Admin Berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/useradmin');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Admin Gagal Ditambahkan
          </div>');

          return redirect()->to('/admin/useradmin');
        }
    }

    public function editAdmin()
    {   
        $id_admin = $this->request->getPost('id_admin');
        if (!$this->validate([
            
            'username' => [
                'rules' => 'required|is_unique[tb_admin.username]',
                'errors' => [
                    'required' => 'Username Wajib Diisi',
                    'is_unique' => 'Username telah terdaftar'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role Wajib Diisi'
                ]
            ]

        ])) {
            return redirect()->to('/admin/useradmin')->withInput();
        };

        $data = [
            "username" => htmlSpecialchars($this->request->getPost('username')),
            "password" => htmlSpecialchars(password_hash($this->request->getPost('password')), PASSWORD_BCRYPT),
            "role" => htmlSpecialchars($this->request->getPost('role'))
        ];

        $where = [
            "id_admin" => $id_admin
        ];

        $add = $this->Mkomunitas->editAdmin("tb_admin", $data, $where);

        if($add){
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Admin Berhasil diedit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/useradmin');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Admin Gagal Diedit
          </div>');

          return redirect()->to('/admin/useradmin');
        }
    }

    public function deleteAdmin($id_admin)
    {
        $where = [
            "id_admin" => $id_admin
        ];

        $add = $this->Mkomunitas->deleteAdmin("tb_admin", $where);

        if($add){
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Admin Berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/useradmin');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Admin Gagal Dihapus
          </div>');

          return redirect()->to('/admin/useradmin');
        }
    }
    // -----------------------------------------------------
    
    
    // --------------- DATA ANGKATAN ----------------------

    public function data_angkatan()
    {
        $angkatan = $this->Mkomunitas->getDataAngkatan();
        $data = [
            "judul" => "Data Angkatan",
            "angkatan" => $angkatan,
            "validasi" => $this->validasi
        ];

        

        return view('admin/data_angkatan', $data);
    }

    public function input_tahun_angkatan()
    {
        if (!$this->validate([
            
            'tahun_angkatan' => [
                'rules' => 'required|is_unique[tb_angkatan.tahun_angkatan]',
                'errors' => [
                    'required' => 'Tahun Angkatan Wajib Diisi',
                    'is_unique' => 'Tahun Angkatan sudah ada'
                ]
            ]

        ])) {
            return redirect()->to('/admin/data_angkatan')->withInput();
        };

        $data = [
            'tahun_angkatan' => $this->request->getPost('tahun_angkatan')
        ];

        $add = $this->Mkomunitas->addAngkatan('tb_angkatan', $data);

        if($add) {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Tahun Angkatan Berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/data_angkatan');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Tahun Angkatan Gagal Ditambahkan
          </div>');

          return redirect()->to('/admin/data_angkatan');
            
        }   

    }

    public function editTahunAngkatan()
    {
        $id_angkatan = $this->request->getPost('id_angkatan');
        if (!$this->validate([
            
            'tahun_angkatan' => [
                'rules' => 'required|is_unique[tb_angkatan.tahun_angkatan]',
                'errors' => [
                    'required' => 'Tahun Angkatan Wajib Diisi',
                    'is_unique' => 'Tahun Angkatan sudah ada'
                ]
            ]

        ])) {
            return redirect()->to('/admin/data_angkatan')->withInput();
        };

        $where = [
            'id_angkatan' => $id_angkatan
        ];

        $data = [
            'tahun_angkatan' => $this->request->getPost('tahun_angkatan')
        ];

        $add = $this->Mkomunitas->editAngkatan('tb_angkatan', $data, $where);

        if($add) {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Tahun Angkatan Berhasil Diedit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/data_angkatan');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Tahun Angkatan Gagal Diedit
          </div>');

          return redirect()->to('/admin/data_angkatan');
            
        }   
    }

    public function deleteAngkatan($id_angkatan)
    {
        $where = [
            "id_angkatan" => $id_angkatan
        ];

        $delete = $this->Mkomunitas->delete_angkatan("tb_angkatan", $where);

        if($delete){
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Tahun Angkatan Berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/data_angkatan');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Tahun Angkatan Gagal Dihapus
          </div>');

          return redirect()->to('/admin/data_angkatan');
        }
    }

    // -----------------------------------------------------
    

    // ---------------  KOMUNITAS ----------------------
    
    public function data_komunitas()
    {

        $komunitas = $this->Mkomunitas->getDataKomunitas();
        $data = [
            "judul" => "Data Komunitas",
            "komunitas" => $komunitas
        ];

        // $dataKMT = $this->Mkomunitas->addKomunitasToKegiatan();

        // dd($dataKMT['id_komunitas']);

        return view('admin/data_komunitas', $data);
        
    }

    public function input_komunitas()
    {
        $data = [
            "nama_komunitas" => htmlSpecialchars($this->request->getPost('nama_komunitas')),
            "nama_koordinator" => htmlSpecialchars($this->request->getPost('nama_koordinator'))
        ];

        $add = $this->Mkomunitas->addKomunitas("tb_komunitas", $data);

        if($add){

            $dataKMT = $this->Mkomunitas->cekKomunitasDiKegiatan();

            if (!$this->validate([
            
                'id_komunitas' => [
                    'rules' => 'required|is_unique[tb_kegiatan.id_komunitas]',
                    'errors' => [
                        'required' => 'Tahun Angkatan Wajib Diisi',
                        'is_unique' => 'Tahun Angkatan sudah ada'
                    ]
                ]
    
            ])) {
                return redirect()->to('/admin/data_angkatan')->withInput();
            };

            $data = [
                'id_komunitas' => $dataKMT['id_komunitas']
            ];

            $this->Mkomunitas->addKomunitasToKegiatan('tb_kegiatan', $data);





            // echo "<script>alert('Data Komunitas Berhasil Ditambahkan'); window.location='/admin/data_komunitas'; </script>";
        //     session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //     Data Komunitas Berhasil Ditambahkan
        //   </div>');
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Komunitas Berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/data_komunitas');
            
        } else {
            // echo "<script>alert('Data Komunitas Gagal Ditambahkan'); window.location=('/admin/data_komunitas'; </script>";
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Komunitas Gagal Ditambahkan
          </div>');

          return redirect()->to('/admin/data_komunitas');
            
        }     
    }

    public function edit_komunitas()
    {
        $id_komunitas = $this->request->getPost('id_komunitas');
        $data = [
            "nama_komunitas" => htmlSpecialchars($this->request->getPost('nama_komunitas')),
            "nama_koordinator" => htmlSpecialchars($this->request->getPost('nama_koordinator'))
        ];

        $where = [
            "id_komunitas" => $id_komunitas
        ];

        $add = $this->Mkomunitas->editKomunitas("tb_komunitas", $data, $where);

        if($add){
            // echo "<script>alert('Data Komunitas Berhasil Ditambahkan'); window.location='/admin/data_komunitas'; </script>";
        //     session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //     Data Komunitas Berhasil Ditambahkan
        //   </div>');
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Komunitas Berhasil diedit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/data_komunitas');
            
        } else {
            // echo "<script>alert('Data Komunitas Gagal Ditambahkan'); window.location=('/admin/data_komunitas'; </script>";
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Komunitas Gagal Diedit
          </div>');

          return redirect()->to('/admin/data_komunitas');
            
        } 
    }

    public function deleteKomunitas($id_komunitas)
    {
        $where = [
            "id_komunitas" => $id_komunitas
        ];
        $add = $this->Mkomunitas->deleteKomunitas("tb_komunitas", $where);

        if($add){
            // echo "<script>alert('Data Komunitas Berhasil Ditambahkan'); window.location='/admin/data_komunitas'; </script>";
        //     session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //     Data Komunitas Berhasil Ditambahkan
        //   </div>');
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Komunitas Berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/data_komunitas');
            
        } else {
            // echo "<script>alert('Data Komunitas Gagal Ditambahkan'); window.location=('/admin/data_komunitas'; </script>";
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Komunitas Gagal Dihapus
          </div>');

          return redirect()->to('/admin/data_komunitas');
            
        }     
    }


    // --------------------------------------------------
    
    // -------------  DATA ANGGOTA  ------------------------

    public function data_anggota()
    {
        if (session()->get('role') == 'admin') {
            
            $anggota = $this->Mkomunitas->getDataAnggota();

        } elseif (session()->get('role') == 'koordinator') {
            
            $idkomunitas = session()->get('id_komunitas');
            $anggota = $this->Mkomunitas->getAnggotabyKomunitas($idkomunitas);

        } else {
            echo "error";
        }

        $komunitas = $this->Mkomunitas->getDataKomunitas();
        $angkatan = $this->Mkomunitas->getDataAngkatan();

        $data = [
            "judul" => "Data Anggota",
            "anggota" => $anggota,
            "komunitas" => $komunitas,
            "angkatan" => $angkatan
        ];

        return view('admin/data_anggota', $data);
        
    }

    public function input_anggota()
    {
        $data = [
            "nama" => htmlSpecialchars($this->request->getPost('nama_anggota')),
            "nim" => htmlSpecialchars($this->request->getPost('nim_anggota')),
            "id_komunitas" => htmlSpecialchars($this->request->getPost('id_komunitas')),
            "no_ponsel" => htmlSpecialchars($this->request->getPost('no_ponsel')),
            "email" => htmlSpecialchars($this->request->getPost('email')),
            "password" => Hash::hash($this->request->getPost('password'))
        ];

        $add = $this->Muser->save($data);

        if($add){
            // echo "<script>alert('Data Komunitas Berhasil Ditambahkan'); window.location='/admin/data_komunitas'; </script>";
        //     session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //     Data Komunitas Berhasil Ditambahkan
        //   </div>');
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Anggota Berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/data_anggota');
            
        } else {
            // echo "<script>alert('Data Komunitas Gagal Ditambahkan'); window.location=('/admin/data_komunitas'; </script>";
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Anggota Gagal Ditambahkan
          </div>');

          return redirect()->to('/admin/data_anggota');
            
        }
    }

    public function edit_anggota()
    {
        $id_user = $this->request->getPost('id_user');
        $data = [
            "nama" => htmlSpecialchars($this->request->getPost('nama_anggota')),
            "nim" => htmlSpecialchars($this->request->getPost('nim_anggota')),
            "no_ponsel" => htmlSpecialchars($this->request->getPost('no_ponsel')),
            "email" => htmlSpecialchars($this->request->getPost('email')),
            "password" => htmlSpecialchars($this->request->getPost('password'))
        ];

        $where = [
            "id_user" => $id_user
        ];

        $add = $this->Mkomunitas->editAnggota("tb_user", $data, $where);

        if($add){
            // echo "<script>alert('Data Komunitas Berhasil Ditambahkan'); window.location='/admin/data_komunitas'; </script>";
        //     session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //     Data Komunitas Berhasil Ditambahkan
        //   </div>');
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Anggota Berhasil diedit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/data_anggota');
            
        } else {
            // echo "<script>alert('Data Komunitas Gagal Ditambahkan'); window.location=('/admin/data_komunitas'; </script>";
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Anggota Gagal Diedit
          </div>');

          return redirect()->to('/admin/data_anggota');
            
        }
    }

    public function deleteAnggota($id_user)
    {
        $where = [
            "id_user" => $id_user
        ];

        $add = $this->Mkomunitas->hapusAnggota("tb_user", $where);

        if($add){
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Anggota Berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/data_anggota');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Anggota Gagal Dihapus
          </div>');

          return redirect()->to('/admin/data_anggota');
            
        }
    }

    // --------------------------------------------------


    // -------------  EVENT  ------------------------

    public function event()
    {
        session();
        if (session()->get('role') == 'admin') {
            
            $event = $this->Mkomunitas->getDataEvent();

        } elseif (session()->get('role') == 'koordinator') {
            
            $idkomunitas = session()->get('id_komunitas');
            $event = $this->Mkomunitas->getEventByKomunitas($idkomunitas);

        } else {
            echo "error";
        }

        $komunitas = $this->Mkomunitas->getDataKomunitas();

        $data = [
            "judul" => "Data Event",
            "event" => $event,
            "komunitas" => $komunitas,
            'validasi' => $this->validasi
        ];

        return view('admin/event', $data);
        
    }

    public function input_event()
    {

        if (!$this->validate([
            "nama_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Nama Event belum diisi"
                ]
            ],
            "tgl_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Tanggal Event belum diisi"
                ]
            ],
            "waktu_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Waktu Event belum diisi"
                ]
            ],
            "kategori_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Kategori Event belum diisi"
                ]
            ],
            "waktu_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Waktu Event belum diisi"
                ]
            ],
            "gambar" => [
                "rules" => "uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]",
                "errors" => [
                    "uploaded" => "Gambar belum diisi",
                    "max_size" => "Ukuran gambar terlalu besar",
                    "is_image" => "Format file harus gambar",
                    "mime_in" => "Format file harus gambar"
                ]
            ],
            "deskripsi_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Deskripsi Event belum diisi"
                ]
            ],
            "kuota_peserta" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Kuota Peserta belum diisi"
                ]
            ],
            "lokasi_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Lokasi Event belum diisi"
                ]
            ],
            "waktu_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Waktu Event belum diisi"
                ]
            ],
            "id_komunitas" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Penyelenggara Event belum diisi"
                ]
            ]
        ])) {
            
            return redirect()->to('/admin/event')->withInput();
        }

        $gambar = $this->request->getFile('gambar');

        // dd($gambar->getRandomName());
        $namaGambar = $gambar->getRandomName();
        $gambar->move('image', $namaGambar);

        $data = [
            "nama_event" => htmlSpecialchars($this->request->getPost('nama_event')),
            "tgl_event" => htmlSpecialchars($this->request->getPost('tgl_event')),
            "waktu_event" => htmlSpecialchars($this->request->getPost('waktu_event')),
            "kategori_event" => htmlSpecialchars($this->request->getPost('kategori_event')),
            "status_event" => htmlSpecialchars($this->request->getPost('status_event')),
            "kuota_peserta" => htmlSpecialchars($this->request->getPost('kuota_peserta')),
            "gambar" => $namaGambar,
            "deskripsi" => htmlSpecialchars($this->request->getPost('deskripsi_event')),
            "lokasi_event" => htmlSpecialchars($this->request->getPost('lokasi_event')),
            "id_komunitas" => htmlSpecialchars($this->request->getPost('id_komunitas'))
        ];


        $add = $this->Mkomunitas->addEvent("tb_event", $data);

        if($add){
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Event Berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/event');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Event Gagal Ditambahkan
          </div>');

          return redirect()->to('/admin/event');
            
        }
    }

    public function edit_event()
    {
        if (!$this->validate([
            "nama_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Nama Event belum diisi"
                ]
            ],
            "tgl_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Tanggal Event belum diisi"
                ]
            ],
            "waktu_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Waktu Event belum diisi"
                ]
            ],
            "kategori_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Kategori Event belum diisi"
                ]
            ],
            "waktu_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Waktu Event belum diisi"
                ]
            ],
            // "gambar" => [
            //     "rules" => "max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]",
            //     "errors" => [
            //         "max_size" => "Ukuran gambar terlalu besar",
            //         "is_image" => "Format file harus gambar",
            //         "mime_in" => "Format file harus gambar"
            //     ]
            // ],
            "deskripsi_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Deskripsi Event belum diisi"
                ]
            ],
            "kuota_peserta" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Kuota Peserta belum diisi"
                ]
            ],
            "lokasi_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Lokasi Event belum diisi"
                ]
            ],
            "waktu_event" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Waktu Event belum diisi"
                ]
            ],
            "id_komunitas" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Penyelenggara Event belum diisi"
                ]
            ]
        ])) {
            
            return redirect()->to('/admin/event')->withInput();
        }

        $gambar = $this->request->getFile('gambar');

        if($gambar == null){

            $namaGambar = $this->request->getPost('gambarlama');

        } else {
            $namaGambar = $gambar->getRandomName();

            $gambar->move('image', $namaGambar);
            unlink('image/'. $this->request->getPost('gambarlama'));
        }

        $id_event = $this->request->getPost('id_event');
        $data = [
            "nama_event" => htmlSpecialchars($this->request->getPost('nama_event')),
            "tgl_event" => htmlSpecialchars($this->request->getPost('tgl_event')),
            "waktu_event" => htmlSpecialchars($this->request->getPost('waktu_event')),
            "kategori_event" => htmlSpecialchars($this->request->getPost('kategori_event')),
            "status_event" => htmlSpecialchars($this->request->getPost('status_event')),
            "kuota_peserta" => htmlSpecialchars($this->request->getPost('kuota_peserta')),
            "gambar" => $namaGambar,
            "deskripsi" => htmlSpecialchars($this->request->getPost('deskripsi_event')),
            "lokasi_event" => htmlSpecialchars($this->request->getPost('lokasi_event')),
            "id_komunitas" => htmlSpecialchars($this->request->getPost('id_komunitas'))
        ];

        $where = [
            "id_event" => $id_event
        ];
        $add = $this->Mkomunitas->editEvent("tb_event", $data, $where);

        if($add){
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Event Berhasil diedit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/event');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Event Gagal Diedit
          </div>');

          return redirect()->to('/admin/event');
            
        }
    }

    public function delete_event($id_event)
    {
        $where = [
            "id_event" => $id_event
        ];

        $event = $this->Mkomunitas->getDataGambar($where);

        unlink('image/' . $event->gambar);

        $add = $this->Mkomunitas->deleteEvent("tb_event", $where);

        if($add){
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Event Berhasil dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          return redirect()->to('/admin/event');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Event Gagal Dihapus
          </div>');

          return redirect()->to('/admin/event');
            
        }
    }

    public function listPeserta($id)
    {

        $peserta = $this->Mkomunitas->getDataPeserta($id);

        $data = [ 
            'judul' => 'Daftar Peserta',
            'peserta' => $peserta
        ];

        // dd($peserta);

        return view('admin/listPeserta', $data);
    }

    public function konfirmasi_peserta($id_peserta)
    {

        $where = [ 'id_peserta' => $id_peserta ];

        $datapeserta = $this->Mkomunitas->getStatusKonfirmasi($where);

        if ($datapeserta['status_konfirmasi'] == 0) {
            $angka = 1;
        } else {
            $angka = 0;
        }
        
        $data = [
            'id_event' => $datapeserta['id_event'],
            'id_user' => $datapeserta['id_user'],
            'bukti_pembayaran' => $datapeserta['bukti_pembayaran'],
            'status_konfirmasi' => $angka
        ];

        $update = $this->Mkomunitas->KonfirmasiPeserta('tb_peserta_event', $data, $where);

        if($update){
            if ($datapeserta['status_konfirmasi'] == 0) {
                session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Konfirmasi berhasil
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            } else {
                session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Pembatalan konfirmasi berhasil
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            }
            

          return redirect()->back();
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Peserta Gagal dikonfirmasi
          </div>');

          return redirect()->to('/admin/event/listpeserta/' );
            
        }
        


        
    }
    // ---------------------------------------------------------


    // --------------  KEGIATAN  ----------------------------

    public function kegiatan()
    {
        $komunitas = $this->Mkomunitas->getDataKomunitas();
        if (session()->get('role') == 'admin') {
            
            $kegiatan = $this->Mkomunitas->getDataKegiatan();

        } elseif (session()->get('role') == 'koordinator') {
            
            $idkomunitas = session()->get('id_komunitas');
            $kegiatan = $this->Mkomunitas->getKegiatanByKomunitas($idkomunitas);

        } else {
            echo "error";
        }
        

        $data = [
            'judul' => 'Data Kegiatan',
            'komunitas' => $komunitas,
            'kegiatan' => $kegiatan
        ];

        // dd($komunitas);
        // dd($kegiatan);

        return view('admin/kegiatan', $data);
    }

    public function edit_kegiatan()
    {
        $id_kegiatan = $this->request->getPost('id_kegiatan');
        $data = [
           "hari_kegiatan" => $this->request->getPost('hari_kegiatan'),
           "waktu_kegiatan" => $this->request->getPost('waktu_kegiatan'),
           "lokasi_kegiatan" => $this->request->getPost('lokasi_kegiatan'),
           "pengumuman" => $this->request->getPost('pengumuman_kegiatan')
        ];

        $where = [
            "id_kegiatan" => $id_kegiatan
        ];
        $edit = $this->Mkomunitas->editKegiatan("tb_kegiatan", $data, $where);
        
        if($edit){
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Info Kegiatan Berhasil Diupload
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            // dd('Berhasil');

          return redirect()->to('/admin/kegiatan');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Info Kegiatan Gagal Diupload
          </div>');

          return redirect()->to('/admin/kegiatan');
            
        }
    }
    // ---------------------------------------------------------
    
    
    // --------------  Absensi  ----------------------------
    public function absensi()
    {
        $absen = $this->Mabsen->findAll();

        $data = [
            'judul' => 'Absensi',
            'validasi' => $this->validasi,
            'absen' => $absen
        ];

        return view('admin/absensi', $data);
    }

    public function tambah_absensi()
    {
        $idkomunitas = session()->get('id_komunitas');
        $anggota = $this->Mkomunitas->getAnggotaByKomunitas($idkomunitas);
        $data = [
            'judul' => 'Absensi',
            'validasi' => $this->validasi,
            'anggota' => $anggota
        ];

        return view('admin/tambah_absensi', $data);
    }

    public function add_absensi()
    {
        if (!$this->validate([
            "tgl_pertemuan" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Tanggal pertemuan belum diisi"
                    // "is_unique" => "Absen Sudah Diinput"
                ]
                ],
            "keterangan" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Anggota Belum Diabsen"
                ]
            ]
        ])) {
            
            return redirect()->to('/admin/tambah_absensi')->withInput();
        }
        
        $date = $this->request->getPost('tgl_pertemuan');

        foreach ($_POST['id_user'] as $key => $val) {
            $data[] = array(             
               'id_user' => $_POST['id_user'][$key],
               'tgl_pertemuan' => $date,
               'keterangan' => $_POST['keterangan'][$key]         
            );      
         }

        // dd($data);  

        $add = $this->Mabsen->insertBatch($data);

        if($add){
            
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Absensi berhasil
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            

          return redirect()->to('/admin/absensi');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Absensi Gagal
          </div>');

          return redirect()->to('/admin/absensi' );
            
        }
    }

    public function rekap_absen()
    {
        $idkomunitas = session()->get('id_komunitas');
        
        $date = $this->request->getPost('tgl_pertemuan');
        $tgl="-";
        if ($date) {
            $rekap = $this->Mabsen->getRekapAbsen($date, $idkomunitas);
            $tgl = $date;
        } else {
            $rekap = $this->Mabsen->getRekapAbsen('2022-03-21', $idkomunitas);
        }

        // dd($date);
        
        $data = [
            'judul' => 'Rekap Absen',
            'validasi' => $this->validasi,
            'rekap' => $rekap,
            'tgl' => $tgl
        ];

        return view('admin/rekap_absen', $data);
       
    }

    public function cek_kehadiran()
    {
        // $anggota = $this->Mabsen->where('keterangan', 0)->findAll();
        
        $anggota = $this->Mabsen->getRekapTidakHadir();

        // foreach ($anggota as $a) {
        //     if ($a->id_user) {
                
        //     }
        // }

        


     

        // foreach ($agtTidakHadir as $b ) {

        //     echo '<p>'.$b->nama.' = '.$b->keterangan.'<p><br>';
            
        // }
        // dd($agtTidakHadir);
        dd($anggota);
        

    }

    public function edit_absen()
    {
        $data = [
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $where = [
            'id_absen' => $this->request->getPost('id_absen')
        ];
        $update = $this->Mabsen->update($where, $data);
        
        if($update){
            
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Edit Absensi Berhasil
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            

          return redirect()->to('/admin/rekap_absen');
            
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
            Edit Absensi Gagal
          </div>');

          return redirect()->to('/admin/rekap_absen' );
            
        }
    }


    
    
    // ---------------------------------------------------------




}
