<?php

namespace App\Controllers\Backend;

use App\Models\Backend\CustomerModel;
use CodeIgniter\RESTful\ResourceController;

class CustomerController extends ResourceController
{
    protected $CustomerModel;
    public function __construct()
    {
        // parent::__construct();

        $this->CustomerModel = new CustomerModel();
    }

    public function index()
    {
        $data = [
            'customer' => $this->CustomerModel->orderBy('id_customer', 'DESC')->findAll(),
            'title' => "Data Customer - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];

        return view('backend/customer/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
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
