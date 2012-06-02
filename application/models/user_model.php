<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User
 *
 * This model represents user authentication data. It operates the following tables:
 * - user
 *
 * @package	N/A
 * @author	Tim Redman (http://www.timredman.co.uk)
 */

class User_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}
	
	/**
	 * Get user by ID
	 *
	 * Get a user object based on its ID
	 *
	 * $user_id - Users ID
	 *
	 */
	public function get_user($user_id)
	{
		$user = $this->db->get_where('user', array('id' => $user_id));
		return $user;
	}
	
	/**
	 * Get users fullname
	 *
	 * @param int userid
	 *
	 * @return object userobject
	 */
	public function get_user_fullname($user_id)
	{
		$this->db->select('id,firstname, lastname');
		$fullname = $this->db->get_where('user', array('id' => $user_id, 'deleted' => 0));
		return $fullname;
	}	
	
	/**
	 * Get all users
	 *
	 * Get all users from the DB
	 *
	 */
	public function get_all_users()
	{
		$all_users = $this->db->get('user');
		return $all_users;	 	
	}
	
	
	/**
	 * Insert User
	 *
	 * Insert user object into the db
	 *
	 * $user - object of user details
	 *
	 */	 
	public function add_user($user)
	{
		$this->db->insert('user', $user);
		$user_id = $this->db->insert_id();
		return $user_id;
	}
	
	/**
	 * Edit User
	 *
	 * Edit user in the db
	 *
	 * $user - object of user details
	 *
	 */
	public function edit_user($user)
	{
		$this->db->update('user', $user);
	}
	
	/**
	 * Delete User
	 * 
	 * Set deleted to 1 to indicate user deleted
	 *
	 */
	public function delete_user($user)
	{
		$this->db->update('user', $user);
	}
}
?>