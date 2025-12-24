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

    // edit data
    public function edit($id)
    {
        $query = $this->Purging_model->get($id);
        if ($query->num_rows() > 0) {
            $data['row']   = $query->row();
            $data['mesin'] = $this->Purging_model->get_mesin();
            $data['part'] = $this->Purging_model->get_part_name();
            $this->template->load('templates/template', 'purging/edit', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');window.location='" . site_url('purging') . "';</script>";
        }
    }

    public function update()
    {
        $post = $this->input->post(null, TRUE);
        $id   = $post['id_catat'];

        // ambil data lama
        $old = $this->Purging_model->get($id)->row();

        $config = [
            'upload_path'   => './uploads/purging/',
            'allowed_types' => 'jpeg|jpg|png',
            'max_size'      => 8192 // 4MB
        ];

        $this->load->library('upload', $config);

        /* =============================
       ATTACHMENT 1 (PURGING)
    ============================== */
        if (!empty($_FILES['attachment1']['name'])) {

            if ($this->upload->do_upload('attachment1')) {

                // HAPUS FILE LAMA (hanya jika upload baru sukses)
                if (
                    !empty($old->pic_1) &&
                    file_exists('./uploads/purging/' . $old->pic_1)
                ) {
                    unlink('./uploads/purging/' . $old->pic_1);
                }

                // SIMPAN FILE BARU
                $post['attachment1'] = $this->upload->data('file_name');
            } else {
                echo "<script>alert('" . $this->upload->display_errors() . "');history.back();</script>";
                return;
            }
        } else {
            // TIDAK UPLOAD → TETAP PAKAI FILE LAMA
            $post['attachment1'] = $old->pic_1;
        }

        /* =============================
       ATTACHMENT 2 (DISPOSAL)
    ============================== */
        if (!empty($_FILES['attachment2']['name'])) {

            if ($this->upload->do_upload('attachment2')) {

                if (
                    !empty($old->pic_2) &&
                    file_exists('./uploads/purging/' . $old->pic_2)
                ) {
                    unlink('./uploads/purging/' . $old->pic_2);
                }

                $post['attachment2'] = $this->upload->data('file_name');
            } else {
                echo "<script>alert('" . $this->upload->display_errors() . "');history.back();</script>";
                return;
            }
        } else {
            $post['attachment2'] = $old->pic_2;
        }

        // UPDATE DATABASE
        $this->Purging_model->update($post);

        echo "<script>
        alert('Data berhasil diupdate');
        window.location='" . site_url('purging') . "';
    </script>";
    }
}
