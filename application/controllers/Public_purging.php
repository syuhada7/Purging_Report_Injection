<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Public_purging extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model(['Eco_model', 'User_model', 'Delivery_model']);
    }

    public function index()
    {
        // $data['row'] = $this->Eco_model->get();
        $this->template->load('templates/template_public', 'Public_purging/index');
    }
}
