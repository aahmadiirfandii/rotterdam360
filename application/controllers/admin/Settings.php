<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends Admin_Controller
{

    private $table = 'setting';
    private $pk = 'id';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        $this->edit();
    }

    // Edit
    public function edit()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 'admin');

        $setting = $this->crud->gd($this->table, array($this->pk => '1'));
        $first_scene = $this->crud->qo("SELECT `scene_id` FROM `scenes` ORDER BY `urutan` ASC");
        $view = array(
            'title'            => 'Settings',
            'setting'        => $setting,
            'first_scene'    => $first_scene,
            'isi'            => 'admin/settings/edit'
        );

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('first_scene', 'First Scene', 'required|trim|htmlspecialchars', array('required'    => '{field} harus diisi.'));
        $valid->set_rules('author', 'Author', 'required|trim|htmlspecialchars', array('required'    => '{field} harus diisi.'));
        $valid->set_rules('scene_fade_duration', 'Scene Fade Duration', 'required|numeric|trim|htmlspecialchars', array('required'    => '{field} harus diisi.', 'numeric' => '{field} hanya boleh angka saja.'));

        if ($valid->run() === FALSE) $this->load->view('admin/_layout/wrapper', $view);
        else {
            // Masuk ke database
            $post = $this->input->post(NULL, TRUE);
            $data = array(
                'first_scene'            => $post['first_scene'],
                'author'                => $post['author'],
                'autoload'                => $post['autoload'],
                'scene_fade_duration'    => $post['scene_fade_duration']
            );

            $this->crud->u($this->table, $data, array($this->pk => '1'));
            $this->session->set_flashdata('sukses', 'Settings berhasil diubah.');
            redirect(admin_url('settings'));
        }
    }
}
