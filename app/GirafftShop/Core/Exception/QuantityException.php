<?php namespace GirafftShop\Core\Exception;

class QuantityException extends \Exception {

	/**
	 * @var mixed
	 */
	protected $errors;

	/**
	 * @param string $message
	 * @param mixed  $errors
	 */
	function __construct($message, $errors)
	{
		$this->errors = $errors;

		parent::__construct($message);
	}

	/**
	 * Get form validation errors
	 *
	 * @return mixed
	 */
	public function getErrors()
	{
		return $this->errors;
	}

}