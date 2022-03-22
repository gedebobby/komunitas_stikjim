<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_absensi extends Model 
{
    protected $table      = 'tb_absen';
    protected $primaryKey = 'id_absen';
    protected $allowedFields = ['id_user', 'tgl_pertemuan', 'keterangan'];

    public function getRekapAbsen($date, $id_komunitas)
    {
        $query = $this->db->query("
        SELECT *
        FROM tb_absen
        INNER JOIN tb_user ON tb_absen.id_user = tb_user.id_user
        WHERE tb_absen.tgl_pertemuan = '$date'
        AND tb_user.id_komunitas = $id_komunitas
        ");

        return $query->getResult();
    }

    public function getRekapTidakHadir()
    {
        // $query = $this->db->query("
        // SELECT nama
        // FROM tb_absen
        // INNER JOIN tb_user ON tb_absen.id_user = tb_user.id_user
        // WHERE tb_absen.id_user = $id_user 
        // AND tb_absen.keterangan = 0
        // ");

        $query = $this->db->query("
        SELECT id_user, keterangan, COUNT(*) AS jumlah
        FROM tb_absen
        WHERE keterangan = 0
        GROUP BY id_user, keterangan
        ");

        return $query->getResult();
    }


    
}