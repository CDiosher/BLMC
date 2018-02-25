<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_download','download');
		if(!$this->session->userdata('logged_in')) redirect(base_url());
		if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 ) {

		} else {

			redirect('customer');

		}
	}

	public function index() {
		
		$xlsx = new PHPExcel();

		/*set active sheet*/
		$xlsx->setActiveSheetIndex(0);

		foreach (range('A','Z') as $key) {
			$xlsx->getActiveSheet()->getColumnDimension($key)->setAutoSize(true);
		}
		/*Wrap text*/
		$xlsx->getActiveSheet()->getStyle('A1:Z999')->getAlignment()->setWrapText(true);
		/*Border*/
		$border = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			)
		);
		$xlsx->getActiveSheet()->getStyle('A1:G999')->applyFromArray($border);

		$xlsx->getActiveSheet()->SetCellValue('A1','Products Name');
		$xlsx->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$xlsx->getActiveSheet()->SetCellValue('B1','Category');
		$xlsx->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$xlsx->getActiveSheet()->SetCellValue('C1','Quantity');
		$xlsx->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$xlsx->getActiveSheet()->SetCellValue('D1','Price');
		$xlsx->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$xlsx->getActiveSheet()->SetCellValue('E1','Subtotal');
		$xlsx->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$xlsx->getActiveSheet()->SetCellValue('F1','Processed By');
		$xlsx->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$xlsx->getActiveSheet()->SetCellValue('G1','Processed Date');
		$xlsx->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$row = 2;

		$date_start = $this->input->post('start');
		$date_end = $this->input->post('end');
		$start = date('Y-m-d', strtotime($date_start));
		$end = date('Y-m-d', strtotime($date_end));
		$dl = $this->download->get_data($start,$end);

		foreach ($dl as $key) {

			$xlsx->getActiveSheet()->SetCellValue('A'.$row, $key->products);
			$xlsx->getActiveSheet()->SetCellValue('B'.$row, $key->category);
			$xlsx->getActiveSheet()->SetCellValue('C'.$row, $key->quantity);
			$xlsx->getActiveSheet()->SetCellValue('D'.$row, $key->price);
			$xlsx->getActiveSheet()->SetCellValue('E'.$row, $key->subtotal);
			$xlsx->getActiveSheet()->SetCellValue('F'.$row, $key->added_by);
			$xlsx->getActiveSheet()->SetCellValue('G'.$row, date('M D, Y | h:i:s a',strtotime($key->created_at)));

			$row++;
		}

		$filename = "Transactions-".date("Y-m-d H-i-s").".xlsx"; //filename
		$xlsx->getActiveSheet()->setTitle('Transaction Report');
		
		/*Set Header*/
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tells browser what's the file name
		header('Cache-Control: max-age=0'); //set no cache store

		$xlsx = PHPExcel_IOFactory::createWriter($xlsx, 'Excel2007');  
		$xlsx->save('php://output');
	}
}
