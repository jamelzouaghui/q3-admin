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
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Admin Controller
 * @author zouaghui jamel
 */
class UserController extends Controller {

    /**
     * @ApiDoc(
     *     resource=true,
     *     description="Get the list of all users",
     *     section="users"
     * )
     *
     * @Route("/api/users",name="list_users")
     * @Method({"GET"})
     */
    public function listUsers() {

        $users = $this->getDoctrine()->getRepository('UserBundle:User')->findAll();

        if (!count($users)) {
            $response = array(
                'code' => 1,
                'message' => 'No users found!',
                'errors' => null,
                'result' => null
            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }


        $data = $this->get('jms_serializer')->serialize($users, 'json');

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
     * description="Create a new user",
     *
     *    statusCodes = {
     *        201 = "Creation with success",
     *        400 = "invalid form"
     *    },
     *    responseMap={
     *         201 = {"class"=User::class},
     *
     *    },
     *     section="users"
     *
     *
     * )
     *
     * @param Request $request
     * @return JsonResponse
     * @Route("/api/users/addnew",name="new_user")
     * @Method({"POST"})
     */
    public function createUser(Request $request) {

        $data = json_decode($request->getContent(), true);
        
       

        $em = $this->getDoctrine()->getManager();
        $entity = $this->get('jms_serializer')->deserialize(json_encode($data), 'UserBundle\Entity\User', 'json');
        $file1 = $data['photo'];
        $file = json_encode($request->request->get('photo'));
        
        $filetype = $file1['filetype'];

        $type = strchr($filetype, "/");

        $typeImage = str_replace("/", "", $type);


        $fileName = $this->generateUniqueFileName() . '.' . $typeImage;


        try {
            $file->move($this->getParameter('users_directory'), $fileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }
       $entity->setPhoto($fileName);
        $entity->setEnabled('1');
        $entity->setMobilePhone('23445465');
        $entity->setProfession('testeur');

        $em->persist($entity);
        $em->flush();
        $response = array(
            'code' => 0,
            'message' => 'User created!',
            'errors' => null,
            'result' => null
        );

        return new JsonResponse($response, Response::HTTP_CREATED);
    }

    /**
     * @return string
     */
    private function generateUniqueFileName() {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
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

    /**
     * @ApiDoc(
     * description="Create a media",
     *
     *    statusCodes = {
     *        201 = "Creation with success",
     *        400 = "invalid form"
     *    },
     *    responseMap={
     *         201 = {"class"=Media::class},
     *
     *    },
     *     section="users"
     *
     *
     * )
     *
     * @param Request $request
     * @return JsonResponse
     * @Route("/api/users/addmedia",name="new_media")
     * @Method({"POST"})
     */
    public function createMedia(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $file = $request->files->get('file');
        $dimensions = array();
        $dimensions['filename'] = false;
        $entity = new Media();
        $extension = $file->guessExtension();
        $dimensions['name'] = sha1(uniqid(mt_rand(), true)) . ".$extension";

        $dimensions['directory'] = $entity->getTempRootDir();

        $assetUrl = $entity->getTempDir() . "/" . $dimensions['name'];


        $dimensions['asset'] = $this->container->get('assets.packages')->getUrl($assetUrl);
        dump($dimensions['asset']);
        dump($dimensions['directory']);
        die();
        $file->move($dimensions['directory'], $dimensions['name']);
        $entity->setName($dimensions['name']);




        $em->persist($entity);

        $em->flush();
        $response = array(
            'code' => 0,
            'message' => 'User created!',
            'errors' => null,
            'result' => null
        );

        return new JsonResponse($response, Response::HTTP_CREATED);
    }

}
