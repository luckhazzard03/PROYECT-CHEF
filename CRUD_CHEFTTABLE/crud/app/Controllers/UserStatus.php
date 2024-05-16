<?php

namespace App\Controllers;

use App\Models\UserStatusModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;


class UserStatus extends Controller
{
	//Variable declarations.
	private $primaryKey;
	private $StatusModel;
	private $data;
	private $model;
	//This method is teh constructor
	public function __construct()
	{
		$this->primaryKey = "User_status_id";
		$this->StatusModel = new UserStatusModel();
		$this->data = [];
		$this->model = "userStatus";
	}
	//this method is index, Started the view, set parameters for send the data in the view of the html render
	public function index()
	{
		$this->data['title'] = "USER STATUS";
		//get Data App\Models\UserStatusModel
		$this->data[$this->model] = $this->StatusModel->orderBy($this->primaryKey, 'ASC')->findAll();
		return view('userStatus/status_view', $this->data);
	}
	//this method consists of creating, obtains the data from the POST method, return Json
	public function create()
	{
		if ($this->request->isAJAX()) {
			$dataModel = $this->getDataModel();
			//Query Insert Codeigniter
			if ($this->StatusModel->insert($dataModel)) {
				$data['message'] = 'success';
				$data['response'] = ResponseInterface::HTTP_OK;
				$data['data'] = $dataModel;
				$data['csrf'] = csrf_hash();
			} else {
				$data['message'] = 'Error create user';
				$data['response'] = ResponseInterface::HTTP_NO_CONTENT;
				$data['data'] = '';
			}
		} else {
			$data['message'] = 'Error Ajax';
			$data['response'] = ResponseInterface::HTTP_CONFLICT;
			$data['data'] = '';
		}
		// Change array to Json
		echo json_encode($data);
	}
	//This method consist of single User Status, obtains id the data from the GET method, return Json
	public function singleUserStatus($id = null)
	{
		if ($this->request->isAJAX()){
			//Validate is ajax
		if ($data[$this->model] = $this->StatusModel->where($this->primaryKey, $id)->first()) {
			$data['message'] = 'success';
			$data['response'] = ResponseInterface::HTTP_OK;
			$data['csrf'] = csrf_hash();
		} else {
			$data['message'] = 'Error create user';
			$data['response'] = ResponseInterface::HTTP_NO_CONTENT;
			$data['data'] = '';
		}

		}else {
			$data['message'] = 'Error Ajax';
			$data['response'] = ResponseInterface::HTTP_CONFLICT;
			$data['data'] = '';
		}
		// Change array to Json
	echo json_encode($data);
		
	}
	
	//This method consists of update status, obtains id the data from the POST method, return Json
	public function update(){
		//validate is ajax
		if ($this->request->isAJAX()){
			$today = date("Y-m-d  H:i:s");
			$id = $this->request->getVar($this->primaryKey);
			$dataModel = [
				'User_status_name' => $this->request->getVar('User_status_name'),
				'User_status_description' => $this->request->getVar('User_status_description'),
				'update_at' => $today

			];
			//Update Data Model
			if ($this->StatusModel->update($id, $dataModel)) {
				$data['message'] = 'success';
				$data['response'] = ResponseInterface::HTTP_OK;
				$data['data'] = $dataModel;
				$data['csrf'] = csrf_hash();
			} else {
				$data['message'] = 'Error create user';
				$data['response'] = ResponseInterface::HTTP_NO_CONTENT;
				$data['data'] = '';
			}
		}else {
			$data['message'] = 'Error Ajax';
			$data['response'] = ResponseInterface::HTTP_CONFLICT;
			$data['data'] = '';
		}
		// Change array to Json
	echo json_encode($data);
	}
	//this method consist of delete status, obtains id the data from the GET method, return Json
	 public function delete($id = null){
		try{
			//delete data model
			if ($this->StatusModel->where($this->primaryKey, $id)->delete($id)){
				$data['message'] = 'success';
				$data['response'] = ResponseInterface::HTTP_OK;
				$data['data'] = "OK";
				$data['csrf'] = csrf_hash();
			}else {
				$data['message'] = 'Error create user';
				$data['response'] = ResponseInterface::HTTP_NO_CONTENT;
				$data['data'] = '';
			}
		}catch(\Exception $e){
			$data['message'] = 'Error Ajax';
			$data['response'] = ResponseInterface::HTTP_CONFLICT;
			$data['data'] = '';
		}
			// Change array to Json
	    echo json_encode($data);
	 }
	 // This method consists of create is model the data in the array associative, return array
	 public function getDataModel(){
		$data = [
			'User_status_id' => $this->request->getVar('User_status_id'),
			'User_status_name' => $this->request->getVar('User_status_name'),
			'User_status_description' => $this->request->getVar('User_status_description'),
			'update_at' =>  $this->request->getVar('update_at')

		];
		return $data;
	 }
}
