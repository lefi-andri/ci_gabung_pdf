<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "libraries/tcpdf/PDFMerger.php";
 
use PDFMerger\PDFMerger;

class GabungController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$pdf = new PDFMerger;

		$pdf->addPDF('./assets/1.pdf', 'all');
		$pdf->addPDF('./assets/2.pdf', 'all');
		$pdf->addPDF('./assets/3.pdf', 'all');
		$pdf->addPDF('./assets/4.pdf', 'all');
		$pdf->addPDF('./assets/5.pdf', 'all');
		$pdf->addPDF('./assets/6.pdf', 'all');
		$pdf->addPDF('./assets/7.pdf', 'all');
		$pdf->addPDF('./assets/8.pdf', 'all');
		$pdf->addPDF('./assets/9.pdf', 'all');
		$pdf->addPDF('./assets/10.pdf', 'all');
		$pdf->addPDF('./assets/11.pdf', 'all');
		$pdf->addPDF('./assets/12.pdf', 'all');
		$pdf->addPDF('./assets/13.pdf', 'all');
		$pdf->addPDF('./assets/14.pdf', 'all');
		$pdf->addPDF('./assets/15.pdf', 'all');

		$new_file = md5(time().rand(1,10)) .'.pdf';
	    $pdf->merge('file', APPPATH . '../assets/'.$new_file);

	    exit();
	}

	public function clear()
	{

	}





	public function indexxx()
	{
		$pdf = new \Jurosh\PDFMerge\PDFMerger;

		// add as many pdfs as you want
		$pdf->addPDF('assets/satu.pdf', 'all', 'vertical')
		  ->addPDF('assets/dua.pdf', 'all')
		  ->addPDF('assets/tiga.pdf', 'all', 'horizontal');

		// call merge, output format `file`
		$pdf->merge('file', 'assets/combined.pdf');
	}

	public function combineImagePdf(){
         if (!empty($_POST)) {
                     
                       $filesCount = count($_FILES['files']['name']);
                         
            if($filesCount>0){
                $uploads = array();
                 $target_path   =FCPATH . "uploads/imagetopdf/";
       foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
 array_push($uploads,$_FILES['files']['tmp_name'][$key]);;
}
       $filename="combine".rand().".pdf";
     $pdf = new Imagick($uploads);
$pdf->setImageFormat('pdf');
 
$pdf->writeImages($target_path.$filename, true); 
 
 
       $buffer = file_get_contents($target_path.$filename);
 
 
        			/* Force download dialog... */
        			header("Content-Type: application/force-download");
        			header("Content-Type: application/octet-stream");
        			header("Content-Type: application/download");
 
			/* Don't allow caching... */
        			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
 
        			/* Set data type, size and filename */
        			header("Content-Type: application/octet-stream");
        			header("Content-Transfer-Encoding: binary");
        			header("Content-Length: " . strlen($buffer));
        			header("Content-Disposition: attachment; filename=$filename");
 
        			/* Send our file... */
        			echo $buffer;
       }else{
                                    $this->session->set_flashdata('error', 'Uploaded image should be jpg or png');
                    redirect("welcome/combineImagePdf");
                             
                            }
         }else{
        $this->load->view('combineImagePdf');
         }
    } 

}

/* End of file GabungController.php */
/* Location: ./application/controllers/GabungController.php */