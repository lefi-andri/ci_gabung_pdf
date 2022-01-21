<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends TCPDF {

	public function __construct()
	{
		parent::__construct();
		

	}

}

class Laporan_pdf extends TCPDF {

	public function __construct()
	{
		parent::__construct();
		

	}

	public function Header()
	{

	}

	public function Footer()
	{
		
	}
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */