<?php

class Application extends CI_model{
	function _construct(){
		parent::_construct();
	}

	public function insertData($data){
		$this->load->database();
		$this->db->select('short_url');
		$this->db->where('short_url',$data['short_url']);
		$res = $this->db->get('url');
		if($res->num_rows() > 0){
			return false;
		}else{
			$this->db->insert('url',$data);
			return true;
		}
	}

	public function search($short_url){
		$this->load->database();
		$result = $this->db->query("select original_url from url where short_url = '$short_url'");

		if($result->num_rows() > 0){
			return $result->result_array()[0];
		}else{
			return false;
		}
	}

	public function searchAll(){
		$this->load->database();
		$res = $this->db->get('url');

		if($res->num_rows() > 0){
			return $res->result_array();
		}else{
			return false;
		}
	}

	public function delete($code){
		$this->load->database();
		$this->db->delete('url',array('short_url'=>$code));

		$res = $this->db->get('url');
	}


	public function updateClicks($short_url){
		$this->load->database();
		$this->db->select('clicks');
		$this->db->where('short_url',$short_url);
		$res = $this->db->get('url')->result_array();

		$clicks = $res[0]['clicks'];

		$this->db->set('clicks',$clicks+1);
		$this->db->where('short_url',$short_url);
		$this->db->update('url');
	}
}

?>