<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelKonfigurasi extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    //insert data
    public function insertKodeRT($data)
    {
        $builder = $this->db->table('tbl_data_rt');
        $builder->insert($data);
    }

    public function insertWilayah($data_wilayah)
    {
        $builder = $this->db->table('tbl_wilayah');
        $builder->insert($data_wilayah);
    }

    public function insertUser($data_user)
    {
        $builder = $this->db->table('tbl_user');
        $builder->insert($data_user);
    }

    public function insertPengurusRW($data_rw)
    {
        $builder = $this->db->table('tbl_data_rw');
        $builder->insert($data_rw);
    }

    public function insertDataPribadi($data_pribadi)
    {
        $builder = $this->db->table('tbl_warga');
        $builder->insert($data_pribadi);
    }

    //get data
    public function getKodeRT()
    {
        $builder = $this->db->table('tbl_data_rt');
        return $builder->get();
    }

    //ini start proses insert rt
    //dimulai dari verifikasi kode rt

    //verifikasi kode rt
    public function verifikasi($kode)
    {
        $result = $this->db->table('tbl_data_rt')
        ->where(['id_rt' => $kode])
        ->get()->getRow();

        return $result;
    }

    //update rt
    public function updateRT($data_rt,$id)
    {
        $builder = $this->db->table('tbl_data_rt')
        ->where(['id_rt' => $id])->update($data_rt);
        return $builder;
    }
}


?>