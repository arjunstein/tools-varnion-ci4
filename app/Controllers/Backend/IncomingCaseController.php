<?php

namespace App\Controllers\Backend;

use App\Models\Backend\IncomingCaseModel;
use CodeIgniter\RESTful\ResourceController;

class IncomingCaseController extends ResourceController
{
    protected $IncomingCaseModel;
    public function __construct()
    {
        // parent::__construct();

        $this->IncomingCaseModel = new IncomingCaseModel();
    }

    public function index()
    {
        $data = [
            'incoming_case' => $this->IncomingCaseModel->orderBy('id_incoming_case', 'DESC')->findAll(),
            'title' => "Data Incoming Case - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];

        return view('backend/incoming_case/index', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => "Add New Incoming Case - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];
        // dd($data['urlMenu']);

        return view('backend/incoming_case/create', $data);
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
            'val-nameIncomingCase' => [
                'rules' => 'required',
                'label' => 'Name Incoming Case',
                'errors' => [
                    'required' => 'Name Incoming Case cannot be empty!',
                ],
            ],
        ];

        //  Check Validation Form Input
        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validator,
                'title' => "Add New Incoming Case - Tools Varnion",
                'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
            ];
            return view('backend/incoming_case/create', $data);
        } else {
            // Success Insert to DB
            $nameIncomingCase = $this->request->getVar('val-nameIncomingCase');

            $data = [
                'name_incoming_case' => $nameIncomingCase,
            ];

            $this->IncomingCaseModel->save($data);
            return redirect()->to(base_url('backend/incoming_case'))->with('success', "Data Incoming Case successfully added!");
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
            'incoming_case' => $this->IncomingCaseModel->find($id),
            'title' => "Edit Data Incoming Case - Tools Varnion",
            'urlMenu' => $urlMenu,
        ];

        if (!$id) {
            return redirect()->to(base_url('backend/incoming_case'))->with('error', "Data Incoming Case does not exist!");
        }

        // Load model and get the category data
        if (!$data['incoming_case']) {
            return redirect()->to(base_url('backend/incoming_case'))->with('error', "Data Incoming Case does not exist!");
        }

        return view('backend/incoming_case/edit', $data);
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
        $incomingCase = $this->IncomingCaseModel->find($id);
        if (!$incomingCase) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // If the form is submitted
        if ($this->request->getMethod() === 'put') {
            $nameIncomingCase = $this->request->getVar('nameIncomingCase');
            // Validation Rules
            $rules = [
                'nameIncomingCase' => [
                    'rules' => 'required',
                    'label' => 'Name Incoming Case',
                    'errors' => [
                        'required' => 'Name Incoming Case cannot be empty!',
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
                    'incoming_case' => $this->IncomingCaseModel->find($id),
                    'title' => "Edit Data Incoming Case - Tools Varnion",
                    'urlMenu' => $urlMenu,
                ];
                return view('backend/incoming_case/edit', $data);
            } else {
                // Update the user data
                $data = [
                    'name_incoming_case' => $nameIncomingCase,
                    // Add more data as needed
                ];
                $this->IncomingCaseModel->update($id, $data);

                // Set success message and redirect to user list page
                return redirect()->to('backend/incoming_case')->with('success', 'Data Incoming Case successfully updated!');
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
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Incoming Case Id not found');
        }

        $this->IncomingCaseModel->delete($id);
        return redirect()->to(base_url('backend/incoming_case'))->with('success', "Data Incoming Case deleted successfully!");
    }
}
