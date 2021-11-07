<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UsersAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = current_url(true);
        if (is_null(session()->get('logged_in'))) {
            return redirect()->to(base_url('login'));
        }
        // else {
        //     if (session()->get('user_level') == 'admin') {
        //         return redirect()->to(base_url('admin/'));
        //     } elseif (session()->get('user_level') == 'penyuluh') {
        //         return redirect()->to(base_url('home'));
        //     }
        // }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
