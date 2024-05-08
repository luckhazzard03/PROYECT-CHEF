<?php
namespace App\Controllers;

use App\Models\ProfileModel;
use CodeIgniter\Controller;

class Profile extends Controller{
  // method show profiles list
  public function index(){
	$ProfileModel = new ProfileModel();
	$data['profiles'] = $ProfileModel->orderBy('Profile_id', 'DESC')->findAll();
	return view('profile_view', $data);
  }

  // method add profile form
  public function create(){
	return view('add_profile');
  }

  // method insert data 
  public function store(){
	$ProfileModel = new ProfileModel();
	$data = [
		'email' => $this->request->getVar('Profile_email'),
		'photo' => $this->request->getVar('Profile_photo'),
		'name' => $this->request->getVar('Profile_name'),
	];
	$ProfileModel->insert($data);
	return $this->response->redirect(site_url('/profiles-list'));

  }

  //method show single profile
  public function singleProfile($id = null){
	$ProfileModel = new ProfileModel();
	$data['profile_obj'] = $ProfileModel->where('Profile_id', $id)->first();
	return view('edit_view', $data);

  }

  //method update profile data
  public function update(){

	$ProfileModel = new ProfileModel();
	$id= $this->request->getVar('Profile_id');
	$data=[
		'email' => $this->request->getVar('Profile_email'),
		'photo' => $this->request->getVar('Profile_photo'),
		'name' => $this->request->getVar('Profile_name'),
	];
	$ProfileModel->update($id,$data);
	return $this->response->redirect(site_url('/profiles-list'));
	

  }

  //method delete profile
  public function delete($id = null){
	$ProfileModel = new ProfileModel();
	$ProfileModel->where('Profile_id', $id)->delete();
    return $this->response->redirect(site_url('/profiles-list'));
  }


}


?>