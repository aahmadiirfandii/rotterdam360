<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scenes extends Admin_Controller {

	private $table = 'scenes';
	private $pk = 'id';

	// Load database
	public function __construct() {
		parent::__construct();
	}

	// Index
	public function index() {
		$scenes = $this->crud->gao($this->table, 'urutan ASC');
		$view = array(	'title'		=> 'Scenes',
						'scenes'	=> $scenes,
						'isi'		=> 'admin/scenes/list');
		$this->load->view('admin/_layout/wrapper', $view);
	}

	// Tambah
	public function tambah() {
		if ($this->session->akses_level == 'Blocked') view_error('Error 404', 'admin');

		$max = $this->crud->ca($this->table) + 1;
		$view = array(	'title'		=> 'Tambah Scene',
		              	'max'		=> $max,
						'isi'		=> 'admin/scenes/tambah');

		$valid = $this->form_validation;
		$valid->set_error_delimiters('<i style="color: red;">', '</i>');
		$valid->set_rules('scene_id', 'Scene ID', 'required|is_unique[scenes.scene_id]|trim|htmlspecialchars', array('required'	=> '{field} harus diisi.', 'is_unique' => '{field} "<b>'.$this->input->post('scene_id', TRUE).'</b>" sudah ada.'));
		$valid->set_rules('title', 'Title', 'required|trim|strip_tags|htmlspecialchars', array('required'	=> '{field} harus diisi.'));
		$valid->set_rules('hfov', 'hFov', 'required|callback_numeric_koma|trim|strip_tags|htmlspecialchars', array('required'	=> '{field} harus diisi.'));
		$valid->set_rules('pitch', 'Pitch', 'required|callback_numeric_koma|trim|strip_tags|htmlspecialchars', array('required'	=> '{field} harus diisi.'));
		$valid->set_rules('yaw', 'Yaw', 'required|callback_numeric_koma|trim|strip_tags|htmlspecialchars', array('required'	=> '{field} harus diisi.'));
		$valid->set_rules('type', 'Type', 'required|trim|strip_tags|htmlspecialchars', array('required'	=> '{field} harus diisi.'));

		if ($valid->run() === FALSE) $this->load->view('admin/_layout/wrapper', $view);
		else {
			// Mekanisme upload panorama
			$panorama = upload_panorama('panorama', 'tambah', '', $view, 'admin', TRUE);

			// Masuk ke database
			if ($panorama !== FALSE) {
				$post = $this->input->post(NULL, TRUE);

				for ($i=$max; $i>$post['urutan']; $i--) {
					$this->crud->u($this->table, array('urutan' => $i), array('urutan' => ($i-1)));
					$this->crud->u('hotspots', array('urutan' => $i), array('urutan' => ($i-1)));
				}

				$data = array(	'urutan'	=> $post['urutan'],
								'scene_id'	=> $post['scene_id'],
								'title'		=> $post['title'],
								'hfov'		=> $post['hfov'],
								'pitch'		=> $post['pitch'],
								'yaw'		=> $post['yaw'],
								'type'		=> $post['type'],
								'panorama'	=> $panorama,
								'iat'		=> date('Y-m-d H:i:s')
				);

				$this->crud->i($this->table, $data);
				$this->session->set_flashdata('sukses', 'Scene berhasil ditambah.');
				redirect(admin_url('scenes'));
			}
		}
	}

	// Edit
	public function edit($id = NULL) {
		if ($this->session->akses_level == 'Blocked') view_error('Error 404', 'admin');

		$scene = $this->crud->gd($this->table, array($this->pk => $id));
		if (!$scene) { view_error('Error 404', 'admin'); return; }
		$max = $this->crud->ca($this->table);
		$view = array(	'title'		=> 'Edit Scene',
		              	'scene'		=> $scene,
		              	'max'		=> $max,
						'isi'		=> 'admin/scenes/edit');

		$valid = $this->form_validation;
		$valid->set_error_delimiters('<i style="color: red;">', '</i>');
		$is_unique = $this->input->post('scene_id', TRUE) != $scene->scene_id ? '|is_unique[scenes.scene_id]' : '';
		$valid->set_rules('scene_id', 'Scene ID', 'required'.$is_unique.'|trim|htmlspecialchars', array('required'	=> '{field} harus diisi.', 'is_unique' => '{field} "<b>'.$this->input->post('scene_id', TRUE).'</b>" sudah ada.'));
		$valid->set_rules('title', 'Title', 'required|trim|strip_tags|htmlspecialchars', array('required'	=> '{field} harus diisi.'));
		$valid->set_rules('hfov', 'hFov', 'required|callback_numeric_koma|trim|strip_tags|htmlspecialchars', array('required'	=> '{field} harus diisi.'));
		$valid->set_rules('pitch', 'Pitch', 'required|callback_numeric_koma|trim|strip_tags|htmlspecialchars', array('required'	=> '{field} harus diisi.'));
		$valid->set_rules('yaw', 'Yaw', 'required|callback_numeric_koma|trim|strip_tags|htmlspecialchars', array('required'	=> '{field} harus diisi.'));

		if ($valid->run() === FALSE) $this->load->view('admin/_layout/wrapper', $view);
		else {
			// Mekanisme upload panorama
			$panorama = upload_panorama('panorama', 'edit', $scene->panorama, $view, 'admin', FALSE);

			// Masuk ke database
			if ($panorama !== FALSE) {
				$post = $this->input->post(NULL, TRUE);

				if ($post['urutan'] > $scene->urutan) {
					for ($i=$scene->urutan; $i<$post['urutan']; $i++) {
						$this->crud->u($this->table, array('urutan' => $i), array('urutan' => ($i+1)));
						$this->crud->u('hotspots', array('urutan' => $i), array('urutan' => ($i+1)));
					}
				} else if ($post['urutan'] < $scene->urutan) {
					for ($i=$scene->urutan; $i>$post['urutan']; $i--) {
						$this->crud->u($this->table, array('urutan' => $i), array('urutan' => ($i-1)));
						$this->crud->u('hotspots', array('urutan' => $i), array('urutan' => ($i-1)));
					}
				}

				$data = array(	'urutan'	=> $post['urutan'],
								'scene_id'	=> $post['scene_id'],
								'title'		=> $post['title'],
								'hfov'		=> $post['hfov'],
								'pitch'		=> $post['pitch'],
								'yaw'		=> $post['yaw'],
								'type'		=> $post['type'],
								'panorama'	=> $panorama
				);

				$this->crud->u($this->table, $data, array($this->pk => $id));
				$this->session->set_flashdata('sukses', 'Scene berhasil diubah.');
				redirect(admin_url('scenes'));
			}
		}
	}

    // Hapus
    public function hapus($id = NULL) {
        if ($this->session->akses_level_admin == 'Blocked') view_error('Error 404', 'admin');

        $cek = $this->crud->gd($this->table, array($this->pk => $id));
        if ($this->input->get('act', TRUE) == $id && ! empty($cek)) {
            if ($cek->panorama != '') {
                unlink('./templates/assets/img/'.$cek->panorama);
            }

            $total = $this->crud->ca($this->table);
            for ($i=$cek->urutan; $i<$total; $i++) {
				$this->crud->u($this->table, array('urutan' => $i), array('urutan' => ($i+1)));
				$this->crud->u('hotspots', array('urutan' => $i), array('urutan' => ($i+1)));
			}

            $this->crud->d($this->table, array($this->pk => $id));
            $this->crud->d('hotspots', array('main_scene' => $cek->scene_id));
            $this->crud->d('hotspots', array('scene_id' => $cek->scene_id));
            $this->session->set_flashdata('sukses', 'Scene berhasil dihapus.');
            redirect(admin_url('scenes'));
        } else {
            $this->session->set_flashdata('gagal', 'Scene gagal dihapus.');
            redirect(admin_url('scenes'));
        }
    }

  	function numeric_koma($str) {
	    if (!preg_match('/^[0-9.]+$/', $str)) {
	      	$this->form_validation->set_message('numeric_koma', 'Hanya boleh angka dan titik.');
	      	return false;
	    }

    	return true;
  	}
}
