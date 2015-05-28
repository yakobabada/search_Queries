<?php

include(APPPATH . 'libraries/simple_html_dom.php');

/**
 * Search_term class
 *
 * Scraping html
 *
 * @author yakob abada
 */
class Search_term {

    protected $_html;
    protected $_num;
    
    /**
    * @param type array $data
    */
    public function __construct($data) {
        $term_encode = urlencode($data['term']);
        $url = "http://www.google.com/search?q=$term_encode&gws_rd=cr,ssl&ei=LnGRVMyBDMn-ygPMt4DwBw";
        $this->_html = file_get_html($url);
        $this->_num = $data['num'];
    }
    
    /**
    * scraping html to get array of links
    * @return array of links 
    */
    public function links() {
        $urlArray = array();
        $i = 1;
        foreach ($this->_html->find('.r a') as $element) {
            $url = $element->href;
            $pattern = "/^(\/url\?q=)(.*)/";

            if (preg_match($pattern, $url, $match)) {
                $urlData = explode("&amp;", $match[2]);
                $datalink = array (urldecode($urlData[0]));
                array_push($urlArray, $datalink);
            }
            if ($i >= $this->_num) {
                break;
            }
            $i++;
        }
        return $urlArray;
    }

}
