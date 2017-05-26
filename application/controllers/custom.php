<?php 
session_start();
class Custom extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->helper("url");
		$this->load->library("session");
	}	
	
	public function index(){
		$custom = array();
		$temp_part = array();
		$shoe_id = $this->input->get("shoe_id");
		$collection_id = $this->input->get("collection_id");
		$this->load->model("custom_model","",TRUE);
		
		if(isset($_SESSION["cart"])){
			$sum_cart = count($_SESSION["cart"]);
		}
		else{
			$sum_cart = 0;
		}
		
		//ambil part type group yang ada berdasarkan shoe
		$part_type_group = $this->custom_model->get_part_type_group($shoe_id);
		
		//jika berasal dari collection
		if($collection_id != ""){
			$this->load->model("collection_model","",TRUE);
			$this->load->model("pattern_color_model","",TRUE);
			$this->load->model("part_model","",TRUE);
			$collection_part = array();
			$collection_pattern_color = array();
			$collection = $this->collection_model->select_detail($collection_id);
			
			foreach($collection->result() as $row){
				$part = $this->part_model->select_by_id($row->part_id);
				foreach($part->result() as $row_part){
					$temp_part[$row->part_id] = $row_part->part_name;
				}
			
				$pattern_color = $this->pattern_color_model->select_by_id($row->pattern_color_id);
				foreach($pattern_color->result() as $row_pattern_color){
						$custom[$row->part_type_group_id][$row->part_type_id][$row->part_id] = $row_pattern_color->pattern_color_id."|+|".$row_pattern_color->pattern_color_price."|+|".$row_pattern_color->pattern_color_path;
				}	
			}
		}
		else{			
			//ambil part type berdasarkan part type group
			foreach($part_type_group->result() as $row_part_type_group){
				$part_type = $this->custom_model->get_part_type($shoe_id, $row_part_type_group->part_type_group_id);
			
				foreach($part_type->result() as $row_part_type){			
					
					//ambil part berdasarkan part type
					$part = $this->custom_model->get_part($row_part_type->part_type_id);
					foreach($part->result() as $row_part){
						$temp_part[$row_part->part_id] = $row_part->part_name;
						
						//ambil pattern color berdasarkan part
						$pattern_color = $this->custom_model->get_pattern_color($row_part->part_id);
						foreach($pattern_color->result() as $row_pattern_color){
								$custom[$row_part_type_group->part_type_group_id][$row_part_type->part_type_id][$row_part->part_id] = $row_pattern_color->pattern_color_id."|+|".$row_pattern_color->pattern_color_price."|+|".$row_pattern_color->pattern_color_path;
						}	
					}
				}
			}
		}
		$_SESSION["custom"] = $custom;
		$_SESSION["part"] = $temp_part;
		
		$data["custom"] = $custom;
		$data["part"] = $temp_part;
		$data["part_type_group"] = $part_type_group;
		$data["shoe_id"] = $shoe_id;
		$data["sum_cart"] = $sum_cart;
		$this->load->view("custom/template", $data);
	}
	
	public function search_part_type(){
		$shoe_id = $this->input->post("shoe_id");
		$part_type_group_id = $this->input->post("part_type_group_id");
		
		$this->load->model("custom_model","",TRUE);
		$part_type = $this->custom_model->get_part_type_all($shoe_id, $part_type_group_id);
		
		$data["shoe_id"] = $shoe_id;
		$data["part_type_group_id"] = $part_type_group_id;
		$data["part_type"] = $part_type;
		$this->load->view("custom/ajax_part_type",$data);
	}
	
	public function generate_session(){
		$part_type_id = $this->input->post("part_type_id");
		$part_type_group_id = $this->input->post("part_type_group_id");
		$custom = $_SESSION["custom"];
		
		$this->load->model("custom_model","",TRUE);
		
		//reset array pada part type group tertentu untuk di generate ulang
		$custom[$part_type_group_id] = NULL;

		//ambil part berdasarkan part type
		$part = $this->custom_model->get_part($part_type_id);
		foreach($part->result() as $row_part){
		
			//ambil pattern color berdasarkan part
			$pattern_color = $this->custom_model->get_pattern_color($row_part->part_id);
			foreach($pattern_color->result() as $row_pattern_color){
					$custom[$part_type_group_id][$part_type_id][$row_part->part_id] = $row_pattern_color->pattern_color_id."|+|".$row_pattern_color->pattern_color_price."|+|".$row_pattern_color->pattern_color_path;;
			}	
		}
		$_SESSION["custom"] = $custom;
		header("Location: ".base_url("custom/generator"));
	}
	
	public function generator(){
		$part_id = $this->input->post("part_id");
		$pattern_color_id = $this->input->post("pattern_color_id");
		$custom = $_SESSION["custom"];
		$temp_custom = $custom;
		$this->load->model("custom_model","",TRUE);
		$this->load->model("pattern_color_model","",TRUE);
		$temporary_part = array();
		
		//reload generate 
		foreach($custom as $key_part_type_group => $val_part_type){
			foreach($val_part_type as $key_part_type => $val_part){
			
				foreach($val_part as $key_part => $pattern_color){ 
					$temporary_part[$key_part] = $this->custom_model->get_part_name($key_part);
					
					//jika part_id tidak kosong dan akan diset dengan pattern color yang baru
					if($part_id == $key_part){
						$temp = $this->pattern_color_model->select_by_id($pattern_color_id);
						$pattern_color = $temp->row(1);
						$temp_custom[$key_part_type_group][$key_part_type][$key_part] = $pattern_color->pattern_color_id."|+|".$pattern_color->pattern_color_price."|+|".$pattern_color->pattern_color_path;
					}
					
				}
			}
		}
		$_SESSION["custom"] = $temp_custom;
		$_SESSION["part"] = $temporary_part;
	}
	
	public function load_pattern_color(){
		$this->load->model("custom_model","",TRUE);
		$part  = $_SESSION["part"];
		$z=1;
		foreach($part as $key => $val){
			if($z == 1){
				$material = $this->custom_model->get_material_pattern_color_all($key);
				$pattern_color = $this->custom_model->get_pattern_color_all($key);
			}
			$z++;
		}
		$data["material"] = $material;
		$data["pattern_color"] = $pattern_color;
		$this->load->view("custom/ajax_material_color",$data);
	}
	
	public function load_part(){
		$part  = $_SESSION["part"];
		$data["part"] = $part;
		$this->load->view("custom/ajax_part",$data);
	}
	
	public function load_generate_result(){
		$custom = $_SESSION["custom"];
		$data["custom"] = $custom;
		$this->load->view("custom/ajax_generate_result",$data);
	}
	
	public function load_price_result(){
		$custom = $_SESSION["custom"];
		$data["custom"] = $custom;
		$this->load->view("custom/ajax_price_result",$data);
	}
	
	public function load_pattern_color_by_id(){
		$this->load->model("custom_model","",TRUE);
		$part_id = $this->input->post("part_id");
		$optional_css = $this->input->post("optional_css");
		$material = $this->custom_model->get_material_pattern_color_all($part_id);
		$pattern_color = $this->custom_model->get_pattern_color_all($part_id);
		$data["material"] = $material;
		$data["pattern_color"] = $pattern_color;
		$data["optional_css"] = $optional_css;
		$this->load->view("custom/ajax_material_color",$data);
	}
	
	public function checkout(){
		$summary_price = 0;
		$item_price = 0;
		$customer_id = $this->session->userdata("customer_id");
		$code=$this->session->userdata('customer_kode');
		$customer_email = $this->session->userdata("customer_email");
		$cart = $_SESSION["cart"];
		$size = $_SESSION["size"];
		
		$deliver_name = $this->input->post("deliver_name");
		$deliver_address = $this->input->post("deliver_address");
		$province_id = $this->input->post("province_id");
		$deliver_city = $this->input->post("deliver_city");
		$deliver_zipcode = $this->input->post("deliver_zipcode");
		$deliver_telephone = $this->input->post("deliver_telephone");
		$quantity = $this->input->post("quantity");
		$bank_account = $this->input->post("bank_account");
		
		$this->load->model("transaction_model","",TRUE);
		$this->load->model("other_model","",TRUE);
		
		$this->other_model->add_deliver($deliver_name, $deliver_address, $province_id, $deliver_city, $deliver_zipcode, $deliver_telephone);
		$deliver_id = $this->other_model->max_deliver();
		$order_number ="#". strtoupper(substr(md5($customer_id."".$deliver_id."qwertyzxcvb"),10));
		for($i = 0; $i< count($cart); $i++){
			$custom = $cart[$i];
			$this->transaction_model->add($customer_id, $size[$i], $quantity[$i], $deliver_id, $order_number, $bank_account);
			$transaction_id = $this->transaction_model->max();

			foreach($custom as $key_part_type_group => $val_part_type){
				foreach($val_part_type as $key_part_type => $val_part){
					foreach($val_part as $key_part => $pattern_color){ 
						$temp = explode("|+|",$pattern_color);
						$pattern_color_id = $temp[0];
						$item_price += $temp[1];
						//echo $pattern_color_id." - ".$transaction_id."<br/>";
						
						$this->transaction_model->add_detail($transaction_id, $pattern_color_id);
					}
				}
			}
			$summary_price += ($quantity[$i] * $item_price) ;
			$item_price = 0;
		}
		 
		if($bank_account == "Mandiri") { 
			$bank_purpose = "Bank Mandiri \r\n"."a.n. Muhammad Ilham Kalami \r\n"."No. Rekening : 1300012595701 \r\n\n";
		}				
		else {
			$bank_purpose = "Bank Mandiri \r\n"."a.n. Muhammad Ilham Kalami \r\n"."No. Rekening : 1300012595701 \r\n\n";
		}		
		$to  = $customer_email;
		$subject = 'Pershoenalize Order Confirmation';
		$message = 'Dear Customer,' . "\r\n\n" . 'Custom order anda sudah kami terima.'. "\r\n\n" .
							 'Total Harga Custom Shoe :'. "\r\n\n" .
							 'Rp. '.$summary_price. "\r\n\n" .
							 'Silahkan lakukan pembayaran ke:'. "\r\n\n" .
							 $bank_purpose.
							 'Mohon melakukan pembayaran dan konfirmasi pembayaran dengan membalas email ini maksimal dalam 2 x 24 jam. Pesanan akan mulai kami kerjakan setelah konfirmasi pembayaran dengan maksimal waktu produksi 14 hari kerja. Thank you for your order.'. "\r\n\n" .
							 'Note:'. "\r\n" .
							 'Jika ukuran sepatu yang kami produksi tidak sesuai dengan ukuran kaki anda, kami menyediakan fasilitas remake selama 365 hari.'."\r\n";
						   
						   
		$headers = 'From: Customer Service Pershoenalize muhammadfahry18@gmail.com' . "\r\n" .
					'Reply-To: '.$customer_email.'' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		if(mail($to, $subject, $message, $headers)) {
			unset($_SESSION["cart"]);
			unset($_SESSION["size"]);
			unset($_SESSION["shoe"]);
			
			$data["bank_account"] = $bank_account;
			$data["order_number"] = $order_number;
			$message = "sent";
		} else {
			$message = "failed";
		}
		$data["message"] = $message;
		$this->load->view("custom/checkout",$data);
  }
  
  public function add_to_bag(){
	if(isset($_SESSION["cart"]) && isset($_SESSION["size"]) && isset($_SESSION["shoe"])){
		$cart = $_SESSION["cart"];
		$size = $_SESSION["size"];
		$shoe = $_SESSION["shoe"];
	}
	else{
		$cart = array();
		$size = array();
		$shoe = array();
	}
	$custom = $_SESSION["custom"];
	$cart[] = $custom;
	$size[] = $this->input->post("size");
	$shoe[] = $this->input->post("shoe");
	
	$_SESSION["cart"] = $cart;
	$_SESSION["size"] = $size;
	$_SESSION["shoe"] = $shoe;
  }
  
  public function shopping_cart(){
	$cart = $_SESSION["cart"];
	$size = $_SESSION["size"];
	$shoe = $_SESSION["shoe"];
	$customer_id = $this->session->userdata("customer_id");
	$this->load->model("shoe_model","",TRUE);
	$this->load->model("other_model","",TRUE);
	
	for($i = 0; $i<count($shoe); $i++){
		$temp_result = $this->shoe_model->select_by_id($shoe[$i]);
		$temp_row = $temp_result->row(1);
		$shoe_name[] = $temp_row->shoe_name;
	}

	$province = $this->other_model->list_province();
	
	$data["cart"] = $cart;
	$data["size"] = $size;
	$data["shoe_name"] = $shoe_name;
	$data["customer_id"] = $customer_id;
	$data["province"] = $province;
	$this->load->view("custom/shopping_cart",$data);
  }
  
  public function drop_cart(){
	$cart = $_SESSION["cart"];
	$size = $_SESSION["size"];
	$shoe = $_SESSION["shoe"];
	$item = $this->input->get("item");
	
	unset($cart[$item]);
	unset($size[$item]);
	unset($shoe[$item]);
	$cart = array_values($cart);
	$size = array_values($size);
	$shoe = array_values($shoe);
	
	$_SESSION["cart"] = $cart;
	$_SESSION["size"]  = $size;
	$_SESSION["shoe"] = $shoe;
	header("Location: ".base_url("custom/shopping_cart"));
  }
  
  public function image_canvas(){
	$item = $this->input->get("item");
	$cart = $_SESSION["cart"];
	
	$data["custom"] = $cart[$item];
	$data["item"] = $item;
	$this->load->view("custom/ajax_image_canvas",$data);
  }
  
  public function clear_session(){
    $this->session->sess_destroy();
	session_destroy();
	header("Location: ".base_url("welcome/index"));
  }
  
  public function design_admin(){	
	$this->load->model("shoe_model","",TRUE);
	$element["shoe"] = $this->shoe_model->select_all();
	$data["page"]  = $this->load->view("backend/design",$element,TRUE);
	$data["active"] = "design";
	$this->load->view("backend/dashboard",$data);
  }
  
  public function design_admin_detail($shoe_id){
	$this->load->model("custom_model","",TRUE);
	
	//ambil part type group yang ada berdasarkan shoe
	$part_type_group = $this->custom_model->get_part_type_group($shoe_id);
		
	foreach($part_type_group->result() as $row_part_type_group){
		$part_type = $this->custom_model->get_part_type($shoe_id, $row_part_type_group->part_type_group_id);
		
		foreach($part_type->result() as $row_part_type){			
			
			//ambil part berdasarkan part type
			$part = $this->custom_model->get_part($row_part_type->part_type_id);
			foreach($part->result() as $row_part){
				$temp_part[$row_part->part_id] = $row_part->part_name;
				//ambil pattern color berdasarkan part
				$pattern_color = $this->custom_model->get_pattern_color($row_part->part_id);
				
				foreach($pattern_color->result() as $row_pattern_color){
						$custom[$row_part_type_group->part_type_group_id][$row_part_type->part_type_id][$row_part->part_id] = $row_pattern_color->pattern_color_id."|+|".$row_pattern_color->pattern_color_price."|+|".$row_pattern_color->pattern_color_path;
				}	
			}
		}
	}
	$_SESSION["design"] = $custom;
	$_SESSION["design_part"] = $temp_part;
	
	$element["custom"] = $custom;
	$element["part"] = $temp_part;
	$element["part_type_group"] = $part_type_group;
	$element["shoe_id"] = $shoe_id;
	$data["page"] = $this->load->view("backend/design_detail", $element, TRUE);
	$data["active"] = "design";
	$this->load->view("backend/dashboard",$data);
  }
	
	public function generate_session_admin(){
		$part_type_id = $this->input->post("part_type_id");
		$part_type_group_id = $this->input->post("part_type_group_id");
		$custom = $_SESSION["design"];
		$this->load->model("custom_model","",TRUE);
		
		//reset array pada part type group tertentu untuk di generate ulang
		$custom[$part_type_group_id] = NULL;

		//ambil part berdasarkan part type
		$part = $this->custom_model->get_part($part_type_id);
		foreach($part->result() as $row_part){
		
			//ambil pattern color berdasarkan part
			$pattern_color = $this->custom_model->get_pattern_color($row_part->part_id);
			foreach($pattern_color->result() as $row_pattern_color){
					$custom[$part_type_group_id][$part_type_id][$row_part->part_id] = $row_pattern_color->pattern_color_id."|+|".$row_pattern_color->pattern_color_price."|+|".$row_pattern_color->pattern_color_path;;
			}	
		}
		$_SESSION["design"] = $custom;
		header("Location: ".base_url("custom/generator_admin"));
	}
	
	public function generator_admin(){
		$part_id = $this->input->post("part_id");
		$pattern_color_id = $this->input->post("pattern_color_id");
		$custom = $_SESSION["design"];
		$temp_custom = $custom;
		$this->load->model("custom_model","",TRUE);
		$this->load->model("pattern_color_model","",TRUE);
		$temporary_part = array();
		
		//reload generate 
		foreach($custom as $key_part_type_group => $val_part_type){
			foreach($val_part_type as $key_part_type => $val_part){
			
				foreach($val_part as $key_part => $pattern_color){ 
					$temporary_part[$key_part] = $this->custom_model->get_part_name($key_part);
					
					//jika part_id tidak kosong dan akan diset dengan pattern color yang baru
					if($part_id == $key_part){
						$temp = $this->pattern_color_model->select_by_id($pattern_color_id);
						$pattern_color = $temp->row(1);
						$temp_custom[$key_part_type_group][$key_part_type][$key_part] = $pattern_color->pattern_color_id."|+|".$pattern_color->pattern_color_price."|+|".$pattern_color->pattern_color_path;
					}
					
				}
			}
		}
		$_SESSION["design"] = $temp_custom;
		$_SESSION["design_part"] = $temporary_part;
	}
	
	public function load_pattern_color_admin(){
		$this->load->model("custom_model","",TRUE);
		$part  = $_SESSION["design_part"];
		$z=1;
		foreach($part as $key => $val){
			if($z == 1){
				$material = $this->custom_model->get_material_pattern_color_all($key);
				$pattern_color = $this->custom_model->get_pattern_color_all($key);
			}
			$z++;
		}
		$data["material"] = $material;
		$data["pattern_color"] = $pattern_color;
		$this->load->view("custom/ajax_material_color",$data);
	}
	
	public function load_part_admin(){
		$part  = $_SESSION["design_part"];
		$data["part"] = $part;
		$this->load->view("custom/ajax_part",$data);
	}
	
	public function load_generate_result_admin(){
		$custom = $_SESSION["design"];
		$data["custom"] = $custom;
		$this->load->view("custom/ajax_generate_result",$data);
	}
	
	public function load_price_result_admin(){
		$custom = $_SESSION["design"];
		$data["custom"] = $custom;
		$this->load->view("custom/ajax_price_result",$data);
	}
	
	public function save_design(){
		$username = $this->session->userdata("admin");
		$custom = $_SESSION["design"];
		$collection_name = $this->input->post("collection_name");
		$collection_description = $this->input->post("collection_description");
		$shoe_id = $this->input->post("shoe_id");
		$image = $this->input->post("image_result");
		
		$this->load->model("collection_model","",TRUE);
		
		//generate name file
		$collection_path = $username."_".$collection_name.".png";
		
		//Get the base-64 string from data
		$filteredData=substr($image, strpos($image, ",")+1);
 
		//Decode the string
		$unencodedData=base64_decode($filteredData);
		
		$collection_price = 0;
		foreach($custom as $key_part_type_group => $val_part_type){
			foreach($val_part_type as $key_part_type => $val_part){
				foreach($val_part as $key_part => $pattern_color){ 
					$temp = explode("|+|",$pattern_color);
					$price = $temp[1];
					$collection_price += $price;
				}
			}
		}
		
		//Save the image
		file_put_contents('./uploads/collection/'.$collection_path, $unencodedData);
		$this->collection_model->add($shoe_id, $collection_path, $collection_name, $collection_description, $username, $collection_price);
		$collection_id = $this->collection_model->max();
		
		foreach($custom as $key_part_type_group => $val_part_type){
			foreach($val_part_type as $key_part_type => $val_part){
				foreach($val_part as $key_part => $pattern_color){ 
					$temp = explode("|+|",$pattern_color);
					$pattern_color_id = $temp[0];
			
					$this->collection_model->add_detail($collection_id,  $key_part_type_group, $key_part_type, $key_part, $pattern_color_id);
				}
			}
		}
		
		/*
		$config["upload_path"] = "";
		$config["allowed_types"] = "gif|jpg|png";
		
		$this->load->library("upload",$config);
		
		if(! $this->upload->do_upload("photo"))
		{
			$this->upload->display_errors();
		}
		else
		{
			$upload_data = $this->upload->data();
			$collection_path = $upload_data["file_name"];
			
			
		}*/
	}
	
	public function add_to_bag_collection(){
		$collection_id = $this->input->post("collection_id");
		$this->load->model("collection_model","",TRUE);
		$this->load->model("pattern_color_model","",TRUE);
		$this->load->model("part_model","",TRUE);
		$collection_part = array();
		$collection_pattern_color = array();
		$collection = $this->collection_model->select_detail($collection_id);
		
		foreach($collection->result() as $row){
			$part = $this->part_model->select_by_id($row->part_id);
			foreach($part->result() as $row_part){
				$temp_part[$row->part_id] = $row_part->part_name;
			}
		
			$pattern_color = $this->pattern_color_model->select_by_id($row->pattern_color_id);
			foreach($pattern_color->result() as $row_pattern_color){
					$custom[$row->part_type_group_id][$row->part_type_id][$row->part_id] = $row_pattern_color->pattern_color_id."|+|".$row_pattern_color->pattern_color_price."|+|".$row_pattern_color->pattern_color_path;
			}	
		}
		if(isset($_SESSION["cart"]) && isset($_SESSION["size"]) && $_SESSION["shoe"]){
			$cart = $_SESSION["cart"];
			$size = $_SESSION["size"];
			$shoe = $_SESSION["shoe"];
		}
		else{
			$cart = array();
			$size = array();
			$shoe = array();
		}
		$cart[] = $custom;
		$size[] = $this->input->post("size");
		$shoe[] = $this->input->post("shoe");
		
		$_SESSION["cart"] = $cart;
		$_SESSION["size"] = $size;
		$_SESSION["shoe"] = $shoe;
		redirect("welcome/inspireme");
	}
	
	public function confirmation(){
		$order_number = $this->input->post("order_number");
		$this->load->view("custom/confirmation");	
	}
	
	public function confirmation_process(){
		$order_number = $this->input->post("order_number");
		$this->load->model("transaction_model","",TRUE);
		$temp = $this->transaction_model->select_by_order_number( $order_number);
		$transaction = $temp->result();
		$message = "Sorry, Your order not found. Please check again your order number";
		
		if(count($transaction) > 0){
			$config["upload_path"] = "./uploads/confirmation/";
			$config["allowed_types"] = "gif|jpg|png";
			$config["file_name"] = $order_number;
			
			$this->load->library("upload",$config);
			
			if(! $this->upload->do_upload("confirmation_path"))
			{
				$this->upload->display_errors();
				$message = "Sorry, Your order not found. Please check again your order number";
			}
			else
			{
				$upload_data = $this->upload->data();
				$confirmation_path = $upload_data["file_name"];
				$this->load->model("other_model","",TRUE);
				$this->other_model->add_confirmation($order_number, $confirmation_path);
				$message = "Thank you about your confirmation. Your Order is being processed.";
			}
		}
		$data["message"] = $message;
		$this->load->view("custom/thank_confirmation", $data);
	}
}

/* End of file custom.php */
/* Location: ./application/controllers/custom.php */