<?php

namespace App\Controller;

use App\Entity\Concessionnaire;
use App\Repository\ConcessionnaireRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/v1.5/concessionnaire', name: 'api_v1.5_concessionnaire_')]
class ConcessionnaireController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ConcessionnaireRepository $concessionnaireRepository, SerializerInterface $serializer): JsonResponse
    {
        $concessionnaires = $concessionnaireRepository->findAll();
        
        if(!empty($concessionnaires)) {
            $data = $serializer->serialize($concessionnaires, 'json', ['groups' => 'concessionnaire']);
            return new JsonResponse($data, Response::HTTP_OK, [], true);
        }
        return new JsonResponse('No data found', Response::HTTP_NOT_FOUND);
    }

    // Requirements permet de définir des contraintes sur les paramètres de la route, ici id n'est pas obligatoire
    // #[Route('/{id}', requirements: ['id' => '\w*'], name: 'show', methods: ['GET'])]
    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Concessionnaire $concessionnaire): Response
    {
        return $this->render('concessionnaire/show.html.twig', [
            'concessionnaire' => $concessionnaire,
        ]);
    }

    #[Route('/', name: 'add', methods: ['POST'])]
    public function add(Request $request, EntityManager $manager, ConcessionnaireRepository $concessionnaireRepository): Response
    {
        if($request->request->get('nom') && 
        $request->request->get('groupe') && 
        $request->request->get('adresse_numero') && 
        $request->request->get('adresse_rue') && 
        $request->request->get('adresse_ville') && 
        $request->request->get('adresse_cp')) {
            $concessionnaire = new Concessionnaire();
            $concessionnaire->setNom($request->request->get('nom'));
            $concessionnaire->setGroupe($request->request->get('groupe'));
            $concessionnaire->setAdresseNumero($request->request->get('adresse_numero'));
            $concessionnaire->setAdresseRue($request->request->get('adresse_rue'));
            $concessionnaire->setAdresseVille($request->request->get('adresse_ville'));
            $concessionnaire->setAdresseCp($request->request->get('adresse_cp'));

            $concessionnaireRepository->save($concessionnaire);
            $manager->flush();
            return new JsonResponse('Concessionnaire created', Response::HTTP_CREATED);
        }
        return new JsonResponse('Missing parameters', Response::HTTP_BAD_REQUEST);
    }

    #[Route('/{id}', name: 'update', methods: ['PUT', 'PATCH'])]
    public function update(Request $request, EntityManager $manager, Concessionnaire $concessionnaire, ConcessionnaireRepository $concessionnaireRepository): Response
    {
        if($concessionnaire instanceof Concessionnaire) {
            if($request->request->get('nom') && 
            $request->request->get('groupe') && 
            $request->request->get('adresse_numero') && 
            $request->request->get('adresse_rue') && 
            $request->request->get('adresse_ville') && 
            $request->request->get('adresse_cp')) {
                $concessionnaire->setNom($request->request->get('nom'));
                $concessionnaire->setGroupe($request->request->get('groupe'));
                $concessionnaire->setAdresseNumero($request->request->get('adresse_numero'));
                $concessionnaire->setAdresseRue($request->request->get('adresse_rue'));
                $concessionnaire->setAdresseVille($request->request->get('adresse_ville'));
                $concessionnaire->setAdresseCp($request->request->get('adresse_cp'));
    
                $concessionnaireRepository->update($concessionnaire);
                $manager->flush();
                return new JsonResponse('Concessionnaire updated', Response::HTTP_OK);
            }
            return new JsonResponse('Missing parameters', Response::HTTP_BAD_REQUEST);
        }
        return new JsonResponse('Concessionnaire not found', Response::HTTP_NOT_FOUND);
    }

    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(Concessionnaire $concessionnaire, ConcessionnaireRepository $concessionnaireRepository): Response
    {
        if($concessionnaire instanceof Concessionnaire) {
            $concessionnaireRepository->remove($concessionnaire);
            return new JsonResponse('Concessionnaire deleted', Response::HTTP_OK);
        }
        return new JsonResponse('Concessionnaire not found', Response::HTTP_NOT_FOUND);
    }
}
