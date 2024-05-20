<?php
namespace MyApp\Controllers;

use MyApp\Core\BaseController;

class ReportController extends BaseController
{
  public function show_bwdates_report_ds(){
    $this->view('admin/bw-dates-report-ds');
  }
}