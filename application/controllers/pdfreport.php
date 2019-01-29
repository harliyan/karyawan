<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pdfreport extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('m_pdf');
        $this->load->model('web_app_model');
    }

    function cetakpdf_karyawan() {
        $table="pegawai";
        $data['pegawai']=$this->web_app_model->getAllData($table);
        
        $this->load->view('downloadkaryawan',$data);
        $sumber = $this->load->view('downloadkaryawan', $data, TRUE);
        $html = $sumber;


        $pdfFilePath = "data_karyawan.pdf";
        //lokasi file css yang akan di load
        $css = $this->load->view('admin/css/bootstrap.min.css');
        $stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('L');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output($pdfFilePath, "D");
        exit();
    }

    function cetakpdf_manager() {
        $table="pegawai";
        $data['pegawai']=$this->web_app_model->getAllData($table);
        
        $this->load->view('downloadmanager',$data);
        $sumber = $this->load->view('downloadmanager', $data, TRUE);
        $html = $sumber;


        $pdfFilePath = "data_manager.pdf";
        //lokasi file css yang akan di load
        $css = $this->load->view('admin/css/bootstrap.min.css');
        $stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('L');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output($pdfFilePath, "D");
        exit();
    }

    function cetakpdf_user() {
        $table="user_admin";
        $data['user_admin']=$this->web_app_model->getAllData($table);
        
        $this->load->view('downloaduseradmin',$data);
        $sumber = $this->load->view('downloaduseradmin', $data, TRUE);
        $html = $sumber;


        $pdfFilePath = "data_user_admin.pdf";
        //lokasi file css yang akan di load
        $css = $this->load->view('admin/css/bootstrap.min.css');
        $stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('L');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output($pdfFilePath, "D");
        exit();
    }
}

?>