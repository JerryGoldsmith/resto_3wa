<?php
	class PanierModel extends AbstractModel {

		protected $shoppingCart;
			protected $total;

		public function __construct($db) {
			parent::__construct($db);
			if (!isset($_SESSION['panier'])){
				$_SESSION['panier'] = [];
			}
			$this->shoppingCart = $_SESSION['panier'] ;

		}

		public function addToShoppingCart(string $id, array $selectedProduct){

			$this->shoppingCart[$id] = $selectedProduct ;
			 return $this;
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

		public function deleteOneProduct(string $id) {
			unset($this->shoppingCart[$id]);
			$this->saveShoppingCart();
		}

		public function totalAmount() {
			foreach ($this->shoppingCart as $value) {
				$this->total += $value['mealSalePrice'];
			}
			return $this->total;
		}

		public function tva() {
			return $this->total * 0.2 ;
		}

		public function ttc() {
			return $this->total += $this->total * 0.2 ;
		}
	}

 ?>
