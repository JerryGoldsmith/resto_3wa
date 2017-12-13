<?php
    class   BookingModel extends AbstractModel {

        /**
         * représente la date de réservation
         * @var date
         */
        protected $date;

        /**
         * représente l'heure de la réservation
         * @var date
         */
        protected $horaires;

        /**
         * repésente le nombre de place réservée
         * @var int
         */
        protected $nbrePlace;

        /**
         * Constante repésente le nombre maximal de table disponible pour la réservation
         * @var int
         */
        const MAX_BOOKING_TABLE = 1;

         /**
          * renseigne sur la disponibilité ou non de table à réserver
          * @var String
          */
        protected $msg = "Disponible";

        /**
         * __construct constructeur de la classe
         * @param Database $db une instance de la classe database
         */
        public function __construct(Database $db) {
            parent::__construct($db);
            $this->date = date("d-m-Y");
            $this->horaires = date("H-i") . " heures";
            $this->nbrePlace = 1;
        }

        /**
         * [bookingCountByDay Compte le nombre de réservation pour une journée]
         * @param  array  $day [Variable réprésentant le jour en lettre ]
         * @return array     [Tableau associatif représentant le fecth de la requête sql]
         */
        public function bookingCountByDay(array $day) {
            $req =
               "SELECT COUNT(*) AS bookingNumberByDay
                FROM bookingTable
                WHERE Day = ?";

            return $this->database->queryOne($req, $day);
        }

        /**
         * [isAvailable Compare le nombre de réservation de la journée au nombre maximal de table disponible pour les réservations]
         * @param  Int    $dayCount [Le nombre de réservation total dans la journée]
         * @return string           [retourne la valeur "complet" ou "disponible" en fonction du resultat de la comparaison]
         */
        public function isAvailable(Int $dayCount): string {
            if ($dayCount >= self::MAX_BOOKING_TABLE) {
                $this->msg = "Complet";
            }
            return $this->msg;
        }

        public function resetBookingTable() {
            /**
             * Traduction des jours de la semaine de l'anglais en francais
             * @var date
             */
            $day = date("l");
            switch ($day) {
                case 'Monday':
                    $dayFr = "lundi";
                    break;
                case 'Tuesday':
                    $dayFr = "mardi";
                    break;
                case 'Wednesday':
                    $dayFr = "mercredi";
                    break;
                case 'Thursday':
                    $dayFr = "jeudi";
                    break;
                case 'Friday':
                    $dayFr = "vendredi";
                    break;
                case 'Saturday':
                    $dayFr = "samedi";
                    break;
                default:
                    $dayFr = "dimanche";
                    break;
            }

            $time = date("H-i");
            
            if ($time == "23-59") {
                $req =
                "DELETE FROM bookingTable
                WHERE Day = ?";

                $this->database->executeSql($req, [$dayFr])
            }
            $
        }






    }
