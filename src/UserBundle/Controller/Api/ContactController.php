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
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use UserBundle\Entity\Panel;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Admin Controller
 * @author zouaghui jamel
 */
class ContactController extends Controller {

    /**
     * @ApiDoc(
     *     resource=true,
     *     description="Get the list of all produits",
     *     section="contacts"
     * )
     *
     * @Route("/api/produits",name="list_produits")
     * @Method({"GET"})
     */
    public function listProduits() {

        $produits = $this->getDoctrine()->getRepository('UserBundle:Produits')->findAll();

        if (!count($produits)) {
            $response = array(
                'code' => 1,
                'message' => 'No produits found!',
                'errors' => null,
                'result' => null
            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }


        $data = $this->get('jms_serializer')->serialize($produits, 'json');

        $response = array(
            'code' => 0,
            'message' => 'success',
            'errors' => null,
            'result' => json_decode($data)
        );

        return new JsonResponse($response, 200);
    }

    /**
     * @ApiDoc(
     *     resource=true,
     *     description="Get the list of all categorie",
     *     section="contacts"
     * )
     *
     * @Route("/api/categories",name="list_categories")
     * @Method({"GET"})
     */
    public function listCategories() {

        $categories = $this->getDoctrine()->getRepository('UserBundle:Categorie')->findAll();

        if (!count($categories)) {
            $response = array(
                'code' => 1,
                'message' => 'No categories found!',
                'errors' => null,
                'result' => null
            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }


        $data = $this->get('jms_serializer')->serialize($categories, 'json');

        $response = array(
            'code' => 0,
            'message' => 'success',
            'errors' => null,
            'result' => json_decode($data)
        );

        return new JsonResponse($response, 200);
    }

    /**
     * @ApiDoc(
     *     resource=true,
     *     description="Get the list of all users",
     *     section="contacts"
     * )
     *
     * @Route("/api/contacts",name="list_contacts")
     * @Method({"GET"})
     */
    public function listContacts() {


        $contacts = $this->getDoctrine()->getRepository('UserBundle:Panel')->findAll();

        if (!count($contacts)) {
            $response = array(
                'code' => 1,
                'message' => 'No contacts found!',
                'errors' => null,
                'result' => null
            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }


        $data = $this->get('jms_serializer')->serialize($contacts, 'json');

        $response = json_decode($data);

        return new JsonResponse($response, 200);
    }

    /**
     * @ApiDoc(
     * description="Create a new contact",
     *
     *    statusCodes = {
     *        201 = "Creation with success",
     *        400 = "invalid form"
     *    },
     *    responseMap={
     *         201 = {"class"=Contact::class},
     *
     *    },
     *     section="contacts"
     *
     *
     * )
     *
     * @param Request $request
     * @return JsonResponse
     * @Route("/api/contacts/addnewcontact",name="new_contacts")
     * @Method({"POST"})
     */
    public function createContact(Request $request) {
//        $em = $this->getDoctrine()->getManager();
//        $data = json_decode($request->getContent(), true);


        $data = $request->getContent();
        $em = $this->getDoctrine()->getManager();
        $entity = $this->get('jms_serializer')->deserialize($data, 'UserBundle\Entity\Panel', 'json');

        $em->persist($entity);
        $em->flush();

       
        $response = array(
            'code' => 0,
            'message' => 'COntact created!',
            'errors' => null,
            'result' => null
        );

        return new JsonResponse($response, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc(
     *     resource=true,
     *     description="Get the user by username",
     *     section="users"
     * )
     *
     * @Route("/api/user/{username}",name="show_user_connected")
     * @Method({"GET"})
     */
    public function showUserByUsername(Request $request, $username) {

        $user = $this->getDoctrine()->getRepository('UserBundle:User')->findBy(array('username' => $username));

        if (!count($user)) {
            $response = array(
                'code' => 1,
                'message' => 'No user connected found!',
                'errors' => null,
                'result' => null
            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }


        $data = $this->get('jms_serializer')->serialize($user, 'json');

        $response = array(
            'code' => 0,
            'message' => 'success',
            'errors' => null,
            'result' => json_decode($data)
        );

        return new JsonResponse($response, 200);
    }

//    /**
//     * @ApiDoc(
//     *     resource=true,
//     *     description="Get the user by id",
//     *     section="users"
//     * )
//     *
//     * @Route("/api/show/user/{id}",name="show_user")
//     * @Method({"GET"})
//     */
//    public function showContact(Request $request, $id) {
//
//        $user = $this->getDoctrine()->getRepository('UserBundle:User')->find($id);
//      
//        if (!count($user)) {
//            $response = array(
//                'code' => 1,
//                'message' => 'No posts found!',
//                'errors' => null,
//                'result' => null
//            );
//
//
//            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
//        }
//
//
//        $data = $this->get('jms_serializer')->serialize($user, 'json');
//
//        $response = array(
//            'code' => 0,
//            'message' => 'success',
//            'errors' => null,
//            'result' => json_decode($data)
//        );
//
//        return new JsonResponse($response, 200);
//    }

    /**
     * @ApiDoc(
     * description="Edit a  contact",
     *
     *    statusCodes = {
     *        201 = "update with success",
     *        400 = "invalid form"
     *    },
     *    responseMap={
     *         201 = {"class"=Contact::class},
     *
     *    },
     *     section="contacts"
     *
     *
     * )
     *
     * @param Request $request
     * @return JsonResponse
     * @Route("/api/contact/update/{id}",name="update_contact")
     * @Method({"PUT"})
     */
    public function updateContact(Request $request, $id) {

//        $contact = $this->getDoctrine()->getRepository('UserBundle:User')->find($id);
//
//        if (empty($contact)) {
//            $response = array(
//                'code' => 1,
//                'message' => 'contact Not found !',
//                'errors' => null,
//                'result' => null
//            );
//
//            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
//        }
//
//        $body = $request->getContent();
//
//
//        $data = $this->get('jms_serializer')->deserialize($body, 'UserBundle\Entity\User', 'json');
//        dump($data);
//        die();
//        $post->setTitle($data->getTitle());
//        $post->setDescription($data->getDescription());
//
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($post);
//        $em->flush();
//
//        $response = array(
//            'code' => 0,
//            'message' => 'Post updated!',
//            'errors' => null,
//            'result' => null
//        );
//
//        return new JsonResponse($response, 200);
    }

}
