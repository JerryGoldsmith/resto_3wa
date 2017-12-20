<?php

class EmployeesForm extends Form
{
    /**
     * [build description]
     * @return [type] [description]
     */
    public function build()
    {
        $this->addFormField('lastName');
        $this->addFormField('firstName');
        $this->addFormField('NumberEmploye');
        $this->addFormField('email');
    }
}
