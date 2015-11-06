<?php
	session_start();//creation of cookies
	

	class  Product
	{
		private $productId;
		private $productName;
		private $price;

		
		public function __construct($productId,$productName,$price)
		{
			$this->productid=$productId; # making accesible 
			$this->productname=$productName;
			$this->price=$price;

		}
		public function getId(){
			return $this->productid
		}
		public function getName(){
			return $this->productname;
		}
		public function getprice()
		{
			return $this->price;# code...
		}

	}
	$products= array(1 => new Product(1,"bmv",3000),
					2=> new Product(2,"opel",5000),
					3=>new Product(3,"khar",30000));
	
	if ( !isset( $_SESSION["cart"] ) ) { 
		$_SESSION["cart"] = array();
		}
	if ( isset( $_GET["action"] ) and $_GET["action"] == "addItem" ) {
		addItem();
	} 
	elseif ( isset( $_GET["action"] ) and $_GET["action"] == "removeItem" ) {
	removeItem();
	} else {
	displayCart();
	}
	function addItem() {
	global $products;
	if ( isset( $_GET["productId"] ) and $_GET["productId"] > = 1 and $_
	GET["productId"] < = 3 ) {
	$productId = (int) $_GET["productId"];
	if ( !isset( $_SESSION["cart"][$productId] ) ) {
	$_SESSION["cart"][$productId] = $products[$productId];
	}
	}
	session_write_close();
	header( "Location: shopping_cart.php" );
	}
	function removeItem() {
	global $products;
	if ( isset( $_GET["productId"] ) and $_GET["productId"] > = 1 and $_GET["productId"] < = 3 ) {
	$productId = (int) $_GET["productId"];
	if ( isset( $_SESSION["cart"][$productId] ) ) {
	unset( $_SESSION["cart"][$productId] );
	}
	}
	session_write_close();
	header( "Location: shopping_cart.php" );
	}
	function displayCart() {
	global $products;
	
?>
<html lang="en">
<head>
<title>Ashoppingcartusingsessions</title>
<linkrel="stylesheet"type="text/css"href="common.css"/>
</head>
<body>
<h1>Yourshoppingcart</h1>
<dl>
<?php
	$totalPrice=0;
	foreach($_SESSION["cart"]as$product){
	$totalPrice+=$product->getPrice();
	?>
	<dt><?phpecho$product->getName()?></dt>
	<dd>$<?phpechonumber_format($product->getPrice(),2)?>
	<ahref="shopping_cart.php?action=removeItem&productId=<?phpecho
	$product->getId()?>">Remove</a></dd>
	<?php}?>
	<dt>CartTotal:</dt>
	<dd><strong>$<?phpechonumber_format($totalPrice,2)?></strong></dd>
</dl>
<h1>Productlist</h1>
<dl>
<?phpforeach($productsas$product){?>
<dt><?phpecho$product->getName()?></dt>
<dd>$<?phpechonumber_format($product->getPrice(),2)?>
<ahref="shopping_cart.php?action=addItem&amp;productId=<?phpecho
$product->getId()?>">AddItem</a></dd>
<?php}?>
</dl>
<?php
}
?>
</body>
</html>