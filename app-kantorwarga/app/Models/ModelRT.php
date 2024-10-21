<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelrt extends Model
{
    //count
    public function getPengajuan($kode)
    {
        return $this->db->table('tbl_administrasi')
        ->where('id_rt', $kode)
            ->countAllResults();
    }

    public function getPengajuanAcc($kode)
    {
        return $this->db->table('tbl_administrasi')
        ->where('id_rt', $kode)
            ->where('status_rt', '1')
            ->countAllResults();
    }

    public function getPengajuanDec($kode)
    {
        return $this->db->table('tbl_administrasi')
        ->where('id_rt', $kode)
            ->where('status_rt', '2')
            ->countAllResults();
    }
    public function countWarga($kode)
    {
        return $this->db->table('tbl_warga')->where('kode_rt',$kode)->countAllResults();
    }

    public function countAktif($kode)
    {
        return $this->db->table('tbl_user')
        ->join('tbl_warga','tbl_warga.id_warga=tbl_user.nik')
        ->where('isActive','1')
        ->where('kode_rt',$kode)
        ->countAllResults()
        ;
    }

    public function getPerumahan()
    {
        return $this->db->table('tbl_wilayah')
        ->get()->getRowArray();
    }

    public function countRT()
    {
        return $this->db->table('tbl_data_rt')->countAll();
    }

    public function countWilayah()
    {
        return $this->db->table('tbl_wilayah')->countAll();
    }
    
    //get row 
    public function getDataRT($kode)
    {
        return $this->db->table('tbl_data_rt')
        ->where('nik_ketua',$kode)
        ->get()->getRowArray();
    }

    //get all data
    public function getAllWarga($kode)
    {
        return $this->db->table('tbl_warga')
        ->join('tbl_user','tbl_user.nik=tbl_warga.id_warga')
        ->join('tbl_data_rt','tbl_data_rt.id_rt=tbl_warga.kode_rt')
        ->where('tbl_warga.kode_rt',$kode)
        ->get()->getResultArray();
    }

    public function getAllSurat($id)
    {
        return $this->db->table('tbl_administrasi')
        ->join('tbl_jenis_surat','tbl_jenis_surat.kode_jenis=tbl_administrasi.id_jenis')
        ->join('tbl_warga','tbl_warga.id_warga=tbl_administrasi.id_warga')
        ->where('id_rt',$id)
        ->get()->getResultArray();
    }

    public function getSurat($kode)
    {
        return $this->db->table('tbl_administrasi')
        ->where('id_surat',$kode)
        ->get()->getRowArray();
    }

    public function getAllWilayah()
    {
        return $this->db->table('tbl_wilayah')
        ->get()->getResultArray();
    }


    public function getRT($kode)
    {
        return $this->db->table('tbl_data_rt')
        ->where('id_rt', $kode)
        ->get()->getRowArray();
    }

    //delete
    public function deleteWarga($id)
    {
        return $this->db->table('tbl_warga')
        ->delete(['id_warga' => $id]);
    }

    //update
    public function setujuSurat($id,$data)
    {   
        return $this->db->table('tbl_administrasi')
        ->set($data)
        ->where('id_surat',$id)
        ->update();
    }
    
    public function tolakSurat($id,$data)
    {
        return $this->db->table('tbl_administrasi')
        ->set($data)
        ->where('id_surat',$id)
        ->update();
        
    }
    

}
