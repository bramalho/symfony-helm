<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HealthController extends AbstractController
{
    /**
     * @var Connection $connection
     */
    private $connection;

    /**
     * HealthController constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @Route("/healthz")
     * @Route("/")
     * @return Response
     */
    public function status(): Response
    {
        if ($this->connection->connect()) {
            return new Response('Up');
        } else {
            return new Response('Down: database connection error', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
