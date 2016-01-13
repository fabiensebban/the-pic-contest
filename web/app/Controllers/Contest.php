<?php
/**
 * Contest controller
 *
 * @author Fabien Sebban - fa.sebban@gmail.com
 * @version 0.1
 * @date Jan 12, 2016
 * @date updated Jan 12, 2016
 */

namespace Controllers;

use Core\View;
use Core\Controller;
use Helpers\Url;

class Contest extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->language->load('Contest');
    }

    public function index()
    {
        $data['title'] = $this->language->get('contest');

        View::renderTemplate('header', $data);
        View::render('contest/contest', $data);
        View::renderTemplate('footer', $data);
    }
}

?>