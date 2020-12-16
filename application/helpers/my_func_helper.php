<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('upload_image')) {
    function upload_image($files, $method, $folder, $image_name, $error_data, $required = FALSE, $pagepath = 'admin/_layout/wrapper')
    {
        $CI = &get_instance();

        $file = is_array($files) ? $files[0] : $files;

        $CI->load->library('upload');

        if (!empty($_FILES[$file]['tmp_name'])) {
            $config['upload_path']      = './' . upload_path($folder);
            $config['allowed_types']    = 'jpg|png|PNG|JPEG|jpeg|JPG';
            $config['encrypt_name']     = TRUE;
            $config['overwrite']        = TRUE;
            $config['max_size']         = '2048'; // KB
            // $CI->load->library('upload', $config); //old
            $CI->upload->initialize($config);

            if (!$CI->upload->do_upload($file)) {
                $error_data['error_upload'] = $CI->upload->display_errors('<i style="color: red;">', '</i>');
                $CI->load->view($pagepath, $error_data);
                return FALSE;
            } else { // Jika upload gambar berhasil
                if ($method == 'edit') {
                    // Hapus gambar lama
                    if ($image_name != '') {
                        unlink('./' . upload_path($folder) . $image_name);
                        // unlink('./' . upload_path($folder) . 'thumbs/' . $image_name);
                    }
                }

                // Image Editor
                $upload = array('upload_data' => $CI->upload->data());
                $gambar = $upload['upload_data']['file_name'];

                $config['image_library']    = 'gd2';
                $config['source_image']     = './' . upload_path($folder) . $gambar;
                $config['quality']          = "100%";

                if (is_array($files)) {
                    $config['maintain_ratio']   = FALSE;
                    $config['width']            = intval($files[1]->width);
                    $config['height']           = intval($files[1]->height);
                    $config['x_axis']           = intval($files[1]->x);
                    $config['y_axis']           = intval($files[1]->y);

                    $CI->load->library('image_lib', $config, 'crop');

                    if (!$CI->crop->crop()) {
                        unlink('./' . upload_path($folder) . $gambar);
                        $error_data['error_upload'] = $CI->crop->display_errors('<i style="color: red;">', '</i>');
                        $CI->load->view($pagepath, $error_data);
                        return FALSE;
                    }

                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = $files[1]->default_width;
                    $config['height']           = $files[1]->default_width;

                    // $CI->load->library('image_lib', $config, 'cresize'); //doesn't work on server
                    $CI->load->library('image_lib');
                    $CI->image_lib->initialize($config);
                    $CI->image_lib->clear();

                    if (!$CI->image_lib->resize()) {
                        unlink('./' . upload_path($folder) . $image_name);
                        $error_data['error_upload'] = $CI->image_lib->display_errors('<i style="color: red;">', '</i>');
                        $CI->load->view($pagepath, $error_data);
                        return FALSE;
                    }
                }

                $config['maintain_ratio']   = TRUE;
                $config['new_image']        = './' . upload_path($folder) . 'thumbs/';
                $config['create_thumb']     = TRUE;
                $config['thumb_marker']     = '';
                $config['width']            = 300;
                $config['height']           = 220;

                //$CI->load->library('image_lib', $config, 'resize'); //doesn't work on server
                $CI->load->library('image_lib');
                $CI->image_lib->initialize($config);
                $CI->image_lib->clear();

                if (!$CI->image_lib->resize()) {
                    unlink('./' . upload_path($folder) . $image_name);
                    $error_data['error_upload'] = $CI->image_lib->display_errors('<i style="color: red;">', '</i>');
                    $CI->load->view($pagepath, $error_data);
                    return FALSE;
                }

                return $gambar;
            }
        } else if ($required) {
            $lang = $CI->config->item('language');
            $CI->lang->load('upload_lang', $lang);
            $error_data['error_upload'] = '<i style="color: red;">' . $CI->lang->line('upload_no_file_selected') . '</i>';
            $CI->load->view($pagepath, $error_data);
            return FALSE;
            // } else return $image_name;
        } else return '';
    }
}

if (!function_exists('upload_image_single')) {
    function upload_image_single($files, $folder, $image_name)
    {
        $CI = &get_instance();

        $CI->load->library('upload');

        $config['upload_path']      = './' . upload_path($folder);
        $config['allowed_types']    = 'jpg|png|PNG|JPEG|jpeg|JPG';
        $config['overwrite']        = TRUE;
        // $config['max_size']         = '2048'; // KB
        if ($image_name != '') {
            $config['file_name']    = $image_name;
            $config['encrypt_name'] = FALSE;
        } else {
            $config['encrypt_name'] = TRUE;
        }

        $CI->upload->initialize($config);

        if (!file_exists(upload_path($folder))) {
            mkdir(upload_path($folder), 0777, TRUE);
        }

        if (!$CI->upload->do_upload($files)) {
            return ['success' => FALSE, 'message' => $CI->upload->display_errors('', '')];
        } else { // Jika upload gambar berhasil
            $upload = ['upload_data' => $CI->upload->data()];
            $gambar = $upload['upload_data']['file_name'];

            //resize img
            $config['image_library']    = 'gd2';
            $config['source_image']     = './' . upload_path($folder) . $gambar;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '100%';
            $config['width']            = 320;
            $config['height']           = 320;

            $CI->load->library('image_lib');
            $CI->image_lib->initialize($config);

            if (!$CI->image_lib->resize()) {
                unlink('./' . upload_path($folder) . $gambar);
                return ['success' => FALSE, 'message' => $CI->upload->display_errors('', '')];
            }
        }
        return ['success' => TRUE, 'message' => $gambar];
    }
}

if (!function_exists('upload_image_multiple')) {
    function upload_image_multiple($files, $folder, $image_name)
    {
        $CI = &get_instance();

        $CI->load->library('upload');

        $count = count($_FILES[$files]['name']);


        for ($i = 0; $i < $count; $i++) {
            $config['upload_path']      = './' . upload_path($folder);
            $config['allowed_types']    = 'jpg|png|PNG|JPEG|jpeg|JPG';
            $config['encrypt_name']     = TRUE;
            $config['overwrite']        = TRUE;
            // $config['max_size']         = '2048'; // KB

            $_FILES['img']['name']        = $_FILES[$files]['name'][$i];
            $_FILES['img']['type']        = $_FILES[$files]['type'][$i];
            $_FILES['img']['tmp_name']    = $_FILES[$files]['tmp_name'][$i];
            $_FILES['img']['error']       = $_FILES[$files]['error'][$i];
            $_FILES['img']['size']        = $_FILES[$files]['size'][$i];

            $CI->upload->initialize($config);

            if (!file_exists(upload_path($folder))) {
                mkdir(upload_path($folder), 0777, TRUE);
            }

            if (!$CI->upload->do_upload('img')) {
                return array('success' => FALSE, 'message' => $CI->upload->display_errors('', ''));
            } else { // Jika upload gambar berhasil
                $upload = array('upload_data' => $CI->upload->data());
                $gambar = $upload['upload_data']['file_name'];
                $gambar_arr[] = $gambar;

                $config['image_library']    = 'gd2';
                $config['source_image']     = './' . upload_path($folder) . $gambar;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '100%';
                $config['width']            = 500;
                $config['height']           = 500;

                $CI->load->library('image_lib');
                $CI->image_lib->initialize($config);

                if (!$CI->image_lib->resize()) {
                    unlink('./' . upload_path($folder) . $gambar);
                    return array('success' => FALSE, 'message' => $CI->upload->display_errors('', ''));
                }
            }
        }
        return $gambar_arr;
        // return ['success' => TRUE, 'message' => $gambar_arr];
    }
}

if (!function_exists('upload_document')) {
    function upload_document($file, $method, $folder, $document_name, $error_data, $required = FALSE, $pagepath = 'admin/_layout/wrapper')
    {
        $CI = get_instance();

        $CI->load->library('upload');

        if (!empty($_FILES[$file]['tmp_name'])) {
            $config['upload_path']              = upload_path($folder);
            $config['allowed_types']            = 'pdf';
            $config['file_name']                = is_array($document_name) ? '' : str_replace('.', '', $document_name);
            $config['encrypt_name']             = is_array($document_name);
            $config['overwrite']                = FALSE;
            $config['max_filename_increment']   = 1000;
            $config['file_ext_tolower']         = TRUE;
            $config['max_size']                 = '10240'; // KB

            $CI->upload->initialize($config);

            if (!file_exists(upload_path($folder))) {
                mkdir(upload_path($folder), 0777, TRUE);
            }

            if (!$CI->upload->do_upload($file)) {
                $error_data['error_upload'] = $CI->upload->display_errors('<i style="color: red;">', '</i>');
                $CI->load->view($pagepath, $error_data);
                return FALSE;
            } else { // Jika upload file berhasil
                if ($method == 'edit') {
                    // Hapus file lama
                    if ($document_name != '' and file_exists(upload_path($folder) . '/' . $document_name)) {
                        unlink(upload_path($folder) . '/' . $document_name);
                    }
                }

                $upload = array('upload_data' => $CI->upload->data());
                $file = $upload['upload_data']['file_name'];
                return $file;
            }
        } else {
            if ($required) {
                $error_data['error_upload'] = '<i style="color: red;">File is required!</i>';
                $CI->load->view($pagepath, $error_data);
                return FALSE;
            } else return "";
        }
    }
}

if (!function_exists('upload_file_api')) {
    function upload_file_api($file, $folder, $method, $cfilename, $nfilename, $required)
    {
        $CI = get_instance();
        $CI->load->library('upload');

        if (!empty($_FILES[$file]['tmp_name'])) {
            $config['upload_path']              = upload_path($folder);
            $config['allowed_types']            = 'jpg|png|jpeg|pdf|doc|docx';
            $config['file_name']                = is_array($nfilename) ? '' : str_replace('.', '', $nfilename);
            $config['encrypt_name']             = is_array($nfilename);
            $config['overwrite']                = FALSE;
            $config['max_filename_increment']   = 1000;
            $config['file_ext_tolower']         = TRUE;
            $config['max_size']                 = '10240'; // KB

            $CI->upload->initialize($config);

            if (!file_exists(upload_path($folder))) {
                mkdir(upload_path($folder), 0777, TRUE);
            }

            if (!$CI->upload->do_upload($file)) {
                return array('success' => FALSE, 'message' => $CI->upload->display_errors('', ''));
            } else { // Jika upload file berhasil
                if ($method == 'edit') {
                    // Hapus file lama
                    if ($cfilename != '' and file_exists(upload_path($folder) . '/' . $cfilename)) unlink(upload_path($folder) . '/' . $cfilename);
                }

                $upload = array('upload_data' => $CI->upload->data());
                $file = $upload['upload_data']['file_name'];
                return array('success' => TRUE, 'message' => $file);
            }
        } else {
            if ($required) return array('success' => FALSE, 'message' => 'File must be attached!');
            else return array('success' => TRUE, 'message' => $cfilename);
        }
    }
}

if (!function_exists('acak_id')) {
    function acak_id($table = NULL, $pk = NULL)
    {
        $CI = get_instance();
        $CI->load->helper('string');
        $id = 0;
        if ($table == NULL or $pk == NULL) return array('id' => $id);
        do {
            $id = mt_rand(1, 9) . random_string('numeric', 7);
            $slug = substr($id, 4, 3);
        } while ($CI->crud->cw($table, array($pk => $id)) > 0);
        return $id;
    }
}

if (!function_exists('waktu')) {
    function waktu($wkt)
    {
        $jam = substr($wkt, 0, 2);
        $menit = substr($wkt, 3, 2);
        if ($jam < 12) {
            $AMPM = "AM";
            if ($jam == 0) $jam = 12;
        } else {
            $AMPM = "PM";
            if ($jam != 12) $jam = $jam - 12;
        }

        return $jam . ':' . $menit . ' ' . $AMPM;
    }
}

if (!function_exists('tgl_indo')) {
    function tgl_indo($tgl)
    {
        if ($tgl == "0000-00-00") {
            return "-";
        } else {
            $tanggal    = substr($tgl, 8, 2);
            $bulan      = get_bulan(substr($tgl, 5, 2));
            $tahun      = substr($tgl, 0, 4);
            // var_dump($tgl);
            return $tanggal . ' ' . $bulan . ' ' . $tahun;
        }
    }
}

if (!function_exists('format_tgl')) {
    function format_tgl($tgl, $indo = FALSE)
    {
        if (substr($tgl, 2, 1) == '-') { // ini format dd-mm-yyyy
            $tanggal = substr($tgl, 0, 2);
            $bulan = substr($tgl, 3, 2);
            $tahun = substr($tgl, 6, 4);
            return $tahun . '-' . $bulan . '-' . $tanggal;
        } else if (substr($tgl, 4, 1) == '-') { // ini format yyyy-mm-dd
            $tahun = substr($tgl, 0, 4);
            $bulan = substr($tgl, 5, 2);
            $tanggal = substr($tgl, 8, 2);
            return $indo ? $tanggal . ' ' . get_bulan($bulan) . ' ' . $tahun : $tanggal . '-' . $bulan . '-' . $tahun;
        }
    }
}

if (!function_exists('get_hari')) {
    function get_hari($day)
    {
        switch ($day) {
            case 0:
                return "Ahad";
                break;
            case 1:
                return "Senin";
                break;
            case 2:
                return "Selasa";
                break;
            case 3:
                return "Rabu";
                break;
            case 4:
                return "Kamis";
                break;
            case 5:
                return "Jumat";
                break;
            case 6:
                return "Sabtu";
                break;
        }
    }
}

if (!function_exists('get_bulan')) {
    function get_bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

if (!function_exists('number_to_roman')) {
    function number_to_roman($num)
    {
        $n = intval($num);
        $res = '';

        /*** roman_numerals array  ***/
        $roman_numerals = array(
            'M'  => 1000,
            'CM' => 900,
            'D'  => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L'  => 50,
            'XL' => 40,
            'X'  => 10,
            'IX' => 9,
            'V'  => 5,
            'IV' => 4,
            'I'  => 1
        );

        foreach ($roman_numerals as $roman => $number) {
            /*** divide to get  matches ***/
            $matches = intval($n / $number);

            /*** assign the roman char * $matches ***/
            $res .= str_repeat($roman, $matches);

            /*** substract from the number ***/
            $n = $n % $number;
        }

        /*** return the res ***/
        return $res;
    }
}

if (!function_exists('cari_query')) {
    function cari_query($q, $data)
    {
        $builder = "IFNULL($data[0], '') LIKE CONCAT('%', '$q', '%')";
        for ($i = 1; $i < sizeof($data); $i++) {
            $builder .= " OR IFNULL($data[$i], '') LIKE CONCAT('%', '$q', '%')";
        }
        return $builder;
    }
}

if (!function_exists('do_hash')) {
    function do_hash($data, $type = 'bcrypt')
    {
        if ($type == 'bcrypt') return password_hash($data, PASSWORD_BCRYPT);
        else if ($type == 'md5') return md5(md5($data . md5($data)));
    }
}

if (!function_exists('compare_hash')) {
    function compare_hash($data1, $data2, $sama)
    {
        if ($sama) $stat = ($data1 === $data2) ? TRUE : FALSE;
        else $stat = password_verify($data1, $data2);
        return $stat;
    }
}

if (!function_exists('set_lang')) {
    function set_lang($lang)
    {
        $cookie = array(
            'name'      => 'lang',
            'value'     => $lang,
            'expire'    => (60 /*detik*/ * 60 /*menit*/ * 24 /*jam*/ * 30 /*hari*/ * 12)
        );
        set_cookie($cookie);
    }
}

if (!function_exists('multiselect_tostring')) {
    function multiselect_tostring($string)
    {
        if (!is_array($string)) {
            if (($string == "") or ($string == null))
                return "";
            else
                return $string;
        } else {
            if (count($string) > 0) {
                // return TRUE;
                $string = implode(",", $string);
                return $string;
            } else {
                return "";
            }
        }
    }
}

if (!function_exists('is_array_empty')) {
    function is_array_empty($arr)
    {
        if (is_array($arr)) {
            foreach ($arr as $value) {
                if (!empty($value)) {
                    return false;
                }
            }
        }
        return true;
    }
}

if (!function_exists('flatten_json')) {
    function flatten_json(array $array)
    {
        $output = array();
        foreach ($array as $v) {
            $output[$v['id']] = $v['nama'];
        }
        return $output;
    }
}

if (!function_exists('check_active')) {
    function check_active($array, $active_class, $use_method = false)
    {
        $CI = get_instance();

        $modul = $CI->uri->segment(2);
        $method = $CI->uri->segment(3);

        if (!is_array($array)) {
            return '';
        }

        if ($use_method) {
            if (in_array($method, $array)) {
                return $active_class;
            } else {
                return '';
            }
        }
        if (in_array($modul, $array)) {
            return $active_class;
        } else {
            return '';
        }

        return '';
    }
}

if (!function_exists('rupiah')) {
    function rupiah($angka, $kurs = '')
    {
        if ($angka === '') {
            $angka = 0;
        }

        if ($kurs) {
            return $kurs . ' ' . number_format($angka);
        } else {
            return 'Rp' . number_format($angka, 0, ',', '.') . ',-';
        }
    }
}

if (!function_exists('debug')) {
    function debug()
    {
        $numArgs = func_num_args();

        echo 'Total Arguments:' . $numArgs . "\n";

        $args = func_get_args();
        echo '<pre>';
        foreach ($args as $index => $arg) {
            echo 'Argument ke-' . $index . ':' . "\n";
            var_dump($arg);
            echo "\n";
            unset($args[$index]);
        }
        echo '</pre>';
        die();
    }
}

if (!function_exists('daterange_filter')) {
    function daterange_filter($date_range = array(), $pre = '')
    {
        $start = '';
        $end = '';
        if (empty($date_range))
            return false;

        if (($date_range['start'] === '' && $date_range['end'] !== '')) {
            $end = $pre . ' <= "' . $date_range['end'] . '"';
        } else if (($date_range['start'] !== '' && $date_range['end'] === '')) {
            $start = $pre . ' >= "' . $date_range['start'] . '"';
        } else if ($date_range['start'] === date("Y-m-d", strtotime('tomorrow')) && $date_range['end'] === date("Y-m-d", strtotime('tomorrow'))) {
            $end = $pre . ' <= "' . $date_range['end'] . '"';
        } else {
            if ($date_range['start'] === '' && $date_range['end'] === '') {
                $date_range['start'] = date("Y-m-d") . '  00:00:00';
                $date_range['end'] = date("Y-m-d") . ' 23:59:59';
            }
            $start =  $pre . ' >= "' . $date_range['start'] . '"' . ' AND ';
            $end = $pre . ' <= "' . $date_range['end'] . '"';
        }

        $where = $start . $end;
        return $where;
    }
}

if (!function_exists('secToTimes')) {
    function secToTimes($secs)
    {
        $t = round($secs);
        $jam = $t / 3600;
        $menit = $t / 60 % 60;
        $detik = $t % 60;
        if ($detik > 0) {
            return sprintf('%02d Jam %02d Menit %02d Detik', $jam, $menit, $detik);
        } else {
            return sprintf('%02d Jam %02d Menit', $jam, $menit);
        }
    }
}

### new function for Fabulash. ###
if (!function_exists('time_difference')) {
    function time_difference($time1, $time2)
    {
        $start = new DateTime($time1);
        $end = new DateTime($time2);
        $diff = $start->diff($end);
        // var_dump($diff);die();
        if ($diff->d > 0) {
            if ($diff->i > 0) {
                return sprintf('%02d Hari %02d Jam %02d Menit', $diff->d, $diff->h, $diff->i);
            } else {
                return sprintf('%02d Hari %02d Jam', $diff->d, $diff->h);
            }
        } else {
            if ($diff->i > 0) {
                return sprintf('%02d Jam %02d Menit', $diff->h, $diff->i);
            } else {
                return sprintf('%02d Jam', $diff->h);
            }
        }
    }
}

if (!function_exists('truncateWord')) {
    function truncateWord($content, $length = 50)
    {
        if (strlen($content) >= $length) {
            $spaceAtPos = strpos($content, ' ', $length);
            $content = substr($content, 0, $spaceAtPos) . '...';
        }
        return $content;
    }
}

if (!function_exists('truncateWord2')) {
    function truncateWord2($string, $text_length = 50)
    {
        $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
        $parts_count = count($parts);

        $length = 0;
        $last_part = 0;
        for (; $last_part < $parts_count; ++$last_part) {
            $length += strlen($parts[$last_part]);
            if ($length > $text_length) {
                break;
            }
        }
        return implode(array_slice($parts, 0, $last_part));
    }
}

// fungsi untuk generate code voucher
if (!function_exists('generateCode')) {
    function generatCode($digit)
    {
        $string        = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length  = strlen($string);
        $random_string = '';
        for ($i = 0; $i < $digit; $i++) {
            $random_character = $string[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}

if (!function_exists('get_bulan_reverse')) {
    function get_bulan_reverse($bln)
    {
        switch ($bln) {
            case 'Januari':
                return "01";
                break;
            case 'Februari':
                return "02";
                break;
            case 'Maret':
                return "03";
                break;
            case 'April':
                return "04";
                break;
            case 'Mei':
                return "05";
                break;
            case 'Juni':
                return "06";
                break;
            case 'Juli':
                return "07";
                break;
            case 'Agustus':
                return "08";
                break;
            case 'September':
                return "09";
                break;
            case 'Oktober':
                return "10";
                break;
            case 'November':
                return "11";
                break;
            case 'Desember':
                return "12";
                break;
        }
    }
}

if (!function_exists('view_error')) {

    function view_error($heading, $message, $status_code = 500, $template = 'error_custom')
    {
        $status_code = abs($status_code);
        if ($status_code < 100) {
            $exit_status = $status_code + 9; // 9 is EXIT__AUTO_MIN
            $status_code = 500;
        } else {
            $exit_status = 1; // EXIT_ERROR
            $template = 'error_' . $status_code;
        }

        $_error = &load_class('Exceptions', 'core');
        echo $_error->show_error($heading, $message, $template, $status_code);
        exit($exit_status);
    }
}
