<?php 
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $tempdata = $session->getTempdata('data');
        if(empty($tempdata))
        {
            echo "<script>";
            echo " alert('Eits, mau ngapain ?!');      
            window.location.href='" . base_url('/login') . "';
            </script>";
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}