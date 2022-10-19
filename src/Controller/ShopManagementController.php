<?php

namespace App\Controller;

use App\Entity\Shop;
use App\Form\AddShopManageType;
use App\Repository\ShopRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class ShopManagementController extends AbstractController
{
    /**
     * @Route("/shop/management", name="app_shop_management")
     */
    public function index(ShopRepository $repo): Response
    {
        $shop = $repo->findAll();
        return $this->render('shop_management/index.html.twig', [
            'shop' =>$shop
        ]);
    }

    /**
     * @Route("/addshopmanage", name="addshopmanage")
     */
    public function addShopManageAction(Request $req, ManagerRegistry $res): Response
    {
        $shop = new Shop();

        $form = $this->createForm(AddShopManageType::class, $shop);

        $form->handleRequest($req);
        $entity = $res->getManager();

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $shop->setShopname($data->getShopname());
            $shop->setEmail($data->getEmail());
            $shop->setTelephone($data->getTelephone());
            $shop->setAddress($data->getAddress());
            
            $entity->persist($shop);
            $entity->flush();

            return $this->redirectToRoute('app_shop_management', []);
        }
        return $this->render('shop_management/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
