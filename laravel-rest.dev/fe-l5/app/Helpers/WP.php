<?php namespace App\Helpers;

use App\Helpers\Contracts\WpApiContract;
use GuzzleHttp\Client;

class WP implements WpApiContract
{
	protected $client;
	
	public function __construct(Client $client)
	{	
		$this->client = $client;	
	}

    public function blastOff()
    {
		//
    }
    
    public function getPosts()
    {
	    $posts = $this->client->get('posts')->getBody();
	    
	    return $posts;
    }

}