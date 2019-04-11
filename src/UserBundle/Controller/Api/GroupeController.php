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

namespace UserBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Doctrine\ORM\Mapping\Annotation;
use Symfony\Component\HttpFoundation\Response;

/**
 * Admin Controller
 * @author zouaghui jamel
 */
class GroupeController extends Controller {
    
    /**
     * @ApiDoc(
     *     resource=true,
     *     description="Get the list of all users",
     *     section="groupes"
     * )
     *
     * @Route("/api/groupes",name="list_groupes")
     * @Method({"GET"})
     */
    public function listGroupes() {

        $groupes = $this->getDoctrine()->getRepository('UserBundle:Groupe')->findAll();

        if (!count($groupes)) {
            $response = array(
                'code' => 1,
                'message' => 'No groupes found!',
                'errors' => null,
                'result' => null
            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }


        $data = $this->get('jms_serializer')->serialize($groupes, 'json');

        $response = array(
            'code' => 0,
            'message' => 'success',
            'errors' => null,
            'result' => json_decode($data)
        );

        return new JsonResponse($response, 200);
    }
    
   
}
