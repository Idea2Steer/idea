<?php 
class Common_model extends CI_Model 
{
public function __construct()
	{ 
		parent::__construct(); 	
		$this->load->database();
	}
/******************************************
* 	Select Data By Where and orderby      *
******************************************/	
public function SelectRecord($TableName,$Selectdata,$WhereData,$orderby)
    {
  		$this->db->select($Selectdata);
  		if(!empty($orderby)){
  			$this->db->order_by($orderby,"desc");
  		}
  		if(!empty($WhereData)){
  			$this->db->where($WhereData);
  		}
  		$query = $this->db->get($TableName);
  		return $query;
	}

public function SelectRecordWithLimit($TableName,$Selectdata,$WhereData,$orderby,$limitCount)
   {
      $this->db->select($Selectdata);
      if(!empty($orderby)){
        $this->db->order_by($orderby,'desc');
      }
      if(!empty($WhereData)){
        $this->db->where($WhereData);
      }
      if(!empty($limitCount)){
        $this->db->limit($limitCount);
      }
      $query = $this->db->get($TableName);
      return $query;
  }  
/*****************************************
* 	Select Data By Where Conditions      *
*****************************************/	
public function get_data($table,$where)
{
  $query =$this->db->get_where($table,$where);
  return $query;
}
/*****************************************
* 	Select Data By Where In Conditions   *
*****************************************/
public function get_data_where_in($table,$where_in,$data) 
  {
	 $this->db->select('*');
	 $this->db->from($table);
	 $this->db->where_in($where_in,$data);
	 $query = $this->db->get();
	 return $query;
  }  
public function get_data_where_in_group_by($table,$where_in,$data,$group_by) 
{
  $this->db->select('*');
  $this->db->from($table);
  $this->db->where_in($where_in,$data);
  $this->db->group_by($group_by);
  $query = $this->db->get();   
  return $query;
}
/************************************************
*   Select Data By Where In & Wher Conditions   *
*************************************************/
public function get_data_where_with_where_in($table,$where,$where_in,$data)   
  {
   $this->db->select('*');
   $this->db->from($table);
   $this->db->where($where);
   $this->db->where_in($where_in,$data);
   $query = $this->db->get();
   return $query;
  }
/************************************************
*   Select Data By Where In & Wher Conditions  Oreder BY *
*************************************************/
public function get_data_where_with_where_in_order_by($table,$where,$where_in,$data,$orderby)   
  {
   $this->db->select('*');
   $this->db->from($table);
   $this->db->where($where);
   $this->db->where_in($where_in,$data);
    if(!empty($orderby)){
      $this->db->order_by($orderby);
    }
   $query = $this->db->get();
   return $query;
  }    
/*****************************************
* 				Select Data  		     *
*****************************************/  
public function get_all_data($table,$groupby='')
	{
		if(!empty($groupby))
		{
			$this->db->group_by($groupby);
		}
		$query = $this->db->get($table);
		return $query;
	} 
/*****************************************
* 	   Select Data  using Find in	     *
*****************************************/ 
public function get_data_find_in_set($table,$value,$colum) 
  {  
   $where = "FIND_IN_SET('".$value."', ".$colum.")";  
	 $this->db->select('*');
	 $this->db->from($table);
	 $this->db->where($where);
	 $query = $this->db->get();
	 return $query;
  } 
/*****************************************************
* 	   Select Data  using Find in With Where	     *
*****************************************************/ 
public function get_data_find_in_set_with_where($table,$value,$colum,$where_Data) 
  {  
     $where = "FIND_IN_SET('".$value."', ".$colum.")";  
	 $this->db->select('*');
	 $this->db->from($table);
	 $this->db->where($where_Data);
	 $this->db->where($where);
	 $query = $this->db->get();
	 return $query;
  }   
/*****************************************
* 	   		Join Query		   		     *
*****************************************/
public function joinData($place1,$place2,$WhereData,$Selectdata,$TableName1,$TableName2,$orderby){
		$this->db->select($Selectdata);







		$this->db->from($TableName1);







		$this->db->join($TableName2, $place1 .'='. $place2);







		$this->db->order_by($orderby);



    if($WhereData){



    $this->db->where($WhereData);  



    }



		







		$query = $this->db->get();







		return $query;







	}     	







	public function joinDataWithTwoWhereIn($place1,$place2,$WhereData,$Selectdata,$TableName1,$TableName2,$wherein,$whereinData,$wherein2,$whereinData2,$orderby){   



      $this->db->select($Selectdata);   



      $this->db->from($TableName1);   



      $this->db->join($TableName2, $place1 .'='. $place2);    



      $this->db->order_by($orderby);    



      if(!empty($WhereData)){



        $this->db->where($WhereData);     



      }



      $this->db->where_in($wherein,$whereinData);   



      $this->db->where_in($wherein2,$whereinData2);   



      $query = $this->db->get();    



      return $query;    



    }  







/*****************************************		







*   Join Query  With Where In            *		







*****************************************/		







public function joinDataWithWhereIn($place1,$place2,$WhereData,$Selectdata,$TableName1,$TableName2,$wherein,$whereinData,$orderby){		







	    $this->db->select($Selectdata);		







	    $this->db->from($TableName1);		







	    $this->db->join($TableName2, $place1 .'='. $place2);		







	    $this->db->order_by($orderby);		







	    $this->db->where($WhereData);		







	    $this->db->where_in($wherein,$whereinData);		







	    $query = $this->db->get();		







	    return $query;		







	  }     	







/*****************************************







* 		Save Data(Insert Query)    		 *







*****************************************/







public function save($table, $data)







	{







		$this->db->insert($table, $data);







		return $this->db->insert_id();







	}







/*****************************************







* 		Update Data(Update Query)    	 *







*****************************************/







public function update($table,$where,$data)







  {







      $this->db->where($where);







      $this->db->update($table, $data); 







  }















/*************************************************







*   Update Data(Update Query) with Where In      *







*************************************************/







public function update_where_in($table,$wherein,$whereinData,$data)







  {







      $this->db->where_in($wherein,$whereinData);







      $this->db->update($table, $data); 







  }















/*****************************************







* 		Delete Data(Delete Query)    	 *







*****************************************/







public function delete($table,$where)







 {







	$this->db->where($where);







	$this->db->delete($table); 







 }







/*****************************************







* 		Send Email(Email function)    	 *







*****************************************/ 







public function sendEmail($emailData)







{







    $this->load->library('email');







    $config['protocol'] = "relay-hosting.secureserver.net";



    // $config['protocol'] = "smtp";



    // $config['protocol'] = "email";



    $config['smtp_host'] = "localhost";



    $config['smtp_port'] = "25";



    $config['smtp_auth'] = False;



    $config['smtp_secure'] = None;



    $config['smtp_user'] = "support@cpay-solutions.com"; 



    $config['smtp_pass'] = "support@123";      



    // $config['smtp_host'] = "ssl://sg2plcpnl0231.prod.sin2.secureserver.net";



    // $config['smtp_port'] = "465";



    // $config['smtp_user'] = "support@cpay-solutions.com"; 



    // $config['smtp_pass'] = "support@123";



    // $config['newline'] = "\r\n";



    $config['charset'] = "utf-8";



    $config['mailtype'] = "html";







    $this->email->initialize($config);



    $this->email->set_newline("\r\n");







    // $this->email->from('support@cpay-solutions.com', 'Salasar Comserve LLP');



      $this->email->from('support@cpay-solutions.com', 'Salasar Comserve LLP');







    $list = $emailData['to'];



    $cc = $emailData['cc_email'];



    $this->email->cc($cc);



    // $this->email->cc('cpaysolutions1@gmail.com');



    $this->email->to($list);







    $this->email->subject($emailData['subject']);







    $this->email->message($emailData['body']);







    if($this->email->send()){



        echo "send";



        return 1; //IF MAIL HAS BEEN SENT SUCCESSFULLY



         }







    else{



      echo $this->email->print_debugger();



        echo "not";



        return 2; //IF MAIL HAS BEEN NOT SENT! FAIL







        }







}







public function get($table, $select, $where='', $join=[], $limit=[], $orderby=[], $groupby=[],$where_in='',$where_in_data=[]) 



{ 



      $this->db->select($select); $this->db->from($table); 



      if(!empty($join)){ 



        foreach($join as $value){ 



          # assuming alias is used 



          $jparam = explode('|', $value); 



          $this->db->join($jparam[0], $jparam[1], isset($jparam[2])?$jparam[2]:''); 



        } 



      } 



      if(!empty($where))



      { 



        $this->db->where($where); 



      } 



      if(!empty($where_in) && !empty($where_in_data))



      {



        $this->db->where_in($where_in,$where_in_data);



      }



      if(!empty($orderby))



      { 



        foreach($orderby as $key => $value){



          $this->db->order_by($key, $value);



        } 



      }



      if(!empty($limit)){ 



        $this->db->limit($limit[0], $limit[1]);



      } 



      if(!empty($groupby)){ 



        $this->db->group_by($groupby);



      } 



      $result = $this->db->get();



      //print_r($this->db->last_query());die;



      return $result->result_array(); 



}







/*****************************************************







* 		Send Email With Attach(Email function)    	 *







*****************************************************/ 
public function sendEmailWithattach($emailData,$path)
{
    $this->load->library('email');
    $config['protocol'] = "smtp";
    $config['smtp_host'] = "ssl://sg2plcpnl0119.prod.sin2.secureserver.net";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = "itsupport@salasar-travels.com"; 
    $config['smtp_pass'] = "it@123";
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";
    $this->email->initialize($config);
    $this->email->from('itsupport@salasar-travels.com', 'Salasar Travels');
    $list = $emailData['to'];
    $this->email->to($list);
    $this->email->cc('cpaysolutions1@gmail.com');
    $this->email->subject($emailData['subject']);
    $this->email->message($emailData['body']);
  	$this->email->attach($path);
    if($this->email->send()){
        echo "send";
        return 1; //IF MAIL HAS BEEN SENT SUCCESSFULLY
    }else{
        echo "not";
        return 2; //IF MAIL HAS BEEN NOT SENT! FAIL
    }
}

public function reconAPI($url)
{

    $curl = curl_init();
     curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
    "api-key: TSSDNUAPI03733523",
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: f49611dc-df15-0c4d-6f75-97ab23400d6e"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
  if ($err) {
    return  "cURL Error #:" . $err;
  } else {
    return  json_decode($response);
  }
}

}

?>    































