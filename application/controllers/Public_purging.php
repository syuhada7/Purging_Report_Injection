<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Public_purging extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation', 'upload');
        $this->load->model(['Purging_model', 'User_model']);
    }


    public function index()
    {
        $this->template->load('templates/template_public', 'Public_purging/dashboard');
    }

    public function purging()
    {
        $data['row'] = $this->Purging_model->get();
        $this->template->load('templates/template_public', 'Public_purging/index', $data);
    }

    public function view($id)
    {
        $data['row'] = $this->Purging_model->get($id);
        $this->template->load('templates/template_public', 'Public_purging/view', $data);
    }
}
