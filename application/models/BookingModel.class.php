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
        }

        /**
         * [bookingCountByDay Compte le nombre de réservation pour heure]
         * @param  array  $day [Variable réprésentant le jour en lettre ]
         * @return array     [Tableau associatif représentant le fecth de la requête sql]
         */
        public function bookingCountByHour(array $parameters) {
            $req =
                   "SELECT COUNT(*) AS bookingCount
                    FROM openingHoursTable AS O
                    INNER JOIN bookingTable AS B
                        ON O.Id = B.openingHoursId
                    WHERE B.bookingDate = ? AND B.Hours = ?";

            return $this->database->queryOne($req, $parameters);
        }
        /**
         * displayHourList  afficher la liste des horaires de réservation dans le formulaire
         * @return array Tableau associatif contenant le résultat de la requête
         */
        public function displayHourList (): array {
            $req =
                "SELECT O.Id, O.Hours
                FROM openingHoursTable AS O";
            return $this->database->query($req);
        }
        /**
         * addBooking enregistrer une nouvelle réservation
         * @param array $parameters Liste des paramètres à passer à la requête
         */
        public function addBooking (array $parameters) {
            $req =
                "INSERT INTO bookingTable (customerName, customerPhone, bookingDate, placeNumber, openingHoursId)
                VALUES (?, ?, ?, ?, ?)";
            return $this->database->executeSql($req, $parameters);
        }








    }
