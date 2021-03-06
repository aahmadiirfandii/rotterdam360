<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buildings extends MY_Controller
{
    public function index()
    {
        $scenes = $this->crud->gwo('scenes', ['status' => 'gedung'], 'title ASC');
        $setting = $this->crud->gd('setting', array('id' => '1'));

        $view = array(
            'title'     => 'Rotterdam Virtual Tour 360',
            'scenes'    => $scenes,
            'setting'   => $setting,
        );
        $this->load->view('public/buildings', $view);
    }

    public function detail($id)
    {
        $scene = $this->crud->gd('scenes', ['scene_id' => $id]);
        $setting = $this->crud->gd('setting', array('id' => '1'));

        $view = array(
            'title'     => 'Rotterdam Virtual Tour 360',
            'scene'     => $scene,
            'setting'   => $setting,
        );
        $this->load->view('public/buildings_detail', $view);
    }
}
