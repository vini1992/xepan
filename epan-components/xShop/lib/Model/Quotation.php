<?php

namespace xShop;

class Model_Quotation extends \Model_Document{
	public $table="xshop_quotation";
	public $status=array('draft','approved','redesign','submitted','cancelled');
	public $root_document_name="xShop\Quotation";

	function init(){
		parent::init();
		$this->hasOne('xMarketingCampaign/Lead','lead_id');
		$this->hasOne('xShop/Opportunity','opportunity_id');
		$this->hasOne('xShop/Customer','customer_id');
		$this->hasOne('xShop/TermsAndCondition','termsandcondition_id');

		$this->addField('name');
		$this->addField('quotation_no');
		$this->getElement('status')->enum($this->status)->defaultValue('draft');
		$this->addHook('beforeDelete',$this);

		$this->hasMany('xShop/QuotationItem','quotation_id');

		//$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeDelete(){
		$this->ref('xShop/QuotationItem')->deleteAll();
	}


	function reject($message){
		$this['status']='redesign';
		$this->saveAs('xShop/Model_Quotation');
		return "reject";
	}
	

	function sendMail(){
		return "sendMail";
	}

	function status(){
		return $this['status'];
	}

}