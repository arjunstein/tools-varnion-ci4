<?php

namespace App\Controllers\Backend;

use App\Models\Backend\CategoryExternalModel;
use CodeIgniter\RESTful\ResourceController;

class CategoryExternalController extends ResourceController
{
    protected $CategoryExternalModel;
    public function __construct()
    {
        // parent::__construct();

        $this->CategoryExternalModel = new CategoryExternalModel();
    }

    public function index()
    {
        $data = [
            'categories_external' => $this->CategoryExternalModel->orderBy('id_categories_external', 'DESC')->findAll(),
            'title' => "Data Categories External - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];

        return view('backend/categories_external/index', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => "Add New Category External - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];
        // dd($data['urlMenu']);

        return view('backend/categories_external/create', $data);
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
            'val-nameCategoryExternal' => [
                'rules' => 'required',
                'label' => 'Name Category External',
                'errors' => [
                    'required' => 'Name Category External cannot be empty!',
                ],
            ],
        ];

        //  Check Validation Form Input
        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validator,
                'title' => "Add New Category External - Tools Varnion",
                'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
            ];
            return view('backend/categories_external/create', $data);
            
        } else {
            // Success Insert to DB
            $nameCategoryExternal = $this->request->getVar('val-nameCategoryExternal');

            $data = [
                'name_categories_external' => $nameCategoryExternal,
            ];

            $this->CategoryExternalModel->save($data);
            return redirect()->to(base_url('backend/categories_external'))->with('success', "Data Category External successfully added!");
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
            'category_external' => $this->CategoryExternalModel->find($id),
            'title' => "Edit Data Category External - Tools Varnion",
            'urlMenu' => $urlMenu,
        ];

        if (!$id) {
            return redirect()->to(base_url('backend/categories_external'))->with('error', "Data Category External does not exist!");
        }

        // Load model and get the category data
        if (!$data['category_external']) {
            return redirect()->to(base_url('backend/categories_external'))->with('error', "Data Category External does not exist!");
        }
        
        return view('backend/categories_external/edit', $data);
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
        $categoryExternal = $this->CategoryExternalModel->find($id);
        if (!$categoryExternal) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // If the form is submitted
        if ($this->request->getMethod() === 'put') {
            $nameCategoryExternal = $this->request->getVar('nameCategoryExternal');
            // Validation Rules
            $rules = [
                'nameCategoryExternal' => [
                    'rules' => 'required',
                    'label' => 'Name Category External',
                    'errors' => [
                        'required' => 'Name Category External cannot be empty!',
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
                    'category_external' => $this->CategoryExternalModel->find($id),
                    'title' => "Edit Data Category External - Tools Varnion",
                    'urlMenu' => $urlMenu,
                ];
                return view('backend/categories_external/edit', $data);
            } else {
                // Update the user data
                $data = [
                    'name_categories_external' => $nameCategoryExternal,
                    // Add more data as needed
                ];
                $this->CategoryExternalModel->update($id, $data);

                // Set success message and redirect to user list page
                return redirect()->to('backend/categories_external')->with('success', 'Data Category External successfully updated!');
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
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Category External Id not found');
        }

        $this->CategoryExternalModel->delete($id);
        return redirect()->to(base_url('backend/categories_external'))->with('success', "Data Category External deleted successfully!");
    }
}
