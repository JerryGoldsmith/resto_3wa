<?php
	class PanierModel extends AbstractModel {
		protected $shoppingCart=[];

		public function __construct($db) {
			parent::__construct($db);
		}

		public function addToShoppingCart(array $selectedProduct){
		array_push($this->shoppingCart,$selectedProduct);
			$_SESSION["panier"] = $this->shoppingCart;
			return $_SESSION["panier"];
		}
	}

 ?>
