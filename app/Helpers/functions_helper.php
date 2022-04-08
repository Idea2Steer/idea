<?php
/**
 *  Helper File
 *
 * @package     Helper File
 * @author      Author name
 * @copyright       Copyright (c) 2016
 * @link            http://www.your-url.com
 * @since           Version 1.0
 */
if ( ! defined('MyCustomURL')) exit('No direct script access allowed');
// User Main Info
function getUserMainInfo($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_user Where user_id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getRow();
    return $results;
}
// User Info
function getUserInfo($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_user_info Where user_id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getRow();
    return $results;
}
// User Type
function getUserType($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_user_type Where user_type_id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getRow();
    return $results->user_type;
}

// State Name
function getCountryName($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_countries Where id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getRow();
    return $results->name;
}

// State Name
function getStateName($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_states Where id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getRow();
    return $results->name;
}

// City Name
function getCityName($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_cities Where id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getRow();
    return $results->name;
}

// Total Assigned
function getTotalAssigned($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_project_assigned Where project_id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getResult();
    return count($results);
}

// Total Attached
function getTotalAttached($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_project_attached Where project_id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getResult();
    return count($results);
}

// Total Total Amount
function getTotalInvoiceAmount($id,$id2){
    $db = \Config\Database::connect();
    $sql = "SELECT sum(total_amount) as all_total_amount FROM ida_project_invoice Where invoice_for = '".$id2."' AND project_id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getRow();
    if($results->all_total_amount == ''){
       $all_total_amount =  '0.00';
    }else{
       $all_total_amount =  $results->all_total_amount;
    }
    return $all_total_amount;
}
// Total Project By Clint
function getTotalProjectByClint($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_project_list Where user_id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getResult();
    return count($results);
}
// Total Paid By Clint
function getTotalPaidByClint($id){
    $db = \Config\Database::connect();
    $sql = "SELECT sum(total_amount) as total_amounts FROM ida_project_invoice Where invoice_for = 'Received' And user_id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getRow();
    return $results->total_amounts;
}
// Total Runing Project By Clint
function getTotalRuningProjectByClint($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_project_list Where user_id='".$id."' AND status = '1'";  
    $query   = $db->query($sql);
    $results = $query->getResult();
    return count($results);
}
// Get Last Payment Details By Project
function getLastPaymentByProject($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_project_invoice Where project_id='".$id."' AND invoice_type = 'Received'";  
    $query   = $db->query($sql);
    $results = $query->getResult();
    if(count($results) == '0'){
            $total_received_amount = '0';
            $last_received_amount  = '0';
            $last_received_date    = 'N/A';
        }else{
            $total_received_amount = '0';
            foreach ($results as $value) {
              $total_received_amount += $value->total_amount;
            }
             $sql2 = "SELECT * FROM ida_project_invoice Where project_id='".$id."' AND invoice_type = 'Received' ORDER BY invoice_id DESC LIMIT 1";  
             $query2   = $db->query($sql2);
             $results2 = $query2->getRow();
             $last_received_amount  = $results2->total_amount;
             $last_received_date  = $results2->add_date;
        }
    $responce = array('total_received_amount'=>$total_received_amount,'last_received_amount'=>$last_received_amount,'last_received_date'=>$last_received_date);       
    return $responce;
}


// Total Assigned
function getTotalAssignedToEmp($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_project_assigned Where user_id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getResult();
    return count($results);
} 

// Total Paid To Employee
function getTotalPaidToEmployee($id){
    $db = \Config\Database::connect();
    $sql = "SELECT sum(total_amount) as total_amounts FROM ida_project_invoice Where invoice_for = 'Paid' And user_id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getRow();
    if($results->total_amounts == ''){
        $total_amounts = '0';
    }else{
        $total_amounts = $results->total_amounts;
    }
    return $total_amounts;
}

// Total Project Details
function getTotalProjectDetails($id){
    $db = \Config\Database::connect();
    $sql = "SELECT * FROM ida_project_list Where project_id='".$id."'";  
    $query   = $db->query($sql);
    $results = $query->getRow();
    return $results;
}
?>