<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_wrapper extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }
  /**
 	 * Upload
 	 *
 	 * @param mixed $name='',$is_update = false,$old_path = ""
 	 * @return mixed
	 */
   public function config_image($file_name,$path){
       $config['image_library'] = 'gd2';
       $config['file_name']=$file_name;
       $config['upload_path']=$path;
       $config['allowed_types']='png|jpg|gif';
       $config['max_size']=50000;
       $config['max_height']=50000;
       $config['max_width']=50000;
       $config['overwrite']=TRUE;
       return $config;
   }
  public function upload($name='',$is_update = false,$old_path = "")
  {
    $nama_photo=date("YmdHis").".jpg";
    $config=$this->config_image($nama_photo,"./upload/mobil");
    $this->upload->initialize($config);

    if($this->upload->do_upload($name)){
      return $nama_photo;
    }else {
      return false;
    }
  }
}
