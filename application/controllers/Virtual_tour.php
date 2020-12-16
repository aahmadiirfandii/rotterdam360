<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Virtual_tour extends MY_Controller
{
    public function index()
    {
        $scenes = $this->crud->gao('scenes', 'urutan ASC');
        $setting = $this->crud->gd('setting', array('id' => '1'));

        $view = array(
            'title'     => 'Rotterdam Virtual Tour 360',
            'scenes'    => $scenes,
            'setting'   => $setting,
            'style'     => 'public/css/virtual_tour',
            'script'    => 'public/js/virtual_tour',
            'isi'       => 'public/virtual_tour',
            'scene_id'  => $this->input->get('scene')
        );
        $this->load->view('public/_layout/wrapper', $view);
    }

    //unused
    public function get_panoramic_view()
    {
        $id = $this->input->get('id');
        $hs = [];
        $scene = $this->crud->gd('scenes', ['scene_id' => $id]);

        if ($scene) {
            $hotspots = $this->crud->gw('hotspots', ['main_scene' => $id]);
            foreach ($hotspots as $hotspot) {
                $hs[] = [
                    "id"        => $hotspot->id,
                    "type"      => $hotspot->type,
                    "text"      => $hotspot->text,
                    "pitch"     => $hotspot->pitch,
                    "yaw"       => $hotspot->yaw,
                    "sceneId"   => $hotspot->scene_id,
                ];
            }

            $response = array(
                "mouseZoom" => false,
                "type"      => $scene->type,
                "panorama"  => base_url('public/images/') . $scene->panorama,
                "title"     => $scene->title,
                "hfov"      => (int) $scene->hfov,
                "pitch"     => (int) $scene->pitch,
                "yaw"       => (int) $scene->yaw,
                "hotSpots"  => ($hs) ? $hs : ''
            );
            return $this->_response(['success' => true, 'data' => $response, 'message' => 'Success.']);
        } else {
            return $this->_response(['success' => false, 'data' => null, 'message' => 'No data found.']);
        }
    }

    public function get_scene_detail()
    {
        $id = $this->input->get('id');
        $scene = $this->crud->gd('scenes', ['scene_id' => $id]);
        $response = array(
            "id"            => $scene->scene_id,
            "title"         => $scene->title,
            "description"   => truncateWord($scene->description, 350)
        );
        if ($scene) {
            return $this->_response(['success' => true, 'data' => $response, 'message' => 'Success.']);
        } else {
            return $this->_response(['success' => false, 'data' => null, 'message' => 'No data found.']);
        }
    }
}
