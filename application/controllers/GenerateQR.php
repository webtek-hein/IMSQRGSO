<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GenerateQR extends CI_Controller
{
    public function index(){
        $this->load->library('pdf');
    }
    function saveQR(){

        include "qrlib.php";


        //set it to writable location, a place for temp generated PNG files
        $PNG_TEMP_DIR =FCPATH.'assets'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR;

        //html PNG location prefix
        $PNG_WEB_DIR = 'qrcodes/';


        if (!file_exists($PNG_TEMP_DIR))
            mkdir($PNG_TEMP_DIR);

        $filename = $PNG_TEMP_DIR.'serial.png';

        //processing form input
        //remember to sanitize user input in real-life solution !!!
        $errorCorrectionLevel = 'L';
//        $level  = $this->input->post('level');
//        $levelArray = array('L','M','Q','H');
//        if (isset($level && in_array($level, $levelArray)))
//            $errorCorrectionLevel = $level;
//

        $matrixPointSize = 4;
        $size = $this->input->post('size');
        if (isset($size))
            $matrixPointSize = min(max((int)$size, 1), 10);

        $serial = $this->input->post('selectedSerial');
        $quantity = count($serial) - 1 ;

        $qrImages = [];
        for($i=0; $i <= $quantity; $i++){
            //it's very important!
                if (trim($serial[$i]) == '')
                    die('data cannot be empty! <a href="?">back</a>');

                // user data
                $filename = $PNG_TEMP_DIR.$serial[$i].md5($serial[$i].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
                QRcode::png($serial[$i], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

                $qrImages[] = '<p>'.$serial[$i].'</p><br><img src="'.base_url().'assets/'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';
        }

        echo  json_encode($qrImages);

    }

}