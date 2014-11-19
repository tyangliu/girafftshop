<?php namespace GirafftShop\Core;


/**
 * Class CommandBus
 * @package GirafftShop\Core
 */
trait CommandBus {
    /**
     * Execute command
     *
     * @param $command
     * @return mixed
     */
    public function execute($command)
    {
        return $this->getCommandBus()->execute($command);
    }

    /**
     * Fetch command bus
     *
     * @return mixed
     */
    public function getCommandBus()
    {
        return App::make('Laracasts\Commander\CommandBus');
    }
} 