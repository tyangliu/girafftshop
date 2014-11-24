<?php namespace GirafftShop\Returns\Commanding;
use CommandHandler;
use GirafftShop\Repos\ReturnRepository;
use GirafftShop\Returns\Return;
class MakeReturnCommandHandler implements CommandHandler {
    protected $repository;
    function __construct(ReturnRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $return = Return::make([
            'receiptId'     => $command->receiptId,
            'date'          => $command->date,
            'returnID     => $command->returnId,
        ]);
        $this->repository->save($return);
        return $return;
    }
}