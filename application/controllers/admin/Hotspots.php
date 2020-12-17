<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotspots extends Admin_Controller
{

    private $table = 'hotspots';
    private $pk = 'id';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        $hotspots = $this->crud->gao($this->table, 'urutan ASC, scene_id ASC');
        $view = array(
            'title'        => 'Hotspots',
            'hotspots'    => $hotspots,
            'isi'        => 'admin/hotspots/list'
        );
        $this->load->view('admin/_layout/wrapper', $view);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 'admin');

        $main_scene = $this->crud->qo("SELECT `scene_id` FROM `scenes` ORDER BY `urutan` ASC");
        $view = array(
            'title'            => 'Tambah Hotspot',
            'main_scene'    => $main_scene,
            'isi'            => 'admin/hotspots/tambah'
        );

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('main_scene', 'Main Scene', 'required|trim|htmlspecialchars', array('required'    => '{field} harus diisi.'));
        $valid->set_rules('pitch', 'Pitch', 'required|callback_numeric_koma|trim|strip_tags|htmlspecialchars', array('required'    => '{field} harus diisi.'));
        $valid->set_rules('yaw', 'Yaw', 'required|callback_numeric_koma|trim|strip_tags|htmlspecialchars', array('required'    => '{field} harus diisi.'));
        $valid->set_rules('text', 'Text', 'required|trim|strip_tags|htmlspecialchars', array('required'    => '{field} harus diisi.'));
        $valid->set_rules('scene_id', 'Scene ID', 'required|callback_ada_hotspot|callback_cek_sama|trim|htmlspecialchars', array('required'    => '{field} harus diisi.'));

        if ($valid->run() === FALSE) $this->load->view('admin/_layout/wrapper', $view);
        else {
            // Masuk ke database
            $post = $this->input->post(NULL, TRUE);
            $scene = $this->crud->gd('scenes', array('scene_id' => $post['main_scene']));
            $data = array(
                'urutan'        => $scene->urutan,
                'main_scene'    => $post['main_scene'],
                'pitch'            => $post['pitch'],
                'yaw'            => $post['yaw'],
                'type'            => 'scene',
                'text'            => $post['text'],
                'scene_id'        => $post['scene_id'],
                'iat'            => date('Y-m-d H:i:s')
            );

            $this->crud->i($this->table, $data);
            $this->session->set_flashdata('sukses', 'Hotspot berhasil ditambah.');
            redirect(admin_url('hotspots'));
        }
    }

    // Edit
    public function edit($id = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 'admin');

        $hotspot = $this->crud->gd($this->table, array($this->pk => $id));
        if (!$hotspot) {
            view_error('Error 404', 'admin');
            return;
        }
        $main_scene = $this->crud->qo("SELECT `scene_id` FROM `scenes` ORDER BY `urutan` ASC");
        $view = array(
            'title'            => 'Edit Hotspot',
            'hotspot'        => $hotspot,
            'main_scene'    => $main_scene,
            'isi'            => 'admin/hotspots/edit'
        );

        if ($this->input->post('main_scene', TRUE) == $hotspot->main_scene and $this->input->post('scene_id', TRUE) == $hotspot->scene_id) $ada_hotspot = '';
        else $ada_hotspot = '|callback_ada_hotspot';

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('main_scene', 'Main Scene', 'required|trim|htmlspecialchars', array('required'    => '{field} harus diisi.'));
        $valid->set_rules('pitch', 'Pitch', 'required|callback_numeric_koma|trim|strip_tags|htmlspecialchars', array('required'    => '{field} harus diisi.'));
        $valid->set_rules('yaw', 'Yaw', 'required|callback_numeric_koma|trim|strip_tags|htmlspecialchars', array('required'    => '{field} harus diisi.'));
        $valid->set_rules('text', 'Text', 'required|trim|strip_tags|htmlspecialchars', array('required'    => '{field} harus diisi.'));
        $valid->set_rules('scene_id', 'Scene ID', 'required' . $ada_hotspot . '|callback_cek_sama|trim|htmlspecialchars', array('required'    => '{field} harus diisi.'));

        if ($valid->run() === FALSE) $this->load->view('admin/_layout/wrapper', $view);
        else {
            // Masuk ke database
            $post = $this->input->post(NULL, TRUE);
            $data = array(
                'main_scene'    => $post['main_scene'],
                'pitch'            => $post['pitch'],
                'yaw'            => $post['yaw'],
                'text'            => $post['text'],
                'scene_id'        => $post['scene_id']
            );

            $this->crud->u($this->table, $data, array($this->pk => $id));
            $this->session->set_flashdata('sukses', 'Hotspot berhasil diubah.');
            redirect(admin_url('hotspots'));
        }
    }

    // Hapus
    public function hapus($id = NULL)
    {
        if ($this->session->akses_level_admin == 'Blocked') view_error('Error 404', 'admin');

        $cek = $this->crud->gd($this->table, array($this->pk => $id));
        if ($this->input->get('act', TRUE) == $id && !empty($cek)) {
            $this->crud->d($this->table, array($this->pk => $id));
            $this->session->set_flashdata('sukses', 'Hotspot berhasil dihapus.');
            redirect(admin_url('hotspots'));
        } else {
            $this->session->set_flashdata('gagal', 'Hotspot gagal dihapus.');
            redirect(admin_url('hotspots'));
        }
    }

    function numeric_koma($str)
    {
        if (!preg_match('/^[0-9.-]+$/', $str)) {
            $this->form_validation->set_message('numeric_koma', 'Hanya boleh angka dan titik.');
            return false;
        }

        return true;
    }

    function ada_hotspot($str)
    {
        $cek = $this->crud->gd($this->table, array('main_scene' => $this->input->post('main_scene'), 'scene_id' => $str));
        if ($cek) {
            $this->form_validation->set_message('ada_hotspot', 'Hotspot ini sudah ada.');
            return false;
        }

        return true;
    }

    function cek_sama($str)
    {
        if ($this->input->post('main_scene') == $this->input->post('scene_id')) {
            $this->form_validation->set_message('cek_sama', '<b>Scene ID</b> tidak boleh sama dengan <b>Main Scene</b>.');
            return false;
        }

        return true;
    }
}
