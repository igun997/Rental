<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->main->setTable("tb_users");
    $transaksi = $this->main->get(["VALID"=>0,"GROUP_USER"=>NULL])->result();
    $data = array(
        'user' => $transaksi,
    );
    $this->load->view('template/header');
    $this->load->view('verifikasi/home', $data);
    $this->load->view('template/footer');
  }
  public function confirm($id)
  {
    $this->main->setTable("tb_users");
    $up = $this->main->get(["ID_USER"=>$id]);
    if ($up->num_rows() > 0) {
      $this->main->update(["VALID"=>1],["ID_USER"=>$id]);
      redirect(site_url("verifikasi"));
    }
  }

}
