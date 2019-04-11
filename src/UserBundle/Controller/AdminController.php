<?php

/* Copyright (C) 2016 OUICARE, All Rights Reserved.
 * Web site : www.ouicare.net
 *
 *  __       .  __  __   __  __
 * /  \ |  | | /   /  | |   |__|
 * \__/ |__| | \__ \__| |   |__
 *
 *
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * This file can not be copied and/or distributed without the express permission of OUICARE
 *
 * @author Mohamed Amine <Mohamed.ABBADI@ouicare.net>, 28/06/2016
 */

namespace UserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Admin Controller
 * @author Mohamed Amine ABBADI
 */
class AdminController extends Controller {

    /**
     * Displays the surgeon dashboard if authenticated
     * @param Request $request
     * @return Response
     */
    public function homeAction() {
        $user = $this->getUser();
        return $this->render('UserBundle:Admin:home.html.twig', array('user' => $user));
    }

    
   
}
