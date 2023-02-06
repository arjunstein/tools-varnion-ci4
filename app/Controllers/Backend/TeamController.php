<?php

namespace App\Controllers\Backend;

use App\Models\Backend\TeamsModel;
use CodeIgniter\RESTful\ResourceController;

class TeamController extends ResourceController
{
    protected $TeamsModel;
    public function __construct()
    {
        // parent::__construct();

        $this->TeamsModel = new TeamsModel();
    }

    public function index()
    {
        $data = [
            'teams' => $this->TeamsModel->orderBy('id_teams', 'DESC')->findAll(),
            'title' => "Data Categories External - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];

        return view('backend/teams/index', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => "Add New Team - Tools Varnion",
            'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
        ];
        // dd($data['urlMenu']);

        return view('backend/teams/create', $data);
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
            'val-nameTeam' => [
                'rules' => 'required',
                'label' => 'Name Team',
                'errors' => [
                    'required' => 'Name Team cannot be empty!',
                ],
            ],
        ];

        //  Check Validation Form Input
        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validator,
                'title' => "Add New Team - Tools Varnion",
                'urlMenu' => implode('/', array_slice($this->request->uri->getSegments(), 1)),
            ];
            return view('backend/teams/create', $data);
        } else {
            // Success Insert to DB
            $nameTeam = $this->request->getVar('val-nameTeam');

            $data = [
                'name_teams' => $nameTeam,
            ];

            $this->TeamsModel->save($data);
            return redirect()->to(base_url('backend/teams'))->with('success', "Data Team successfully added!");
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
            'team' => $this->TeamsModel->find($id),
            'title' => "Edit Data Team - Tools Varnion",
            'urlMenu' => $urlMenu,
        ];

        if (!$id) {
            return redirect()->to(base_url('backend/teams'))->with('error', "Data Team does not exist!");
        }

        // Load model and get the category data
        if (!$data['team']) {
            return redirect()->to(base_url('backend/teams'))->with('error', "Data Team does not exist!");
        }

        return view('backend/teams/edit', $data);
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
        $team = $this->TeamsModel->find($id);
        if (!$team) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // If the form is submitted
        if ($this->request->getMethod() === 'put') {
            $nameTeam = $this->request->getVar('nameTeam');
            // Validation Rules
            $rules = [
                'nameTeam' => [
                    'rules' => 'required',
                    'label' => 'Name Team',
                    'errors' => [
                        'required' => 'Name Team cannot be empty!',
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
                    'team' => $this->TeamsModel->find($id),
                    'title' => "Edit Data Team - Tools Varnion",
                    'urlMenu' => $urlMenu,
                ];
                return view('backend/teams/edit', $data);
            } else {
                // Update the user data
                $data = [
                    'name_teams' => $nameTeam,
                    // Add more data as needed
                ];
                $this->TeamsModel->update($id, $data);

                // Set success message and redirect to user list page
                return redirect()->to('backend/teams')->with('success', 'Data Team successfully updated!');
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
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Team Id not found');
        }

        $this->TeamsModel->delete($id);
        return redirect()->to(base_url('backend/teams'))->with('success', "Data Team deleted successfully!");
    }
}
