<?php
class page_xStore_page_owner_materialrequest extends page_xStore_page_owner_main {
	function init(){
		parent::init();


		$crud=$this->app->layout->add('CRUD');
		$crud->setModel('xStore/Model_MaterialRequest');
	}
}
