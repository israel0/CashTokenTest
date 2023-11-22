<?php

interface CustomerInterface
{
     public function customerRegistration($data);
     public function customerLogin($data);
     public function getCustomerData($id);
     public function customerUpdate($data, $cmrId);

}