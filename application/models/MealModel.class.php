<?php
	class MealModel extends AbstractModel {


		public function __construct ($db) {
			parent::__construct($db);
		}

		public function findMealByType(array $mealType) {
			$req = "SELECT *
			FROM mealtable
			WHERE Type = ?";
			return $this->database->query($req, $mealType);
		}
	}





 ?>
