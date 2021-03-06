<?php

namespace Ajax\semantic\html\modules;

use Ajax\semantic\html\base\HtmlSemDoubleElement;
use Ajax\semantic\html\content\HtmlDropdownItem;
use Ajax\semantic\html\elements\HtmlIcon;
use Ajax\common\html\html5\HtmlInput;
use Ajax\service\JArray;
use Ajax\semantic\html\base\constants\Direction;
use Ajax\semantic\html\base\traits\LabeledIconTrait;
use Ajax\JsUtils;
use Ajax\semantic\html\collections\form\traits\FieldTrait;

class HtmlDropdown extends HtmlSemDoubleElement {
	use FieldTrait,LabeledIconTrait {
		addIcon as addIconP;
	}
	protected $mClass="menu";
	protected $mTagName="div";
	protected $items=array ();
	protected $_params=array("action"=>"nothing","on"=>"hover");
	protected $input;
	protected $value;
	protected $_associative;

	public function __construct($identifier, $value="", $items=array(),$associative=true) {
		parent::__construct($identifier, "div");
		$this->_template=include dirname(__FILE__).'/../templates/tplDropdown.php';
		$this->setProperty("class", "ui dropdown");
		$content=new HtmlSemDoubleElement("text-".$this->identifier,"div");
		$content->setClass("text");
		$this->setValue($value);
		$content->wrap("",new HtmlIcon("", "dropdown"));
		$this->content=array($content);
		$this->tagName="div";
		$this->_associative=$associative;
		$this->addItems($items);
	}

	public function getField(){
		return $this->input;
	}

	public function getDataField(){
		return $this->input;
	}

	public function addItem($item,$value=NULL,$image=NULL,$description=NULL){
		$itemO=$this->beforeAddItem($item,$value,$image,$description);
		$this->items[]=$itemO;
		return $itemO;
	}

	public function addIcon($icon,$before=true,$labeled=false){
		$this->addIconP($icon,$before,$labeled);
		return $this->getElementById("text-".$this->identifier, $this->content)->setWrapAfter("");
	}

	public function addIcons($icons){
		$count=$this->count();
		for ($i=0;$i<\sizeof($icons) && $i<$count;$i++){
			$this->getItem($i)->addIcon($icons[$i]);
		}
	}

	/**
	 * Insert an item at a position
	 * @param mixed $item
	 * @param number $position
	 * @return \Ajax\semantic\html\content\HtmlDropdownItem|unknown
	 */
	public function insertItem($item,$position=0){
		$itemO=$this->beforeAddItem($item);
		 $start = array_slice($this->items, 0, $position);
		 $end = array_slice($this->items, $position);
		 $start[] = $item;
		 $this->items=array_merge($start, $end);
		 return $itemO;
	}

	protected function beforeAddItem($item,$value=NULL,$image=NULL,$description=NULL){
		$itemO=$item;
		if(\is_array($item)){
			$description=JArray::getValue($item, "description", 3);
			$value=JArray::getValue($item, "value", 1);
			$image=JArray::getValue($item, "image", 2);
			$item=JArray::getValue($item, "item", 0);
		}
		if(!$item instanceof HtmlDropdownItem){
			$itemO=new HtmlDropdownItem("dd-item-".$this->identifier."-".\sizeof($this->items),$item,$value,$image,$description);
		}elseif($itemO instanceof HtmlDropdownItem){
			$this->addToProperty("class", "vertical");
		}
		return $itemO;
	}

	/* (non-PHPdoc)
	 * @see \Ajax\bootstrap\html\base\BaseHtml::fromDatabaseObject()
	 */
	public function fromDatabaseObject($object, $function) {
		$this->addItem($function($object));
	}

	public function addInput($name){
		if(!isset($name))
			$name="input-".$this->identifier;
		$this->setAction("activate");
		$this->input=new HtmlInput($name,"hidden");
	}

	/**
	 * Adds a search input item
	 * @param string $placeHolder
	 * @param string $icon
	 * @return \Ajax\semantic\html\content\HtmlDropdownItem
	 */
	public function addSearchInputItem($placeHolder=NULL,$icon=NULL){
		return $this->addItem(HtmlDropdownItem::searchInput($placeHolder,$icon));
	}

	/**
	 * Adds a divider item
	 * @return \Ajax\semantic\html\content\HtmlDropdownItem
	 */
	public function addDividerItem(){
		return $this->addItem(HtmlDropdownItem::divider());
	}

	/**
	 * Adds an header item
	 * @param string $caption
	 * @param string $icon
	 * @return \Ajax\semantic\html\content\HtmlDropdownItem|unknown
	 */
	public function addHeaderItem($caption=NULL,$icon=NULL){
		return $this->addItem(HtmlDropdownItem::header($caption,$icon));
	}

	/**
	 * Adds an item with a circular label
	 * @param string $caption
	 * @param string $color
	 * @return \Ajax\semantic\html\content\HtmlDropdownItem|unknown
	 */
	public function addCircularLabelItem($caption,$color){
		return $this->addItem(HtmlDropdownItem::circular($caption, $color));
	}

	/**
	 * @param string $caption
	 * @param string $image
	 * @return \Ajax\semantic\html\content\HtmlDropdownItem
	 */
	public function addMiniAvatarImageItem($caption,$image){
		return $this->addItem(HtmlDropdownItem::avatar($caption, $image));
	}

	public function addItems($items){
		if(\is_array($items) && $this->_associative){
			foreach ($items as $k=>$v){
				$this->addItem($v)->setData($k);
			}
		}else{
			foreach ($items as $item){
				$this->addItem($item);
			}
		}
	}

	public function getItem($index){
		return $this->items[$index];
	}

	/**
	 * @return int
	 */
	public function count(){
		return \sizeof($this->items);
	}
	/**
	 * @param boolean $dropdown
	 */
	public function asDropdown($dropdown){
		if($dropdown===false){
			$this->_template=include dirname(__FILE__).'/../templates/tplDropdownMenu.php';
			$dropdown="menu";
		}else{
			$dropdown="dropdown";
			$this->mClass="menu";
		}
		return $this->addToPropertyCtrl("class", $dropdown,array("menu","dropdown"));
	}

	public function setVertical(){
		return $this->addToPropertyCtrl("class", "vertical",array("vertical"));
	}

	public function setInline(){
		return $this->addToPropertyCtrl("class", "inline",["inline"]);
	}

	public function setSimple(){
		return $this->addToPropertyCtrl("class", "simple",array("simple"));
	}

	public function asButton($floating=false){
		if($floating)
			$this->addToProperty("class", "floating");
		$this->removePropertyValue("class", "selection");
		return $this->addToProperty("class", "button");
	}

	public function asSelect($name=NULL,$multiple=false,$selection=true){
		if(isset($name))
			$this->addInput($name);
		if($multiple)
			$this->addToProperty("class", "multiple");
		if ($selection){
			if($this->propertyContains("class", "button")===false)
				$this->addToPropertyCtrl("class", "selection",array("selection"));
		}
		return $this;
	}

	public function asSearch($name=NULL,$multiple=false,$selection=true){
		$this->asSelect($name,$multiple,$selection);
		return $this->addToProperty("class", "search");
	}

	public function setSelect($name=NULL,$multiple=false){
		if(!isset($name))
			$name="select-".$this->identifier;
		$this->input=null;
		if($multiple){
			$this->setProperty("multiple", true);
			$this->addToProperty("class", "multiple");
		}
		$this->setAction("activate");
		$this->tagName="select";
		$this->setProperty("name", $name);
		$this->content=null;
		foreach ($this->items as $item){
			$item->asOption();
		}
		return $this;
	}

	public function asSubmenu($pointing=NULL){
		$this->setClass("ui dropdown link item");
		if(isset($pointing)){
			$this->setPointing($pointing);
		}
		return $this;
	}

	public function setPointing($value=Direction::NONE){
		return $this->addToPropertyCtrl("class", $value." pointing",Direction::getConstantValues("pointing"));
	}

	public function setValue($value){
		$this->value=$value;
		return $this;
	}
	private function applyValue(){
		$value=$this->value;
		if(isset($this->input) && isset($value)){
			$this->input->setProperty("value", $value);
		}else{
			$this->setProperty("value", $value);
		}
			$textElement=$this->getElementById("text-".$this->identifier, $this->content);
			if(isset($textElement))
				$textElement->setContent($value);
		return $this;
	}

	/*
	 * (non-PHPdoc)
	 * @see BaseHtml::run()
	 */
	public function run(JsUtils $js) {
		if($this->propertyContains("class", "simple")===false){
			if(isset($this->_bsComponent)===false)
				$this->_bsComponent=$js->semantic()->dropdown("#".$this->identifier,$this->_params);
			$this->addEventsOnRun($js);
			return $this->_bsComponent;
		}
	}

	public function setCompact(){
		return $this->addToPropertyCtrl("class", "compact", array("compact"));
	}

	public function setAction($action){
		$this->_params["action"]=$action;
	}

	public function setFullTextSearch($value){
		$this->_params["fullTextSearch"]=$value;
	}

	public function compile(JsUtils $js=NULL, &$view=NULL) {
		$this->applyValue();
		return parent::compile($js,$view);
	}

	public function getInput() {
		return $this->input;
	}

}