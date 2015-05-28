<?php

/**
 * Format class
 *
 * Help convert between various formats such as XML, JSON.
 *
 * @author yakob abada
 */
class Format {

    protected $_data;
    protected $_format;
    protected $_available_format = array('json', 'xml');

    /**
    * @param type array $data
    * @param type string $format
    */
    public function response($data, $format) {

        $this->_data = $data;
        $this->_format = $format;
        if (!in_array($this->_format, $this->_available_format)) {
            throw new Exception('Invalid foramt');
        }

        $method = '_to_' . $this->_format;

        return $this->{$method}();
    }

    /**
    * 
    * Convert to json format
    * @return json format
    */    
    protected function _to_json() {
        return json_encode($this->_data);
    }

    /**
    * 
    * Convert to xml format
    * @return xml format
    */  
    protected function _to_xml() {

        $xml = new SimpleXMLElement("<?xml version=\"1.0\"?><xml></xml>");

        // function call to convert array to xml
        $this->_array_to_xml($this->_data, $xml);

        header("Content-type: text/xml; charset=utf-8");
        return $xml->asXML();
    }
    /**
     * function to convert an array to XML using SimpleXML
     */
    protected function _array_to_xml($array, &$xml) {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xml->addChild("$key");
                    $this->_array_to_xml($value, $subnode);
                } else {
                    $this->_array_to_xml($value, $xml);
                }
            } else {
                $xml->addChild("$key", "$value");
            }
        }
    }

}
