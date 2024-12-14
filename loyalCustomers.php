<?php
class LoyalCustomer extends user {
    private $discountLoyalCustomer;

    public function __construct($con, $name, $email, $tel, $password, $discountLoyalCustomer) {
        parent::__construct($con, $name, $email, $tel, $password);
        $this->discountLoyalCustomer = $discountLoyalCustomer;
    }

    public function getDiscountLoyalCustomer() {
        return $this->discountLoyalCustomer;
    }

    public function setDiscountLoyalCustomer($discountLoyalCustomer) {
        $this->discountLoyalCustomer = $discountLoyalCustomer;
    }
}



