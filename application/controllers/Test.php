<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->sendsms->setClient_id("1m7F1hfeuxTxLfHG9nAeSQDfQZga");
    $this->sendsms->setSecret_id("PTQ2pKhOgIdfLxWTmjE1UL1BSvEa");
    $this->sendsms->setMsdn("+6281214267695");
    $this->sendsms->setContent("xxx");
    $res = $this->sendsms->sendOTPVerif(5214);
    // $res = $this->sendsms->sendOTP();
    $obj = json_decode($res->body);
    var_dump($res);
  }

}
