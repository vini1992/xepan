<?php

class page_xStore_page_owner_materialrequestsent_assigned extends page_xStore_page_owner_main{
	function init(){
		parent::init();

		$model = $this->add('xStore/Model_MaterialRequestSent_Assigned');
		$crud=$this->add('CRUD');
		$crud->setModel($model);
		$crud->add('xHR/Controller_Acl');
	}
}