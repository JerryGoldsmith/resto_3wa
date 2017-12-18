<?php
	class PanierModel extends AbstractModel {

		protected $shoppingCart;
			protected $count;

		public function __construct($db) {
			parent::__construct($db);
			if (!isset($_SESSION['panier'])){
				$_SESSION['panier'] = [];
			}
			$this->shoppingCart = $_SESSION['panier'] ;

		}

		public function addToShoppingCart(array $selectedProduct){
			$this->shoppingCart[] = $selectedProduct ;
			 return $this;
		}

		public function getShoppingCartCount(){
			return $this->count;
		}

		public function displayShoppingCart() {
			return $this->shoppingCart;
		}

		public function saveShoppingCart()
		{
			$_SESSION['panier'] = $this->shoppingCart;
			// return $this;
		}

		public function clearShoppingCart() {
			$this->shoppingCart = array();
			$this->saveShoppingCart();

		}
	}

 ?>
