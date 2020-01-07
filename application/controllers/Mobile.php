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
  public function verifikasi()
  {
    $id = $this->session->ID_USER;
    if (isset($_FILES["KTP"])) {
      $ktp = $this->upload_wrapper->upload("KTP");
      $sim = $this->upload_wrapper->upload("SIM");
      // var_dump($ktp);
      // var_dump($sim);
      // exit();
      if ($ktp != false && $sim != false) {
        $this->main->setTable("tb_users");
        $iup =  $this->main->update(["SIM"=>$sim,"KTP"=>$ktp],["ID_USER"=>$id]);
        if ($iup) {
          redirect(base_url("mobile/verifikasi"));
        }
      }
    }
    $data = [];
    $this->main->setTable("tb_users");
    $row = $this->main->get(["ID_USER"=>$id])->row();
    $data["detail"] = $row;
    $this->load->view("mobile/layout/head");
    $this->load->view("mobile/verifikasi/home",$data);
    $this->load->view("mobile/layout/foot");
  }
  public function view()
  {
    $data = [
      "title"=>"Utama",
      "session"=>$this->session
    ];
    $allMobil = $this->db->get("tb_mobil")->result();
    $data["mobil"] = $allMobil;
    $this->main->setTable("tb_users");

    $data["user"] = $this->main->get(["ID_USER"=>$this->session->ID_USER])->row();
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
      $this->main->setTable("tb_mobil");
      $a =$this->main->get(["ID_MOBIL"=>$id])->row()->PENGEMUDI;
      $que["TOTAL_PEMBAYARAN"] = harga($allMobil->HARGA_MOBIL,$d["TGL_SEWA"],$d["TGL_AKHIR_PENYEWAAN"]);
      if ($a == "pakai") {
        $this->main->setTable("tb_settings");
        $harga = $this->main->get(["meta_key"=>"harga_driver"])->row()->meta_value;
        $que["TOTAL_PEMBAYARAN"] = (harga($allMobil->HARGA_MOBIL,$d["TGL_SEWA"],$d["TGL_AKHIR_PENYEWAAN"])+$harga);
      }
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
        // $this->db->update("tb_mobil",["STATUS_SEWA"=>1],["ID_MOBIL"=>$id]);
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
    $this->main->setTable("tb_detail_transaksi");
    $ebel = $this->main->get(["KODE_TRANSAKSI"=>$id])->row();
    $s = lama(date("Y-m-d H:i:s"),$ebel->TGL_SEWA,$ebel->TGL_AKHIR_PENYEWAAN);
    $data["waktu_sewa"] = "(".$s["sisa"]."/".$s["total"].") Hari";
    $data["sisa"] = $s["sisa"];
    $this->main->setTable("tb_settings");
    $ss = $this->main->get(["meta_key"=>"denda"])->row()->meta_value;
    $data["denda"] = (abs($s["sisa"])*((($ss/100)*$data["transaksi"]->TOTAL_PEMBAYARAN)+$data["transaksi"]->TOTAL_PEMBAYARAN));
    // $data["transaksi_detail"] = [];
    // var_dump($data);
    // exit();
    if (isset($_FILES["BUKTI_PEMBAYARAN"])) {
      $up  = $this->upload_wrapper->upload("BUKTI_PEMBAYARAN");
      // var_dump($up);
      // exit();
      if ($up != false) {
        $this->main->setTable("tb_transaksi");
        $this->main->update(["BUKTI_PEMBAYARAN"=>$up,"STATUS_PEMBAYARAN"=>1],["KODE_TRANSAKSI"=>$id]);
        redirect(base_url("mobile/booking"));
      }
    }
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
      $this->sendsms->setClient_id("1m7F1hfeuxTxLfHG9nAeSQDfQZga");
      $this->sendsms->setSecret_id("PTQ2pKhOgIdfLxWTmjE1UL1BSvEa");
      $this->sendsms->setMsdn($d["NO_TELP"]);
      $this->sendsms->setContent("xxx");
      $res = $this->sendsms->sendOTP();
      $obj = json_decode($res->body);
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
        $this->sendsms->setClient_id("1m7F1hfeuxTxLfHG9nAeSQDfQZga");
        $this->sendsms->setSecret_id("PTQ2pKhOgIdfLxWTmjE1UL1BSvEa");
        $res = $this->sendsms->sendOTPVerif($d["otp"]);
        $obj = json_decode($res->body);
        // var_dump($obj);
        // if ($obj->status) {
          redirect(base_url("mobile.html"));
        // }
      }
      $this->load->view("mobile/otp",$data);
  }

}
