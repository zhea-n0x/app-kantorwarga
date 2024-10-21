<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RTOnlyFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if ($session->get('role') != 'RT') {
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
