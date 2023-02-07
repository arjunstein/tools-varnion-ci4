<?php

namespace App\Controllers\Backend;

use App\Models\Backend\CategoryExternalModel;
use App\Models\Backend\ExternalToolsModel;
use CodeIgniter\RESTful\ResourceController;

class ExternalToolsController extends ResourceController
{
    protected $ExternalToolsModel;
    protected $CategoryExternalModel;
    public function __construct()
    {
        // parent::__construct();

        $this->ExternalToolsModel = new ExternalToolsModel();
        $this->CategoryExternalModel = new CategoryExternalModel();
    }

    public function index()
    {
        $data = [
            'external_tools' => $this->ExternalToolsModel->orderBy('id_external_tools', 'DESC')->findAll(),
            'categories_external' => $this->CategoryExternalModel->orderBy('id_categories_external', 'DESC')->findAll(),
            'title' => "Data External Tools - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];

        return view('backend/external_tools/index', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => "Add New External Tool - Tools Varnion",
            'categories_external' => $this->CategoryExternalModel->orderBy('id_categories_external', 'DESC')->findAll(),
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];
        // dd($data['urlMenu']);

        return view('backend/external_tools/create', $data);
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
            'val-nameExternalTool' => [
                'rules' => 'required',
                'label' => 'Name External Tools',
                'errors' => [
                    'required' => 'Name External Tools cannot be empty!',
                ],
            ],
            'val-urlExternalTool' => [
                'rules' => 'required',
                'label' => 'URL External Tools',
                'errors' => [
                    'required' => 'URL External Tools cannot be empty!',
                ],
            ],
            'val-descriptionExternalTool' => [
                'rules' => 'required',
                'label' => 'Description',
                'errors' => [
                    'required' => 'Description cannot be empty!',
                ],
            ],
            'val-categoriesExternalTool' => [
                'rules' => 'required',
                'label' => 'Categories',
                'errors' => [
                    'required' => 'Categories cannot be empty!',
                ],
            ],
        ];

        //  Check Validation Form Input
        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validator,
                'title' => "Add New External Tool - Tools Varnion",
                'categories_external' => $this->CategoryExternalModel->orderBy('id_categories_external', 'DESC')->findAll(),
                'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
            ];
            return view('backend/external_tools/create', $data);
        } else {
            // Success Insert to DB
            $nameExternalTool = $this->request->getVar('val-nameExternalTool');
            $urlExternalTool = $this->request->getVar('val-urlExternalTool');
            $descriptionExternalTool = $this->request->getVar('val-descriptionExternalTool');
            $categoriesExternalTool = $this->request->getVar('val-categoriesExternalTool');

            $data = [
                'name_external_tools' => $nameExternalTool,
                'url_external_tools' => $urlExternalTool,
                'description_external_tools' => $descriptionExternalTool,
                'category_external_tools' => $categoriesExternalTool,
            ];

            $this->ExternalToolsModel->save($data);
            return redirect()->to(base_url('backend/external_tools'))->with('success', "Data External Tools successfully added!");
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
            'categories_external' => $this->CategoryExternalModel->orderBy('id_categories_external', 'DESC')->findAll(),
            'external_tool' => $this->ExternalToolsModel->find($id),
            'title' => "Edit Data External Tools - Tools Varnion",
            'urlMenu' => $urlMenu,
        ];

        if (!$id) {
            return redirect()->to(base_url('backend/external_tools'))->with('error', "Data External Tools does not exist!");
        }

        // Load model and get the category data
        if (!$data['external_tool']) {
            return redirect()->to(base_url('backend/external_tools'))->with('error', "Data External Tools does not exist!");
        }

        return view('backend/external_tools/edit', $data);
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
        $externalTool = $this->ExternalToolsModel->find($id);
        if (!$externalTool) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // If the form is submitted
        if ($this->request->getMethod() === 'put') {
            $nameExternalTool = $this->request->getVar('nameExternalTool');
            $urlExternalTool = $this->request->getVar('urlExternalTool');
            $descriptionExternalTool = $this->request->getVar('descriptionExternalTool');
            $categoriesExternalTool = $this->request->getVar('categoriesExternalTool');
            // Validation Rules
            // dd($nameExternalTool);
            $rules = [
                'nameExternalTool' => [
                    'rules' => 'required',
                    'label' => 'Name External Tools',
                    'errors' => [
                        'required' => 'Name External Tools cannot be empty!',
                    ],
                ],
                'urlExternalTool' => [
                    'rules' => 'required',
                    'label' => 'URL External Tools',
                    'errors' => [
                        'required' => 'URL External Tools cannot be empty!',
                    ],
                ],
                'descriptionExternalTool' => [
                    'rules' => 'required',
                    'label' => 'Description',
                    'errors' => [
                        'required' => 'Description cannot be empty!',
                    ],
                ],
                'categoriesExternalTool' => [
                    'rules' => 'required',
                    'label' => 'Categories',
                    'errors' => [
                        'required' => 'Categories cannot be empty!',
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
                    'external_tool' => $this->ExternalToolsModel->find($id),
                    'title' => "Edit Data External Tool - Tools Varnion",
                    'urlMenu' => $urlMenu,
                    'categories_external' => $this->CategoryExternalModel->orderBy('id_categories_external', 'DESC')->findAll(),
                ];
                // dd($data);
                return view('backend/external_tools/edit', $data);
            } else {
                // Update the user data
                $data = [
                    'name_external_tools' => $nameExternalTool,
                    'url_external_tools' => $urlExternalTool,
                    'description_external_tools' => $descriptionExternalTool,
                    'category_external_tools' => $categoriesExternalTool,
                ];
                $this->ExternalToolsModel->update($id, $data);

                // Set success message and redirect to user list page
                return redirect()->to('backend/external_tools')->with('success', 'Data Category External successfully updated!');
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
            throw new \CodeIgniter\Exceptions\PageNotFoundException('External Tools Id not found');
        }

        $this->ExternalToolsModel->delete($id);
        return redirect()->to(base_url('backend/external_tools'))->with('success', "Data External Tools deleted successfully!");
    }
}
