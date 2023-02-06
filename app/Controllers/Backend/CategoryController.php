<?php

namespace App\Controllers\Backend;

use App\Models\Backend\CategoryModel;
use CodeIgniter\RESTful\ResourceController;

class CategoryController extends ResourceController
{
    protected $CategoryModel;
    public function __construct()
    {
        // parent::__construct();

        $this->CategoryModel = new CategoryModel();
    }
    
    public function index()
    {
        $data = [
            'categories' => $this->CategoryModel->orderBy('id_categories', 'DESC')->findAll(),
            'title' => "Data Categories - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];
        // dd($data['urlMenu']);
        return view('backend/categories/index', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => "Add New Category - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(),1)),
        ];
        
        return view('backend/categories/create', $data);
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
            'val-nameCategory' => [
                'rules' => 'required',
                'label' => 'Name Category',
                'errors' => [
                    'required' => 'Name Category cannot be empty!',
                ],
            ],
        ];

        //  Check Validation Form Input
        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validator,
                'title' => "Add New Category - Tools Varnion",
                'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
            ];
            return view('backend/categories/create', $data);
            
        } else {
            // Success Insert to DB
            $nameCategory = $this->request->getVar('val-nameCategory');

            $data = [
                'name_categories' => $nameCategory,
            ];

            $this->CategoryModel->save($data);
            return redirect()->to(base_url('backend/categories'))->with('success', "Data Category successfully added!");
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
            'category' => $this->CategoryModel->find($id),
            'title' => "Edit Data Category - Tools Varnion",
            'urlMenu' => $urlMenu,
        ];

        if (!$id) {
            return redirect()->to(base_url('backend/categories'))->with('error', "Data Category does not exist!");
        }

        // Load model and get the category data
        if (!$data['category']) {
            return redirect()->to(base_url('backend/categories'))->with('error', "Data Category does not exist!");
        }
        
        return view('backend/categories/edit', $data);
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
        $category = $this->CategoryModel->find($id);
        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // If the form is submitted
        if ($this->request->getMethod() === 'put') {
            $nameCategory = $this->request->getVar('nameCategory');
            // Validation Rules
            $rules = [
                'nameCategory' => [
                    'rules' => 'required',
                    'label' => 'Name Category',
                    'errors' => [
                        'required' => 'Name Category cannot be empty!',
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
                    'category' => $this->CategoryModel->find($id),
                    'title' => "Edit Data Category - Tools Varnion",
                    'urlMenu' => $urlMenu,
                ];
                return view('backend/categories/edit', $data);
            } else {
                // Update the user data
                $data = [
                    'name_categories' => $nameCategory,
                    // Add more data as needed
                ];
                $this->CategoryModel->update($id, $data);

                // Set success message and redirect to user list page
                return redirect()->to('backend/categories')->with('success', 'Data Category successfully updated!');
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
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Category Id not found');
        }

        $this->CategoryModel->delete($id);
        return redirect()->to(base_url('backend/categories'))->with('success', "Data Category deleted successfully!");
    }  
    
}
