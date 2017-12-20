<?php

class AdminForm extends Form
{
    /**
     * [build description]
     * @return [type] [description]
     */
    public function build()
    {
        $this->addFormField('bookingDate');
        $this->addFormField('customerName');
        $this->addFormField('customerPhone');
        $this->addFormField('openingHoursId');
        $this->addFormField('placeNumber');
    }
}
