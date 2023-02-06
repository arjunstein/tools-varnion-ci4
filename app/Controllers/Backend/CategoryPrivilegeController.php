<?php

namespace App\Controllers\Backend;

use App\Models\Backend\CategoryPrivilegeModel;
use CodeIgniter\RESTful\ResourceController;

class CategoryPrivilegeController extends ResourceController
{
    protected $CategoryPrivilegeModel;
    public function __construct()
    {
        // parent::__construct();

        $this->CategoryPrivilegeModel = new CategoryPrivilegeModel();
    }

    public function index()
    {
        $data = [
            'categories_privilege' => $this->CategoryPrivilegeModel->orderBy('id_categories_privilege', 'DESC')->findAll(),
            'title' => "Data Categories Privilege - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];

        return view('backend/categories_privilege/index', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => "Add New Category Privilege - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];
        // dd($data['urlMenu']);

        return view('backend/categories_privilege/create', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // Rules Validation
        $rules = [
            'val-nameCategoryPrivilege' => [
                'rules' => 'required',
                'label' => 'Name Category Privilege',
                'errors' => [
                    'required' => 'Name Category Privilege cannot be empty!',
                ],
            ],
        ];

        //  Check Validation Form Input
        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validator,
                'title' => "Add New Category Privilege - Tools Varnion",
                'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
            ];
            return view('backend/categories_privilege/create', $data);
        } else {
            // Success Insert to DB
            $nameCategoryPrivilege = $this->request->getVar('val-nameCategoryPrivilege');

            $data = [
                'name_categories_privilege' => $nameCategoryPrivilege,
            ];

            $this->CategoryPrivilegeModel->save($data);
            return redirect()->to(base_url('backend/categories_privilege'))->with('success', "Data Category Privilege successfully added!");
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        // Setting Url Segments
        $urlSegments = $this->request->uri->getSegments();
        $urlMenu = array_slice($urlSegments, 1);
        unset($urlMenu[count($urlMenu) - 2]);
        $urlMenu = implode('/', $urlMenu);

        $data = [
            'category_privilege' => $this->CategoryPrivilegeModel->find($id),
            'title' => "Edit Data Category Privilege - Tools Varnion",
            'urlMenu' => $urlMenu,
        ];

        if (!$id) {
            return redirect()->to(base_url('backend/categories_privilege'))->with('error', "Data Category Privilege does not exist!");
        }

        // Load model and get the category data
        if (!$data['category_privilege']) {
            return redirect()->to(base_url('backend/categories_privilege'))->with('error', "Data Category Privilege does not exist!");
        }

        return view('backend/categories_privilege/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$id) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Load model and get the user data
        $categoryPrivilege = $this->CategoryPrivilegeModel->find($id);
        if (!$categoryPrivilege) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // If the form is submitted
        if ($this->request->getMethod() === 'put') {
            $nameCategoryPrivilege = $this->request->getVar('nameCategoryPrivilege');
            // Validation Rules
            $rules = [
                'nameCategoryPrivilege' => [
                    'rules' => 'required',
                    'label' => 'Name Category Privilege',
                    'errors' => [
                        'required' => 'Name Category Privilege cannot be empty!',
                    ],
                ],
            ];

            // Validate the form data
            if (!$this->validate($rules)) {
                // Setting Url Segments
                $urlSegments = $this->request->uri->getSegments();
                $urlMenu = array_slice($urlSegments, 1);
                unset($urlMenu[count($urlMenu) - 2]);
                $urlMenu = implode('/', $urlMenu);

                $data = [
                    'validation' => $this->validator,
                    'category_privilege' => $this->CategoryPrivilegeModel->find($id),
                    'title' => "Edit Data Category Privilege - Tools Varnion",
                    'urlMenu' => $urlMenu,
                ];
                return view('backend/categories_privilege/edit', $data);
            } else {
                // Update the user data
                $data = [
                    'name_categories_privilege' => $nameCategoryPrivilege,
                    // Add more data as needed
                ];
                $this->CategoryPrivilegeModel->update($id, $data);

                // Set success message and redirect to user list page
                return redirect()->to('backend/categories_privilege')->with('success', 'Data Category Privilege successfully updated!');
            }
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if (!isset($id)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Category Privilege Id not found');
        }

        $this->CategoryPrivilegeModel->delete($id);
        return redirect()->to(base_url('backend/categories_privilege'))->with('success', "Data Category Privilege deleted successfully!");
    }
}
