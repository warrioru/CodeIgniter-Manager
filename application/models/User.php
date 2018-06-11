<?php
class User extends CI_Model {
	function login($username, $password) {
		$this->db->select ( 'id, first_name, last_name,email,id_role_fk' );
		$this->db->from ( 'usuarios' );
		$this->db->where ( 'email', $username );
		$this->db->where ( 'password', MD5 ( $password ) );
		$this->db->where ( 'is_active', '1' );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		// print_r($query->result());
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else if ($query->num_rows () == 0) {
			echo " Contrasena Incorrecta";
			return false;
		}
	}

}

?>
