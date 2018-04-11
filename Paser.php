<?php
/**
$url = 'http://xml.simbo.com.br/2196/b8d87201-b18a-4522-9886-8d004f941bf0.xml';

 * User: talles
 * Date: 11/04/18
 * Time: 11:54
 */

namespace Simbo;


class Paser
{
    protected $xml;
    protected $data;
    public function __construct($url)
    {
        $this->xml = simplexml_load_string(file_get_contents($url));
        $this->data = json_decode(json_encode($this->xml),true);

    }
    public function getData(){
        return $this->data['SimboRealtyList']['SimboRealty'];
    }
    public function all(){
        $tmp = array();
        foreach ($this->getData() as $key => $SimboRealty) {
            $tmp[]=$SimboRealty;
        }
      return $tmp;

    }
}