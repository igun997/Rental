<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data_post = $this->input->post(null,true);
        if ($data_post != null) {
          $up = $this->db->update("tb_settings",["meta_value"=>$data_post["denda"]],["meta_key"=>"denda"]);
          $up = $this->db->update("tb_settings",["meta_value"=>$data_post["harga_driver"]],["meta_key"=>"harga_driver"]);
        }
        $data = ["denda"=>$this->db->get_where("tb_settings",["meta_key"=>"denda"])->row()->meta_value,"pengemudi"=>$this->db->get_where("tb_settings",["meta_key"=>"harga_driver"])->row()->meta_value];
        $this->load->view('template/header');
        $this->load->view('pengaturan/home', $data);
        $this->load->view('template/footer');
    }


}
