<?php

namespace App\Controllers;
use App\Models\Common_model;

class Developer extends BaseController
{
    
    public function __construct()
    {
         $model = new Common_model(); 
         $this->Common_model = $model;
         $user_id = session()->get('user_id');
    }

    public function index()
    {
        echo $user_id = session()->get('user_id'); die;
        $data['title'] = 'Dashboard';
        return view('admin/dashboard',$data);
    }

   

    public function projectList()
    {
        $result         = $this->Common_model->getData('vf_projects')->orderBy('project_id','DESC')->get()->getresult();
        $data['result'] = $result;
        $data['title'] = 'Project List'; 
        return view('admin/projectManagement/projectList',$data);
    }
    
    public function viewProfile()
    {
        $user_id        = session()->get('user_id');
        $whereData      =  array('user_id'=>$user_id);
        $result         = $this->Common_model->getData('vf_users')->where($whereData)->get()->getRow();
        $data['result'] = $result;
        $data['title']  = 'View Profile';
        return view('admin/userManagement/updateProfile',$data);
    }
    public function updateProfile()
    {
        $user_id         = session()->get('user_id');
        $gender          = $this->request->getPost('gender'); 
        $name            = $this->request->getPost('name');
        $phone_no        = $this->request->getPost('phone_no'); 
        $address         = $this->request->getPost('address'); 
        if(!empty($_FILES["profile_image"]["tmp_name"])){
          $uploads_dir2  = './public/upload/profile_image';
          $tmp_name2     = $_FILES["profile_image"]["tmp_name"];
          $temp2         = explode(".", $_FILES["profile_image"]["name"]);
          $profile_image = 'VF'.time().'.'.end($temp2);
          move_uploaded_file($tmp_name2, "$uploads_dir2/$profile_image");
        }else{
            $profile_image = $this->request->getPost('profile_pic_old'); 
        }
        $data =  array('gender'=>$gender,'name'=>$name,'phone_no'=>$phone_no,'profile_pic'=>$profile_image,'address'=>$address);
        $this->Common_model->updateData('vf_users',array('user_id' =>$user_id),$data);
        session()->setFlashdata("msg", "Your profile has been successfully updated");
        return redirect()->to(base_url('Admin/viewProfile')); 
    }
    
}
