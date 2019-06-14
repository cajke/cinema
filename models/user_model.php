<?php

class User_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/*
	 * Show all users
	 */
	public function userList()
    {
         return $this->db->findAll(TABLE_USERS);
    }

    /*
     * Find by id
     */
    public function userSingleList($id)
    {
        return $this->db->findById(TABLE_USERS,$id);
    }

    /*
     * Insert user
     */
    public function create($data)
    {
        $this->db->insert(TABLE_USERS, $data);
    }


    /*
     * Edit user(update)
     */
    public function editSave($data)
    {
        $this->db->update(TABLE_USERS, $data, "id=".$data['id']);
    }

    /*
     * Delete user by id
     */
    public function delete($id)
    {
        $this->db->delete(TABLE_USERS,$id);
    }
}