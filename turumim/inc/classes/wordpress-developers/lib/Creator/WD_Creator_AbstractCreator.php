<?php
/**
 * AbstractCreator
 * 
 * @author Lucas Pelegrino <lucas.wxp@gmail.com
 * @package WD.MetaBox
 */

abstract class WD_Creator_AbstractCreator{
	
/**
 * Form data handler
 * 
 * @var FG_HTML_Form_DataHandler
 */
	protected $dataHandler;
	
/**
 * Save callback
 * 
 * @var array
 */
	protected  $saveCallback;
	
/**
 * Fields prefix
 * 
 * @var string
 */
	protected $prefix = '';

/**
 * Inits creator
 */
	public function __construct(){
		$this->dataHandler = new FG_HTML_Form_DataHandler;
		$this->saveCallback = array($this, 'saveFields');
	}
	
/**
 * Adds content to the creator, can be a field or text as well
 * 
 * @param FG_HTML_Form_Input_Fillable|string $content
 * @return self
 */
	public function add($content){
		$this->dataHandler->add($content);
		return $this;
	}

/**
 * Allows you to handle the save of the fields values by yourself
 * 
 * @param mixed $callback
 * @throws InvalidArgumentException If is not a valid callback
 * @return self
 */
	public function setSaveCallback($callback){
		if(!is_callable($callback))
			throw new InvalidArgumentException('Specify a valid callback');
		else
			$this->saveCallback = $callback;
			
		return $this;
	}
	
/**
 * Echoes the self::render() returned value
 * 
 * @return string
 */
	public function outputs(){
		echo $this->render();
	}
	
/**
 * Renders creator
 * 
 * @return self
 */
	abstract public function render();
	
/**
 * Inits creator
 * 
 * @return self
 */
	abstract public function init();
}