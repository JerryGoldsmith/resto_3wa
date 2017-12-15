<?php
/**
 * [BookingController description]
 */
class BookingController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $inst = new BookingModel(new Database());
        //on retourne dans la vue la liste déroulante pour les horaires de réservation et le message d'erreur du flashbag défini dans la methode httpPostMethod ci-dessous
        return [
            "hoursList" => $inst->displayHourList(),
            "errorForm" => new FlashBag ()
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
         $inst = new BookingModel(new Database());
         //on vérifie que tous les champs du formulaire ne sont pas vide
        if ($formFields["customerName"]!= "" && $formFields["customerPhone"] != "" && $formFields["bookingDate"] != "" && $formFields["placeNumber"] && $formFields["bookingHour"]) {
            //si oui on exécute la requête d'enregistrement
            $inst->addBooking([$formFields["customerName"], $formFields["customerPhone"], $formFields["bookingDate"], $formFields["placeNumber"], $formFields["bookingHour"]]);
            //puis on redirige vers la page d'accueil
            $http->redirectTo('/');

        } else {
            //si au moins un champ du formulaire est vide on crée un objet flashbag
            $message = new FlashBag ();
            //on ajoute le message d'erreur
            $message->add("Tous les champs sont obligatoires");
            //puis on redirige vers la même page sur laquelle on est pour réafficher le formulaire
            $http->redirectTo('/booking');

        }
    }
}
