<?php
/**
 * Classe simples para a construção de formulários de contato com o Wordpress
 * @name Contact Form Builder
 * @package Turumim Framework
 * @version 0.1
 * @author Sérgio Vilar
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 */

class FormularioContato extends FormHelper{
	protected $to;
	protected $from;
	protected $from_email;
	protected $assunto;
	protected $campos = array();
	protected $sucessMsg;
	protected $errorMsg;

	// ========== Constrói e destrói o objeto
	function __construct($to, $from, $from_email, $assunto){
		$this->to = $to;
		$this->from = $from;
		$this->from_email = $from_email;
		$this->assunto = $assunto;
	}

	function __destruct(){

		if($_POST):
			$message = "";

			foreach($this->campos as $key=>$value):
				if(!empty($_POST[$key])) $message .= $this->campos[$key]["label"].": ".$_POST[$key]."<br />";
			endforeach;

			debug($message);

			if($this->sendmail($message)):
				$this->showMsg();
			else:
				$this->showMsg(false);
			endif;

		endif;

	}

	// ========== Métodos Herdados

	//--- Campos
	public function text($name, $label = null, $required = false, $class = null, $id = null, $placeholder = null, $value = null){
		
		parent::text($name, $label, $required, $class, $id, $placeholder, $value);

		// Adiciona na array de campos
		$this->campos[$name] = array("valor"=>"","label"=>$label);

	}

	public function select($name, $label = null, $opcoes = array(), $required = false, $class = null, $id = null){

		parent::select($name, $label, $opcoes, $required, $class, $id);
		
		// Adiciona na array de campos
		$this->campos[$name] = array("valor"=>"","label"=>$label);

	}

	public function textarea($name, $label = null, $required = false, $class = null, $id = null, $placeholder = null, $value = null){
		
		parent::textarea($name, $label, $required, $class, $id, $placeholder, $value);
		
		// Adiciona na array de campos
		$this->campos[$name] = array("valor"=>"","label"=>$label);

	}

	// ========== Funções Públicas

	//--- Mensagens
	public function setSucessMsg($msg){
		$this->sucessMsg = $msg;
	}

	public function setErrorMsg($msg){
		$this->errorMsg = $msg;
	}

	public function showMsg($sucess = true){
		if($sucess==true):
			echo '<script type="text/javascript">document.getElementById("sucess-form").style.display = "block";</script>';
		else:
			echo '<script type="text/javascript">document.getElementById("error-form").style.display = "block";</script>';
		endif;
	}

	// ========== Funções privadas
	private function sendmail($message){

		add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
		$headers = 'From: '.$this->from.' <'.$this->from_email.'>' . "\r\n";
		wp_mail($this->to, $this->assunto, $message, $headers);

		return true;

	}


}
?>