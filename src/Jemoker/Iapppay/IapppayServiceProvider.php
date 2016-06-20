<?php namespace Jemoker\Iapppay;

use Illuminate\Support\ServiceProvider;

class IapppayServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @ bool
	 */
	protected $defer = false;

	/**
	* Bootstrap the application events.
	*
	* @return void
	*/
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../../config/config.php' => config_path('jemoker-iapppay.php'),
		]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('iapppay', function ($app)
		{
			$this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'jemoker-iapppay');
			return new Iapppay($app->config->get('jemoker-iapppay'));
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('iapppay');
	}

}
