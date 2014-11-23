<?php

use Illuminate\Session\Store;
use GirafftShop\Repos\ItemRepository;
use GirafftShop\Returnss\Forms\MakeReturnForm;
use GirafftShop\Returns\Commanding\MakeReturnCommand;
use GirafftShop\Returns\Commanding\ReturnItemCommand;

class ReturnsController extends \BaseController {

    use CartTrait;

    private $session;
	private $makeReturnForm;
    private $repository;

	function __construct(Store $session, MakeReturnForm $makeReturnForm, ItemRepository $repository)
    {
        $this->session = $session;
        $this->makeReturnForm = $makeReturnForm;
        $this->repository = $repository;
    }

	/**
	 * Display a listing of the resource.
	 * GET /returns
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /returns/create
	 *
	 * @return Response
	 */
	public function create()
	{

        //$data['items'] = $this->getCartItems();

        return View::make('returns.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /returns
	 *
	 * @return Response
	 */
	public function store()
	{
        $items = $this->getCartItems();


        // throw exception if any upcs or quantities in return are invalid
        if (!$this->isValidCart())
        {
            throw new Exception;
        }

        // Create new return
		$input = array_merge(Input::only(['card', 'expiryDate']), [
            'returnId' => generateReturnId(),
            'date' => date('Y-m-d'),

        ]);

		$this->makeReturnForm->validate($input);

        $return = $this->execute(MakeReturnCommand::class, $input);


        // Create new return item for each returning item in Return

        foreach($items as $upc => $itemContainer)
        {
            $quantity = $itemContainer['quantity'];
            $item = $itemContainer['entity'];

            $this->execute(ReturntemCommand::class, [
                'return_returnId' => $return->returnId,
                'item_upc'        => $item->upc,
                'quantity'        => $quantity
            ]);
        }

        // clear the cart

       //$this->session->set('cart', []);

		return Redirect::route('newReturn_path');

	}

	/**
	 * Display the specified resource.
	 * GET /returns/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /returns/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /returns/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /returns/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}