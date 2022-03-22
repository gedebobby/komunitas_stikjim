<?php

namespace App\Controllers;

use App\Models\M_komunitas;
use App\Models\M_user;

class User extends BaseController
{
    protected $Mkomunitas;
    protected $validasi;

    public function __construct() {
        $this->Mkomunitas = new M_komunitas();
        $this->Muser = new M_user();
        $this->validasi = \Config\Services::validation();
    }

    public function index()
    {
        $idkomunitas = session()->get('komunitas');
        $event = $this->Mkomunitas->getDataEvent();
        $kegiatan = $this->Mkomunitas->getKegiatanByKomunitas($idkomunitas);

        // foreach ($event as $e ){
        //     if ($e->tgl_event < date('d-m-Y')) {
        //         $msg = "Onden Lewat";
        //     } else {
        //         $msg = "Lewat";
        //     }
        // }
        // // dd($e->tgl_event);
        // dd($msg);

        $data = [
            'judul' => 'Komunitas Stikjim',
            'event' => $event,
            'kegiatan' => $kegiatan,
            'jml_peserta' => $this->Mkomunitas
        ];
        
        return view('user/detail_komunitas', $data);
    }

    public function registrasi($id_event)
    {
        session();

        $data = [
            'judul' => 'Registrasi Event',
            'id_event' => $id_event,
            'validasi' => $this->validasi
        ];
        return view('user/registrasi', $data);
    }

    public function inputPeserta()
    {
        $id = $this->request->getPost('id_event');
        $p = $this->Mkomunitas->getDataPeserta($id);

        dd($p);
        foreach ($p as $p ) {
            // if ($p == $this->request->getPost('id_user') && $p == $this->request->getPost('id_event') ) {
            //     echo 'Sudah daftar';                
            // } else {
            //     echo 'belum daftar';  
            // }

            // if ($p->id_user == $this->request->getPost('id_user') && $p->id_event == $this->request->getPost('id_event') ) {
            //     echo 'Sudah daftar';                
            // } else {
            //     if (!$this->validate([
            //         "bukti_pembayaran" => [
            //             "rules" => "uploaded[bukti_pembayaran]|is_image[bukti_pembayaran]|mime_in[bukti_pembayaran,image/jpg,image/jpeg,image/png]",
            //             "errors" => [
            //                 "uploaded" => "Bukti pembayaran harus diisi",
            //                 // "max_size" => "Ukuran gambar terlalu besar",
            //                 "is_image" => "Format file harus gambar",
            //                 "mime_in" => "Format file harus gambar"
            //             ]
            //         ]
            //     ])) {
            //         return redirect()->to('/user/registrasi/'.$this->request->getPost('id_event'))->withInput();
            //     }
        
                
        
            //     $buktipembayaran = $this->request->getFile('bukti_pembayaran');
            //     $namaGambar = $buktipembayaran->getRandomName();
        
            //     // dd($namaGambar);
        
            //     $buktipembayaran->move('image', $namaGambar);
        
            //     $data = [
            //         'id_user' => $this->request->getPost('id_user'),
            //         'id_event' => $this->request->getPost('id_event'),
            //         'bukti_pembayaran' => $namaGambar
            //     ];
        
            //     $add = $this->Mkomunitas->addPeserta("tb_peserta_event", $data);
        
            //     if ($add) {
            //         dd("SUKSES");
            //     } else {
            //         dd("GAGAlL");
            //     } 
            // }
        }
        

        
    }
}
