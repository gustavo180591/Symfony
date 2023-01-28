<?php

namespace App\Controller;

use App\Repository\TareaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

        // Variables
    const ELEMENTOS_POR_PAGINA = 5;

    /**
     *  @Route("/{pagina}", name="app_main", defaults={"pagina": 1}, requirements={"pagina"="\d+"}, methods={"GET"})
     */
    public function index(Security $security, int $pagina, TareaRepository $tareaRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'tareas' => $tareaRepository -> buscarTodas($pagina, self::ELEMENTOS_POR_PAGINA),
            'pagina' => $pagina,
        ]);
    }
}
