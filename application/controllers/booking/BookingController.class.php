<?php
/**
 * [BookingController description]
 */
class BookingController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {   //on crée une instance de la classe bookingModel
        $bookingModel = new BookingModel(new Database());
        //on crée une instance de la classe bookingForm pour hydrater le formulaire
        $bookingForm = new BookingForm();
        //on retourne dans la vue la liste déroulante pour les horaires de réservation et le message d'erreur du flashbag défini dans la methode httpPostMethod ci-dessous
        return [
            "hoursList" => $bookingModel->displayHourList(),
            "errorForm" => new FlashBag (),
            "_form" => $bookingForm
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
         $bookingModel = new BookingModel(new Database());
         //on vérifie que tous les champs du formulaire ne sont pas vide
        if ($formFields["customerName"]!= "" && $formFields["customerPhone"] != "" && $formFields["bookingDate"] != "" && $formFields["placeNumber"] && $formFields["bookingHour"]) {
            //si oui on exécute la requête d'enregistrement
            $bookingModel->addBooking([$formFields["customerName"], $formFields["customerPhone"], $formFields["bookingDate"], $formFields["placeNumber"], $formFields["bookingHour"]]);
            //puis on redirige vers la page d'accueil
            $http->redirectTo('/');

        } else {
            //si au moins un champ du formulaire est vide on crée un objet flashbag
            $message = new FlashBag ();

            //on ajoute le message d'erreur
            $message->add("Tous les champs sont obligatoires");
            //on crée une instance de la classe bookingForm
            $bookingForm = new BookingForm();
            //on lie les champs du bookingForm aux données de notre formulaire pour récuperer les données présentes dans les renseignés par l'utilisateur
            $bookingForm->bind($formFields);
            //puis on retourne les valeurs à la vue. Les valeurs retournées dans la methode get ci-dessus ont été retournées à nouveau parce qu'on ne fait pas de redirection
            return [
                "hoursList" => $bookingModel->displayHourList(),
                "errorForm" => $message,

                "_form" => $bookingForm
            ];



        }
    }
}
