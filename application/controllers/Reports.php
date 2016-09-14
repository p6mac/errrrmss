<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('employees_model');
    $this->load->library('excel');
    $this->load->library('tc_pdf');
    $this->load->library('m_pdf');
  }

  public function generate_excel () {
    $author = 'Paule Janh Patrick Macusi';
    $title = 'Employee Records';
    $desc = 'simple description';
    $employees = $this->employees_model->get_all();

    $this->excel->createSheet(1);
    $this->excel->getProperties()->setCreator($author);
    $this->excel->getProperties()->setLastModifiedBy($author);
    $this->excel->getProperties()->setTitle($title);
    $this->excel->getProperties()->setSubject($title);
    $this->excel->getProperties()->setDescription($desc);

    $this->excel->getActiveSheet()->SetCellValue('A1', 'ID');
    $this->excel->getActiveSheet()->SetCellValue('B1', 'First Name');
    $this->excel->getActiveSheet()->SetCellValue('C1', 'Last Name');
    $this->excel->getActiveSheet()->SetCellValue('D1', 'Birth Date');
    $this->excel->getActiveSheet()->SetCellValue('E1', 'Address');
    $this->excel->getActiveSheet()->SetCellValue('F1', 'Age');
    $this->excel->getActiveSheet()->SetCellValue('G1', 'Salary');

    $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


    $ctr = 1;
       for ($i = 0; $i < count($employees); $i++) {
           $ctr++;
           $this->excel->getActiveSheet()->SetCellValue('A' . $ctr, $employees[$i]->id);
           $this->excel->getActiveSheet()->SetCellValue('B' . $ctr, $employees[$i]->first_name);
           $this->excel->getActiveSheet()->SetCellValue('C' . $ctr, $employees[$i]->last_name);
           $this->excel->getActiveSheet()->SetCellValue('D' . $ctr, $employees[$i]->birthdate);
           $this->excel->getActiveSheet()->SetCellValue('E' . $ctr, $employees[$i]->address);
           $this->excel->getActiveSheet()->SetCellValue('F' . $ctr, $employees[$i]->age);
           $this->excel->getActiveSheet()->SetCellValue('G' . $ctr, $employees[$i]->salary);
    }

    $filename = 'Employee_Records.xls';
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'. $filename .'"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
    $objWriter->save('php://output');
  }

  public function generate_tcpdf()
    {
        $employees = $this->employees_model->get_all();
        $pdf_title = 'Employee List';
        $pdf_author = 'Paule Janh Patrick Macusi';
        $file_name = 'Employee_Records.pdf';
        # Init PDF
        $pdf = new Tc_pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle($pdf_title);
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Employee Records Management System', $pdf_author );
        $pdf->SetHeaderMargin(5);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor($pdf_author);
        $pdf->SetDisplayMode('real', 'default');

        # New Page
        $pdf->AddPage();
        # Total Cell Width
        $total_width = 190;
        $column_count = 7;
        $pdf->Cell(0, 0, $pdf_title.': ', 0, 1, 'L', 0, '', 0);
        $pdf->Ln();
        $w = $total_width / $column_count; # cell width
        $h = 7; # cell height
        $text = 'ID';
        $border_line = 1; # 1 or 0
        $single_line = 0; # 1 or 0
        # Text Align | L, C, R
        $text_align = 'C';
        $fill = 1; # 1 or 0
        # Fill Color, rgb(), if $fill = 1
        $pdf->SetFillColor(0, 255, 0);
        # Text Color, rgb()
        $pdf->SetTextColor(0, 0, 0);
        # Line color
        $pdf->SetDrawColor(0, 0, 0);
        # Line Thickness
        $pdf->SetLineWidth(0.3);
        # Font name, Font weight (B, BI, I)
        $pdf->SetFont('helvetica', 'B');
        # Table Header
        $pdf->Cell($w, $h, $text, $border_line, $single_line, $text_align, $fill);
        $pdf->Cell($w, $h, 'First Name', 1, 0, 'C', 1);
        $pdf->Cell($w, $h, 'Last Name', 1, 0, 'C', 1);
        $pdf->Cell($w, $h, 'Birth date', 1, 0, 'C', 1);
        $pdf->Cell($w, $h, 'Address', 1, 0, 'C', 1);
        $pdf->Cell($w, $h, 'Age', 1, 0, 'C', 1);
        $pdf->Cell($w, $h, 'Salary', 1, 0, 'C', 1);
        $pdf->Ln();

        for ($i = 0; $i < count($employees); $i++) {
            $pdf->Cell($w, $h, $employees[$i]->id, 1, 0, 'C', 0);
            $pdf->Cell($w, $h, $employees[$i]->first_name, 1, 0, 'C', 0);
            $pdf->Cell($w, $h, $employees[$i]->last_name, 1, 0, 'C', 0);
            $pdf->Cell($w, $h, $employees[$i]->birthdate, 1, 0, 'C', 0);
            $pdf->Cell($w, $h, $employees[$i]->address, 1, 0, 'C', 0);
            $pdf->Cell($w, $h, $employees[$i]->age, 1, 0, 'C', 0);
            $pdf->Cell($w, $h, $employees[$i]->salary, 1, 0, 'C', 0);
            $pdf->Ln();
        }
        $pdf->Output($file_name, 'I');
    }

    public function generate_mpdf()
    {
      $data['employees'] = $this->employees_model->get_all();

      $html = $this->load->view('home/mpdf_output', $data, true);

      //this the the PDF filename that user will get to download
      $pdfFilePath = "Employee_Records.pdf";

      //actually, you can pass mPDF parameter on this load() function
      $pdf = $this->m_pdf->load();
      // $stylesheet = file_get_contents(base_url('assets/css/sb-admin.css'));

      //generate the PDF!
      $pdf->WriteHTML($html);
      $pdf->SetHTMLFooter('<p>Author : Paule Janh Patrick Macusi</p>');
      //offer it to user via browser download! (The PDF won't be saved on your server HDD)
      $pdf->Output($pdfFilePath, "D");
    }

}
