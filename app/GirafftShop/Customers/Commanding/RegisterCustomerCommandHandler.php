<?php namespace GirafftShop\Customers\Commanding;

use CommandHandler;
use GirafftShop\Repos\CustomerRepository;
use GirafftShop\Customers\Customer;

class RegisterCustomerCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(CustomerRepository $repository)
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
        $customer = Customer::register([
            'username' => $command->username,
            'password' => $command->password,
            'name' => $command->name,
            'address' => $command->address,
            'phone' => $command->phone
        ]);

        $this->repository->save($customer);

        return $customer;
    }
}