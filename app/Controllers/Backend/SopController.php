<?php

namespace App\Controllers\Backend;

use App\Models\Backend\SopModel;
use CodeIgniter\RESTful\ResourceController;

class SopController extends ResourceController
{
    protected $SopModel;
    public function __construct()
    {
        // parent::__construct();

        $this->SopModel = new SopModel();
    }

    public function index()
    {
        $data = [
            'sop' => $this->SopModel->orderBy('id_sop', 'DESC')->findAll(),
            'title' => "Data SOP - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];

        return view('backend/sop/index', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => "Add New SOP - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];

        return view('backend/sop/create', $data);
    }

    public function uploadImage()
    {
        $validated = $this->validate([
            'upload' => [
                'uploaded[upload]',
                'mime_in[upload,image/jpg,image/jpeg,image/png]',
                'max_size[upload,1024]',
            ],
        ]);

        $file = $this->request->getFile('upload');
        if ($validated) {
            $fileName = $file->getRandomName();
            $writePath = './assets/images/sop';
            $file->move($writePath, $fileName);
            $data = [
                "uploaded" => true,
                "url" => base_url('assets/images/sop/' . $fileName),
            ];
        } else {
            $data = [
                "uploaded" => false,
                "error" => [
                    "messsages" => $file
                ],
            ];
        }

        return $this->response->setJSON($data);
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
            'val-titleSop' => [
                'rules' => 'required',
                'label' => 'Title SOP',
                'errors' => [
                    'required' => 'Title SOP cannot be empty!',
                ],
            ],
            'val-content' => [
                'rules' => 'required',
                'label' => 'Content SOP',
                'errors' => [
                    'required' => 'Content SOP cannot be empty!',
                ],
            ],
        ];

        //  Check Validation Form Input
        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validator,
                'title' => "Add New SOP - Tools Varnion",
                'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
            ];
            return view('backend/sop/create', $data);
        } else {
            // Success Insert to DB
            $titleSop = $this->request->getVar('val-titleSop');
            $content = $this->request->getVar('val-content');
            $data = [
                'title_sop' => $titleSop,
                'contents_sop' => $content,
            ];
            // dd($data);
            $this->SopModel->save($data);
            return redirect()->to(base_url('backend/sop'))->with('success', "Data SOP successfully added!");
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
            'sop' => $this->SopModel->find($id),
            'title' => "Edit Data SOP - Tools Varnion",
            'urlMenu' => $urlMenu,
        ];

        if (!$id) {
            return redirect()->to(base_url('backend/sop'))->with('error', "Data SOP does not exist!");
        }

        // Load model and get the category data
        if (!$data['sop']) {
            return redirect()->to(base_url('backend/sop'))->with('error', "Data SOP does not exist!");
        }

        return view('backend/sop/edit', $data);
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
        $sop = $this->SopModel->find($id);
        if (!$sop) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // If the form is submitted
        if ($this->request->getMethod() === 'put') {
            $titleSop = $this->request->getVar('titleSop');
            $content = $this->request->getVar('content');
            // Validation Rules
            $rules = [
                'titleSop' => [
                    'rules' => 'required',
                    'label' => 'Title SOP',
                    'errors' => [
                        'required' => 'Title SOP cannot be empty!',
                    ],
                ],
                'content' => [
                    'rules' => 'required',
                    'label' => 'Content',
                    'errors' => [
                        'required' => 'Content cannot be empty!',
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
                    'category_external' => $this->SopModel->find($id),
                    'title' => "Edit Data SOP - Tools Varnion",
                    'urlMenu' => $urlMenu,
                ];
                return view('backend/sop/edit', $data);
            } else {
                // Update the user data
                $data = [
                    'title_sop' => $titleSop,
                    'contents_sop' => $content,
                    // Add more data as needed
                ];
                $this->SopModel->update($id, $data);

                // Set success message and redirect to user list page
                return redirect()->to('backend/sop')->with('success', 'Data SOP successfully updated!');
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
        //
    }
}
