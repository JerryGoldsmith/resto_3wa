<?php

class AvailablehoursController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        // $http->sendJsonResponse(["lundi" => 23 ]);
        $count = new BookingModel(new Database());
        /**
         * Le nombre de réservation pour le lundi
         * @var Int Le nombre de réservation pour le lundi
         */
        $bookingCount = $count->bookingCountByHour([$formFields["bookingDate"] , $formFields["bookingHour"]]);
        $http->sendJsonResponse($bookingCount);
    }
}
