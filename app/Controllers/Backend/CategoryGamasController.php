<?php

namespace App\Controllers\Backend;

use App\Models\Backend\CategoryGamasModel;
use CodeIgniter\RESTful\ResourceController;

class CategoryGamasController extends ResourceController
{
    protected $CategoryGamasModel;
    public function __construct()
    {
        // parent::__construct();

        $this->CategoryGamasModel = new CategoryGamasModel();
    }

    public function index()
    {
        $data = [
            'categories_gamas' => $this->CategoryGamasModel->orderBy('id_categories_gamas', 'DESC')->findAll(),
            'title' => "Data Categories Gamas - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];

        return view('backend/categories_gamas/index', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => "Add New Category Gamas - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];
        // dd($data['urlMenu']);

        return view('backend/categories_gamas/create', $data);
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
            'val-nameCategoryGamas' => [
                'rules' => 'required',
                'label' => 'Name Category Gamas',
                'errors' => [
                    'required' => 'Name Category Gamas cannot be empty!',
                ],
            ],
        ];

        //  Check Validation Form Input
        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validator,
                'title' => "Add New Category Gamas - Tools Varnion",
                'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
            ];
            return view('backend/categories_gamas/create', $data);
        } else {
            // Success Insert to DB
            $nameCategoryGamas = $this->request->getVar('val-nameCategoryGamas');

            $data = [
                'name_categories_gamas' => $nameCategoryGamas,
            ];

            $this->CategoryGamasModel->save($data);
            return redirect()->to(base_url('backend/categories_gamas'))->with('success', "Data Category Gamas successfully added!");
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
            'category_gamas' => $this->CategoryGamasModel->find($id),
            'title' => "Edit Data Category Gamas - Tools Varnion",
            'urlMenu' => $urlMenu,
        ];

        if (!$id) {
            return redirect()->to(base_url('backend/categories_gamas'))->with('error', "Data Category Gamas does not exist!");
        }

        // Load model and get the category data
        if (!$data['category_gamas']) {
            return redirect()->to(base_url('backend/categories_gamas'))->with('error', "Data Category Gamas does not exist!");
        }

        return view('backend/categories_gamas/edit', $data);
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
        $categoryGamas = $this->CategoryGamasModel->find($id);
        if (!$categoryGamas) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // If the form is submitted
        if ($this->request->getMethod() === 'put') {
            $nameCategoryGamas = $this->request->getVar('nameCategoryGamas');
            // Validation Rules
            $rules = [
                'nameCategoryGamas' => [
                    'rules' => 'required',
                    'label' => 'Name Category Gamas',
                    'errors' => [
                        'required' => 'Name Category Gamas cannot be empty!',
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
                    'category_gamas' => $this->CategoryGamasModel->find($id),
                    'title' => "Edit Data Category Gamas - Tools Varnion",
                    'urlMenu' => $urlMenu,
                ];
                return view('backend/categories_gamas/edit', $data);
            } else {
                // Update the user data
                $data = [
                    'name_categories_gamas' => $nameCategoryGamas,
                    // Add more data as needed
                ];
                $this->CategoryGamasModel->update($id, $data);

                // Set success message and redirect to user list page
                return redirect()->to('backend/categories_gamas')->with('success', 'Data Category Gamas successfully updated!');
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
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Category Gamas Id not found');
        }

        $this->CategoryGamasModel->delete($id);
        return redirect()->to(base_url('backend/categories_gamas'))->with('success', "Data Category Gamas deleted successfully!");
    }
}
