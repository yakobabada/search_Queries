<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends REST_Controller {

    public function index_get() {

        $method = $_SERVER['REQUEST_METHOD'];

        $query  = $this->input->get("q");
        $num    = $this->input->get("num");
        $format = $this->input->get("format");

        if ($num == null || (intval($num) == 0)) {
            $num = 10;
        }

        $format = empty($format) ? 'xml' : $format;

        $apiData = array('q' => $query,
            'num' => $num
        );

        $this->load->model("search_model");
        $result = $this->search_model->search($apiData);

        try {
            echo $this->response($result, $format);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
