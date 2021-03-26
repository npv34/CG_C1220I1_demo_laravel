<?php


namespace App\Models;


use Hamcrest\Thingy;

class Cart
{
    public array $items = [];
    public int $totalPrice = 0;
    public int $totalQty = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }
    }

    public function addProduct($product)
    {
        $storeProduct = [
            "product" => $product,
            "totalPrice" => 0,
            "totalQty" => 0
        ];

        if (key_exists($product->id, $this->items)) {
            $storeProduct = $this->items[$product->id];
        }

        $storeProduct['totalQty']++;
        $storeProduct['totalPrice'] += $product->price;

        $this->totalQty++;
        $this->totalPrice += $product->price;

        $this->items[$product->id] = $storeProduct;

    }

    function deleteProduct($id)
    {
        if (key_exists($id, $this->items)) {
            $storeProductDelete = $this->items[$id];
            $this->totalQty -= $storeProductDelete['totalQty'];
            $this->totalPrice -= $storeProductDelete['totalPrice'];
            unset($this->items[$id]);
        }
    }

    function updateCart($id, $newQuantity)
    {
        if (key_exists($id, $this->items)) {
            $storeProductUpdate = $this->items[$id];
            $currentTotalQty = $storeProductUpdate['totalQty'];
            $this->totalQty -= $currentTotalQty;
            $this->totalQty += $newQuantity;

            $this->totalPrice -= $storeProductUpdate['totalPrice'];

            $storeProductUpdate['totalQty'] = $newQuantity;
            $storeProductUpdate['totalPrice'] = $newQuantity * $storeProductUpdate['product']->price;

            $this->totalPrice += $storeProductUpdate['totalPrice'];

            $this->items[$id] = $storeProductUpdate;

        }
    }
}
