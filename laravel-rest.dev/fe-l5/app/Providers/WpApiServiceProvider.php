<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\WP;
use GuzzleHttp\Client;

class WpApiServiceProvider extends ServiceProvider
{
	
	protected $differ = true;
	
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind ('App\Helpers\Contracts\WpApiContract', function(){
	        
	        $wp_client = new Client([
		        'base_uri' => 'http://admin.laravel-rest.dev/wp-json/wp/v2/'
	        ]);
	        
	        return new WP($wp_client);
	        
        });
    }
    
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['App\Helpers\Contracts\WpApiContract'];
    }
}
