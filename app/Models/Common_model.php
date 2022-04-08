<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Common_model extends Model
{
     
    public function getData($table_name)
    {
        $query = $this->db->table($table_name);
        return $query;
    }
     

    public function saveData($table_name,$data){
            $query = $this->db->table($table_name)->insert($data);
            return $this->db->insertID();
           
    }
 
    public function deleteData($table_name,$whereData)
    {
        $query = $this->db->table($table_name)->delete($whereData);
        return $query;
    }

    public function updateData($table_name,$whereData,$data)
    {
       $query = $this->db->table($table_name)->where($whereData)->update($data); 
       return $query;
    }

    public function getDataWithWhere($table_name,$whereData,$orderBy)
    {

         $query = $this->db->table($table_name);
         if(!empty($whereData)){
         $query->where($whereData);
         }
         if(!empty($orderBy)){
         $query->orderBy($orderBy, 'DESC');
         }
         return $query;
    }
    
}