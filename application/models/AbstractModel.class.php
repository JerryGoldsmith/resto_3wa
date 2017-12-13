<?php
    /**
     * [AbstractModdel est une classe abstraite dont hérite les autres classes model]
     * @var class
     */
    abstract class AbstractModel {
        /**
         * [Proriété contenant une instance de la classe Database]
         * @var Database
         */
        protected $database;

        /**
         * [Crée une instance de la classe database si elle n'existe pas encore]
         * @param Database $db [Instance de la classe database]
         */
        public function __construct(Database $db) {
            if ($this->database == null) {
                $this->database = $db;
            }
        }


    }



 ?>
