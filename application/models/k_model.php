<?php

class K_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }   


    /**
     * [insert_new_data insert data into table - any type of table]
     * @param  [type] $arrayData [data value received from controller(column and value already)]
     * @param  [type] $table     [name of table to insert the data]
     * @return [type]            [description]
     */
    function insert_data($arrayData,$table)
    {
        $this->db->insert($table,$arrayData);        
        return $this->db->insert_id();
    }


    /**
     * [update_data update datas in any tables you want]
     * @param  [array] $columnToUpdate [what column you want to update = array value]
     * @param  [string] $tableToUpdate  [what table you want to update]
     * @param  [array] $usingCondition [using condition or not]
     * @return [type]                 [description]
     */
    
    function update_data($columnToUpdate, $tableToUpdate, $usingCondition)
    {
        
        $this->db->where($usingCondition);
        $this->db->update($tableToUpdate, $columnToUpdate);


    }


    /**
     * [delete_data delete all type of table]
     * @param  [type] $table [name of table]
     * @param  [type] $where [condition to applied]
     * @return [type]        [description]
     */
    function delete_data($table, $where){

        $this->db->where($where);
        $this->db->delete($table);
    }
    

    
    /**
     * [get_all_rows description]
     * @param  [type]  $table           [Compulsary : Table name that want to select]
     * @param  boolean $where           [Optional : where condition to select, if not state will select all data]
     * @param  boolean $tableNameToJoin [Optional : The name of table to join]
     * @param  boolean $tableRelation   [Optional : Relation of table to join]
     * @param  boolean $order_by        [Optional : Order by descending or ascending]
     * @return [type]                   [description]
     * Example usage
     *
     * Example 1 : Klu nk select data tanpa condition dan tanpa join
     * $table = "users";
     * $this->seat_model->get_specified_row($table);
     *
     * Example 2 : Klu nk select data dengan condition dan tanpa join
     * $table = "users";
     * $where = array('user_id' => $user_id);
     * $this->seat_model->get_specified_row($table, $where);
     * 
     * Example 3 : Klu nk select data tanpa condition dan dengan join(join satu table)
     * $table = "users";
     * $tableNameToJoin = array('branches');
     * $tableRelation = array('users.branch_id = branches.branch_id');
     * $this->seat_model->get_specified_row($table, $where, $tableNameToJoin , $tableRelation);
     *
     * Example 4 : Klu nk select data tanpa condition dan dengan join(join 2 table)
     * $table = "users";
     * $tableNameToJoin = array('course','semester');
     * $tableRelation = array('users.course_id = course.course_id',
     *                        'users.semester_id = semester.course_id'
     *                       );
     * $this->seat_model->get_specified_row($table, $where, $tableNameToJoin , $tableRelation);
     * Begitulah seterusnya untuk join table lain, tambah ikut suka
     *
     * Example 5 : Klu nk select data dengan condition dan dengan join(join satu table)
     * $table = "users";
     * $tableNameToJoin = array('branches');
     * $tableRelation = array('users.branch_id = branches.branch_id');
     * $where = array('users.user_id' => $user_id);
     * $this->seat_model->get_specified_row($table, $where, $tableNameToJoin , $tableRelation);
     */
    function get_specified_row($table, $where = false, $tableNameToJoin = false, $tableRelation = false, $order_by = false)
    {
        
        $this->db->select('*');
        $this->db->from($table);

        if($where!=false)
        {
             $this->db->where($where); 
        }

        if($order_by!=false)
        {
            $this->db->order_by($order_by[0], $order_by[1]);
        }

        if($tableNameToJoin!=false && $tableRelation!=false){
                for ($i=0; $i < count($tableNameToJoin); $i++){
                    $this->db->join($tableNameToJoin[$i], $tableRelation[$i]);
                }
                
        }

        $query = $this->db->get();
        return $query->row_array();    
    }




    
    /**
     * [get_all_rows description]
     * @param  [type]  $table           [Compulsary : Table name that want to select]
     * @param  boolean $where           [Optional : where condition to select, if not state will select all data]
     * @param  boolean $tableNameToJoin [Optional : The name of table to join]
     * @param  boolean $tableRelation   [Optional : Relation of table to join]
     * @param  boolean $order_by        [Optional : Order by descending or ascending]
     * @return [type]                   [description]
     * Example usage
     *
     * Example 1 : Klu nk select data tanpa condition dan tanpa join
     * $table = "users";
     * $this->seat_model->get_all_rows($table);
     *
     * Example 2 : Klu nk select data dengan condition dan tanpa join
     * $table = "users";
     * $where = array('user_id' => $user_id);
     * $this->seat_model->get_all_rows($table, $where);
     * 
     * Example 3 : Klu nk select data tanpa condition dan dengan join(join satu table)
     * $table = "users";
     * $tableNameToJoin = array('branches');
     * $tableRelation = array('users.branch_id = branches.branch_id');
     * $this->seat_model->get_all_rows($table, $where, $tableNameToJoin , $tableRelation);
     *
     * Example 4 : Klu nk select data tanpa condition dan dengan join(join 2 table)
     * $table = "users";
     * $tableNameToJoin = array('course','semester');
     * $tableRelation = array('users.course_id = course.course_id',
     *                        'users.semester_id = semester.course_id'
     *                       );
     * $this->seat_model->get_all_rows($table, $where, $tableNameToJoin , $tableRelation);
     * Begitulah seterusnya untuk join table lain, tambah ikut suka
     *
     * Example 5 : Klu nk select data dengan condition dan dengan join(join satu table)
     * $table = "users";
     * $tableNameToJoin = array('branches');
     * $tableRelation = array('users.branch_id = branches.branch_id');
     * $where = array('users.user_id' => $user_id);
     * $this->seat_model->get_all_rows($table, $where, $tableNameToJoin , $tableRelation);
     */
    function get_all_rows($table,$where = false, $tableNameToJoin = false, $tableRelation = false, $order_by = false)
    {
            

            $this->db->select('*');
            $this->db->from($table);

            if($where!=false){
               $this->db->where($where);
            }
           
           if($order_by!=false){
                $this->db->order_by($order_by[0], $order_by[1]);
           }
        
           if($tableNameToJoin!=false && $tableRelation!=false){
                for ($i=0; $i < count($tableNameToJoin); $i++){
                    $this->db->join($tableNameToJoin[$i], $tableRelation[$i]);
                }
                
           }
          
            $query = $this->db->get();
            return $query->result_array(); 
           
    }


    /**
     * [display_message display flash message data in view part]
     * @param  [string] $messageType [what type of message you want to display]
     * @param  [string] $urlToGo     [url you want to redirect after making the process ==> if using current url just use current_url()]
     * @return [type]              [description]
     * currently only 3 types of message can appear on page (save, record, error) ->can change the if else to add another type of message
     */
     
     function get_num_rows($table, $where = false, $tableNameToJoin = false, $tableRelation = false, $order_by = false)
    {
            

            $this->db->select('*');
            $this->db->from($table);

            if($where!=false){
               $this->db->where($where);
            }
           
           if($order_by!=false){
                $this->db->order_by($order_by[0], $order_by[1]);
           }
        
           if($tableNameToJoin!=false && $tableRelation!=false){
                for ($i=0; $i < count($tableNameToJoin); $i++){
                    $this->db->join($tableNameToJoin[$i], $tableRelation[$i]);
                }
                
           }
          /* if($likes!=false){
            $this->db->like($likes, 'after'); 
           }*/
         
            $query = $this->db->get();
            return $query->num_rows(); 
           
    }
    
    
    function display_message($messageType, $urlToGo = false)
    {
        /**
         * usage :
         * calling this method in controller of course
         * example : display_message("save","jobs/index/add")
         * 1st parameter $messageType is compulsary : accept value insert,update,delete,error,email
         * 2nd paramter $urlToGo is optional : default direction will be given if not specified
         * @var [type]
         */
        if($messageType == "insert")
        {
             $this->session->set_flashdata('insert', 'Data successfully recorded');

        }
        else if($messageType == "update")
        {
             $this->session->set_flashdata('update', 'Successfully saved');
        }
        else if($messageType == "delete")
        {
             $this->session->set_flashdata('delete', 'Data Successfully deleted.');
        }
        else if($messageType == "error")
        {
             $this->session->set_flashdata('error', 'There is an errors in processing, please try again.');
        } 
        else if($messageType == "login")
        {
             $this->session->set_flashdata('error', 'Please login first before book.');
        }
        else if($messageType == "logout")
        {
             $this->session->set_flashdata('logout', 'Successful logout, thnk you and please come again.');
        }        
        else if($messageType == "email")
        {
             $this->session->set_flashdata('email', 'Successfully sent email.');
        } 
        else if($messageType == "booking")
        {
             $this->session->set_flashdata('booking', 'Successfully sent email and sms to your contact with details information. Thank you.');
        }
        else if($messageType == "order")
        {
             $this->session->set_flashdata('order', 'Order success, here is the list of your orders.');
        } 
        else if($messageType == "confirm_order")
        {
             $this->session->set_flashdata('confirm_order', 'All the orders were confirmed.');
        }  
        else if($messageType == "login_error")
        {
             $this->session->set_flashdata('login_error', 'Username/email or password incorrect.');
        }       
        if($urlToGo == false){
             $url = current_url();
        }
        else
        {
             $url = $urlToGo;
        }
            return redirect($url);
    }

 
}


?>