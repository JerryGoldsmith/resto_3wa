<?php
/**
 * [BookingController description]
 */
class BookingController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $count = new BookingModel(new Database());
        /**
         * Le nombre de réservation pour le lundi
         * @var Int Le nombre de réservation pour le lundi
         */
        $mondayCount = ($count->bookingCountByDay(["lundi"]))["bookingNumberByDay"];
        /**
         * Le nombre de réservation pour le mardi
         * @var Int
         */
        $tuesdayCount = ($count->bookingCountByDay(["mardi"]))["bookingNumberByDay"];
        /**
         * Le nombre de réservation pour le mercredi
         * @var Int
         */
        $wednesdayCount = ($count->bookingCountByDay(["mercredi"]))["bookingNumberByDay"];
        /**
         * Le nombre de réservation pour le jeudi
         * @var Int
         */
        $thursdayCount = ($count->bookingCountByDay(["jeudi"]))["bookingNumberByDay"];
        /**
         * Le nombre de réservation pour le vendredi
         * @var Int
         */
        $fridayCount = ($count->bookingCountByDay(["vendredi"]))["bookingNumberByDay"];
        /**
         * Le nombre de réservation pour le samedi
         * @var Int
         */
        $saturdayCount = ($count->bookingCountByDay(["samedi"]))["bookingNumberByDay"];

        /**
         * [return Tableau associatif des jours et de la disponibilité des réservationss]
         * @var array
         */
        return
        [
            "monday"=>$count->isAvailable($mondayCount),
            "tuesday"=>$count->isAvailable($tuesdayCount),
            "wednesday"=>$count->isAvailable($wednesdayCount),
            "thursday"=>$count->isAvailable($thursdayCount),
            "friday"=>$count->isAvailable($fridayCount),
            "saturday"=>$count->isAvailable($saturdayCount)
        ];

    }

    /**
     * httpPostMethod
     * Enregistrement d'un formulaire de réservation
     * 
     * @param  Http   $http       [description]
     * @param  array  $formFields [description]
     * @return [type]             [description]
     */
    public function httpPostMethod(Http $http, array $formFields)
    {


    }
}
