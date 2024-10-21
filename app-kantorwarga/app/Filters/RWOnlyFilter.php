<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RWOnlyFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if ($session->get('role') != 'RW') {
            echo "<script>";
            echo " alert('Anda Salah Alamat ?!');      
            window.location.href='" . base_url('dashboard' . strtolower($session->get('role'))) . "';
            </script>";
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
