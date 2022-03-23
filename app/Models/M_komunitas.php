<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_komunitas extends Model 
{
    
    // -------Admin---------------
    public function getDataAdmin()
    {
        $builder = $this->db->table('tb_admin')->get();

        return $builder->getResult();
    }

    public function getAdminRow($username)
    {
        return $this->db->table('tb_admin')->where('username', $username)->get();
    }

    public function addAdmin($tabel, $data)
    {
        $this->db->table($tabel)->insert($data);

        return true;
        
    }

    public function editAdmin($tabel, $data, $where)
    {
        $this->db->table($tabel)->update($data, $where);

        return true;
    }

    public function deleteAdmin($tabel, $where)
    {
        $this->db->table($tabel)->delete($where);

        return true;
    }
    // -------------------------------
    
    // ----------DATA ANGKATAN--------

    public function getDataAngkatan()
    {
        $builder = $this->db->table('tb_angkatan')->get();

        return $builder->getResult();
    }

    public function addAngkatan($tabel, $data)
    {
        $builder = $this->db->table($tabel)->insert($data);

        return $builder;
    }

    public function editAngkatan($tabel, $data, $where)
    {
        $builder = $this->db->table($tabel)->update($data, $where);

        return $builder;
    }

    public function delete_angkatan($tabel, $where)
    {
        $builder =  $this->db->table($tabel)->delete($where);

        return $builder;
    }

    // -------------------------------


    // -------Anggota---------------
    public function getDataAnggota()
    {
        $builder = $this->db->table('tb_anggota t');
        // $builder->select('*');
        // $query = $builder->join('tb_komunitas', 'tb_user.id_komunitas = tb_komunitas.id_komunitas')->get();

        $query = $builder->select('*')
                // ->join('tb_angkatan', 't.id_angkatan = tb_angkatan.id_angkatan')
                ->join('tb_user', 't.id_user = tb_user.id_user')
                ->join('tb_komunitas', 't.id_komunitas = tb_komunitas.id_komunitas')->get();
        
        return $query->getResult();
    }

    public function getAnggotaById($id)
    {
        $builder = $this->db->table('tb_anggota')->where('id_user', $id)->get();

        return $builder->getResult();
    }

    public function getJumlahAnggota()
    {
        $builder = $this->db->table('tb_anggota');
        $builder->select('*');
        $query = $builder->join('tb_komunitas', 'tb_anggota.id_komunitas = tb_komunitas.id_komunitas')->countAll();
        
        return $query;
    }

    public function getJumlahAnggotaKomunitas($idkomunitas)
    {
        $builder = $this->db->table('tb_anggota')->where('id_komunitas', $idkomunitas);
        
        return $builder->CountAllResults();
    }

    public function getAnggotaByKomunitas($idkomunitas)
    {
        // $builder = $this->db->table('tb_user');
        // $builder->select('*');
        // $query = $builder->join('tb_komunitas', 'tb_user.id_komunitas = tb_komunitas.id_komunitas')->get();

        $query = $this->db->query("
        SELECT *
        FROM tb_anggota
        INNER JOIN tb_komunitas ON tb_anggota.id_komunitas = tb_komunitas.id_komunitas
        INNER JOIN tb_user ON tb_anggota.id_user = tb_user.id_user
        INNER JOIN tb_angkatan ON tb_user.id_angkatan = tb_angkatan.id_angkatan
        WHERE tb_komunitas.id_komunitas = $idkomunitas
        ");
        
        return $query->getResult();
    }

    public function editAnggota($tabel, $data, $where)
    {
        $builder = $this->db->table($tabel)->update($data, $where);

        return $builder;
    }

    public function hapusAnggota($tabel, $where)
    {
        $builder = $this->db->table($tabel)->delete($where);

        return $builder;
    }

    // -------------------------------


    // -------KOMUNITAS---------------
    public function getDataKomunitas()
    {
        $builder = $this->db->table('tb_komunitas')->get();
        
        return $builder->getResult();
    }
    
    public function addKomunitas($tabel, $data)
    {
        $this->db->table($tabel)->insert($data);
        
        return true;
    }

    public function editKomunitas($tabel, $data, $where)
    {
        $this->db->table($tabel)->update($data, $where);

        return true;
    }

    public function deleteKomunitas($tabel, $where)
    {
       $builder = $this->db->table($tabel)->delete($where);

       return $builder;
    }
    // -----////////-----------------
    



    // -------EVENT---------------
    public function getDataEvent()
    {
        // $builder = $this->db->table('tb_event')->get();

        $builder = $this->db->table('tb_event');
        $builder->select('*');
        $query = $builder->join('tb_komunitas', 'tb_event.id_komunitas = tb_komunitas.id_komunitas')->get();
        
        return $query->getResult();
    }

    public function getEventByKomunitas($idkomunitas)
    {
        $query = $this->db->query("
        SELECT *
        FROM tb_event
        INNER JOIN tb_komunitas ON tb_event.id_komunitas = tb_komunitas.id_komunitas
        WHERE tb_komunitas.id_komunitas = $idkomunitas
        ");

        return $query->getResult();
    }

    public function getDataGambar($where)
    {
        $builder = $this->db->table('tb_event')->where($where)->get();
        
        return $builder->getRow();
    }

    public function addEvent($tabel, $data)
    {
        $builder = $this->db->table($tabel)->insert($data);

        return $builder;
    }

    public function editEvent($tabel, $data, $where)
    {
        $builder = $this->db->table($tabel)->update($data, $where);

        return $builder;
    }

    public function deleteEvent($tabel, $where)
    {
        $builder = $this->db->table($tabel)->delete($where);

        return $builder; 
    }

    public function getDataPeserta($id)
    {
        $builder = $this->db->table('tb_peserta_event t');
        $query = $builder->select('*')
                ->join('tb_event', 't.id_event = tb_event.id_event')
                ->join('tb_user', 't.id_user = tb_user.id_user')
                ->where('t.id_event', $id);

        return $query->get()->getResult();
    }

    public function addPeserta($tabel, $data)   
    {
        $builder = $this->db->table($tabel)->insert($data);

        return $builder;
    }

    public function getStatusKonfirmasi($where)
    {
        $builder = $this->db->table('tb_peserta_event')->where($where)->get();
        
        return $builder->getRowArray();
    }

    public function KonfirmasiPeserta($tabel, $data, $where)
    {
        $builder = $this->db->table($tabel)->update($data, $where);

        return $builder;
    }

    public function getJumlahPeserta($id_event)
    {
       return $this->db->table('tb_peserta_event')->where('id_event', $id_event)->get();
    }

    // ---------------------------------------------------


    // -----------KEGIATAN---------------------

    public function getDataKegiatan()
    {
        $builder = $this->db->table('tb_kegiatan');
        $builder->select('*');
        $query = $builder->join('tb_komunitas', 'tb_kegiatan.id_komunitas = tb_komunitas.id_komunitas')->get();
        
        return $query->getResult();
    }

    public function cekKomunitasDiKegiatan()
    {
        $query = $this->db->query("
        SELECT * FROM tb_komunitas WHERE id_komunitas IN (SELECT MAX(id_komunitas) FROM tb_komunitas)
        ");

        return $query->getRowArray();
    }

    public function addKomunitasToKegiatan($tabel, $data)
    {
        $builder = $this->db->table($tabel)->insert($data);

        return $builder;
    }



    public function getKegiatanByKomunitas($idkomunitas)
    {
        $query = $this->db->query("
        SELECT *
        FROM tb_kegiatan
        INNER JOIN tb_komunitas ON tb_kegiatan.id_komunitas = tb_komunitas.id_komunitas
        WHERE tb_komunitas.id_komunitas = $idkomunitas
        ");

        return $query->getResult();
    }

    public function editKegiatan($tabel, $data, $where)
    {
        $builder = $this->db->table($tabel)->update($data, $where);

        return $builder;
    }
    // ------------------------------

    // ------------ABSEN-------------

    public function addAbsen($tabel, $data)
    {
        $builder = $this->db->table($tabel)->insert($data);
        
        return $builder;
    }

    // ------------------------------
    
}
?>