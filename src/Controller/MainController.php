<?php

namespace App\Controller;


use App\Entity\RedditPost;
use App\Repository\RedditPostRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class MainController extends AbstractController {

    private $redditPostRepository;

    public function __construct(RedditPostRepository $redditPostRepository)
    {
        $this->redditPostRepository = $redditPostRepository;
    }

    /**
     * @Route("/", name = "main", methods={"GET"})
     */
    public function index()
    {
        $posts = $this->redditPostRepository->findAll();

        return $this->render('index.html.twig',[
            'posts' => $posts,
            'showError' => false
        ]);
    }

    /**
     * @Route("/save", name = "save", methods={"POST"})
     */
    public function savePost(Request $request, ValidatorInterface $validator) {

        $reddit = new RedditPost();
        $reddit -> setPost($request->request->get('post'));
        $reddit -> setScore(100);
        date_default_timezone_set('UTC');
        $reddit ->setCreatedAt(new DateTime());

        $errors = $validator->validate($reddit);

        if (count($errors) > 0) {

            $posts = $this->redditPostRepository->findAll();

            return $this->render('index.html.twig',[
                'posts' => $posts,
                'showError' => true
            ]);
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($reddit);
        $entityManager->flush();

        return $this -> redirectToRoute('main');

    }
}