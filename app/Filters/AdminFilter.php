<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->has('user_id')){
            session()->setFlashdata("msg", "Your session has been expired");
            return redirect()->to(base_url('/')); 
        }

        if(session()->get('user_type_id') != '1'){
            session()->setFlashdata("msg", "You are not authorized to access this area");
            return redirect()->to(base_url('/')); 
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
    }
}