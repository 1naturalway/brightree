<?php

namespace Brightree\ApiMessageServices;

class CustomFieldValue {
  public $CustomFieldCategory 	//Invoice, SalesOrder, SalesOrderTemplate, Patient, SOTransferSOTemplate
  public $FieldStorageNumber;  	//Custom field ID.
  public $ObjectDataKey;  	//Object ID that you are setting a custom field on.
  public $Value;  		//Actual value to be set.
}
