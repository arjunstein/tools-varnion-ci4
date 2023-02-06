<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function __construct()
    {
        // $this->session = session();
    }
    public function index()
    {
        $data['title'] = "Dashboard - Tools Varnion";
        $data['urlMenu'] = $this->request->uri->getSegment(2);
        // dd($data['']);

        return view('backend/dashboard', $data);
    }
}
