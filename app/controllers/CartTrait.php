<?php

trait CartTrait {

    protected function getCartItems()
    {
        $cart = $this->session->get('cart');

        $items = [];

        if (is_null($cart) == FALSE) {

            foreach ($cart as $upc => $quantity ) {
                $items = array_add(
                    $items,
                    $upc,
                    ['quantity' => $quantity, 'entity' => $this->repository->getByField('upc', $upc)->first()]
                );
            }
        }

        return $items;
    }

    protected function isValidCart()
    {
        $cart = $this->session->get('cart');

        foreach($cart as $upc => $quantity ) {
            $item = $this->repository->getByField('upc', $upc)->first();
            if ( $item == null ) return false;

            $stock = $item->stock;

            if ( $quantity > $stock ) return false;
        }

        return true;
    }
} 