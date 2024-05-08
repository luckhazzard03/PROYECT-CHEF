<?php
namespace App\Controllers;
use App\Models\UserStatusModel;
use CodeIgniter\Controller;


class UserStatus extends Controller{

	private $primaryKey; 
	private $StatusModel; 
	private $data; 
	private $model; 

	public function __construct(){
		$this->primaryKey="User_status_id";
		$this->StatusModel=new UserStatusModel();
		$this->data=[];
		$this->model="userStatus";
	}

	public function index(){
		$this->data['title']="USER STATUS";
		$this->data[$this->model]=$this->StatusModel->orderBy($this->primaryKey, 'ASC')->findAll();
		return view('userStatus/status_view' , $this->data);
	}
}
?>