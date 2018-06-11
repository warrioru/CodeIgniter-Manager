<?php

class Recoverpassword_model extends CI_Model {


public function __construct()	{
  $this->load->database(); 
}

public function check_username($username) {
  $this->db->select('email');
  $this->db->from('usuarios');
  $this->db->where('email', $username);
  $query = $this->db->get();
  //print_r($query->result());

   if($query -> num_rows() == 1)
   {
     return true;
   }
   else
   {
     return false;
   }

}

public function get_recoverPassword($username) {
	$this->load->helper('string');
  if($username != FALSE) {
    $aleatorio = random_string('alnum', 16);
   	$this->db->where('mailUsfq', $username); 

   	$data=array(
   		"olvidoContrasena"=>$aleatorio
   	);
   	$this->db->update("Usuario",$data);

    $query = $this->db->get_where('Usuario', array('mailUsfq' => $username));
    
    return $query->row_array();
    
  }
  else {
    return 0;
  }
}

public function consulta_si_existe($codigo)
{
  $rows=$this->db->get_where('Usuario', array(
    "olvidoContrasena" => $codigo
  )); 
  $query = $this->db->get_where('Usuario', array('olvidoContrasena' => $codigo));

  return $rows;
}

public function cambiar_contrasena($codigo, $password)
{
  $rows=$this->db->get_where('usuario', array(
    "olvidoContrasena" => $codigo
  ));  
  $data=array(
    "contrasena"=>md5($password),
    "olvidoContrasena"=> NULL
    );
  $this->db->where("olvidoContrasena",$codigo);
  $this->db->update("usuario",$data);


  return $rows;

}


}

?>
