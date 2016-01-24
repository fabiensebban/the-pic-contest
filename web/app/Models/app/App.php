<?php 
namespace Models\app;

use Core\Model;
//MOI J'AI UTILISE ORM DE LARAVEL 
//use Illuminate\Database\Capsule\Manager as Capsule; // use laravel's Eloquent ORM

class App extends Model 
{    
    function __construct(){
        parent::__construct();
    }  

    public function appExist($app_id)
    {
        //$response = Capsule::table('customers')->where('app_id', $app_id)->take(1)->get();
        //return $response[0];

    	// IL FAUT REFAIRE çA AVEC UNE SIMPLE REQUETE POSTGRE

        //TODO Verify if app_id exist in client table

    	//Return result object or false if not exist

        return false;
    }
}