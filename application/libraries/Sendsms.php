<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Sendsms
 *
 * Send SMS by Api mainapi.net
 *
 * @package Sendsms
 * @author SystemFive <indra.gunanda@gmail.com>
 * @version 0.0.1
 */
require_once APPPATH . 'libraries/curl/curl.php';

class Sendsms {

    private $client_id;
    private $secret_id;
    private $response;
    private $msdn;
    private $content;
    private $init;

    /**
     * Constructor function
     *
     * @return Sendsms
     */
    public function __construct() {
        $ci = & get_instance();
        $this->init = $ci;
    }

    function getClient_id() {
        return $this->client_id;
    }

    function getSecret_id() {
        return $this->secret_id;
    }

    function getResponse() {
        return $this->response;
    }

    function getMsdn() {
        return $this->msdn;
    }

    function getContent() {
        return $this->content;
    }

    function setClient_id($client_id) {
        $this->client_id = $client_id;
    }

    function setSecret_id($secret_id) {
        $this->secret_id = $secret_id;
    }

    function setResponse($response) {
        $this->response = $response;
    }

    function setMsdn($msdn) {
        $this->msdn = $msdn;
    }

    function setContent($content,$filter="true") {
        if (!$filter) {
            $content = strip_tags($content, "<p>");
            $content = str_replace('<p>', '', $content);
            $content = str_replace('</p>', '', $content);
        }
        $this->content = $content;
    }

    private function _genToken() {

        $base = "Basic " . base64_encode($this->client_id . ":" . $this->secret_id);
        $instances = new Curl();
        $instances->headers['Authorization'] = $base;
        $response = $instances->post("https://api.mainapi.net/token", array("grant_type" => "client_credentials"));
        $data = json_decode($response->body);
        $ap = (isset($data->access_token)) ? $data->access_token : null;
        return $ap;
    }

    function sendSMS() {
        $ap = $this->_genToken();
        if ($ap != null) {
            $instances = new Curl();
            $instances->headers["Content-Type"] = "application/x-www-form-urlencoded";
            $instances->headers["Accept"] = "application/json";
            $instances->headers["Authorization"] = "Bearer " . $ap;
            $res = $instances->post("https://api.mainapi.net/smsnotification/1.0.0/messages", array("msisdn" => $this->msdn, "content" => $this->content));
            return $res;
        } else {
            return (object) array("code" => 0, "msg" => "Wrong Client ID or Secret ID");
        }
    }
    function sendOTP() {
        $ap = $this->_genToken();
        $inst =& get_instance();
        $inst->session->set_userdata(["bearer"=>$ap]);
        if ($ap != null) {
            $instances = new Curl();
            $instances->headers["Content-Type"] = "application/x-www-form-urlencoded";
            $instances->headers["Accept"] = "application/json";
            $instances->headers["Authorization"] = "Bearer " . $ap;
            $res = $instances->put("https://api.mainapi.net/smsotp/1.0.1/otp/login", array("maxAttempt"=>0,"phoneNum"=>$this->msdn,"expireIn"=>120,"digit"=>4));
            return $res;
        } else {
            return (object) array("code" => 0, "msg" => "Wrong Client ID or Secret ID");
        }
    }
    function sendOTPVerif($otp) {
        $inst =& get_instance();
        $ap = $inst->session->bearer;
        if ($ap != null) {
            $instances = new Curl();
            $instances->headers["Content-Type"] = "application/x-www-form-urlencoded";
            $instances->headers["Accept"] = "application/json";
            $instances->headers["Authorization"] = "Bearer " . $ap;
            $res = $instances->post("https://api.mainapi.net/smsotp/1.0.1/otp/login/verifications", array("maxAttempt"=>0,"otpstr"=>$otp,"expireIn"=>120,"digit"=>4));
            return $res;
        } else {
            return (object) array("code" => 0, "msg" => "Wrong Client ID or Secret ID");
        }
    }


}

/* End of file Sendsms.php */
/* Location: ./application/libraries/Sendsms.php */
