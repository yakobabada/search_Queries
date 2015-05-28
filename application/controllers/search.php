<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends CI_Controller {

    public function index() {

        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $query  = $this->input->get("q");
                $num    = $this->input->get("num");
                $format = $this->input->get("format");

                if ($num == null || (intval($num) == 0)) {
                    $num = 10;
                }

                $format = empty($format) ? 'json' : $format;

                $apiData = array('q' => $query,
                    'num' => $num
                );

                $this->load->model("search_model");
                $result = $this->search_model->search($apiData);

                $this->load->library("format");
                try {
                    echo $this->format->response($result, $format);
                } catch (Exception $exc) {
                    echo $exc->getMessage();
                }
                break;

            default :
                printf("%s request isn't handeled", $method);
                break;
        }
    }

}
