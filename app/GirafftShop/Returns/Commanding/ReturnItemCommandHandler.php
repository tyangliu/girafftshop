<?php namespace GirafftShop\Returns\Commanding;
use CommandHandler;
use GirafftShop\Repos\ItemRepository;
use GirafftShop\Repos\ReturnItemRepository;
use GirafftShop\Returns\Returntem;
class ReturntemCommandHandler implements CommandHandler {
    protected $returnItemRepository;
    protected $itemRepository;
    function __construct(ReturnItemRepository $returnItemRepository, ItemRepository $itemRepository)
    {
        $this->returnItemRepository = $returnItemRepository;
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
        $returnItem = ReturnItem::add([
            'order_returntId' => $command->order_returnId,
            'item_upc'        => $command->item_upc,
            'quantity'        => $command->quantity
        ]);
        // add purchase item
        $this->returnItemRepository->save($returnItem);
        // decrease item stock by quantity
        $this->itemRepository->update(
            $command->item_upc,
            $command->quantity * -1 // add negative of quantity to stock
        );
        return $returnItem;
    }
}