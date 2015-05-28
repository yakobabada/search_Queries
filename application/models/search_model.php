<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of search_model
 *
 * @author yabada
 */
class Search_Model extends CI_Model {

    /**
    * @param type array $data
    * @return array search result
    */
    public function search($data) {
        $dataArray = array();

        if (empty($data['q'])) {
            $dataArray['error']['message'] = 'query parameter is not provided';
            $dataArray['error']['code'] = 403;
            return $dataArray;
        }
        $params = array('term' => $data['q'], 'num' => $data['num']);
        $this->load->library('search_term', $params);
        $linkArray = $this->search_term->links();

        foreach ($linkArray as $link) {
            $dataArray['items'][] = array('link' => $link);
        }
        $dataArray['code'] = 200;


        return $dataArray;
    }

}
