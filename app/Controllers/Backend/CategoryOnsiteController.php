<?php

namespace App\Controllers\Backend;

use App\Models\Backend\CategoryOnsiteModel;
use CodeIgniter\RESTful\ResourceController;
class CategoryOnsiteController extends ResourceController
{
    protected $CategoryOnsiteModel;
    public function __construct()
    {
        // parent::__construct();

        $this->CategoryOnsiteModel = new CategoryOnsiteModel();
    }

    public function index()
    {
        $data = [
            'categories_onsite' => $this->CategoryOnsiteModel->orderBy('id_categories_onsite', 'DESC')->findAll(),
            'title' => "Data Categories Onsite - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];

        return view('backend/categories_onsite/index', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => "Add New Category Onsite - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];
        // dd($data['urlMenu']);

        return view('backend/categories_onsite/create', $data);
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
            'val-nameCategoryOnsite' => [
                'rules' => 'required',
                'label' => 'Name Category Onsite',
                'errors' => [
                    'required' => 'Name Category Onsite cannot be empty!',
                ],
            ],
        ];

        //  Check Validation Form Input
        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validator,
                'title' => "Add New Category Onsite - Tools Varnion",
                'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
            ];
            return view('backend/categories_onsite/create', $data);
        } else {
            // Success Insert to DB
            $nameCategoryOnsite = $this->request->getVar('val-nameCategoryOnsite');

            $data = [
                'name_categories_onsite' => $nameCategoryOnsite,
            ];

            $this->CategoryOnsiteModel->save($data);
            return redirect()->to(base_url('backend/categories_onsite'))->with('success', "Data Category Onsite successfully added!");
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
            'category_onsite' => $this->CategoryOnsiteModel->find($id),
            'title' => "Edit Data Category Onsite - Tools Varnion",
            'urlMenu' => $urlMenu,
        ];

        if (!$id) {
            return redirect()->to(base_url('backend/categories_onsite'))->with('error', "Data Category Onsite does not exist!");
        }

        // Load model and get the category data
        if (!$data['category_onsite']) {
            return redirect()->to(base_url('backend/categories_onsite'))->with('error', "Data Category Onsite does not exist!");
        }

        return view('backend/categories_onsite/edit', $data);
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
        $categoryOnsite = $this->CategoryOnsiteModel->find($id);
        if (!$categoryOnsite) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // If the form is submitted
        if ($this->request->getMethod() === 'put') {
            $nameCategoryOnsite = $this->request->getVar('nameCategoryOnsite');
            // Validation Rules
            $rules = [
                'nameCategoryOnsite' => [
                    'rules' => 'required',
                    'label' => 'Name Category Onsite',
                    'errors' => [
                        'required' => 'Name Category Onsite cannot be empty!',
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
                    'category_onsite' => $this->CategoryOnsiteModel->find($id),
                    'title' => "Edit Data Category Onsite - Tools Varnion",
                    'urlMenu' => $urlMenu,
                ];
                return view('backend/categories_onsite/edit', $data);
            } else {
                // Update the user data
                $data = [
                    'name_categories_onsite' => $nameCategoryOnsite,
                    // Add more data as needed
                ];
                $this->CategoryOnsiteModel->update($id, $data);

                // Set success message and redirect to user list page
                return redirect()->to('backend/categories_onsite')->with('success', 'Data Category Onsite successfully updated!');
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
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Category Onsite Id not found');
        }

        $this->CategoryOnsiteModel->delete($id);
        return redirect()->to(base_url('backend/categories_onsite'))->with('success', "Data Category Onsite deleted successfully!");
    }
}
