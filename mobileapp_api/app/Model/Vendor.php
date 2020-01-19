<?php

App::uses('Lib', 'Utility');

class Vendor extends AppModel
{
    public $useTable = 'bho2_hikamarket_vendor';
    public $primaryKey = 'vendor_id';
    public function loadVendor(){
        return $this->find('all');
    }



}