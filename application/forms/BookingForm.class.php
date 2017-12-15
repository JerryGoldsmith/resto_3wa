<?php
    /**
     *
     */
    class BookingForm extends Form
    {

        public  function build() {
            $this->addFormField("customerName");
            $this->addFormField("customerPhone");
            $this->addFormField("bookingDate");
            $this->addFormField("bookingHour");
            $this->addFormField("placeNumber");
        }

    }







 ?>
