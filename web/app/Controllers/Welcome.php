<?php
/**
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */

namespace Controllers;

use Core\View;
use Core\Controller;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class Welcome extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->language->load('Welcome');
    }

    /**
     * Define Index page title and load template files
     */
    public function index()
    {
        /*$data['title'] = $this->language->get('welcome_text');
        $data['welcome_message'] = $this->language->get('welcome_message');*/
		
		$bdd = pg_connect("host=ec2-54-204-8-224.compute-1.amazonaws.com port=5432 dbname=d9sajt9tcst8jb user=zonmcwaicehuik password=LkDPfGNZjOLBC6LeheOshQ0_Y0");
		$result = pg_query($bdd, "SELECT theme FROM concours");
		if (!$result) {
		  echo "Une erreur s'est produite.\n";
		  exit;
		}

		while ($row = pg_fetch_row($result)) {
		  echo "Theme: $row[0]";
		  echo "<br />\n";
		}

        /*View::renderTemplate('header', $data);
        View::render('welcome/welcome', $data);
        View::renderTemplate('footer', $data);*/
    }

    /**
     * Define Subpage page title and load template files
     */
    public function subPage()
    {
        $data['title'] = $this->language->get('subpage_text');
        $data['welcome_message'] = $this->language->get('subpage_message');

        View::renderTemplate('header', $data);
        View::render('welcome/subpage', $data);
        View::renderTemplate('footer', $data);
    }
}
