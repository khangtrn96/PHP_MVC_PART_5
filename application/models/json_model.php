<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class json_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function insert_database($ten,$dulieu)
	{
		$mangdl=array(
			'ten'=>$ten,
			'dulieu'=>$dulieu,
		);
		//tạo ra một id mới chứa cái $mangdl
		$this->db->insert('warehouse_1', $mangdl);
		return $this->db->insert_id();
	}
	public function showData_from_database()
	{
		$this->db->select('*');
		$this->db->where('ten', 'contact');
		$dulieu=$this->db->get('warehouse_1');
		//dùng result_array() để đưa dạng text về dạng mảng của mảng
		$mang_dulieu=$dulieu->result_array();
		//return $mang_dulieu;
		 foreach ($mang_dulieu as $value) {
		  $ketqua=$value['dulieu'];
		 }
		 //giá trị $ketqua thu được từ vòng lặp foreach chỉ là giá trị cuối cùng ứng với id cuối cùng có trong table warehouse. Tại vì ta không trích xuất giá trị $ketqua khi vòng lặp thực hiện và khi key của mang_dulieu là số cuối cùng thì $value['dulieu'] sẽ lấy ứng với id đó. Nên $ketqua trả về chỉ có 1 dòng
		return $ketqua;
	}

	public function updateData_for_database($dulieu_capnhat)
	{
		$this->db->where('ten', 'contact');
		//tạo ra một mảng lưu trữ dữ liệu được lấy từ hàm xoa_json trong json_controller
		$dulieu_can_capnhat = array(
			'ten' =>'contact',
			'dulieu'=>$dulieu_capnhat ,
		);
		return $this->db->update('warehouse_1', $dulieu_can_capnhat);
	}
}

/* End of file json_model.php */
/* Location: ./application/models/json_model.php */