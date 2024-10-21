<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWarga extends Model
{
    
    public function getPerumahan()
    {
        return $this->db->table('tbl_wilayah')
        ->get()->getRowArray();
    }

    public function getRW()
    {
        return $this->db->table('tbl_data_rw')
        ->get()->getRowArray();
    }

    public function getAllWilayah()
    {
        return $this->db->table('tbl_wilayah')
        ->get()->getRowArray();
    }

    public function getJenisSurat()
    {
        return $this->db->table('tbl_jenis_surat')
        ->get()->getResultArray();
    }

    //get by id
    public function getData($kode)
    {
        return $this->db->table('tbl_warga')
        ->join('tbl_data_rt', 'tbl_data_rt.id_rt=tbl_warga.kode_rt')
        ->where('tbl_warga.kode_rt', $kode)
        ->get()->getRowArray();
    }

    public function getJenisById($id)
    {
        return $this->db->table('tbl_jenis_surat')
        ->where('kode_jenis',$id)
        ->get()->getRowArray();
    }

    public function getIdAdministrasi()
    {
        return $this->db->table('tbl_administrasi')
        ->selectMax('id_surat')
        ->get()->getRowArray();
    }

    //insert data
    public function insertSurat($data)
    {
        return $this->db->table('tbl_administrasi')
        ->insert($data);
    }

    public function getAdministrasi($kode)
    {
        return $this->db->table('tbl_administrasi')
        ->join('tbl_jenis_surat', 'tbl_jenis_surat.kode_jenis=tbl_administrasi.id_jenis')
        ->join('tbl_warga', 'tbl_warga.id_warga=tbl_administrasi.id_warga')
        ->where('tbl_administrasi.id_warga',$kode)
        ->get()->getResultArray();
    }


}


?>