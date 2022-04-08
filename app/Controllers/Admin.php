<?php

namespace App\Controllers;
use App\Models\Common_model;

class Admin extends BaseController
{
    
    public function __construct()
    {
         $model = new Common_model(); 
         $this->Common_model = $model;
         $user_id = session()->get('user_id');
    }

    public function index()
    {
        $user_id        = session()->get('user_id');
        $data['total_employee']   = $this->Common_model->getData('ida_user')->where(array('user_type_id' =>'2','create_by' =>$user_id))->get()->getNumRows();
        $data['total_contractor'] = $this->Common_model->getData('ida_user')->where(array('user_type_id' =>'3','create_by' =>$user_id))->get()->getNumRows(); 
        $data['total_client']     = $this->Common_model->getData('ida_user')->where(array('user_type_id' =>'4','create_by' =>$user_id))->get()->getNumRows();  
        $data['total_project']    = $this->Common_model->getData('ida_project_list')->where(array('create_by' =>$user_id))->get()->getNumRows();   

        // Yearly
        $year = date("Y"); 
        $received =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('invoice_for'=>'Received','create_by'=>$user_id,'YEAR(add_date)'=>$year))->get()->getRow();
        $paid =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('invoice_for'=>'Paid','create_by'=>$user_id,'YEAR(add_date)'=>$year))->get()->getRow();
        $Profit = $received->total_received - $paid->total_paid;
        $barchart_material_yearly =  array();
        $bmy_title  = array('Year','Sales','Expenses','Profit');
        $bmy_info  = array($year,round($received->total_received),round($paid->total_paid),round($Profit));
        array_push($barchart_material_yearly, $bmy_title);
        array_push($barchart_material_yearly, $bmy_info);
        $data['barchart_material_yearly'] = $barchart_material_yearly;   
        
        // Monthly
        $barchart_material_monthly =  array();
        $bmm_title  = array('Month','Sales','Expenses','Profit');
        array_push($barchart_material_monthly, $bmm_title);
        // 1
        $m_1 =  date('m', strtotime('-1 month'));
        $mm_1 =  date('M', strtotime('-1 month'));
        $received_m1 =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('invoice_for'=>'Received','create_by'=>$user_id,'MONTH(add_date)'=>$m_1))->get()->getRow();
        $paid_m1 =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('invoice_for'=>'Paid','create_by'=>$user_id,'MONTH(add_date)'=>$m_1))->get()->getRow();
        $Profit_m1 = $received_m1->total_received - $paid_m1->total_paid;
        $bmm_info_m1  = array($mm_1,round($received_m1->total_received),round($paid_m1->total_paid),round($Profit_m1));
        array_push($barchart_material_monthly, $bmm_info_m1);
        // 2
        $m_2 = date('m', strtotime('-2 month'));
        $mm_2 = date('M', strtotime('-2 month'));
        $received_m2 =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('invoice_for'=>'Received','create_by'=>$user_id,'MONTH(add_date)'=>$m_2))->get()->getRow();
        $paid_m2 =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('invoice_for'=>'Paid','create_by'=>$user_id,'MONTH(add_date)'=>$m_2))->get()->getRow();
        $Profit_m2 = $received_m1->total_received - $paid_m2->total_paid;
        $bmm_info_m2  = array($mm_2,round($received_m2->total_received),round($paid_m2->total_paid),round($Profit_m2));
        array_push($barchart_material_monthly, $bmm_info_m2);
        // 3
        $m_3 = date('m', strtotime('-3 month'));
        $mm_3 = date('M', strtotime('-3 month'));
        $received_m3 =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('invoice_for'=>'Received','create_by'=>$user_id,'MONTH(add_date)'=>$m_3))->get()->getRow();
        $paid_m3      =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('invoice_for'=>'Paid','create_by'=>$user_id,'MONTH(add_date)'=>$m_3))->get()->getRow();
        $Profit_m3    = $received_m3->total_received - $paid_m3->total_paid;
        $bmm_info_m3  = array($mm_3,round($received_m3->total_received),round($paid_m3->total_paid),round($Profit_m3));
        array_push($barchart_material_monthly, $bmm_info_m3);
        $data['barchart_material_monthly'] = $barchart_material_monthly;
        //Weekly 
        $d_7 = date('D', strtotime('-1 day'));
        $d_6 = date('D', strtotime('-2 day'));
        $d_5 = date('D', strtotime('-3 day'));
        $d_4 = date('D', strtotime('-4 day'));
        $d_3 = date('D', strtotime('-5 day'));
        $d_2 = date('D', strtotime('-6 day'));
        
        $barchart_material_weekly =  array();
        $bmw_title  = array('Weekly','Sales','Expenses','Profit'); 
        array_push($barchart_material_weekly, $bmw_title);
        // 1
        $d_1 = date('d', strtotime('-6 day'));
        $dd_1 = date('D', strtotime('-6 day'));
        $received_d1 =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('invoice_for'=>'Received','create_by'=>$user_id,'DAY(add_date)'=>$d_1))->get()->getRow();
        $paid_d1      =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('invoice_for'=>'Paid','create_by'=>$user_id,'DAY(add_date)'=>$d_1))->get()->getRow();
        $Profit_d1    = $received_d1->total_received - $paid_d1->total_paid;
        $bmd_info_d1  = array($dd_1,round($received_d1->total_received),round($paid_d1->total_paid),round($Profit_d1));
        array_push($barchart_material_weekly, $bmd_info_d1);

        // 2
        $d_2 = date('d', strtotime('-5 day'));
        $dd_2 = date('D', strtotime('-5 day'));
        $received_d2 =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('invoice_for'=>'Received','create_by'=>$user_id,'DAY(add_date)'=>$d_2))->get()->getRow();
        $paid_d2      =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('invoice_for'=>'Paid','create_by'=>$user_id,'DAY(add_date)'=>$d_2))->get()->getRow();
        $Profit_d2    = $received_d2->total_received - $paid_d2->total_paid;
        $bmd_info_d2  = array($dd_2,round($received_d2->total_received),round($paid_d2->total_paid),round($Profit_d2));
        array_push($barchart_material_weekly, $bmd_info_d2);

        // 3
        $d_3 = date('d', strtotime('-4 day'));
        $dd_3 = date('D', strtotime('-4 day'));
        $received_d3 =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('invoice_for'=>'Received','create_by'=>$user_id,'DAY(add_date)'=>$d_3))->get()->getRow();
        $paid_d3      =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('invoice_for'=>'Paid','create_by'=>$user_id,'DAY(add_date)'=>$d_3))->get()->getRow();
        $Profit_d3    = $received_d3->total_received - $paid_d3->total_paid;
        $bmd_info_d3  = array($dd_3,round($received_d3->total_received),round($paid_d3->total_paid),round($Profit_d3));
        array_push($barchart_material_weekly, $bmd_info_d3);

        // 4
        $d_4 = date('d', strtotime('-3 day'));
        $dd_4 = date('D', strtotime('-3 day'));
        $received_d4 =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('invoice_for'=>'Received','create_by'=>$user_id,'DAY(add_date)'=>$d_4))->get()->getRow();
        $paid_d4      =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('invoice_for'=>'Paid','create_by'=>$user_id,'DAY(add_date)'=>$d_4))->get()->getRow();
        $Profit_d4    = $received_d4->total_received - $paid_d4->total_paid;
        $bmd_info_d4  = array($dd_4,round($received_d4->total_received),round($paid_d4->total_paid),round($Profit_d4));
        array_push($barchart_material_weekly, $bmd_info_d4);

        // 5
        $d_5 = date('d', strtotime('-2 day'));
        $dd_5 = date('D', strtotime('-2 day'));
        $received_d5 =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('invoice_for'=>'Received','create_by'=>$user_id,'DAY(add_date)'=>$d_5))->get()->getRow();
        $paid_d5      =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('invoice_for'=>'Paid','create_by'=>$user_id,'DAY(add_date)'=>$d_5))->get()->getRow();
        $Profit_d5    = $received_d5->total_received - $paid_d5->total_paid;
        $bmd_info_d5  = array($dd_5,round($received_d5->total_received),round($paid_d5->total_paid),round($Profit_d5));
        array_push($barchart_material_weekly, $bmd_info_d5);

        // 6
        $d_6 = date('d', strtotime('-1 day'));
        $dd_6 = date('D', strtotime('-1 day'));
        $received_d6 =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('invoice_for'=>'Received','create_by'=>$user_id,'DAY(add_date)'=>$d_6))->get()->getRow();
        $paid_d6      =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('invoice_for'=>'Paid','create_by'=>$user_id,'DAY(add_date)'=>$d_6))->get()->getRow();
        $Profit_d6    = $received_d6->total_received - $paid_d6->total_paid;
        $bmd_info_d6  = array($dd_6,round($received_d6->total_received),round($paid_d6->total_paid),round($Profit_d6));
        array_push($barchart_material_weekly, $bmd_info_d6);

        // 7
        $d_7 = date('d', strtotime('0 day'));
        $dd_7 = date('D', strtotime('0 day'));
        $received_d7 =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('invoice_for'=>'Received','create_by'=>$user_id,'DAY(add_date)'=>$d_7))->get()->getRow();
        $paid_d7      =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('invoice_for'=>'Paid','create_by'=>$user_id,'DAY(add_date)'=>$d_7))->get()->getRow();
        $Profit_d7    = $received_d7->total_received - $paid_d7->total_paid;
        $bmd_info_d7  = array($dd_7,round($received_d7->total_received),round($paid_d7->total_paid),round($Profit_d7));
        array_push($barchart_material_weekly, $bmd_info_d7);
        $data['barchart_material_weekly'] = $barchart_material_weekly;
       

        $data['title'] = 'Dashboard';
        return view('admin/dashboard',$data);
    }
    // Setting
    public function viewProfile()
    {
        $user_id        = session()->get('user_id');
        $whereData      = array('user_id'=>$user_id);
        $result         = $this->Common_model->getData('ida_user')->where($whereData)->get()->getRow();
        $data['result'] = $result;

        $user_info         = $this->Common_model->getData('ida_user_info')->where($whereData)->get()->getRow();
        $data['user_info'] = $user_info;

        // $city_list         = $this->Common_model->getData('ida_cities')->get()->getResult();
        // $data['city_list'] = $city_list;

        $state_list         = $this->Common_model->getData('ida_states')->get()->getResult();
        $data['state_list']  = $state_list;

        $country_list         = $this->Common_model->getData('ida_countries')->get()->getResult();
        $data['country_list']  = $country_list;


        $user_card_list         = $this->Common_model->getData('ida_user_card_details')->where(array('user_id'=>$user_id))->orderBy('card_details_id', 'DESC')->get()->getResult();
        $data['user_card_list'] = $user_card_list;


         
        $data['title']  = 'View Profile';
        return view('admin/setting/view_profile',$data);
    } 
    public function updateProfile()
    {
        $user_info_id    = $this->request->getPost('user_info_id');
        $first_name    = $this->request->getPost('first_name');
        $middle_name   = $this->request->getPost('middle_name');
        $last_name     = $this->request->getPost('last_name');
        $phone_no_type = $this->request->getPost('phone_no_type'); 
        $phone_no      = $this->request->getPost('phone_no');
        $address_type  = $this->request->getPost('address_type'); 
        $address       = $this->request->getPost('address'); 
        $city          = $this->request->getPost('city_id'); 
        $state         = $this->request->getPost('state_id'); 
        $zip_code      = $this->request->getPost('zip_code');   
        $facebook_link = $this->request->getPost('facebook_link'); 
        $insta_link    = $this->request->getPost('insta_link'); 
        $linkedin_link = $this->request->getPost('linkedin_link');  
        $twitter_link  = $this->request->getPost('twitter_link');  

        if(!empty($_FILES["profile_image"]["tmp_name"])){
          $uploads_dir2  = './public/upload/profile_image';
          $tmp_name2     = $_FILES["profile_image"]["tmp_name"];
          $temp2         = explode(".", $_FILES["profile_image"]["name"]);
          $profile_image = 'img'.time().'.'.end($temp2);
          move_uploaded_file($tmp_name2, "$uploads_dir2/$profile_image");
        }else{
            $profile_image = $this->request->getPost('profile_pic_old'); 
        }
        
        $data =  array('first_name'=>$first_name,'middle_name'=>$middle_name,'last_name'=>$last_name,'phone_no_type'=>$phone_no_type,'phone_no'=>$phone_no,'address_type'=>$address_type,'address'=>$address,'city'=>$city,'state'=>$state,'zip_code'=>$zip_code,'facebook_link'=>$facebook_link,'insta_link'=>$insta_link,'linkedin_link'=>$linkedin_link,'twitter_link'=>$twitter_link,'profile_pic'=>$profile_image);
        $this->Common_model->updateData('ida_user_info',array('user_info_id' =>$user_info_id),$data);
        session()->setFlashdata("msg", "Your profile has been successfully updated");
        return redirect()->to(base_url('Admin/editProfile')); 
    }  

    public function changePassword()
    {
        $user_id        = session()->get('user_id');
        $data['title']  = 'Change Password';
        return view('admin/setting/change_password',$data);
    }

    public function billing()
    {
        $user_id   = session()->get('user_id');
        $whereData = array('user_id'=>$user_id);
        $bank_details_info = $this->Common_model->getData('ida_user_bank_details')->where($whereData)->get()->getResult();
           if(count($bank_details_info) == '0'){
                $account_exists = '0';
           }else{
                $account_exists = '1';
                $data['bank_details']  = $this->Common_model->getData('ida_user_bank_details')->where($whereData)->get()->getRow();
           }
        $data['account_exists'] = $account_exists;
        $data['title']  = 'View Billing';
        return view('admin/setting/billing',$data);
    }
    

    public function editProfile()
    {
        $user_id           = session()->get('user_id');
        $data['title']     = 'View setting';
        $whereData         = array('user_id'=>$user_id);
        $result            = $this->Common_model->getData('ida_user')->where($whereData)->get()->getRow();
        $data['result']    = $result;

        $user_info         = $this->Common_model->getData('ida_user_info')->where($whereData)->get()->getRow();
        $data['user_info'] = $user_info;

        $city_list         = $this->Common_model->getData('ida_cities')->get()->getResult();
        $data['city_list'] = $city_list;

        $state_list         = $this->Common_model->getData('ida_states')->get()->getResult();
        $data['state_list'] = $state_list;

        $country_list        = $this->Common_model->getData('ida_countries')->get()->getResult();
        $data['country_list']  = $country_list;

        return view('admin/setting/setting',$data);
    }


    public function updatePassword()
    {
        $user_id       = session()->get('user_id');
        $new_password  = $this->request->getPost('new_password');
        $old_password  = $this->request->getPost('old_password');

        $whereData = array('user_id'=>$user_id,'password'=>$old_password);
        $result    = $this->Common_model->getData('ida_user')->where($whereData);
        $num_row   = $result->countAllResults(); 
        if($num_row == '0'){
              session()->setFlashdata("msg2", "Wrong old password inserted");
             return redirect()->to(base_url('Admin/changePassword'));    
        }else{
            $data =  array('password'=>$new_password);
            $this->Common_model->updateData('ida_user',array('user_id' =>$user_id),$data);
            session()->setFlashdata("msg", "Your password has been successfully updated");
            return redirect()->to(base_url('Admin/changePassword'));    
        }  
    }
    public function saveBankDetails()
    {
        $user_id          = session()->get('user_id');
        $type             = $this->request->getPost('type');
        $account_holder_name = $this->request->getPost('account_holder_name');
        $account_number   = $this->request->getPost('account_number');  
        $bank_name        = $this->request->getPost('bank_name'); 
        $bank_ifsc_code   = $this->request->getPost('bank_ifsc_code');  
        $bank_branch      = $this->request->getPost('bank_branch');  
        $cancelled_cheque = $this->request->getPost('cancelled_cheque');   
        if(!empty($_FILES["cancelled_cheque"]["tmp_name"])){
          $uploads_dir2  = './public/upload/cancelled_cheque';
          $tmp_name2     = $_FILES["cancelled_cheque"]["tmp_name"];
          $temp2         = explode(".", $_FILES["cancelled_cheque"]["name"]);
          $cancelled_cheque = 'img'.time().'.'.end($temp2);
          move_uploaded_file($tmp_name2, "$uploads_dir2/$cancelled_cheque");
        }else{
          $cancelled_cheque = $this->request->getPost('cancelled_cheque_old'); 
        }
        $info =  array('user_id'=>$user_id,'account_holder_name'=>$account_holder_name,'account_number'=>$account_number,'bank_name'=>$bank_name,'bank_ifsc_code'=>$bank_ifsc_code,'bank_branch'=>$bank_branch,'cancelled_cheque'=>$cancelled_cheque,'status'=>'1');
        if($type== 'add'){
            $bank_details_id = $this->Common_model->saveData('ida_user_bank_details',$info);    
            session()->setFlashdata("msg", "Your bank details has been successfully added");
        }else{
            $bank_details_id = $this->request->getPost('bank_details_id');   
            $this->Common_model->updateData('ida_user_bank_details',array('bank_details_id' =>$bank_details_id),$info);
            session()->setFlashdata("msg", "Your bank details has been successfully updated");
        }
        return redirect()->to(base_url('Admin/billing'));    
    }
    public function companyDetails(){
        $user_id          = session()->get('user_id');
        $result = $this->Common_model->getData('ida_company_info')->where(array('user_id'=>$user_id))->get()->getResult();
        if(count($result) == '0'){
            $companyInfo = new \stdClass();
            $companyInfo->company_info_id = '';
            $companyInfo->company_owner   = '';
            $companyInfo->company_name    = '';
            $companyInfo->company_phone   = '';
            $companyInfo->company_address = '';
            $companyInfo->company_logo    = '';
            $companyInfo->status          = '';
        }else{
            $companyInfo = $this->Common_model->getData('ida_company_info')->where(array('user_id'=>$user_id))->get()->getRow();
        }
        $data['companyInfo'] = $companyInfo;
        $data['title'] = 'Company Details';
        return view('admin/setting/companyDetails',$data); 
    }
    public function editCompanyDetails(){
        $user_id          = session()->get('user_id');
        $result = $this->Common_model->getData('ida_company_info')->where(array('user_id'=>$user_id))->get()->getResult();
        if(count($result) == '0'){
            $companyInfo = new \stdClass();
            $companyInfo->company_info_id = '';
            $companyInfo->company_owner   = '';
            $companyInfo->company_name    = '';
            $companyInfo->company_phone   = '';
            $companyInfo->company_address = '';
            $companyInfo->company_logo    = '';
            $companyInfo->status          = '';
        }else{
            $companyInfo = $this->Common_model->getData('ida_company_info')->where(array('user_id'=>$user_id))->get()->getRow();
        }
        $data['companyInfo'] = $companyInfo;
        $data['title'] = 'Edit Company Details';
        return view('admin/setting/editCompanyDetails',$data); 
    }
    
    public function updateCompanyDetails(){
        $user_id          = session()->get('user_id');
        $company_info_id = $this->request->getPost('company_info_id');
        $company_owner   = $this->request->getPost('company_owner');
        $company_name    = $this->request->getPost('company_name');
        $company_phone   = $this->request->getPost('company_phone');
        $company_address = $this->request->getPost('company_address');
        
        if(!empty($_FILES["profile_image"]["tmp_name"])){
          $uploads_dir2  = './public/upload/company_logo';
          $tmp_name2     = $_FILES["profile_image"]["tmp_name"];
          $temp2         = explode(".", $_FILES["profile_image"]["name"]);
          $profile_image = 'img'.time().'.'.end($temp2);
          move_uploaded_file($tmp_name2, "$uploads_dir2/$profile_image");
        }else{
          $profile_image = $this->request->getPost('profile_image_old'); 
        }   
        $info = array('user_id'=>$user_id,'company_owner'=>$company_owner,'company_name'=>$company_name,'company_phone'=>$company_phone,'company_address'=>$company_address,'company_logo'=>$profile_image,'status'=>'1'); 
        if($company_info_id == ''){
            $company_info_id = $this->Common_model->saveData('ida_company_info',$info);    
        }else{
           $this->Common_model->updateData('ida_company_info',array('company_info_id' =>$company_info_id),$info); 
        }
        session()->setFlashdata("msg", "Company details has been successfully updated");
        return redirect()->to(base_url('Admin/companyDetails'));     
    }
     
    
    // Contact
    public function addContact()
    {
        $countries         = $this->Common_model->getData('ida_countries')->get()->getResult();
        $data['countries'] = $countries;
        $data['title'] = 'Add Contact';
        return view('admin/userManagement/addContact',$data);
    }
    public function employeeContactList()
    {
        $user_id          = session()->get('user_id');
        $result = $this->Common_model->getData('ida_user')->join('ida_user_info', 'ida_user.user_id = ida_user_info.user_id', 'left')->where(array('ida_user.user_type_id'=>'2','ida_user.create_by'=>$user_id))->orderBy('ida_user.user_id', 'DESC')->get()->getResult();
        $data['result'] = $result;
        $data['title']  = 'Employee Contact List';
        return view('admin/userManagement/employeeContactList',$data);
    }
    public function contractorContactList()
    {
        $user_id = session()->get('user_id');
        $result = $this->Common_model->getData('ida_user')->join('ida_user_info', 'ida_user.user_id = ida_user_info.user_id', 'left')->where(array('ida_user.user_type_id'=>'3','ida_user.create_by'=>$user_id))->orderBy('ida_user.user_id', 'DESC')->get()->getResult();
        $data['result'] = $result;
        $data['title']  = 'Contractor Contact List';
        return view('admin/userManagement/contractorContactList',$data);
    }
    public function clientContactList()
    {
        $user_id          = session()->get('user_id');
        $result = $this->Common_model->getData('ida_user')->join('ida_user_info', 'ida_user.user_id = ida_user_info.user_id', 'left')->where(array('ida_user.user_type_id'=>'4','ida_user.create_by'=>$user_id))->orderBy('ida_user.user_id', 'DESC')->get()->getResult();
        $data['result'] = $result;
        $data['title']  = 'Client Contact List';
        return view('admin/userManagement/clientContactList',$data);
    }
    public function saveContactDetails()
    {
        $c_user_id     = session()->get('user_id');
        $user_type_id  = $this->request->getPost('user_type_id');
        $designation   = $this->request->getPost('designation');
        $first_name    = $this->request->getPost('first_name'); 
        $last_name     = $this->request->getPost('last_name');  
        $email         = $this->request->getPost('email');  
        $phone_no      = $this->request->getPost('phone_no');    
        if(!empty($_FILES["profile_pic"]["tmp_name"])){
          $uploads_dir2  = './public/upload/profile_image';
          $tmp_name2     = $_FILES["profile_pic"]["tmp_name"];
          $temp2         = explode(".", $_FILES["profile_pic"]["name"]);
          $profile_pic = 'img'.time().'.'.end($temp2);
          move_uploaded_file($tmp_name2, "$uploads_dir2/$profile_pic");
        }else{
          $profile_pic = ''; 
        }  

        $address    = $this->request->getPost('address');   
        $country_id = $this->request->getPost('country');
        $state_id   = $this->request->getPost('state');
        $city_id    = $this->request->getPost('city');    
        $zip_code   = $this->request->getPost('zip_code'); 

        $facebook_link = $this->request->getPost('facebook_link');   
        $insta_link    = $this->request->getPost('insta_link');   
        $linkedin_link = $this->request->getPost('linkedin_link');   
        $twitter_link  = $this->request->getPost('twitter_link');    
        
        $info1= array('user_type_id'=>$user_type_id,'email'=>$email,'password'=>'123456','status'=>'1','create_by'=>$c_user_id,'email_verified'=>'1'); 
        $user_id = $this->Common_model->saveData('ida_user',$info1);    
        $user_unique_id = 'IDEA0'.$user_id;
        $this->Common_model->updateData('ida_user',array('user_id' =>$user_id),array('user_unique_id'=>$user_unique_id));

        $info2 = array('user_id'=>$user_id,'designation'=>$designation,'first_name'=>$first_name,'last_name'=>$last_name,'phone_no'=>$phone_no,'address'=>$address,'city'=>$city_id,'state'=>$state_id,'country'=>$country_id,'zip_code'=>$zip_code,'facebook_link'=>$facebook_link,'insta_link'=>$insta_link,'linkedin_link'=>$linkedin_link,'twitter_link'=>$twitter_link,'profile_pic'=>$profile_pic); 
        $user_info_id = $this->Common_model->saveData('ida_user_info',$info2);   
        // echo  $this->Common_model->getLastQuery(); die;
        session()->setFlashdata("msg", "Contact details has been successfully added");
        if($user_type_id == '2'){
            return redirect()->to(base_url('Admin/employeeContactList'));  
        }else if($user_type_id == '3'){
            return redirect()->to(base_url('Admin/contractorContactList'));  
        }else if($user_type_id == '4'){
            return redirect()->to(base_url('Admin/clientContactList'));  
        }  
    }

    public function deleteEmployeeContactInfo($id=0){
        $this->Common_model->deleteData('ida_user_info', array('user_id' =>$id));
        $this->Common_model->deleteData('ida_user_bank_details', array('user_id' =>$id));
        $this->Common_model->deleteData('ida_user', array('user_id' =>$id));
        session()->setFlashdata("msg", "Contact details has been successfully deleted");
        return redirect()->to(base_url('Admin/employeeContactList'));      
    }

    public function editContact($id=0)
    {
         //$id     = session()->get('user_id');

        $result = $this->Common_model->getData('ida_user')->join('ida_user_info', 'ida_user.user_id = ida_user_info.user_id', 'left')->where(array('ida_user.user_id'=>$id))->orderBy('ida_user.user_id', 'DESC')->get()->getRow();
        $data['result'] = $result;

        $country_list         = $this->Common_model->getData('ida_countries')->get()->getResult();
        $data['countries'] = $country_list;

        $state_list         = $this->Common_model->getData('ida_states')->where(array('country_id'=>$result->country))->get()->getResult();
        $data['state_list'] = $state_list;

        $city_list         = $this->Common_model->getData('ida_cities')->where(array('state_id'=>$result->state))->get()->getResult();
        $data['city_list'] = $city_list;

        $data['title'] = 'Edit Contact';
        return view('admin/userManagement/editContact',$data);
    }

    public function updateContactDetails()
    {
        $c_user_id     = session()->get('user_id');
        $user_id       = $this->request->getPost('user_id');
        $user_type_id  = $this->request->getPost('user_type_id');
        $first_name    = $this->request->getPost('first_name');
        $last_name     = $this->request->getPost('last_name');  
        $designation   = $this->request->getPost('designation'); 

        
        $email         = $this->request->getPost('email');  
         
        $phone_no      = $this->request->getPost('phone_no');    
         
        if(!empty($_FILES["profile_pic"]["tmp_name"])){
          $uploads_dir2  = './public/upload/profile_image';
          $tmp_name2     = $_FILES["profile_pic"]["tmp_name"];
          $temp2         = explode(".", $_FILES["profile_pic"]["name"]);
          $profile_pic = 'img'.time().'.'.end($temp2);
          move_uploaded_file($tmp_name2, "$uploads_dir2/$profile_pic");
        }else{
          $profile_pic = $this->request->getPost('profile_pic_old'); 
        }  

        
        $address       = $this->request->getPost('address');   
        $zip_code      = $this->request->getPost('zip_code');  
        $state_id      = $this->request->getPost('state');
        $city_id       = $this->request->getPost('city');    
        $country       = $this->request->getPost('country'); 

        $facebook_link = $this->request->getPost('facebook_link');   
        $insta_link    = $this->request->getPost('insta_link');   
        $linkedin_link = $this->request->getPost('linkedin_link');   
        $twitter_link  = $this->request->getPost('twitter_link');    
        
        $info2 = array('user_id'=>$user_id,'designation'=>$designation,'first_name'=>$first_name,'last_name'=>$last_name,'phone_no'=>$phone_no,'address'=>$address,'city'=>$city_id,'state'=>$state_id,'country'=>$country,'zip_code'=>$zip_code,'facebook_link'=>$facebook_link,'insta_link'=>$insta_link,'linkedin_link'=>$linkedin_link,'twitter_link'=>$twitter_link,'profile_pic'=>$profile_pic); 
        $this->Common_model->updateData('ida_user_info',array('user_id' =>$user_id),$info2);
        // echo  $this->Common_model->getLastQuery(); die;
        session()->setFlashdata("msg", "Contact details has been successfully updated");
        return redirect()->to(base_url('Admin/employeeContactList'));    
    }
//Project
   public function projectList()
    {
        $user_id              = session()->get('user_id');
        $project_list         = $this->Common_model->getData('ida_project_list')->where(array('create_by'=>$user_id))->orderBy('project_id', 'DESC')->get()->getResult();
        $data['project_list'] = $project_list;
        $data['title']        = 'Project List';
        return view('admin/projectManagement/projectList',$data);
    }
    public function addProject()
    {
        $data['title']        = 'Add Project';
        return view('admin/projectManagement/addProject',$data);
    } 

    public function saveProjectInfo()
    {
        $c_user_id           = session()->get('user_id');
        $project_title       = $this->request->getPost('project_title');
        $project_description = $this->request->getPost('project_description');
        $user_type_id        = $this->request->getPost('user_type_id');
        $user_id             = $this->request->getPost('user_id');
        
        $info1 = array('project_title'=>$project_title,'user_type_id'=>$user_type_id,'user_id'=>$user_id,'project_description'=>$project_description,'status'=>'0','create_by'=>$c_user_id);
        $project_id             = $this->Common_model->saveData('ida_project_list',$info1);    
        $project_unique_id      = 'PIDEA0'.$project_id;
        $this->Common_model->updateData('ida_project_list',array('project_id' =>$project_id),array('project_unique_id'=>$project_unique_id));
         $i=0;   
         foreach ($_FILES['project_attached']['tmp_name'] as $key => $value) { $i++;
              $uploads_dir2     = './public/upload/project_attached';
              $tmp_name2        = $_FILES["project_attached"]["tmp_name"][$key];
              $temp2            = explode(".", $_FILES["project_attached"]["name"][$key]);
              $project_attached = 'att_'.$project_id.'_'.$i.'_'.time().'.'.end($temp2);
              move_uploaded_file($tmp_name2, "$uploads_dir2/$project_attached");
              $info2               = array('project_id'=>$project_id,'project_attached'=>$project_attached,'status'=>'1');
              $project_attached_id = $this->Common_model->saveData('ida_project_attached',$info2);    
        }  

        session()->setFlashdata("msg", "Project details has been successfully added");
        return redirect()->to(base_url('Admin/projectList'));    
    }

     public function editProject($id=0)
    {
        $projectInfo         = $this->Common_model->getData('ida_project_list')->where(array('project_id'=>$id))->get()->getRow();
        $data['projectInfo'] = $projectInfo;

        $project_attached         = $this->Common_model->getData('ida_project_attached')->where(array('project_id'=>$id))->get()->getResult();
        $data['project_attached'] = $project_attached;

        $user_list         = $this->Common_model->getData('ida_user')->where(array('user_type_id'=>$projectInfo->user_type_id))->get()->getResult();
        $data['user_list'] = $user_list;

        $data['title'] = 'Edit Project';
        return view('admin/projectManagement/editProject',$data);
    }

    public function updateProjectInfo()
    {
        $c_user_id           = session()->get('user_id');
        $project_id          = $this->request->getPost('project_id');
        $project_title       = $this->request->getPost('project_title');
        $project_description = $this->request->getPost('project_description');

        $user_type_id       = $this->request->getPost('user_type_id');
        $user_id = $this->request->getPost('user_id');
        $total_project_attached = $this->request->getPost('total_project_attached');
        for ($i=1; $i <=$total_project_attached ; $i++) { 
             $project_attached_old = $this->request->getPost('project_attached_old_'.$i);
             $project_attached_id  = $this->request->getPost('project_attached_id_'.$i); 
             if($project_attached_id == ''){
                    if(!empty($_FILES["project_attached_".$i]["tmp_name"])){
                      $uploads_dir2  = './public/upload/project_attached';
                      $tmp_name2     = $_FILES["project_attached_".$i]["tmp_name"];
                      $temp2         = explode(".", $_FILES["project_attached_".$i]["name"]);
                      $project_attached = 'att_'.$project_id.'_'.$i.'_'.time().'.'.end($temp2);
                      move_uploaded_file($tmp_name2, "$uploads_dir2/$project_attached");
                      $info3               = array('project_id'=>$project_id,'project_attached'=>$project_attached,'status'=>'1');
                      $project_attached_id_new = $this->Common_model->saveData('ida_project_attached',$info3); 
                    }  
             }else{
                    if(!empty($_FILES["project_attached_".$i]["tmp_name"])){
                      $uploads_dir2  = './public/upload/project_attached';
                      $tmp_name2     = $_FILES["project_attached_".$i]["tmp_name"];
                      $temp2         = explode(".", $_FILES["project_attached_".$i]["name"]);
                      $project_attached = 'att_'.$project_id.'_'.$i.'_'.time().'.'.end($temp2);
                      move_uploaded_file($tmp_name2, "$uploads_dir2/$project_attached");
                    }else{
                      $project_attached = $this->request->getPost('project_attached_old_'.$i);
                    } 
                    $info4 = array('project_attached'=>$project_attached);
                    $this->Common_model->updateData('ida_project_attached',array('project_attached_id' =>$project_attached_id),$info4);
             }
        }
         
        $info1= array('project_title'=>$project_title,'user_type_id'=>$user_type_id,'user_id'=>$user_id,'project_description'=>$project_description,'project_attached'=>$project_attached);
        $this->Common_model->updateData('ida_project_list',array('project_id' =>$project_id),$info1);
        session()->setFlashdata("msg", "Project details has been successfully updated");
        return redirect()->to(base_url('Admin/projectList'));    
    }
    public function deleteProjectInformation($id=0){
        $this->Common_model->deleteData('ida_project_list', array('project_id' =>$id));
        session()->setFlashdata("msg", "Project details has been successfully deleted");
        return redirect()->to(base_url('Admin/projectList'));     
    }
    public function assignedProject(){
        $user_id              = session()->get('user_id');
        $status               =  array('0','1');
        $project_list         = $this->Common_model->getData('ida_project_list')->where(array('create_by'=>$user_id))->whereIn('status',$status)->get()->getResult();
        $data['project_list'] = $project_list;

        $user_list         = $this->Common_model->getData('ida_user')->where(array('user_type_id'=>'2','create_by'=>$user_id))->get()->getResult();
        $data['user_list'] = $user_list;

        $project_assigned_list = $this->Common_model->getData('ida_project_assigned')->where(array('assigned_task_status'=>'1'))->get()->getResult();
        $assigned_users =  array();
        foreach ($project_assigned_list as $value) {
          array_push($assigned_users , $value->user_id);
        } 
        $data['assigned_users'] = $assigned_users;
        $data['title'] = 'Assign Project';
        return view('admin/projectManagement/assignedProject',$data);
    }
    public function saveAssignedInfo($id=0){
        $c_user_id     = session()->get('user_id');
        $project_id    = $this->request->getPost('project_id');
        $user_id       = $this->request->getPost('user_id'); 
        $price_type    = $this->request->getPost('price_type'); 
        $price         = $this->request->getPost('price'); 
        $currency      = $this->request->getPost('currency'); 
        $assigned_on   = $this->request->getPost('assigned_on'); 
        $assigned_task = $this->request->getPost('assigned_task'); 
        $info =  array('project_id'=>$project_id,'user_id'=>$user_id,'price_type'=>$price_type,'price'=>$price,'currency'=>$currency,'assigned_on'=>$assigned_on,'assigned_task'=>$assigned_task,'assigned_task_status'=>'1','assigned_by'=>$c_user_id,'status'=>'1');    
        $project_assigned_id = $this->Common_model->saveData('ida_project_assigned',$info);    
        $this->Common_model->updateData('ida_project_list',array('project_id'=>$project_id),array('status'=>'1'));
        session()->setFlashdata("msg", "Project has been successfully assigned");
        return redirect()->to(base_url('Admin/projectList'));    
    }
    public function assignedProjectList()
    {
        $user_id      = session()->get('user_id');
        $project_list = $this->Common_model->getData('ida_project_list')->where(array('status'=>'1','create_by'=>$user_id))->get()->getResult();
        $data['project_list'] = $project_list;
        $data['title']        = 'Assigned Project List';
        return view('admin/projectManagement/assignedProjectList',$data);
    }
    public function getAssignedDevelopers()
    {
        $project_id   = $this->request->getPost('project_id'); 
        $project_assigned_list = $this->Common_model->getData('ida_project_assigned')->where(array('project_id'=>$project_id))->get()->getResult();
        $htmls = '';
        $i=0;
        foreach ($project_assigned_list as $value) { $i++;
            $userInfo =  getUserInfo($value->user_id);
            $assigned_date = date_format(date_create($value->assigned_date),"d-m-Y H:iA");
            $htmls .= '<tr><td>'.$i.'</td><td>'.ucfirst($userInfo->first_name.' '.$userInfo->last_name).'</td><td>'.$userInfo->designation.'</td><td>'.$assigned_date.'</td></tr>';    
        }
        $responce = array('htmls' =>$htmls);
        echo json_encode($responce); die;
    }
   
 public function projectInfo($id=0)
    {
        $project_info         = $this->Common_model->getData('ida_project_list')->where(array('project_id'=>$id))->get()->getRow();
        $data['project_info'] = $project_info;
       
        $project_assigned         = $this->Common_model->getData('ida_project_assigned')->where(array('project_id'=>$id))->get()->getResult();
        $data['project_assigned'] = $project_assigned;

        $project_attached         = $this->Common_model->getData('ida_project_attached')->where(array('project_id'=>$id))->get()->getResult();
        $data['project_attached'] = $project_attached;

        $data['title']        = 'Project Info';
        return view('admin/projectManagement/projectInfo',$data);
    }   

public function assignedDevelopersList($id=0)
    {

       
        $project_info         = $this->Common_model->getData('ida_project_list')->where(array('project_id'=>$id))->get()->getRow();
        $data['project_info'] = $project_info;
       
        $project_assigned         = $this->Common_model->getData('ida_project_assigned')->where(array('project_id'=>$id))->get()->getResult();
        $data['project_assigned'] = $project_assigned;

        $project_attached         = $this->Common_model->getData('ida_project_attached')->where(array('project_id'=>$id))->get()->getResult();
        $data['project_attached'] = $project_attached;

        //Received
        $received_invoice = $this->Common_model->getData('ida_project_invoice')->where(array('project_id'=>$id,'invoice_type'=>'Received'))->get()->getResult();
        if(count($received_invoice) == '0'){
            $total_received_amount = '0';
            $last_received_amount  = '0';
            $last_received_date    = 'N/A';
        }else{
            $total_received_amount = '0';
            foreach ($received_invoice as $value) {
              $total_received_amount += $value->total_amount;
            }
            $received_invoice_details = $this->Common_model->getData('ida_project_invoice')->where(array('project_id'=>$id,'invoice_type'=>'Received'))->orderBy('invoice_id', 'DESC')->limit(1)->get()->getRow();
            $last_received_amount  = $received_invoice_details->total_amount;
            $last_received_date  = $received_invoice_details->add_date;
        }
        // Paid
        $paid_invoice = $this->Common_model->getData('ida_project_invoice')->where(array('project_id'=>$id,'invoice_type'=>'Paid'))->get()->getResult();
        if(count($paid_invoice) == '0'){
            $total_paid_amount = '0';
            $last_paid_amount  = '0';
            $last_paid_date    = 'N/A';
        }else{
            $total_paid_amount = '0';
            foreach ($paid_invoice as $value) {
              $total_paid_amount += $value->total_amount;
            }
            $paid_invoice_details = $this->Common_model->getData('ida_project_invoice')->where(array('project_id'=>$id,'invoice_type'=>'Paid'))->orderBy('invoice_id', 'DESC')->limit(1)->get()->getRow();
            $last_paid_amount  = $paid_invoice_details->total_amount;
            $last_paid_date    = $paid_invoice_details->add_date;
        }

        $data['total_received_amount'] = $total_received_amount;
        $data['last_received_amount']  = $last_received_amount;
        $data['last_received_date']    = $last_received_date;

        $data['total_paid_amount'] = $total_paid_amount;
        $data['last_paid_amount']  = $last_paid_amount;
        $data['last_paid_date']    = $last_paid_date;

        $data['title']        = 'Assigned Developers List';
        return view('admin/projectManagement/assignedDevelopersList',$data);
    }    

    //End Project
    public function saveUserCardDetails()
    {
        $c_user_id         = session()->get('user_id');
        $process_type      = $this->request->getPost('process_type'); 
        $card_no           = $this->request->getPost('card_no');
        $card_holder_name  = $this->request->getPost('card_holder_name'); 
        $card_expiry_month = $this->request->getPost('card_expiry_month'); 
        $card_expiry_year  = $this->request->getPost('card_expiry_year'); 
        $cvv_cvc           = $this->request->getPost('cvv_cvc'); 
        $info =  array('user_id' =>$c_user_id,'card_no'=>$card_no,'card_holder_name'=>$card_holder_name,'card_expiry_month'=>$card_expiry_month,'card_expiry_year'=>$card_expiry_year,'cvv_cvc'=>$cvv_cvc,'status'=>'1');
        if($process_type=='add'){
             $card_details_id = $this->Common_model->saveData('ida_user_card_details',$info);   
             session()->setFlashdata("msg", "Card details has been successfully added");
        }else{
            $card_details_id      = $this->request->getPost('card_details_id'); 
            $this->Common_model->updateData('ida_user_card_details',array('card_details_id'=>$card_details_id),$info);
            session()->setFlashdata("msg", "Card details has been successfully updated");
        }
        return redirect()->to(base_url('Admin/viewProfile'));   
    }
    public function getCardInformation()
    {
       $card_details_id = $this->request->getPost('card_details_id');  
       $card_details    = $this->Common_model->getData('ida_user_card_details')->where(array('card_details_id'=>$card_details_id))->get()->getRow(); 
        echo json_encode($card_details); die;
    }
    
    public function deleteCardInformation($id=0){
        $this->Common_model->deleteData('ida_user_card_details', array('card_details_id' =>$id));
        session()->setFlashdata("msg", "Card  details has been successfully deleted");
        return redirect()->to(base_url('Admin/viewProfile'));      
    }

    public function getUserListByUserType()
    {
        $c_user_id         = session()->get('user_id');
        $user_type_id = $this->request->getPost('user_type_id'); 
        $user_list    = $this->Common_model->getData('ida_user')->where(array('user_type_id'=>$user_type_id,'create_by'=>$c_user_id))->get()->getResult(); 
        $htmls = '<option value="">Select Client</option>';
        foreach ($user_list as $value) {
           $userInfo = getUserInfo($value->user_id);
           $htmls .= '<option value="'.$value->user_id.'">'.$userInfo->first_name.' '.$userInfo->last_name.' ('.$userInfo->designation.')</option>';
        }
        $responce = array('htmls'=>$htmls);
        echo json_encode($responce); die;
    }

     public function deleteAttachedFiles($id1=0,$id2=0){
        $this->Common_model->deleteData('ida_project_attached', array('project_attached_id' =>$id2));
        session()->setFlashdata("msg", "Attached File  has been successfully deleted");
        return redirect()->to(base_url('Admin/projectDetails/'.$id1));      
    }
    
    public function viewReceivedAmount()
    {
      $type       = $this->request->getPost('type'); 
      $project_id = $this->request->getPost('project_id');  
     $invoice_list=$this->Common_model->getData('ida_project_invoice')->where(array('project_id'=>$project_id,'invoice_for'=>$type))->get()->getResult();
      $htmls = '';
      $i=0;
      foreach ($invoice_list as $value) { $i++;
             $htmls .= '<tr>';
             $htmls .= '<td>'.$i.'</td>';
             $htmls .= '<td>'.date_format(date_create($value->invoice_date),"d-M-Y").'</td>';
             $htmls .= '<td>'.$value->price_type.'</td>';
             $total_hours = $value->price_type =='Hourly' ? $value->total_hours : 'N/A';
             $htmls .= '<td>'.$total_hours.'</td>';
             $htmls .= '<td>'.$value->total_amount.'</td>';
             $UserInfo = getUserInfo($value->user_id);
             $name = $UserInfo->first_name.' '.$UserInfo->last_name.'<br>('.$UserInfo->designation.')';
             $htmls .= '<td>'.$name.'</td>';
             $htmls .= '</tr>';
       }
     $responce =  array('htmls' =>$htmls);  
     echo json_encode($responce); die;
    }

//Accounts   
public function projectFinancialDetails()
    {
        $user_id      =  session()->get('user_id');
        $project_list = $this->Common_model->getData('ida_project_list')->where(array('create_by'=>$user_id))->orderBy('project_id', 'DESC')->get()->getResult();
        $data['project_list'] = $project_list;
        $data['title']        = 'Project Financial Details';
        return view('admin/accountsManagement/projectFinancialDetails',$data);
    }  
public function projectDetails($id=0)
    {
        $project_info         = $this->Common_model->getData('ida_project_list')->where(array('project_id'=>$id))->get()->getRow();
        $data['project_info'] = $project_info;
       
        $project_assigned         = $this->Common_model->getData('ida_project_assigned')->where(array('project_id'=>$id))->get()->getResult();
        $data['project_assigned'] = $project_assigned;

        $project_attached         = $this->Common_model->getData('ida_project_attached')->where(array('project_id'=>$id))->get()->getResult();
        $data['project_attached'] = $project_attached;

        //Received
        $received_invoice = $this->Common_model->getData('ida_project_invoice')->where(array('project_id'=>$id,'invoice_type'=>'Received'))->get()->getResult();
        if(count($received_invoice) == '0'){
            $total_received_amount = '0';
            $last_received_amount  = '0';
            $last_received_date    = 'N/A';
        }else{
            $total_received_amount = '0';
            foreach ($received_invoice as $value) {
              $total_received_amount += $value->total_amount;
            }
            $received_invoice_details = $this->Common_model->getData('ida_project_invoice')->where(array('project_id'=>$id,'invoice_type'=>'Received'))->orderBy('invoice_id', 'DESC')->limit(1)->get()->getRow();
            $last_received_amount  = $received_invoice_details->total_amount;
            $last_received_date  = $received_invoice_details->add_date;
        }
        // Paid
        $paid_invoice = $this->Common_model->getData('ida_project_invoice')->where(array('project_id'=>$id,'invoice_type'=>'Paid'))->get()->getResult();
        if(count($paid_invoice) == '0'){
            $total_paid_amount = '0';
            $last_paid_amount  = '0';
            $last_paid_date    = 'N/A';
        }else{
            $total_paid_amount = '0';
            foreach ($paid_invoice as $value) {
              $total_paid_amount += $value->total_amount;
            }
            $paid_invoice_details = $this->Common_model->getData('ida_project_invoice')->where(array('project_id'=>$id,'invoice_type'=>'Paid'))->orderBy('invoice_id', 'DESC')->limit(1)->get()->getRow();
            $last_paid_amount  = $paid_invoice_details->total_amount;
            $last_paid_date    = $paid_invoice_details->add_date;
        }

        $data['total_received_amount'] = $total_received_amount;
        $data['last_received_amount']  = $last_received_amount;
        $data['last_received_date']    = $last_received_date;

        $data['total_paid_amount'] = $total_paid_amount;
        $data['last_paid_amount']  = $last_paid_amount;
        $data['last_paid_date']    = $last_paid_date;

        $data['title']        = 'Project Details';
        return view('admin/accountsManagement/projectDetails',$data);
    }      

 public function viewProjectFinancialDetails($id=0)
    {
        $project_info         = $this->Common_model->getData('ida_project_list')->where(array('project_id'=>$id))->get()->getRow();
        $data['project_info'] = $project_info;
       
        $project_assigned         = $this->Common_model->getData('ida_project_assigned')->where(array('project_id'=>$id))->get()->getResult();
        $data['project_assigned'] = $project_assigned;

        $project_attached         = $this->Common_model->getData('ida_project_attached')->where(array('project_id'=>$id))->get()->getResult();
        $data['project_attached'] = $project_attached;

        $count_received =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('project_id'=>$id,'invoice_for'=>'Received'))->get()->getRow();
        

        if($count_received->total_received != ''){
        $total_received = $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('project_id'=>$id,'invoice_for'=>'Received'))->get()->getRow()->total_received;
        $data['total_received'] = $total_received;

        $last_received = $this->Common_model->getData('ida_project_invoice')->where(array('project_id'=>$id,'invoice_for'=>'Received'))->orderBy('invoice_id', 'DESC')->get()->getRow();
        $data['last_received'] = $last_received;
        }else{
          $data['total_received'] = '0';  
          $last_received = new \stdClass;
          $last_received->total_amount = '0';
          $last_received->add_date = 'N/A';
          $data['last_received'] = $last_received;
        }


        $count_paid =  $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('project_id'=>$id,'invoice_for'=>'Paid'))->get()->getRow(); 
        if($count_paid->total_paid != ''){
         $total_paid = $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('project_id'=>$id,'invoice_for'=>'Paid'))->get()->getRow()->total_paid;
         $data['total_paid'] = $total_paid;
         $last_paid = $this->Common_model->getData('ida_project_invoice')->where(array('project_id'=>$id,'invoice_for'=>'Paid'))->orderBy('invoice_id', 'DESC')->get()->getRow();
        $data['last_paid'] = $last_paid;
        }else{
           $data['total_paid'] = '0';  
          $last_paid = new \stdClass;
          $last_paid->total_amount = '0';
          $last_paid->add_date = 'N/A';
          $data['last_paid'] = $last_paid; 
        }

        $data['title']        = 'View Project Financial Details';
        return view('admin/accountsManagement/viewProjectFinancialDetails',$data);
    }   
    
public function clientFinancialDetails()
    {
        $c_user_id         = session()->get('user_id');
        $project_list = $this->Common_model->getData('ida_project_list')->where(array('create_by' =>$c_user_id))->get()->getResult();
        $user_ids =  array();
        foreach ($project_list as $value) {
             if (!in_array($value->user_id, $user_ids))
                {
                    array_push($user_ids, $value->user_id);
                }
        }

        $client_list = $this->Common_model->getData('ida_user')->join('ida_user_info', 'ida_user_info.user_id = ida_user.user_id', 'left')->where(array('ida_user.user_type_id'=>'4'))->whereIn('ida_user.user_id',$user_ids)->get()->getResult();
        $data['client_list'] = $client_list;
        
        $data['title']     = 'Client Financial Details';
        return view('admin/accountsManagement/client/clientFinancialDetails',$data);
    }

public function contractorFinancialDetails()
    {
        $c_user_id         = session()->get('user_id');
        $project_list = $this->Common_model->getData('ida_project_list')->where(array('create_by' =>$c_user_id))->get()->getResult();
        $user_ids =  array();
        foreach ($project_list as $value) {
             if (!in_array($value->user_id, $user_ids))
                {
                    array_push($user_ids, $value->user_id);
                }
        }

        $contractor_list = $this->Common_model->getData('ida_user')->join('ida_user_info', 'ida_user_info.user_id = ida_user.user_id', 'left')->where(array('user_type_id'=>'3'))->whereIn('ida_user.user_id',$user_ids)->get()->getResult();
        $data['contractor_list'] = $contractor_list;

        $data['title']        = 'Contractor Financial Details';
        return view('admin/accountsManagement/contractor/contractorFinancialDetails',$data);
    }
    public function employeeFinancialDetails()
    {
        $c_user_id         = session()->get('user_id');
         $employee_list = $this->Common_model->getData('ida_user')->join('ida_user_info', 'ida_user_info.user_id = ida_user.user_id', 'left')->where(array('ida_user.user_type_id'=>'2','ida_user.create_by'=>$c_user_id))->get()->getResult();
        $data['employee_list'] = $employee_list;

        $data['title']        = 'Employee Financial Details';
        return view('admin/accountsManagement/employee/employeeFinancialDetails',$data);
    }  
    public function viewClientFinancialDetails($id=0)
    {
       $user_basic_info     = $this->Common_model->getData('ida_user')->where(array('user_id'=>$id))->get()->getRow();
       $data['user_basic_info'] = $user_basic_info;

       $user_info     = $this->Common_model->getData('ida_user_info')->where(array('user_id'=>$id))->get()->getRow();
       $data['user_info'] = $user_info;

       $lp_invoice_info = $this->Common_model->getData('ida_project_invoice')->where(array('user_id'=>$id,'invoice_for'=>'Received'))->orderBy('invoice_id', 'DESC')->get()->getRow();
       $data['lp_invoice_info'] = $lp_invoice_info;

       $project_list = $this->Common_model->getData('ida_project_list')->where(array('user_id'=>$id))->orderBy('project_id', 'DESC')->get()->getResult();
       $data['project_list'] = $project_list;
       
       $data['title'] = 'View Client Financial Details';
       return view('admin/accountsManagement/client/viewClientFinancialDetails',$data);  
    } 

    public function viewContractorFinancialDetails($id=0)
    {
       $user_basic_info     = $this->Common_model->getData('ida_user')->where(array('user_id'=>$id))->get()->getRow();
       $data['user_basic_info'] = $user_basic_info;

       $user_info     = $this->Common_model->getData('ida_user_info')->where(array('user_id'=>$id))->get()->getRow();
       $data['user_info'] = $user_info;

       $lp_invoice_info = $this->Common_model->getData('ida_project_invoice')->where(array('user_id'=>$id,'invoice_for'=>'Received'))->orderBy('invoice_id', 'DESC')->get()->getRow();
       $data['lp_invoice_info'] = $lp_invoice_info;

       $project_list = $this->Common_model->getData('ida_project_list')->where(array('user_id'=>$id))->orderBy('project_id', 'DESC')->get()->getResult();
       $data['project_list'] = $project_list;
       
       $data['title'] = 'View Contractor Financial Details';
       return view('admin/accountsManagement/contractor/viewContractorFinancialDetails',$data);  
    }    
// invoice
public function invoiceDetails()
     {
        $user_id          = session()->get('user_id');
        $total_project = $this->Common_model->getData('ida_project_list')->where(array('create_by'=>$user_id))->get()->getNumRows();
        $data['total_project'] = $total_project;


        $total_received = $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_received')->where(array('invoice_for'=>'Received','create_by'=>$user_id))->get()->getRow()->total_received;
        $data['total_received'] = $total_received;


       $last_received_info = $this->Common_model->getData('ida_project_invoice')->where(array('invoice_for'=>'Received','create_by'=>$user_id))->orderBy('invoice_id', 'DESC')->get();

       $getNumRows_lri =  $last_received_info->getNumRows();
        if($getNumRows_lri > '0'){
           $last_received = $last_received_info->getRow();
        }else{
            $last_received = new \stdClass();
            $last_received->total_amount = '';
            $last_received->add_date = '';     
        }
         $data['last_received'] = $last_received;
        $total_paid = $this->Common_model->getData('ida_project_invoice')->selectSum('total_amount','total_paid')->where(array('invoice_for'=>'Paid','create_by'=>$user_id))->get()->getRow()->total_paid;
        $data['total_paid'] = $total_paid;


       $last_paid_info = $this->Common_model->getData('ida_project_invoice')->where(array('invoice_for'=>'Paid','create_by'=>$user_id))->orderBy('invoice_id', 'DESC')->get();
       $getNumRows_lpi =  $last_paid_info->getNumRows();
       if($getNumRows_lpi > '0'){
            $last_paid = $last_paid_info->getRow();
       }else{
             $last_paid = new \stdClass();
             $last_paid->total_amount = '';
             $last_paid->add_date = '';
       }
       $data['last_paid'] = $last_paid;

        $data['title'] = 'Invoice Details';
        return view('admin/accountsManagement/invoices/invoiceDetails',$data);
     }  
public function generateInvoice()
     {
          $user_id          = session()->get('user_id');
        $project_list         = $this->Common_model->getData('ida_project_list')->where(array('create_by'=>$user_id))->get()->getResult();
        $data['project_list'] = $project_list;

        $client_list         = $this->Common_model->getData('ida_user')->where(array('create_by'=>$user_id))->whereIn('user_type_id',array('3','4'))->get()->getResult();
        $data['client_list'] = $client_list;

        $data['title'] = 'Generate Invoice';
        return view('admin/accountsManagement/invoices/generateInvoice',$data);
     }    
public function getUserByProjectID()
     {
        $project_id   = $this->request->getPost('project_id'); 
        $project_info = $this->Common_model->getData('ida_project_list')->where(array('project_id'=>$project_id))->get()->getRow();
        $user_id      = $project_info->user_id;
        $userInfo     = getUserInfo($user_id); 
        $user_name    = $userInfo->first_name.' '.$userInfo->last_name; 
        $userMainInfo = getUserMainInfo($user_id);
        $user_type_id = $userMainInfo->user_type_id;
        $invoice_for =  $user_type_id == '2' ? 'Paid' : 'Received';
        $where =  array('project_id'=>$project_id,'invoice_for'=>$invoice_for,'user_id'=>$user_id);
        $invoice_info = $this->Common_model->getData('ida_project_invoice')->where($where)->get()->getResult();
        $count = count($invoice_info);
        if($count > '0'){
            $total_paid_amount = 0;
            foreach ($invoice_info as   $value) {
                $total_paid_amount += $value->total_amount; 
            }
        }else{
           $total_paid_amount = 0;  
        }
        $htmls = '';
        if($user_type_id == '4'){
            $htmls .= '<option value="">Select Client</option>';
        }else if($user_type_id == '3'){
            $htmls .= '<option value="">Select Contractor</option>';
        }else{
            $htmls .= '<option value="">Select Employee</option>';
        }
        $htmls .= '<option value="'.$user_id.'">'.$user_name.' ('.$userInfo->designation.')</option>'; 
        $responce =  array('htmls'=>$htmls,'total_paid_amount'=>$total_paid_amount);
        echo json_encode($responce); die; 
     }  


public function saveInvoiceDetails()
     {
        $c_user_id      = session()->get('user_id');
        $invoice_for    = $this->request->getPost('invoice_for'); 
        $project_id     = $this->request->getPost('project_id'); 
        $user_id        = $this->request->getPost('user_id'); 
        $price_type     = $this->request->getPost('price_type'); 
        $total_hours_old= $this->request->getPost('total_hours'); 
        $total_hours    =  $total_hours_old == '' ? '' : $total_hours_old;

        $total_amount   = $this->request->getPost('total_amount'); 
        $invoice_date   = date_format(date_create($this->request->getPost('invoice_date')),"Y-m-d");  
        $from_date      = date_format(date_create($this->request->getPost('from_date')),"Y-m-d"); 
        $to_date        = date_format(date_create($this->request->getPost('to_date')),"Y-m-d");
        $working_status = $this->request->getPost('working_status'); 
        $remark         = $this->request->getPost('remark'); 
        $invoice_type   = $this->request->getPost('invoice_type'); 

        if(!empty($_FILES["invoice_copy"]["tmp_name"])){
          $uploads_dir3  = './public/upload/invoice_copy';
          $tmp_name2     = $_FILES["invoice_copy"]["tmp_name"];
          $temp2         = explode(".", $_FILES["invoice_copy"]["name"]);
          $invoice_copy = 'img'.time().'.'.end($temp2);
          move_uploaded_file($tmp_name2, "$uploads_dir3/$invoice_copy");
        }else{
          $invoice_copy = ''; 
      }

        $info  =  array('invoice_type'=>$invoice_type,'project_id'=>$project_id,'invoice_for'=>$invoice_for,'invoice_date'=>$invoice_date,'user_id'=>$user_id,'total_amount'=>$total_amount,'price_type'=>$price_type,'total_hours'=>$total_hours,'from_date'=>$from_date,'to_date'=>$to_date,'invoice_copy'=>$invoice_copy,'remark'=>$remark,'upload_user_id'=>$c_user_id,'status'=>'1','create_by'=>$c_user_id);
        $invoice_id = $this->Common_model->saveData('ida_project_invoice',$info);   
        
        $invoice_unique_id = 'INV00'.$invoice_id;
        $invoice_pdf       = $invoice_unique_id.'.pdf';

        // PDF DATA
        $company_info             = $this->Common_model->getData('ida_company_info')->where(array('user_id'=>$c_user_id))->get();
        $check_company_info       = $company_info->getNumRows();
        if($check_company_info == '0'){
             $company_blank_info =   new \stdClass();;
             $company_blank_info->company_owner    = '';
             $company_blank_info->company_name     = ''; 
             $company_blank_info->company_phone    = ''; 
             $company_blank_info->company_address  = ''; 
             $company_blank_info->company_logo     = 'img1645617157.png'; 
             $data_pdf['company_info'] = $company_blank_info;
        }else{
            $data_pdf['company_info'] = $company_info->getRow();
        }    
        $user_info               = $this->Common_model->getData('ida_user_info')->where(array('user_id'=>$user_id))->get()->getRow();
        $data_pdf['user_info']       = $user_info;
        $user_basic_info         = $this->Common_model->getData('ida_user')->where(array('user_id'=>$user_id))->get()->getRow();
        $data_pdf['user_basic_info'] = $user_basic_info;
        $invoice_info            = $this->Common_model->getData('ida_project_invoice')->join('ida_project_list', 'ida_project_invoice.project_id = ida_project_list.project_id', 'left')->where(array('ida_project_invoice.invoice_id'=>$invoice_id))->get()->getRow();
        $data_pdf['invoice_info'] = $invoice_info;
        $data_pdf['invoice_unique_id'] = $invoice_unique_id;


        $uploads_dir2      = './public/upload/invoice_pdf/'.$invoice_pdf;
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('admin/accountsManagement/invoices/invoicepdf',$data_pdf));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents($uploads_dir2, $output);
        
      $data2 =  array('invoice_unique_id' =>$invoice_unique_id,'invoice_pdf'=>$invoice_pdf);
      $this->Common_model->updateData('ida_project_invoice',array('invoice_id'=>$invoice_id),$data2);

      $data3 = array('status' =>$working_status);
      $this->Common_model->updateData('ida_project_list',array('project_id' =>$project_id),$data3);
           //Send  Email
           $email_data['amount'] = $total_amount;
           $email_data['invoice_date'] = $invoice_date;
           $email_data['invoice_unique_id'] = $invoice_unique_id;
           $email_data['invoice_for'] = $invoice_for;
           $attach_invoice_pdf = base_url('public/upload/invoice_pdf/'.$invoice_pdf);
           $message = view('email_template/invoice',$email_data);
           $email = \Config\Services::email();
           $email->setFrom('contactus@ideatosteer.com', 'Idea To Steer');
           $email->setTo($user_basic_info->email);
           $email->setSubject('Invoice Copy');
           $email->attach($attach_invoice_pdf);
           $email->setMessage($message);//your message here
           $email->send();
           $email->printDebugger(['headers']); 


      session()->setFlashdata("msg", "Invoice has been successfully generated");
      if($invoice_for == 'Received'){
        return redirect()->to(base_url('Admin/generateInvoice')); 
      }else{
        return redirect()->to(base_url('Admin/generateEmployeeInvoice')); 
      }
 }

public function viewAllInvoices()
     {
        $user_id          = session()->get('user_id');
        $project_invoice  = $this->Common_model->getData('ida_project_invoice')->join('ida_project_list', 'ida_project_invoice.project_id = ida_project_list.project_id', 'left')->where(array('ida_project_invoice.invoice_type'=>'Regular','ida_project_invoice.invoice_for'=>'Received','ida_project_invoice.create_by'=>$user_id))->orderBy('ida_project_invoice.invoice_id', 'DESC')->get()->getResult();
        $data['project_invoice'] = $project_invoice;
        $data['title'] = 'View All Invoices';
        return view('admin/accountsManagement/invoices/viewAllInvoices',$data);  
     }
public function viewInvoices($id=0)
     {
        $user_id          = session()->get('user_id');
        $company_info   = $this->Common_model->getData('ida_company_info')->where(array('user_id'=>$user_id))->get()->getRow();
        $data['company_info'] = $company_info;

        $invoice_result   = $this->Common_model->getData('ida_project_invoice')->where(array('invoice_id'=>$id))->get()->getRow();
        $invoice_type = $invoice_result->invoice_type;
        if($invoice_type == 'Regular'){
            $invoice_info         = $this->Common_model->getData('ida_project_invoice')->join('ida_project_list', 'ida_project_invoice.project_id = ida_project_list.project_id', 'left')->where(array('ida_project_invoice.invoice_id'=>$id))->get()->getRow();
            $data['invoice_info'] = $invoice_info;

            $user_id = $invoice_info->user_id;
        }else{
           $data['invoice_info'] = $invoice_result;  
            $user_id = $invoice_result->user_id;
        }
        
        $user_info   = $this->Common_model->getData('ida_user_info')->where(array('user_id'=>$user_id))->get()->getRow();
        $data['user_info'] = $user_info;

        $user_basic_info   = $this->Common_model->getData('ida_user')->where(array('user_id'=>$user_id))->get()->getRow();
        $data['user_basic_info'] = $user_basic_info;

        $data['title'] = 'View Invoices';
        //return view('admin/accountsManagement/invoices/invoicepdf',$data); 
        if($invoice_type == 'Regular'){ 
          return view('admin/accountsManagement/invoices/viewInvoices',$data);  
         }else{
          return view('admin/accountsManagement/invoices/viewCustomInvoices',$data);      
        }
     }    

public function viewAllCustomInvoices()
     {
        $user_id          = session()->get('user_id');
        $project_invoice  = $this->Common_model->getData('ida_project_invoice')->where(array('invoice_type'=>'Custom','invoice_for'=>'Received','create_by'=>$user_id))->orderBy('invoice_id', 'DESC')->get()->getResult();
        $data['project_invoice'] = $project_invoice;
        $data['title'] = 'View All Custom Invoices';
        return view('admin/accountsManagement/invoices/viewAllCustomInvoices',$data);  
     }


public function saveCustomInvoiceDetails()
     {
        $c_user_id      = session()->get('user_id');
        $invoice_for    = $this->request->getPost('c_invoice_for'); 
        $descriptions   = $this->request->getPost('c_descriptions'); 
        $user_id        = $this->request->getPost('c_user_id'); 
        $price_type     = $this->request->getPost('c_price_type'); 
        $total_hours_old= $this->request->getPost('c_total_hours'); 
        $total_hours    =  $total_hours_old == '' ? '' : $total_hours_old;

        $total_amount   = $this->request->getPost('c_total_amount'); 
        $invoice_date   = date_format(date_create($this->request->getPost('c_invoice_date')),"Y-m-d");  
        $from_date      = date_format(date_create($this->request->getPost('c_from_date')),"Y-m-d"); 
        $to_date        = date_format(date_create($this->request->getPost('c_to_date')),"Y-m-d");
        $invoice_type   = $this->request->getPost('c_invoice_type'); 

        if(!empty($_FILES["c_invoice_copy"]["tmp_name"])){
          $uploads_dir3  = './public/upload/invoice_copy';
          $tmp_name2     = $_FILES["c_invoice_copy"]["tmp_name"];
          $temp2         = explode(".", $_FILES["c_invoice_copy"]["name"]);
          $invoice_copy = 'img'.time().'.'.end($temp2);
          move_uploaded_file($tmp_name2, "$uploads_dir3/$invoice_copy");
        }else{
          $invoice_copy = ''; 
      }

        $info  =  array('invoice_type'=>$invoice_type,'invoice_for'=>$invoice_for,'invoice_date'=>$invoice_date,'user_id'=>$user_id,'total_amount'=>$total_amount,'price_type'=>$price_type,'total_hours'=>$total_hours,'from_date'=>$from_date,'to_date'=>$to_date,'invoice_copy'=>$invoice_copy,'descriptions'=>$descriptions,'upload_user_id'=>$c_user_id,'status'=>'1','create_by'=>$c_user_id);
        $invoice_id = $this->Common_model->saveData('ida_project_invoice',$info);   
        
        $invoice_unique_id = 'INV00'.$invoice_id;
        $invoice_pdf       = $invoice_unique_id.'.pdf';

        // PDF DATA
        $company_info             = $this->Common_model->getData('ida_company_info')->where(array('user_id'=>$c_user_id))->get();
        $check_company_info       = $company_info->getNumRows();
        if($check_company_info == '0'){
             $company_blank_info =   new stdClass();
             $company_blank_info->company_owner    = '';
             $company_blank_info->company_name     = ''; 
             $company_blank_info->company_phone    = ''; 
             $company_blank_info->company_address  = ''; 
             $company_blank_info->company_logo     = 'img1645617157.png'; 
             $data_pdf['company_info'] = $company_blank_info;
        }else{
            $data_pdf['company_info'] = $company_info->getRow();
        }

        $user_info                = $this->Common_model->getData('ida_user_info')->where(array('user_id'=>$user_id))->get()->getRow();
        $data_pdf['user_info']    = $user_info;
        $user_basic_info          = $this->Common_model->getData('ida_user')->where(array('user_id'=>$user_id))->get()->getRow();
        $data_pdf['user_basic_info'] = $user_basic_info;
        $invoice_info            = $this->Common_model->getData('ida_project_invoice')->where(array('invoice_id'=>$invoice_id))->get()->getRow();
        $data_pdf['invoice_info'] = $invoice_info;
        $data_pdf['invoice_unique_id'] = $invoice_unique_id;


        $uploads_dir2      = './public/upload/invoice_pdf/'.$invoice_pdf;
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('admin/accountsManagement/invoices/invoiceCustompdf',$data_pdf));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents($uploads_dir2, $output);
        
      $data2 =  array('invoice_unique_id' =>$invoice_unique_id,'invoice_pdf'=>$invoice_pdf);
      $this->Common_model->updateData('ida_project_invoice',array('invoice_id'=>$invoice_id),$data2);


           //Send  Email
           $email_data['amount'] = $total_amount;
           $email_data['invoice_date'] = $invoice_date;
           $email_data['invoice_unique_id'] = $invoice_unique_id;
           $email_data['invoice_for'] = $invoice_for;
           $attach_invoice_pdf = base_url('public/upload/invoice_pdf/'.$invoice_pdf);
           $message = view('email_template/invoice',$email_data);
           $email = \Config\Services::email();
           $email->setFrom('contactus@ideatosteer.com', 'Idea To Steer');
           $email->setTo($user_basic_info->email);
           $email->setSubject('Custom Invoice Copy');
           $email->attach($attach_invoice_pdf);
           $email->setMessage($message);//your message here
           $email->send();
           $email->printDebugger(['headers']); 

      session()->setFlashdata("msg", "Custom Invoice has been successfully generated");
      if($invoice_for == 'Received'){
        return redirect()->to(base_url('Admin/generateInvoice')); 
      }else{
        return redirect()->to(base_url('Admin/generateEmployeeInvoice')); 
      }
 }     

public function generateEmployeeInvoice()
     {
        $user_id      = session()->get('user_id');
        $project_list = $this->Common_model->getData('ida_project_list')->where(array('create_by'=>$user_id))->get()->getResult();
        $data['project_list'] = $project_list;

        $client_list         = $this->Common_model->getData('ida_user')->where(array('create_by'=>$user_id))->whereIn('user_type_id',array('2'))->get()->getResult();
        $data['client_list'] = $client_list;

        $data['title'] = 'Generate Employee Invoice';
        return view('admin/accountsManagement/invoices/generateEmployeeInvoice',$data);
     } 
public function getEmployeeByProjectID()
     {
        $project_id   = $this->request->getPost('project_id'); 
        $project_assigned = $this->Common_model->getData('ida_project_assigned')->where(array('project_id'=>$project_id))->get()->getResult();
        $htmls = '';
        $htmls .= '<option value="">Select Employee</option>';
        foreach ($project_assigned  as $value) {
             $userInfo   = getUserInfo($value->user_id); 
             $user_name  = $userInfo->first_name.' '.$userInfo->last_name; 
             $htmls .= '<option value="'.$value->user_id.'">'.$user_name.' ('.$userInfo->designation.')</option>'; 
        }
       $responce =  array('htmls'=>$htmls);
        echo json_encode($responce); die; 
     }  
public function getEmployeeHireInfo()
     {
        $project_id = $this->request->getPost('project_id'); 
        $user_id    = $this->request->getPost('user_id'); 

        $where =  array('project_id'=>$project_id,'invoice_for'=>'Paid','user_id'=>$user_id);
        $invoice_info = $this->Common_model->getData('ida_project_invoice')->where($where)->get()->getResult();
        $count = count($invoice_info);
        if($count > '0'){
            $total_paid_amount = 0;
            foreach ($invoice_info as   $value) {
                $total_paid_amount += $value->total_amount; 
            }
        }else{
           $total_paid_amount = 0;  
        }
        
        $assigned_info = $this->Common_model->getData('ida_project_assigned')->where(array('project_id'=>$project_id,'user_id'=>$user_id))->get()->getRow();
        $responce = array('total_paid_amount' =>$total_paid_amount,'hire_type' =>$assigned_info->price_type, 'price' =>$assigned_info->price, 'hire_on' =>$assigned_info->assigned_on);
        echo json_encode($responce); die;
     } 

public function viewAllEmployeeInvoices()
     {
        $user_id         = session()->get('user_id');
        $project_invoice = $this->Common_model->getData('ida_project_invoice')->select('ida_project_invoice.*')->select('ida_project_invoice.user_id as emp_user_id')->select('ida_project_list.*')->join('ida_project_list', 'ida_project_invoice.project_id = ida_project_list.project_id', 'left')->where(array('ida_project_invoice.invoice_type'=>'Regular','ida_project_invoice.invoice_for'=>'Paid','ida_project_invoice.create_by'=>$user_id))->orderBy('ida_project_invoice.invoice_id', 'DESC')->get()->getResult();
        $data['project_invoice'] = $project_invoice;
        $data['title'] = 'View Employee Invoices';
        return view('admin/accountsManagement/invoices/viewAllEmployeeInvoices',$data);  
     }
public function viewAllCustomEmployeeInvoices()
     {
        $user_id         = session()->get('user_id');
        $project_invoice  = $this->Common_model->getData('ida_project_invoice')->where(array('invoice_type'=>'Custom','invoice_for'=>'Paid','create_by'=>$user_id))->orderBy('invoice_id', 'DESC')->get()->getResult();
        $data['project_invoice'] = $project_invoice;
        $data['title'] = 'View Employee Custom Invoices';
        return view('admin/accountsManagement/invoices/viewAllCustomEmployeeInvoices',$data);  
     }

public function viewEmployeeFinancialDetails($id=0)
    {
       $user_basic_info     = $this->Common_model->getData('ida_user')->where(array('user_id'=>$id))->get()->getRow();
       $data['user_basic_info'] = $user_basic_info;

       $user_info     = $this->Common_model->getData('ida_user_info')->where(array('user_id'=>$id))->get()->getRow();
       $data['user_info'] = $user_info;

      $lp_invoice_total  = $this->Common_model->getData('ida_project_invoice')->where(array('user_id'=>$id,'invoice_for'=>'Paid'))->get()->getNumRows();

      if($lp_invoice_total > '0'){
       $lp_invoice_info = $this->Common_model->getData('ida_project_invoice')->where(array('user_id'=>$id,'invoice_for'=>'Paid'))->orderBy('invoice_id', 'DESC')->get()->getRow();
       }else{
            $lp_invoice_info =  new \stdClass;
            $lp_invoice_info->total_amount = '0';
            $lp_invoice_info->add_date = 'N/A'; 
       }
       $data['lp_invoice_info'] = $lp_invoice_info;
       $project_list = $this->Common_model->getData('ida_project_list')->where(array('user_id'=>$id))->orderBy('project_id', 'DESC')->get()->getResult();
       $data['project_list'] = $project_list;

       $all_invoice_info = $this->Common_model->getData('ida_project_invoice')->where(array('user_id'=>$id,'invoice_for'=>'Paid'))->orderBy('invoice_id', 'DESC')->get()->getResult();
       $data['all_invoice_info'] = $all_invoice_info;
       
       $data['title'] = 'View Employee Financial Details';
       return view('admin/accountsManagement/employee/viewEmployeeFinancialDetails',$data);  
    }    
    
}
