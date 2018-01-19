<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class json_edit_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('json_model');
		$dulieu=$this->json_model->showData_from_Database();
		$dulieu=json_decode($dulieu,true);
		$mang_dulieu=array('mangdl'=>$dulieu);
		$this->load->view('json_edit', $mang_dulieu, FALSE);
				// echo "<pre>";
				// var_dump($dulieu);
				// echo "</pre>";
	}

	//Viết hàm edit dữ liệu json từ json_edit.php trong file view
	public function editData()
	{
		//hàm này nhận dữ liệu là một mảng ten[] và sdt[] từ json_edit
		$giatri_ten=$this->input->post('ten');
		$giatri_sdt=$this->input->post('sdt');
				// echo "<pre>";
				// var_dump($giatri_sdt);
				// echo "</pre>";
		//lúc này $giatri_ten, $giatri_sdt là một mảng các ten và sdt
		
		// tạo một mảng rỗng để đưa dữ liệu
		 $dl= array();

		 for ( $i=0; $i<count($giatri_ten); $i++)
		 {
		 	$trunggian= array();
		 	$trunggian['ten']=$giatri_ten[$i];
		 	$trunggian['sdt']=$giatri_sdt[$i];
		 	array_push($dl, $trunggian);
		}
		 //Sau khi xong lệnh for thì lúc này biến $dl là một mảng dữ liệu chứa tên và sdt
		 //Ta tiến hành mã hoá
		 $dl_mahoa=json_encode($dl);

		 //Gọi model dê cập nhật dữ liệu
				// echo "<pre>";
		 	// 	var_dump($dl_mahoa);
		 	// 	echo "</pre>";
		
		 $this->load->model('json_model');
		 if($this->json_model->updateData_for_database($dl_mahoa))
		 	{
				$this->load->view('thanhcong_view');
		 	} else{
		  		echo "Bạn đã cập nhật dữ liệu thất bại";
			}
	

		//biến $giatri_ten lúc này là một mảng chứa tên các contact trong đó key là stt và $value_ten là tên ứng với stt đó
		// foreach ($giatri_ten as $value_ten) {
		// 		echo "<pre>";
		// 		var_dump($value_ten);
		// 		echo "</pre>";}
	}
}
/* End of file json_edit_controller.php */
/* Location: ./application/controllers/json_edit_controller.php */