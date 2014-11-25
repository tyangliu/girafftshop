<?php namespace GirafftShop\Presenters;

use Presenter;

class PurchaseItemPresenter extends Presenter {

    public function quantity()
    {
        $original = $this->entity->quantity;
        $remaining = $this->entity->getRemaining();

        if ($original == $remaining)
            return $original;
        else
            return '<s class="original">' . $original . '</s> ' . '<span class="remaining">' . $remaining .'</span>';
    }

} 