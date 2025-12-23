<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purging extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->library('form_validation', 'upload');
        $this->load->model(['Purging_model', 'User_model']);
    }

    public function index()
    {
        $data['row'] = $this->Purging_model->get();
        $this->template->load('templates/template', 'purging/index', $data);
    }

    public function regis()
    {
        $data['next_id'] = $this->Purging_model->get_next_id();
        $data['mesin'] = $this->Purging_model->get_mesin();
        $data['part'] = $this->Purging_model->get_part_name();
        $this->template->load('templates/template', 'purging/regis', $data);
    }

    public function view($id)
    {
        $data['row'] = $this->Purging_model->get($id);
        $this->template->load('templates/template', 'purging/view', $data);
    }

    public function save()
    {
        // Konfigurasi upload
        $config['upload_path']   = './uploads/purging/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']      = 8192; // 4MB

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        // Upload file 1
        $this->upload->initialize($config);
        $file1 = "";
        if ($this->upload->do_upload('attachment1')) {
            $file1_data = $this->upload->data();
            $file1 = $file1_data['file_name'];
        }

        // Upload file 2
        $this->upload->initialize($config);
        $file2 = "";
        if ($this->upload->do_upload('attachment2')) {
            $file2_data = $this->upload->data();
            $file2 = $file2_data['file_name'];
        }

        // Ambil input dari form
        $data = [
            'shift'           => $this->input->post('shift'),
            'username'        => $this->input->post('username'),
            'no_mc'           => $this->input->post('no_mc'),
            'c_awal'          => $this->input->post('c_awal'),
            'name_pn'         => $this->input->post('name_pn'),
            'no_pn'           => $this->input->post('no_pn'),
            'name_model'      => $this->input->post('name_model'),
            'name_resin'      => $this->input->post('name_resin'),
            'bf_ganti'        => $this->input->post('bf_ganti'),
            'af_ganti'        => $this->input->post('af_ganti'),
            'b_purging'       => $this->input->post('b_purging'),
            'b_disposal'      => $this->input->post('b_disposal'),
            'qty_b_dis'       => $this->input->post('qty_b_dis'),
            'jumlah_kg'       => $this->input->post('jumlah_kg'),
            'keterangan'      => $this->input->post('keterangan'),
            'pic_1'           => $file1,
            'pic_2'           => $file2
        ];

        $this->Purging_model->insert($data);
        redirect('Purging');
    }

    // get data part
    public function get_model()
    {
        $part_name = $this->input->post('name_pn');
        echo json_encode(
            $this->Purging_model->get_model_by_part($part_name)
        );
    }

    public function get_part_number()
    {
        $part_name = $this->input->post('name_pn');
        $model     = $this->input->post('name_model');

        echo json_encode(
            $this->Purging_model->get_pn_by_part_model($part_name, $model)
        );
    }
}
