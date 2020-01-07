<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $data = [];
    $d = $this->input->post(NULL,true);
    if (isset($d["USERNAME"])) {
      $ins = $this->db->get_where("tb_users",$d);
      $r = $ins->row();
      if ($ins->num_rows() > 0) {
        $this->session->set_userdata((array) $r);
        redirect(base_url("mobile/view"));
      }else {
        $data[] = "USERNAME & PASSWORD Tidak Ditemukan";
      }
      // var_dump($ins->num_rows());
      // exit();
    }
    $this->load->view("mobile/login",$data);
  }
  public function view()
  {
    $data = [
      "title"=>"Utama",
      "session"=>$this->session
    ];
    $allMobil = $this->db->get("tb_mobil")->result();
    $data["mobil"] = $allMobil;
    $this->load->view("mobile/layout/head");
    $this->load->view("mobile/mobil/home",$data);
    $this->load->view("mobile/layout/foot");
  }
  public function view_detail($id)
  {
    $data = [
      "title"=>"Utama",
      "session"=>$this->session
    ];
    $d = $this->input->post(NULL,true);
    $allMobil = $this->db->get_where("tb_mobil",["ID_MOBIL"=>$id])->row();
    if (isset($d["jam"])) {
      $num = $this->db->get("tb_transaksi")->num_rows() + 1;
      $que = [];
      $que["KODE_TRANSAKSI"] = kodifikasi($num);
      $que["ID_USER"] = $this->session->ID_USER;
      $que["TGL_ORDER"] = date("Y-m-d H:i:s");
      $que["TOTAL_PEMBAYARAN"] = harga($allMobil->HARGA_MOBIL,$d["TGL_SEWA"],$d["TGL_AKHIR_PENYEWAAN"]);
      $que["STATUS_PEMBAYARAN"] = 0;
      $que["STATUS_TRANSAKSI"] = 0;
      // var_dump($que);
      // exit();
      $i = $this->db->insert("tb_transaksi",$que);
      if ($i) {
        $d["ID_MOBIL"] = $id;
        $d["KODE_TRANSAKSI"] = $que["KODE_TRANSAKSI"];
        $d["HARGA_MOBIL"] = $allMobil->HARGA_MOBIL;
        $d["DENDA"] = 0;
        $d["TOTAL"] = harga($allMobil->HARGA_MOBIL,$d["TGL_SEWA"],$d["TGL_AKHIR_PENYEWAAN"]);
        $d["STATUS"] = 0;
        $d["TGL_SEWA"] = $d["TGL_SEWA"]." ".$d["jam"];
        $d["TGL_AKHIR_PENYEWAAN"] = $d["TGL_AKHIR_PENYEWAAN"]." ".$d["jam"];
        unset($d["jam"]);
        $s = $this->db->insert("tb_detail_transaksi",$d);
        $this->db->update("tb_mobil",["STATUS_SEWA"=>1],["ID_MOBIL"=>$id]);
        if ($s) {
          redirect(base_url("mobile/booking"));
        }
      }
    }
    $data["mobil"] = $allMobil;
    $data["galeri"] = $this->db->get_where("tb_gallery_mobil",["ID_MOBIL"=>$id]);
    $this->load->view("mobile/layout/head");
    $this->load->view("mobile/mobil/detail_mobil",$data);
    $this->load->view("mobile/layout/foot");
  }
  public function booking()
  {
    $data = [];
    $data["transaksi"] = $this->db->join("tb_detail_transaksi","tb_detail_transaksi.KODE_TRANSAKSI = tb_transaksi.KODE_TRANSAKSI")->get("tb_transaksi")->result();
    // $data["transaksi_detail"] = [];
    // var_dump($data);
    // exit();
    $this->load->view("mobile/layout/head");
    $this->load->view("mobile/booking/home",$data);
    $this->load->view("mobile/layout/foot");
  }
  public function booking_detail($id)
  {
    $data = [];
    $data["transaksi"] = $this->db->join("tb_detail_transaksi","tb_detail_transaksi.KODE_TRANSAKSI = tb_transaksi.KODE_TRANSAKSI")->get_where("tb_transaksi",["tb_transaksi.KODE_TRANSAKSI"=>$id])->row();
    // $data["transaksi_detail"] = [];
    // var_dump($data);
    // exit();
    $this->load->view("mobile/layout/head");
    $this->load->view("mobile/booking/detail_transaksi",$data);
    $this->load->view("mobile/layout/foot");
  }
  public function logout()
  {
    session_destroy();
    redirect(base_url("mobile.html"));
  }
  public function reg()
  {
    $data = [];
    $d = $this->input->post(NULL,true);
    if (isset($d["NIK"])) {
      $ins = $this->db->insert("tb_users",$d);
      if ($ins) {
        redirect(base_url("mobile/otp"));
      }
    }
    $this->load->view("mobile/register",$data);
  }
  public function otp()
  {
      $data = [];
      $d = $this->input->post(NULL,true);
      if (isset($d["otp"])) {
        redirect(base_url("mobile.html"));
      }
      $this->load->view("mobile/otp",$data);
  }

}
