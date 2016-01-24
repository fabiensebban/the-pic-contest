<?php
/**
 * Dashboard controller
 *
 * @author Uness Mou - youness.mou@gmail.com
 * @version 0.1
 * @date Dec 5, 2015
 * @date updated Dec 5, 2015
 */

namespace Controllers\backoffice;

use Core\View;
use Core\Controller;
use Helpers\Url;
use Helpers\Request;
use Helpers\GUMP;
use Helpers\Assets;

class Contest extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->language->load('Dashboard');
    }

    public function create()
    {
        if(Request::isPost())
        {
            //Checkbox validation

            if($_POST['participeAvant'] == "Yes")
            {
                $participe_avant = 'true';
            }
            else
            {
                $participe_avant = 'false';
            }

            //date validation
            $_POST['dateD'] = $this->validate_date($_POST['dateD']);
            $_POST['dateF'] = $this->validate_date($_POST['dateF']);

            if($_POST['dateD'] != null && $_POST['dateF'] != null){
                if(!$this->is_date_higher($_POST['dateD'], $_POST['dateF']))
                {
                    $_POST['dateD'] = null;
                    $_POST['dateF'] = null;
                }
            }

        	GUMP::set_field_name("titre", "\"Titre\"");
        	GUMP::set_field_name("dateD", "\"Date de début\"");
        	GUMP::set_field_name("dateF", "\"Date de fin\"");
        	GUMP::set_field_name("participeAvant", "\"Participe avant\"");
        	GUMP::set_field_name("nbParticipantsMax", "\"Nombre de participant max\"");
        	GUMP::set_field_name("image_concours", "\"Image\"");

        	$is_valid = GUMP::is_valid(array_merge($_POST,$_FILES), array(
        		'titre' 			=> 'required',
        		'dateD' 			=> 'required',
        		'dateF' 			=> 'required',
        		'participeAvant'	=> 'boolean',
        		'nbParticipantsMax'	=> 'required|integer',
        		'image_concours'	=> 'required',
                'nb_votes_max'      => 'required|integer'
			));

            //A modifier
            $id_client = 1;
            $image_concours = "image_concours";

        	//save de contest
            if($is_valid === true)
        	{   /*
                $concour  = array(
                                    'titre' => $_POST['titre'],
                                    'theme' => $_POST['theme'],
                                    'reglement' => $_POST['reglement'],
                                    'description' => $_POST['description'],
                                    'lots' => $_POST['lots'],
                                    'dateD' => $_POST['dateD'],
                                    'dateF' => $_POST['dateF'],
                                    'nbParticipantsMax' => intval($_POST['nbPaticipantsMax']),
                                    'participeAvant' => $_POST['participeAvant'],
                                    'image_concours' => $image_concours,
                                    'fk_id_client' => $id_client,
                                    'nb_votes_max' => intval($_POST['nb_votes_max'])
                                );
                */

                $query = "INSERT INTO concours(titre, theme, reglement, description, lots, \"dateD\",
                 \"dateF\", \"nbParticipantsMax\", image_concours,
                 \"participeAvant\", fk_id_client, nb_votes_max)

                 VALUES ('"
                    . $_POST['titre']. "',' "
                    . $_POST['theme'] . "', '"
                    . $_POST['reglement'] . "', '"
                    . $_POST['description'] ."', '"
                    . $_POST['lots'] . "', '"
                    . $_POST['dateD'] . "', '"
                    . $_POST['dateF'] . "', "
                    . intval($_POST['nbPaticipantsMax']) . ", '"
                    . $image_concours . "', '"
                    . $participe_avant . "', "
                    . $id_client . ", '"
                    . $_POST['nb_votes_max'] .
                "')";

        		$bdd = pg_connect(DB_CONFIG);
                //$res = pg_insert($bdd, "concours", $concour);
                $res = pg_query($bdd, $query);
                pg_close($bdd);


                if ($res) {
                    $data['saved_correctly'] = true;
                } else {
                    $data['is_error'] = true;
                    $data['is_valid'] = array('Une erreur s\'est produite au moment de la sauvegarde');
                }

        	}
        	else
        	{
                $data['post'] = $_POST;
                $data['is_error'] = true;
                $data['is_valid'] = $is_valid;
        	}
        }

        $this->validate_date("4/13/2017");
        $data['title'] = $this->language->get('createContest');
        
        //Adding specific JS files
        $data['js-datePlaceholder'] = true;
        
        View::renderTemplate('backoffice/header', $data);
        View::renderTemplate('backoffice/main_header', $data);
        View::render('backoffice/contest/create', $data);
        View::renderTemplate('backoffice/footer', $data);

    }

    protected function validate_date($date)
    {
        if (!isset($date)) {
            return;
        }

        $valide_date = date('d/m/Y', strtotime(str_replace('/', '-', $date)));

        if ($valide_date != $date) {
            return null;
        }
        else{
            return $date;
        }
    }

    protected function is_date_higher($dateDebut, $dateFin)
    {
        $dD = split("/", $dateDebut);
        $dF = split("/", $dateFin); 

        $dateDebut = new \DateTime("" . $dD[2] . "-" . $dD[1] . "-" . $dD[0]);
        $dateFin = new \DateTime("" . $dF[2] . "-" . $dF[1] . "-" . $dF[0]);

        return ($dateDebut < $dateFin);
    }
}
?>