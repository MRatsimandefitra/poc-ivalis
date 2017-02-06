<?php

namespace Ivalis\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AuthentificationController extends Controller
{
    public function indexAction()
    {
        return $this->render('IvalisBundle:Authentification:index.html.twig');
    }
    public function connexionAction(Request $request){
        $login = $request->get("login");
        $password = $request->get("password");
        $session = $this->get("session");
        if(!$login || !$password){
            $session->getFlashBag()->add("error","L'identifiant ou le mot de passe vide");
            return $this->render('IvalisBundle:Authentification:index.html.twig');
        }
        $manager = $this->get("authentification.manager");
        $result = $manager->connexion($login,$password);
        if(isset($result->error)){
            $session->getFlashBag()->add("error",$result->error_description);
            return $this->render('IvalisBundle:Authentification:index.html.twig');
        }
        $session->getFlashBag()->add("infos","Ok");
        return $this->render('IvalisBundle:Authentification:index.html.twig'); 
        
        
    }    
        
}
