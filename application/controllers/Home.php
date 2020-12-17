<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function index()
    {
        $view = array(
            'title'     => 'Rotterdam Virtual Tour 360',
        );
        $this->load->view('public/home', $view);
    }
}
