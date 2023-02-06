<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\Auth\UserModel;
use App\Models\Backend\CategoryPrivilegeModel;

class UserController extends BaseController
{
    protected $UserModel;
    protected $CategoryPrivilegeModel;
    public function __construct()
    {
        // parent::__construct();

        $this->CategoryPrivilegeModel = new CategoryPrivilegeModel();
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        $data['title'] = "Data Users - Tools Varnion";
        $data['urlMenu'] = $this->request->uri->getSegment(2);
        $data['users'] = $this->UserModel->orderBy('id', 'DESC')->findAll();
        $data['categories_privilege'] = $this->CategoryPrivilegeModel->orderBy('id_categories_privilege', 'ASC')->findAll();
        // dd($data['users']);

        return view('backend/users/index', $data);
    }

    public function new()
    {
        $data['title'] = "Add New Users - Tools Varnion";
        $data['urlMenu'] = $this->request->uri->getSegment(3);
        $data['categories_privilege'] = $this->CategoryPrivilegeModel->orderBy('id_categories_privilege', 'ASC')->findAll();

        return view('backend/users/create', $data);
    }

    public function create()
    {
        // Rules Validation
        $rules = [
            'val-username' => [
                'rules' => 'required|alpha_numeric|is_unique[tbl_auth.username]',
                'label' => 'Username',
                'errors' => [
                    'required' => 'Username cannot be empty!',
                ],
            ],
            'val-password' => [
                'rules' => 'required',
                'label' => 'Password',
                'errors' => [
                    'required' => 'Password cannot be empty!',
                ],
            ],
            'val-privilege' => [
                'rules' => 'required',
                'label' => 'Privilege',
                'errors' => [
                    'required' => 'Privilege must be selected!',
                ],
            ],
        ];

        //  Check Validation Form Input
        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $data['title'] = "Add New Users - Tools Varnion";
            $data['urlMenu'] = $this->request->uri->getSegment(3);

            return view('backend/users/create', $data);
        }else{
            // Success Insert to DB
            $username = strtolower($this->request->getVar('val-username'));
            $password = $this->request->getVar('val-password');
            $privilege = $this->request->getVar('val-privilege');
            $status = "Active";

            $data = [
                'username' => $username,
                'password' => md5($password),
                'privilege' => $privilege,
                'status' => $status,
            ];
            $this->UserModel->save($data);
            return redirect()->to(base_url('backend/users'))->with('success', "Data User successfully added!");
        } 
        
    }
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->to(base_url('backend/users'))->with('error', "Data User does not exist!");
        }

        // Load model and get the user data
        $data['user'] = $this->UserModel->find($id);
        if (!$data['user']) {
            return redirect()->to(base_url('backend/users'))->with('error', "Data User does not exist!");
        }
        
        $data['categories_privilege'] = $this->CategoryPrivilegeModel->orderBy('id_categories_privilege', 'ASC')->findAll();
        $data['title'] = "Edit Data User - Tools Varnion";
        $data['urlMenu'] = $this->request->uri->getSegment(4);

        return view('backend/users/edit', $data);
    }

    public function update($id = null)
    {
        if (!$id) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Load model and get the user data
        $user = $this->UserModel->find($id);
        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // If the form is submitted
        if ($this->request->getMethod() === 'put') {
            $username = $this->request->getVar('username');
            $privilege = $this->request->getVar('privilege');
            $password = $this->request->getVar('password');
            $status = $this->request->getVar('status');
            // Validation Rules
            if($username == $user['username']){
                $rules = [
                    'username' => [
                        'rules' => 'required|alpha_numeric',
                        'label' => 'Username',
                        'errors' => [
                            'required' => 'Username cannot be empty!',
                        ],
                    ],
                ];
            }else{
                $rules = [
                    'username' => [
                        'rules' => 'required|alpha_numeric|is_unique[tbl_auth.username]',
                        'label' => 'Username',
                        'errors' => [
                            'required' => 'Username cannot be empty!',
                            'is_unique' => 'Username already registered!',
                        ],
                    ],
                ];
            }
            // Validate the form data
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                // dd($data['validation']);
                $data['user'] = $this->UserModel->find($id);
                $data['title'] = "Edit Data User - Tools Varnion";
                $data['urlMenu'] = $this->request->uri->getSegment(3);
                // dd($data['user']);
                return view('backend/users/edit', $data);
            } else {
                // Update the user data
                
                $data = [
                    'username' => $username,
                    'privilege' => $privilege,
                    'status' => $status,
                    // Add more data as needed
                ];
                if($password != ""){
                    $data['password'] = md5($password);
                }
                // dd($data);
                $this->UserModel->update($id, $data);
                // Set success message and redirect to user list page
                // $this->session->setFlashdata('success', 'Data berhasil diperbarui');
                return redirect()->to('/backend/users')->with('success', 'Data User successfully updated!');
            }
        }

    }

    public function delete($id = null)
    {
        if (!isset($id)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User Id not found');
        }

        $this->UserModel->delete($id);
        return redirect()->to(base_url('backend/users'))->with('success', "Data User deleted successfully!");
    }

}
