<?php

namespace App\Controllers;
use App\Models\Common_model;
class Home extends BaseController
{
     
    public function __construct()
    {
        $model = new Common_model(); 
        $this->Common_model = $model;

    }
    public function logout()
    {
        session()->destroy(); 
        return redirect()->to(base_url('/')); 
    }

    public function login()
    {
        $user_id = session()->get('user_id'); 
        if($user_id == ''){
            $data['title']   = 'Product Login :: Login';
            return view('template_login',$data);
        }else{
            return redirect()->to(base_url('Admin'));   
        }
    }

    public function checkDetails()
    {
        $email  = $this->request->getPost('email'); 
        $password  = $this->request->getPost('password'); 
        $whereData = array('email'=>$email,'password'=>$password);
        $result    = $this->Common_model->getData('ida_user')->where($whereData)->get();
        $num_row   = $result->getNumRows(); 
        if($num_row == '0'){
             session()->setFlashdata("msg", "Invalid email or password");
             return redirect()->to(base_url('/')); 
        }else{ 
           $user_data =  $result->getRow(); 
           $status = $user_data->status;
           $email_verified = $user_data->email_verified;
           if($status == '2'){
                session()->setFlashdata("msg", "Your Account has been deactivate by admin");
               return redirect()->to(base_url('/')); 
           }
           if($email_verified == '0'){
                session()->setFlashdata("msg", "Your email has been not verified . Please verify your email.");
               return redirect()->to(base_url('/')); 
           }
           
           $sess_data1['user_id']      = $user_data->user_id;
           $sess_data1['user_type_id'] = $user_data->user_type_id; 


           session()->set($sess_data1); 
           if($user_data->user_type_id == '1'){
             return redirect()->to(base_url('Admin')); 
           }else if($user_data->user_type_id == '5'){
             return redirect()->to(base_url('Developer')); 
           }
        }
    }
    public function checkEmail()
    {
        $email  = $this->request->getPost('email'); 
        $whereData = array('email'=>$email);
        $result    = $this->Common_model->getData('ida_user')->where($whereData);
        $num_row = $result->countAllResults(); 
        if($num_row == '0'){
           $result = array('msg' =>'unique');
        }else{ 
           $result = array('msg' =>'used'); 
        }
        echo json_encode($result); die;
    }

    public function getCityListByStateID()
    {
        $state_id  = $this->request->getPost('state_id'); 
        $whereData = array('state_id'=>$state_id);
        $result    = $this->Common_model->getData('ida_cities')->where($whereData)->get()->getResult();
        $htmls     = '';
        $htmls     .= '<option value="">select City</option>';
        foreach ($result as $value) {
            $htmls     .= '<option value="'.$value->id.'">'.$value->name.'</option>';            
        }
        $reslut =  array('htmls'=>$htmls); 
        echo json_encode($reslut); die;    
    }

    public function getStateBycountryID()
    {
        $country_id  = $this->request->getPost('country_id'); 
        $whereData = array('country_id'=>$country_id);
        $result    = $this->Common_model->getData('ida_states')->where($whereData)->get()->getResult();
        $htmls     = '';
        $htmls     .= '<option value="">select state</option>';
        foreach ($result as $value) {
            $htmls     .= '<option value="'.$value->id.'">'.$value->name.'</option>';            
        }
        
        $reslut =  array('state_htmls' =>$htmls);
        echo json_encode($reslut); die;    
    }
    public function register()
     {
        $data['title'] = 'Register';
        return view('template_register',$data);  
     }  
    public function registrationProcess()
     {
        $user_type_id = '1'; 
        $n_email        = $this->request->getPost('email');   
        $password     = $this->request->getPost('password'); 
        $name         = $this->request->getPost('first_name');
        
        $info1= array('user_type_id'=>$user_type_id,'email'=>$n_email,'password'=>$password,'status'=>'1','email_verified'=>'0');
        $user_id = $this->Common_model->saveData('ida_user',$info1);    
        $user_unique_id = 'IDEA0'.$user_id;
        $_token = md5($user_id).time();
        $this->Common_model->updateData('ida_user',array('user_id' =>$user_id),array('user_unique_id'=>$user_unique_id,'_token'=>$_token));
       $designation  = 'Ceo';
        $info2 = array('user_id'=>$user_id,'designation'=>$designation,'first_name'=>$name,'last_name'=>''); 
        $user_info_id = $this->Common_model->saveData('ida_user_info',$info2);   
        // echo  $this->Common_model->getLastQuery(); die;

        // Email Process
           $email_data['token']   = $_token;
           $email_data['name']   = $name;
           $message = view('email_template/confirm_registration',$email_data);
           $email = \Config\Services::email();
           $email->setFrom('contactus@ideatosteer.com', 'Idea To Steer');
           $email->setTo($n_email);
           $email->setSubject('Confirm Registration');
           $email->setMessage($message);//your message here
           $email->send();
           $email->printDebugger(['headers']);
        session()->setFlashdata("msg", "Contact details has been successfully added");
        return redirect()->to(base_url('Home/registrationComplete')); 
     }
    public function registrationComplete()
     {
        $data['title'] = 'Registration Complete';
        return view('registrationComplete',$data);  
     } 
     public function emailVerified($token=0)
     {
       $this->Common_model->updateData('ida_user',array('_token'=>$token),array('_token'=>'','email_verified'=>'1'));
       session()->setFlashdata("msg", "Registration has been successfully completed");
       return redirect()->to(base_url('/')); 
     }
     // Change Password
     public function resetPassword()
     {
       $data['title'] = 'Reset Password';
       return view('template_reset',$data);  
     }   
     public function resetPasswordProcess()
     {
        $n_email = $this->request->getPost('email');    
        $_token = md5($n_email).time();
        $this->Common_model->updateData('ida_user',array('email'=>$n_email),array('_token'=>$_token));

        // Email Process
           $email_data['token']   = $_token;
           $message = view('email_template/change_password',$email_data);
           $email = \Config\Services::email();
           $email->setFrom('contactus@ideatosteer.com', 'Idea To Steer');
           $email->setTo($n_email);
           $email->setSubject('Reset password link');
           $email->setMessage($message);//your message here
           $email->send();
           $email->printDebugger(['headers']);

        session()->setFlashdata("msg", "Registration has been successfully completed");
        return redirect()->to(base_url('Home/sentResetLink')); 
     } 
     public function sentResetLink()
     {
        $data['title'] = 'Sent Reset Link';
       return view('resetPassword',$data);  
     } 
     public function changePassword($token=0)
     {
        $result = $this->Common_model->getData('ida_user')->where(array('_token' =>$token))->get()->getRow();
        $data['result'] = $result;
        $data['title'] = 'Change Password';
        return view('template_changePassword',$data);  
     } 
     public function changePasswordProcess()
     {
        $new_password = $this->request->getPost('new_password');    
        $user_id = $this->request->getPost('user_id');    
        $this->Common_model->updateData('ida_user',array('user_id'=>$user_id),array('password'=>$new_password,'_token'=>''));
        session()->setFlashdata("msg", "Your password has been successfully changed");
        return redirect()->to(base_url('/')); 
     }
     public function headerCustomSearch()
     {
        $c_user_id = session()->get('user_id'); 
        $keyValue = $this->request->getPost('keyValue');   
        $result_info = $this->Common_model->getData('ida_user_info')->join('ida_user', 'ida_user_info.user_id = ida_user.user_id', 'left')->where(array('ida_user.create_by'=>$c_user_id))->like('ida_user_info.first_name', $keyValue, 'before')->orLike('ida_user_info.last_name', $keyValue, 'before')->get();

        $result = $result_info->getResult();
        $num_rows = $result_info->getNumRows(); 
        
        $user_name = '';
        $user_type =  array('1' =>'Admin','2' =>'Employee','3' =>'Contractor','4' =>'Client');
        if($num_rows == '0'){
                $user_name .= '<li><a href="#">Result not found</a></li>';
        }else{
            foreach ($result as $value){
                  if($value->user_type_id == '2'){
                    $c_url = base_url('Admin/viewEmployeeFinancialDetails/'.$value->user_id);
                  }else if($value->user_type_id == '4'){
                    $c_url = base_url('Admin/viewClientFinancialDetails/'.$value->user_id); 
                  }else if($value->user_type_id == '3'){
                    $c_url = base_url('Admin/viewContractorFinancialDetails/'.$value->user_id); 
                  }else if($value->user_type_id == '1'){
                    $c_url = base_url('Admin/invoiceDetails'); 
                  }  
                  $user_name .= '<li><a href="'.$c_url.'">'.$value->first_name.' '.$value->last_name.' ('.$user_type[$value->user_type_id].')</a></li>';
             } 
        }
        $responce =  array('htmls' =>$user_name); 
        echo json_encode($responce); die;
     }
     
}
