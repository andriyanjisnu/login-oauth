<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_facebook extends CI_Model
{
    
    public function is_facebook_user_has_registered($user_id)
    {
        $check = $this->db
            ->where(array('oauth_provider' => 'facebook', 'oauth_uid' => $user_id))
            ->get('users');

        return ($check->num_rows() > 0) ? TRUE : FALSE;
    }

    public function register_new_user($data)
    {
        $this->db->insert('users', $data);
       
        return $this->db->insert_id();
    }

    public function register_new_user2($data2)
    {
        $this->db->insert('registrations', $data2);
       
        return $this->db->insert_id();
    }

    public function is_facebook_user_exist($email, $uid)
    {
        $check = $this->db
            ->where(array('email' => $email, 'oauth_provider' => 'facebook', 'oauth_uid' => $uid))
            ->get('users');

        return ($check->num_rows() > 0) ? TRUE : FALSE;
    }

    public function get_facebook_user_data($uid)
    {
        $data = $this->db
            ->where(array('oauth_provider' => 'facebook', 'oauth_uid' => $uid))
            ->get('users');

        return $data->row();
    }
}