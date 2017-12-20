<?php

class CustomerForm extends Form
{
    public function build()
    {
        $this->addFormField('lastName');
        $this->addFormField('firstName');
        $this->addFormField('address');
        $this->addFormField('city');
        $this->addFormField('zipCode');
        $this->addFormField('country');
        $this->addFormField('phone');
        $this->addFormField('email');
    }
}
