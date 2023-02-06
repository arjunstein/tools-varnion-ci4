<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Auth\LoginModel;
class Login extends BaseController
{
    protected $loginModel;
    public function __construct()
    {
        // parent::__construct();

        $this->loginModel = new LoginModel();
    }

    // View Default Index
    public function index()
    {
        if(session()->id){
            return redirect()->to(base_url('backend/dashboard'))->with('error', "Your is already login!");
        }
        $data['title'] = "Tools Varnion";

        return view('auth/login', $data);
    }

    public function proccess()
    {
        if ($this->request->getMethod() == 'post') {
            // Validation Input
            $rules = [
                'username' => [
                    'rules' => 'required|alpha_numeric',
                    'label' => 'Username',
                    'errors' => [
                        'required' => 'Username cannot be empty!',
                    ],
                ],
                'password' => [
                    'rules' => 'required',
                    'label' => 'Password',
                    'errors' => [
                        'required' => 'Password cannot be empty!',
                    ],
                ],
            ];
            
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $data['title'] = "Tools Varnion";
                return view('auth/login', $data);
            } else {
                // Proccess Success Validation
                $username = $this->request->getVar('username');
                $password = md5($this->request->getVar('password'));

                $user = $this->loginModel->where('username', $username)->first();

                if ($user) {
                    if ($user['password'] == $password) {
                        if($user['status'] != 'Active'){
                            return redirect()->to(base_url())->with('error', "Your account status is nonactive!");
                        }else{
                            session()->set('username', $user['username']);
                            session()->set('id', $user['id']);
                            session()->set('privilege', $user['privilege']);
                            session()->set('status', $user['status']);
                            session()->set('LoggedIn', $user['LoggedIn']);
                            session()->set('logged', true);
                            session()->setTempdata('expired', 'value', 7200);
                            $data = [
                                'LoggedIn' => 1
                            ];
                            $this->loginModel->update($user['id'], $data);
                            return redirect()->to('backend/dashboard');
                        }
                        // Login Successfull, Set Session
                        // dd(session()->get('username'));
                        
                    } else {
                        // Wrong Password
                        session()->setFlashdata('error', 'Wrong Password!');
                        return redirect()->to(base_url());
                    }
                } else {
                    // Username not Registered
                    session()->setFlashdata('error', 'Username or Wrong Password!');
                    return redirect()->to(base_url());
                }
            }
        }
    }

    public function logout($id)
    {
        // $id = $this->request->getVar('id');
        // $user = $this->loginModel->where('id', $id)->first();
        // dd($user);
        $data = [
            'LoggedIn' => 0
        ];
        $this->loginModel->update($id, $data);
        $session = session();
        $session->destroy();


        return redirect()->to(base_url());
    }


}

