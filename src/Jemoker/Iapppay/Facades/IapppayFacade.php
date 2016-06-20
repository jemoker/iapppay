<?php namespace Jemoker\Iapppay\Facades;

use Illuminate\Support\Facades\Facade;

class IapppayFacade extends Facade {

	protected static function getFacadeAccessor() {
		return 'iapppay';
	}
}