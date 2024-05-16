<?php
//Is file namespace
namespace App\Controllers;
//These are the class thata will be used in this controller
use App\Models\ModuleModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

//This is the users state class
class Module extends Controller
{
	//Vriable declarations.
	private $primaryKey;
	private $ModuleModel;
	private $data;
	private $model;
	//This method is the constructor
	public function __construct()
	{
		$this->primaryKey = "Modules_id";
		$this->ModuleModel = new ModuleModel();
		$this->data = [];
		$this->model = "modules";
	}
	//This method is the index, Started the view, set parameters for send the data in the view of the html render
	public function index()
	{
		$this->data['title'] = "MODULES";
		$this->data[$this->model] = $this->ModuleModel->orderBy($this->primaryKey, 'ASC')->findAll();
		$this->data['modulesParent'] = $this->ModuleModel->where('Modules_submodule', 0)->findAll();
		return view('module/modules_view', $this->data);
	}
	//This method consists of creating, obtains the data from the POST method, return Json 
	public function create()
	{
		if ($this->request->isAJAX()) {
			$dataModel = $this->getDataModel();
			//Query Insert Codeigniter
			if ($this->ModuleModel->insert($dataModel)) {
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
		//Change array to Json 
		echo json_encode($dataModel);
	}
	//This method consist of single User Status, obtains id the data from the GET method, return Json
	public function singleModule($id = null)
	{
		//Validate is ajax 
		if ($this->request->isAJAX()) {
			//Select user status model	

			if ($data[$this->model] = $this->ModuleModel->where($this->primaryKey, $id)->first()) {
				$data['message'] = 'success';
				$data['response'] = ResponseInterface::HTTP_OK;
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
		//Change array to Json 
		echo json_encode($data);
	}
	//This method consists of update status, obatains id the data from the POST method, return Json 
	public function update()
	{
		//validate is ajax
		if ($this->request->isAJAX()) {
			$today = date("Y-m-d  H:i:s");
			$id = $this->request->getVar($this->primaryKey);
			$dataModel = [
				'Modules_name' => $this->request->getVar('Modules_name'),
				'Modules_description' => $this->request->getVar('Modules_description'),
				'Modules_route' => $this->request->getVar('Modules_route'),
				'Modules_icon' => $this->request->getVar('Modules_icon'),
				'Modules_submodule' => $this->request->getVar('Modules_submodule'),
				'Modules_parent_module' => $this->request->getVar('Modules_parent_module'),
				'update_at' => $today

			];
			//Update Data Model
			if ($this->ModuleModel->update($id, $dataModel)) {
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
		echo json_encode($dataModel);
	}
	//this method consist of delete status, obtains id the data from the GET method, return Json
	public function delete($id = null)
	{
		try {
			//delete data model
			if ($this->ModuleModel->where($this->primaryKey, $id)->delete($id)) {
				$data['message'] = 'success';
				$data['response'] = ResponseInterface::HTTP_OK;
				$data['data'] = "OK";
				$data['csrf'] = csrf_hash();
			} else {
				$data['message'] = 'Error create user';
				$data['response'] = ResponseInterface::HTTP_NO_CONTENT;
				$data['data'] = '';
			}
		} catch (\Exception $e) {
			$data['message'] = $e;
			$data['response'] = ResponseInterface::HTTP_CONFLICT;
			$data['data'] = '';
		}
		// Change array to Json
		echo json_encode($data);
	}
	// This method consists of create is model the data in the array associative, return array
	public function getDataModel()
	{
		$data = [
			'Modules_id' => $this->request->getVar('Modules_id'),
			'Modules_name' => $this->request->getVar('Modules_name'),
			'Modules_description' => $this->request->getVar('Modules_description'),
			'Modules_route' => $this->request->getVar('Modules_route'),
			'Modules_icon' => $this->request->getVar('Modules_icon'),
			'Modules_submodule' => $this->request->getVar('Modules_submodule'),
			'Modules_parent_module' => $this->request->getVar('Modules_parent_module'),
			'update_at' => $this->request->getVar('update_at'),
		];
		return $data;
	}
}
