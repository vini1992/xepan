<?php

namespace xShop;

class Model_Item_Designable extends Model_Item{

	function init(){
		parent::init();
		
		$this->addCondition('is_designable',true);
		
	}
}