<?php

namespace App\Controllers;

use App\Models\ModelRW;
use CodeIgniter\Database\Query;
use \Mpdf\Mpdf;

class FlowdataRW extends BaseController
{
    public function __construct()
    {
        $this->ModelRW = new ModelRW();
    }

    //hapus
    public function hapusWarga($id)
    {
        $query = $this->ModelRW->deleteWarga($id);
        if($query)
        {
            return redirect('dashboardrw/data_warga');
        }
    }


    //setuju administrasi
    public function setuju()
    {
        //get data rt
        $data = session()->getTempdata('data');
        $rw = $this->ModelRW->getDataRW();

        //ttd
        $ttd = $rw['tanda_tangan'];

        //get from data form
        $id = $this->request->getVar('id');
        $komen = $this->request->getVar('komen');

        //get data surat
        $surat = $this->ModelRW->getSurat($id);

        $data = [
            'status_rw' => 1,
            'catatan' => $komen
        ];

        $query = $this->ModelRW->setujuSurat($id, $data);

        if ($query) {

            $mpdf = new Mpdf();

            ob_clean();
            $this->response->setHeader('Content-Type', 'application/pdf');
            $page = $mpdf->setSourceFile('./administrasi/surat_warga/' . $surat['file_surat']);
            $tplId = $mpdf->ImportPage($page);

            $mpdf->UseTemplate($tplId);
            #$mpdf->WriteText(50,200,$ttd);
            $mpdf->Image('./administrasi/tanda_tangan/' . $ttd, 127, 185, 40, 40, 'png');
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
            'status_rw' => 2,
            'catatan' => $komen
        ];

        $query = $this->ModelRT->tolakSurat($id, $data);

        if ($query) {
            return redirect('dashboardrw/pengajuan_surat');
        }
    }
}


?>