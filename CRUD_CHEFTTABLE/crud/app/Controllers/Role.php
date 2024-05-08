<?php
namespace App\Controllers;

use App\Models\RoleModel;
use CodeIgniter\Controller;

class Role extends Controller{
  // method show profiles list
  public function index(){
	$RoleModel = new RoleModel();
	$data['roles'] = $RoleModel->orderBy('Roles_id', 'DESC')->findAll();
	return view('roles_view', $data);
  }

//   // method add profile form
//   public function create(){
// 	return view('add_profile');
//   }

//   // method insert data 
//   public function store(){
// 	$ProfileModel = new ProfileModel();
// 	$data = [
// 		'email' => $this->request->getVar('Profile_email'),
// 		'photo' => $this->request->getVar('Profile_photo'),
// 		'name' => $this->request->getVar('Profile_name'),
// 	];
// 	$ProfileModel->insert($data);
// 	return $this->response->redirect(site_url('/profiles-list'));

//   }

//   //method show single profile
//   public function singleProfile($id = null){
// 	$ProfileModel = new ProfileModel();
// 	$data['profile_obj'] = $ProfileModel->where('Profile_id', $id)->first();
// 	return view('edit_view', $data);

//   }

//   //method update profile data
//   public function update(){

// 	$ProfileModel = new ProfileModel();
// 	$id= $this->request->getVar('Profile_id');
// 	$data=[
// 		'email' => $this->request->getVar('Profile_email'),
// 		'photo' => $this->request->getVar('Profile_photo'),
// 		'name' => $this->request->getVar('Profile_name'),
// 	];
// 	$ProfileModel->update($id,$data);
// 	return $this->response->redirect(site_url('/profiles-list'));
	

//   }

 //method delete profile
  public function delete($id = null){
	$RoleModel = new RoleModel();
	$RoleModel->where('Roles_id', $id)->delete();
    return $this->response->redirect(site_url('/roles-list'));
  }


}


?>