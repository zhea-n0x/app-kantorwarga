<?php

namespace App\Controllers;

use App\Models\ModelRT;
use \Mpdf\Mpdf;

class FlowdataRT extends BaseController
{
    public function __construct()
    {
        $this->ModelRT = new ModelRT();
    }

    //hapus
    public function hapusWarga($id)
    {
        $query = $this->ModelRT->deleteWarga($id);
        if($query)
        {
            return redirect('dashboardrt/data_warga');
        }
    }


    //setuju administrasi
    public function setuju()
    {
        //get data rt
        $data = session()->getTempdata('data');
        $kode = $data['kode_rt'];
        $rt = $this->ModelRT->getRT($kode);

        //ttd
        $ttd = $rt['tanda_tangan'];

        //get from data form
        $id = $this->request->getVar('id');
        $komen = $this->request->getVar('komen');

        //get data surat
        $surat = $this->ModelRT->getSurat($id);

        $data = [
            'status_rt' => 1,
            'catatan' => $komen
        ];

        $query = $this->ModelRT->setujuSurat($id, $data);

        if ($query) {

            $mpdf = new Mpdf();

            ob_clean();
            $this->response->setHeader('Content-Type', 'application/pdf');
            $page = $mpdf->setSourceFile('./administrasi/surat_warga/'. $surat['file_surat']);
            $tplId = $mpdf->ImportPage($page);
            
            $mpdf->UseTemplate($tplId);
            #$mpdf->WriteText(50,200,$ttd);
            $mpdf->Image('./administrasi/tanda_tangan/'. $ttd, 37, 185, 40,40, 'png');
            ob_clean();
            $mpdf->Output("./administrasi/surat_warga/" . $surat['file_surat'], "F");
            $mpdf->Output();

            
            //return redirect('dashboardrt/pengajuan_surat');/**/
            
        }
    }

    //tolak administrasi
    public function tolak()
    {
        $id = $this->request->getVar('id');
        $komen = $this->request->getVar('komen');
        
        $data = [
            'status_rt' => 2,
            'catatan' => $komen
        ];
        
        $query = $this->ModelRT->tolakSurat($id,$data);

        if($query) {
            return redirect('dashboardrt/pengajuan_surat');
        }

    }
}
