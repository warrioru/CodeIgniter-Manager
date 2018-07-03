<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function verifylogin() {
  parent::CI_Controller();


 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->form_validation->set_rules('email', 'Username', 'trim|required|callback_username_check',
    array('required' => '%s no puede estar vacio')
    );
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database',
    array('required' => '%s no puede estar vacio')
    );


   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login_view');
   }
   else
   {
     //Go to private area
     redirect('vinos', 'refresh');
   }

 }

 function username_check($username) {
  

      $this->load->model('recoverpassword_model');
      $check_username = $this->recoverpassword_model->check_username($username);
      if ($check_username == TRUE)
      {
        return TRUE;
      }
      else {
        $this->form_validation->set_message('username_check', 'El usuario no existe');
        return FALSE;
      }
    }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('email');

   //query the database
   $result = $this->user->login($username, $password);
   //$ClientIpAdress = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']); //Obtener la direccion ip del cliente
  //$myfile = fopen("newfile.txt", "a") or die("Unable to open file!"); //creamos para hacer un append sobre el archivo
  //$txt = $ClientIpAdress." ".date("Y-m-d")." ".date("h:i:sa")." ".$username." ".$password."\n";

  //fwrite($myfile, $txt);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'nombre' => $row->first_name,
         'apellido' => $row->last_name,
         'username' => $row->email,
         'id_role_fk' => $row->id_role_fk,
         'exito' => false
       );
       //$this->session->set_userdata($sess_array);
       ini_set('session.cookie_lifetime', 86900400);
       ini_set('session.gc_maxlifetime', 86900400);
       //echo "ok";
       if(!isset($_SESSION))
       {
       	session_start();
       }
       $_SESSION["usuario"]=$sess_array;
       
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Contrasena Incorrecta');
     return false;
   }
 }
}
?>
