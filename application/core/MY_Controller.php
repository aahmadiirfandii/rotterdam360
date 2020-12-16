<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function _response($data)
    {
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit();
    }
}

class Admin_Controller extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('admin_login');
        $this->admin_login->cek_login();
    }
}

class Public_Controller extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!get_cookie('lang')) {
            set_lang('id');
            redirect(current_url());
        }
    }
}
