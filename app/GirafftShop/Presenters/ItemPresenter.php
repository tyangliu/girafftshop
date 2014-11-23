<?php namespace GirafftShop\Presenters;

use Presenter;

class ItemPresenter extends Presenter {

    public function price()
    {
        $formattedPrice = number_format(($this->entity->price/100), 2);
        return '$' . $formattedPrice;
    }

} 