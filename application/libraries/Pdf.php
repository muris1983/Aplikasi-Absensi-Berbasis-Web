<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// load library pdf-library
require_once(APPPATH."/third_party/pdf-php/Cezpdf.php");

class Pdf extends Cezpdf
{
    public function __construct($params)
    {
        if (is_array($params))
        {
            parent::__construct($params['paper'],$params['orientation'], $params['type'], $params['options']);
        }
        else
        {
            parent::__construct();
        }

    }
}