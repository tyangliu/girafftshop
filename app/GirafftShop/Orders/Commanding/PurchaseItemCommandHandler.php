<?php namespace GirafftShop\Orders\Commanding;

use CommandHandler;
use GirafftShop\Repos\ItemRepository;
use GirafftShop\Repos\PurchaseItemRepository;
use GirafftShop\Orders\PurchaseItem;

class PurchaseItemCommandHandler implements CommandHandler {

    protected $purchaseItemRepository;
    protected $itemRepository;

    function __construct(PurchaseItemRepository $purchaseItemRepository, ItemRepository $itemRepository)
    {
        $this->purchaseItemRepository = $purchaseItemRepository;
        $this->itemRepository = $itemRepository;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $purchaseItem = PurchaseItem::add([
            'order_receiptId' => $command->order_receiptId,
            'item_upc'        => $command->item_upc,
            'quantity'        => $command->quantity
        ]);

        // add purchase item

        $this->purchaseItemRepository->save($purchaseItem);

        // decrease item stock by quantity

        $this->itemRepository->update(
            $command->item_upc,
            $command->quantity * -1 // add negative of quantity to stock
        );

        return $purchaseItem;
    }
}