<?php

namespace App\Controllers\Backend;

use App\Models\Backend\CategoryNotesModel;
use CodeIgniter\RESTful\ResourceController;

class CategoryNotesController extends ResourceController
{
    protected $CategoryNotesModel;
    public function __construct()
    {
        // parent::__construct();

        $this->CategoryNotesModel = new CategoryNotesModel();
    }

    public function index()
    {
        $data = [
            'categories_notes' => $this->CategoryNotesModel->orderBy('id_categories_notes', 'DESC')->findAll(),
            'title' => "Data Categories Notes - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];

        return view('backend/categories_notes/index', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => "Add New Category Notes - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];
        // dd($data['urlMenu']);

        return view('backend/categories_notes/create', $data);
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
            'val-nameCategoryNotes' => [
                'rules' => 'required',
                'label' => 'Name Category Notes',
                'errors' => [
                    'required' => 'Name Category Notes cannot be empty!',
                ],
            ],
        ];

        //  Check Validation Form Input
        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validator,
                'title' => "Add New Category Notes - Tools Varnion",
                'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
            ];
            return view('backend/categories_notes/create', $data);
        } else {
            // Success Insert to DB
            $nameCategoryNotes = $this->request->getVar('val-nameCategoryNotes');

            $data = [
                'name_categories_notes' => $nameCategoryNotes,
            ];

            $this->CategoryNotesModel->save($data);
            return redirect()->to(base_url('backend/categories_notes'))->with('success', "Data Category Notes successfully added!");
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
            'category_notes' => $this->CategoryNotesModel->find($id),
            'title' => "Edit Data Category Notes - Tools Varnion",
            'urlMenu' => $urlMenu,
        ];

        if (!$id) {
            return redirect()->to(base_url('backend/categories_notes'))->with('error', "Data Category Notes does not exist!");
        }

        // Load model and get the category data
        if (!$data['category_notes']) {
            return redirect()->to(base_url('backend/categories_notes'))->with('error', "Data Category Notes does not exist!");
        }

        return view('backend/categories_notes/edit', $data);
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
        $categoryNotes = $this->CategoryNotesModel->find($id);
        if (!$categoryNotes) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // If the form is submitted
        if ($this->request->getMethod() === 'put') {
            $nameCategoryNotes = $this->request->getVar('nameCategoryNotes');
            // Validation Rules
            $rules = [
                'nameCategoryNotes' => [
                    'rules' => 'required',
                    'label' => 'Name Category Notes',
                    'errors' => [
                        'required' => 'Name Category Notes cannot be empty!',
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
                    'category_notes' => $this->CategoryNotesModel->find($id),
                    'title' => "Edit Data Category Notes - Tools Varnion",
                    'urlMenu' => $urlMenu,
                ];
                return view('backend/categories_notes/edit', $data);
            } else {
                // Update the user data
                $data = [
                    'name_categories_notes' => $nameCategoryNotes,
                    // Add more data as needed
                ];
                $this->CategoryNotesModel->update($id, $data);

                // Set success message and redirect to user list page
                return redirect()->to('backend/categories_notes')->with('success', 'Data Category Notes successfully updated!');
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
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Category Notes Id not found');
        }

        $this->CategoryNotesModel->delete($id);
        return redirect()->to(base_url('backend/categories_notes'))->with('success', "Data Category Notes deleted successfully!");
    }
}
