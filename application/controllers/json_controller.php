<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class json_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//echo "test controller";

		//  $mot_contact= array(
		// 	'ten'=>"khang",
		// 	'sdt'=>"0980912390",
		// );
		//  $cac_contact=array();

		//  array_push($cac_contact, $mot_contact);
		//  $mot_contact_2=array(
		// 	'ten'=>"Khang 1",
		//  	'sdt'=>"0551313",
		//  );
		// // //tạo một mảng trống $cac_contact
		//  array_push($cac_contact, $mot_contact_2);
		// 		echo "<pre>";
		// 		var_dump($cac_contact);
		// 		echo "</pre>";
		// // //mã hoá cac_contact bằng json bằng hàm json_encode()
		//  $noidung_mahoa=json_encode($cac_contact);

		//  echo '<h1>Đây là kiểu json đã được mã hoá</h1>';

		//  		echo "<pre>";
		// 		var_dump($noidung_mahoa);
		// 		echo "</pre>";
		// // //sau đó mình insert vào dữ liệu
		// // //sau đó lấy dữ liệu ra rồi dùng hàm json_decode để giải mã
		//  $noidung_giaima=json_decode($noidung_mahoa);
		//  echo '<h1>Đây là kiểu array đã được giải mã</h1>';
		// 		echo "<pre>";
		// 		var_dump($noidung_giaima);
		//  		echo "</pre>";
		// // //để ý rằng sau khi giải mã thì cho ra một mảng các object chứ không phải mảng các mảng
		// // //
		// $this->load->model('json_model');
		// echo $this->json_model->insert_database('contact', $noidung_mahoa);
		

		 $this->load->model('json_model');
		 $ketqua=$this->json_model->showData_from_database();
		 $ketqua_giaima=json_decode($ketqua);
		 $ketqua_giaima_view=array('ketqua_gui_json_view'=>$ketqua_giaima);
		 $this->load->view('json_view', $ketqua_giaima_view, FALSE);
				// echo "<pre>";
				// var_dump($ketqua_giaima);
			 	// 	echo "</pre>";
	}

	public function xoa_json($sdt)
	{
			 $this->load->model('json_model');
		 	$ketqua=$this->json_model->showData_from_database();
			$ketqua_giaima_1=json_decode($ketqua,true);

			//duyệt các phần tử có trong mảng $ketqua_giaima, rồi so sánh xem phần tử nào có sdt trung với $sdt
			//nếu trùng thì dùng hàm unset(tenmang, key) để xoá dữ liệu đó
			foreach ($ketqua_giaima_1 as $key=>$value) {
				if ($value["sdt"]==$sdt) {
							// echo "<pre>";
							// var_dump($key);
							// echo "</pre>";
							unset($ketqua_giaima_1[$key]);
				}
			}
			//mã hoá dữ liệu thành chuỗi json để có thể insert vào bảng vì sau khi xoá thì $ketqua_giaima còn ở dạng mảng của object
			$ketqua_mahoa=json_encode($ketqua_giaima_1);
			//sau khi hết vòng lặp foreach thì mảng json đã bị xoá đi một phần tử có sđt truyền
			//Ta tiến hành cập nhật dữ liệu sau khi xoá-->giao tiếp với tấng dữ liệu-->viết trong một model riêng
			//Sau khi viết xong thì gọi hàm cập nhật
			
			$this->load->model('json_model');
			//echo $this->json_model->updateData_for_database($ketqua_mahoa);//ket qua của dòng này là 1 tức là đã cập nhật được dữ liệu
			if ($this->json_model->updateData_for_database($ketqua_mahoa))
			{
				$this->load->view('thanhcong_view');
			}

			 		 // echo "<pre>";
			 		 // var_dump($ketqua_giaima);
			 		 // echo "</pre>";

	}

	public function addnewData()
	{
		//lấy dữ liệu từ view
		$newten=$this->input->post('ten');
		$newsdt=$this->input->post('sdt');
		$dulieu_newData=array(
			'ten'=>$newten,
			'sdt'=>$newsdt
		);
		$this->load->model('json_model');
		$dulieu_from_database=$this->json_model->showData_from_database();
		$dulieu_giaima=json_decode($dulieu_from_database,true);
		array_push($dulieu_giaima, $dulieu_newData);
		//mã hoá dữ liệu
		$dulieu_mahoa=json_encode($dulieu_giaima);

		$this->load->model('json_model');
		if ($this->json_model->updateData_for_database($dulieu_mahoa))
			{
				$this->load->view('thanhcong_view');
			};
	}

	// public function editData()
	// {
		
	// 	$this->load->model('json_model');
	// 	$dulieu=$this->json_model->showData_from_database();
	// 	$dulieu_giaima=json_decode($dulieu,true);

	// 	$dulieu_for_json_view=array('dulieu_can_edit'=>$dulieu_giaima);
	// 	$this->load->view('json_view', $dulieu_for_json_view, FALSE);

	// }

}

/* End of file json_controller.php */
/* Location: ./application/controllers/json_controller.php */