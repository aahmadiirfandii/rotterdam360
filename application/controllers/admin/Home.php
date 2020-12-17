<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

    public function index() {
        if ($this->session->akses_level_admin == 'Blocked') view_error('Error 404', 'admin');

        $view = array(  'title'             => 'Beranda',
                        'subtitle'          => $this->session->fullname_admin,
                        'isi'               => 'admin/home/main');
        $this->load->view('admin/_layout/wrapper', $view);
    }
}
