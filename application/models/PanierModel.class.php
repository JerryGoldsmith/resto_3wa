<?php
	class PanierModel extends AbstractModel {

		protected $shoppingCart;
			protected $total;
			protected $quantity;

		public function __construct($db) {
			parent::__construct($db);
			if (!isset($_SESSION['panier'])){
				$_SESSION['panier'] = [];
			}
			$this->shoppingCart = $_SESSION['panier'] ;

		}

		public function addToShoppingCart(array $selectedProduct, string $id)
		{
			// $mealId = (integer)$selectedProduct[$id];
			// $mealQuantity = (integer)$selectedProduct[$orderQuantity];

			// var_dump($this->shoppingCart[$mealId][$orderQuantity]); die;

			if (array_key_exists($id, $this->shoppingCart)) {
				$this->shoppingCart[$id]['orderQuantity'] += $selectedProduct['orderQuantity'] ;
			} else {
				$this->shoppingCart[$id] = $selectedProduct ;
			}

			 return $this;
		}
		public function totalCommandes(){
			foreach ($this->shoppingCart as $value) {
				$this->quantity += $value['orderQuantity'];
			}
			return $this->quantity;
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

		public function totalHt() {
			foreach ($this->shoppingCart as $value) {
				$this->total += $value['mealSalePrice'] * $value['orderQuantity'];
			}
			return $this->total;
		}

		public function tva() {
			return $this->total * 0.2 ;
		}

		public function ttc() {
			return $this->total += $this->total * 0.2 ;
		}

		public function order(array $parameters)
		{
			$req = "INSERT INTO orderTable (orderQuantity, SalePrice, Ht, Tva, Ttc, Status, mealId) VALUES(?, ?, ?, ?, ?, ?)";
			$this->database->executeSql($req, $parameters);
		}


	}

 ?>
