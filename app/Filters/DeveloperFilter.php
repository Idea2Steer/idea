<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class DeveloperFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->has('user_id')){
            session()->setFlashdata("msg", "Your session has been expired");
            return redirect()->to(base_url('Home/Admin')); 
        }

        if(session()->has('user_type_id') != '5'){
            session()->setFlashdata("msg", "You are not authorized to access this area");
            return redirect()->to(base_url('Home/Admin')); 
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
    }
}