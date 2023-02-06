<?php

namespace App\Controllers\Backend;

use App\Models\Backend\CategoryModel;
use App\Models\Backend\InternalToolsModel;
use CodeIgniter\RESTful\ResourceController;

class InternalToolsController extends ResourceController
{
    protected $InternalToolsModel;
    protected $CategoryModel;
    public function __construct()
    {
        // parent::__construct();

        $this->InternalToolsModel = new InternalToolsModel();
        $this->CategoryModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'internal_tools' => $this->InternalToolsModel->orderBy('id_internal_tools', 'DESC')->findAll(),
            'categories' => $this->CategoryModel->orderBy('id_categories', 'DESC')->findAll(),
            'title' => "Data Internal Tools - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];

        return view('backend/internal_tools/index', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => "Add New Internal Tool - Tools Varnion",
            'categories' => $this->CategoryModel->orderBy('id_categories', 'DESC')->findAll(),
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];
        // dd($data['urlMenu']);

        return view('backend/internal_tools/create', $data);
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
            'val-nameInternalTool' => [
                'rules' => 'required',
                'label' => 'Name Internal Tools Gamas',
                'errors' => [
                    'required' => 'Name Internal Tools Gamas cannot be empty!',
                ],
            ],
            'val-urlInternalTool' => [
                'rules' => 'required',
                'label' => 'URL Internal Tools Gamas',
                'errors' => [
                    'required' => 'URL Internal Tools Gamas cannot be empty!',
                ],
            ],
            'val-description' => [
                'rules' => 'required',
                'label' => 'Description',
                'errors' => [
                    'required' => 'Description cannot be empty!',
                ],
            ],
            'val-categories' => [
                'rules' => 'required',
                'label' => 'Categories Gamas',
                'errors' => [
                    'required' => 'Categories Gamas cannot be empty!',
                ],
            ],
        ];

        //  Check Validation Form Input
        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validator,
                'title' => "Add New Internal Tool - Tools Varnion",
                'categories' => $this->CategoryModel->orderBy('id_categories', 'DESC')->findAll(),
                'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
            ];
            return view('backend/internal_tools/create', $data);
        } else {
            // Success Insert to DB
            $nameInternalTool = $this->request->getVar('val-nameInternalTool');
            $urlInternalTool = $this->request->getVar('val-urlInternalTool');
            $description = $this->request->getVar('val-description');
            $categories = $this->request->getVar('val-categories');

            $data = [
                'name_internal_tools' => $nameInternalTool,
                'url_internal_tools' => $urlInternalTool,
                'description_internal_tools' => $description,
                'category_internal_tools' => $categories,
            ];

            $this->InternalToolsModel->save($data);
            return redirect()->to(base_url('backend/internal_tools'))->with('success', "Data Internal Tools successfully added!");
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
            'categories' => $this->CategoryModel->orderBy('id_categories', 'DESC')->findAll(),
            'internal_tool' => $this->InternalToolsModel->find($id),
            'title' => "Edit Data Internal Tools - Tools Varnion",
            'urlMenu' => $urlMenu,
        ];

        if (!$id) {
            return redirect()->to(base_url('backend/internal_tools'))->with('error', "Data Internal Tools does not exist!");
        }

        // Load model and get the category data
        if (!$data['internal_tool']) {
            return redirect()->to(base_url('backend/internal_tools'))->with('error', "Data Internal Tools does not exist!");
        }

        return view('backend/internal_tools/edit', $data);
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
        $internalTool = $this->InternalToolsModel->find($id);
        if (!$internalTool) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // If the form is submitted
        if ($this->request->getMethod() === 'put') {
            $nameInternalTool = $this->request->getVar('nameInternalTool');
            $urlInternalTool = $this->request->getVar('urlInternalTool');
            $description = $this->request->getVar('description');
            $categories = $this->request->getVar('categories');
            // Validation Rules
            // dd($nameInternalTool);
            $rules = [
                'nameInternalTool' => [
                    'rules' => 'required',
                    'label' => 'Name Internal Tools Gamas',
                    'errors' => [
                        'required' => 'Name Internal Tools Gamas cannot be empty!',
                    ],
                ],
                'urlInternalTool' => [
                    'rules' => 'required',
                    'label' => 'URL Internal Tools Gamas',
                    'errors' => [
                        'required' => 'URL Internal Tools Gamas cannot be empty!',
                    ],
                ],
                'description' => [
                    'rules' => 'required',
                    'label' => 'Description',
                    'errors' => [
                        'required' => 'Description cannot be empty!',
                    ],
                ],
                'categories' => [
                    'rules' => 'required',
                    'label' => 'Categories Gamas',
                    'errors' => [
                        'required' => 'Categories Gamas cannot be empty!',
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
                    'internal_tool' => $this->InternalToolsModel->find($id),
                    'title' => "Edit Data Internal Tool - Tools Varnion",
                    'urlMenu' => $urlMenu,
                    'categories' => $this->CategoryModel->orderBy('id_categories', 'DESC')->findAll(),
                ];
                // dd($data);
                return view('backend/internal_tools/edit', $data);
            } else {
                // Update the user data
                $data = [
                    'name_internal_tools' => $nameInternalTool,
                    'url_internal_tools' => $urlInternalTool,
                    'description_internal_tools' => $description,
                    'category_internal_tools' => $categories,
                ];
                $this->InternalToolsModel->update($id, $data);
                
                // Set success message and redirect to user list page
                return redirect()->to('backend/internal_tools')->with('success', 'Data Category External successfully updated!');
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
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Internal Tools Id not found');
        }

        $this->InternalToolsModel->delete($id);
        return redirect()->to(base_url('backend/internal_tools'))->with('success', "Data Internal Tools deleted successfully!");
    }
}
