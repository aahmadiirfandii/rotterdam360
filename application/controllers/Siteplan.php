<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siteplan extends MY_Controller
{
    public function index()
    {
        $scenes = $this->crud->gao('scenes', 'urutan ASC');
        $setting = $this->crud->gd('setting', array('id' => '1'));

        $view = array(
            'title'     => 'Rotterdam Virtual Tour 360',
            'scenes'    => $scenes,
            'setting'   => $setting,
            'style'     => 'public/css/siteplan',
            'script'    => 'public/js/siteplan',
            'isi'       => 'public/siteplan',
        );
        $this->load->view('public/_layout/wrapper', $view);
    }

    public function get_spots()
    {
        $scenes = $this->crud->gao('scenes', 'urutan ASC');
        $mapp = array(
            "id"        => 'siteplan',
            "title"     => 'Siteplan Rotterdam',
            "minimap"   => "",
            "map"       => templates('assets') . 'img/rotterdam.png'
        );

        if ($scenes) {
            foreach ($scenes as $scenes) {
                $cord = explode(',', $scenes->koordinat);
                // unset($scenes['cord']);
                $detail['id']           = $scenes->scene_id;
                $detail['title']        = $scenes->title;
                $detail['description']  = truncateWord($scenes->description, 350);
                $detail['x']            = $cord[0];
                $detail['y']            = $cord[1];
                $detail['label']        = $scenes->label;
                $detail['pin']          = "circular pin-label pin-md pin-pulse";
                if ($scenes->panorama) {
                    $detail['link']     = site_url('virtual-tour') . '?scene=' . $scenes->scene_id;
                    $detail['fill']     = "#022548";
                } else {
                    $detail['fill']     = "#480202";
                    $detail['link']     = site_url('buildings/detail/') . $scenes->scene_id;
                }

                $mapp['locations'][]    = $detail;
            }
            $level[] = $mapp;

            $response = array(
                "mapwidth"      => 1080,
                "mapheight"     => 863,
                "categories"    => [],
                "levels"        => $level
            );
            return $this->_response(['success' => true, 'data' => $response, 'message' => 'Success.']);
        } else {
            return $this->_response(['success' => false, 'data' => null, 'message' => 'No data found.']);
        }
    }
}
