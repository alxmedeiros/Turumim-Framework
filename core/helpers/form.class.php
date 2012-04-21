<?php
/**
 * Classe simples para a construção de formulários de contato com o Wordpress
 * @name Contact Form Builder
 * @package Turumim Framework
 * @version 0.1
 * @author Sérgio Vilar
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 */

class FormHelper{

	//--- Monta o formulário
	public function showForm($action, $name = null, $id = null, $class = null, $method = "post"){
		echo "<form action='".$action."' method='".$method."' name='".$name."' id='".$id."' class='".$class." feelsen-form'>\n";

		// Mensagens escondidas
		if($this->sucessMsg):
			echo '<div style="display:none" class="msg success" id="sucess-form">'.$this->sucessMsg.'</div>';
		else:
			echo '<div style="display:none" class="msg success" id="sucess-form">Mensagem enviada com sucesso!</div>';
		endif;

		if($this->errorMsg):
			echo '<div style="display:none" class="msg success" id="sucess-form">'.$this->errorMsg.'</div>';
		else:
			echo '<div style="display:none" class="msg error" id="error-form">Houve um problema ao enviar e mensagem.</div>';
		endif;

	}

	public function closeForm($label){
		echo "<input type='submit' id='enviar-contato' value='".$label."' />\n";
		echo "</form>";
	}

	//--- Campos
	public function text($name, $label = null, $required = false, $class = null, $id = null, $placeholder = null, $value = null){

		// Monta o campo
		$span = "";

		echo "<div class='formulario-textfield formulario-input'>";

		if($required == true) $span = "<span>*</span>";
		if(!empty($label)) echo "<label>".$label.$span."</label> ";

		// Input
		echo "<input type='text' name='".$name."'";

		// Parâmetros
		if(!empty($placeholder)) echo " placeholder='".$placeholder."'";
		if(!empty($id)) echo " id='".$id."'";
		if(!empty($class)) echo " class='".$class."'";
		if(!empty($value)) echo " value='".$value."'";


		// Fecha o input
		echo " />\n";

		echo "</div>";
	}

	public function select($name, $label = null, $opcoes = array(), $required = false, $class = null, $id = null){
		// Adiciona na array de campos
		$this->campos[$name] = array("valor"=>"","label"=>$label);

		// Monta o campo
		$span = "";

		echo "<div class='formulario-select formulario-input'>";

		if($required == true) $span = "<span>*</span>";
		if(!empty($label)) echo "<label>".$label.$span."</label> ";

		// Input
		echo "<select name='".$name."'";

		// Parâmetros
		if(!empty($id)) echo " id='".$id."'";
		if(!empty($class)) echo " class='".$class."'";

		echo ">";

		foreach($opcoes as $option):
			echo "<option value='".$option."'>".$option."</a>\n";
		endforeach;

		echo "</select></div>\n";
	}

	public function textarea($name, $label = null, $required = false, $class = null, $id = null, $placeholder = null, $value = null){
		// Adiciona na array de campos
		$this->campos[$name] = array("valor"=>"","label"=>$label);

		// Monta o campo
		$span = "";

		echo "<div class='formulario-textarea formulario-input'>";

		if($required == true) $span = "<span>*</span>";
		if(!empty($label)) echo "<label>".$label.$span."</label> ";

		// Input
		echo "<textarea name='".$name."'";

		// Parâmetros
		if(!empty($placeholder)) echo " placeholder='".$placeholder."'";
		if(!empty($id)) echo " id='".$id."'";
		if(!empty($class)) echo " class='".$class."'";
		
		echo ">";

		if(!empty($value)) echo $value;

		// Fecha o input
		echo "</textarea></div>\n";
	}

}
?>