<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Model;
use AppBundle\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Doctrine\ORM\Repository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;


class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ));
    }


    /**
     * @Route("/neworder")
     */
    public function newOrderAction()
    {
        $em = $this->getDoctrine()->getManager();
        $model_obj = $em->getRepository("AppBundle:Model")->findOneById("1");
        $order = new Order();
        $order->setName('w');
        $order->setNumberOfPieces('1');
        $order->setYarnWeight('1');
        $order->setSpooling('1');
        $order->setTickets('1');
        $order->setModel($model_obj);

        print_r($model_obj);
        ?>
        </br>
        <?php
        print_r($order);


//        $form = $this->createFormBuilder($order)
//            ->add('name', TextType::class, array('label' => 'Ime komese'))
//            ->add('numberofpieces', TextType::class, array('label' => 'Broj kompletnih komada'))
//            ->add('yarnweight', TextType::class, array('label' => 'Tezina konca'))
//            ->add('spooling', CheckboxType::class, array('label' => 'Premotava se?'))
//            ->add('tickets', CheckboxType::class, array('label' => 'Kartice'))
////            ->add('model', TextType::class, array('label' => 'Model ID'))
//            ->add('save', SubmitType::class, array('label' => 'Nova komesa'))
//            ->getForm();

//        $form->handleRequest($request);

//        if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($order);
        $em->flush();
//            return $this->redirectToRoute('task_success');
//        }

        return $this->render('default/neworder.html.twig');
    }

    /**
     * @Route("/newmodel")
     */
    public function newModelAction()
    {
        $text = "novi model";

        return $this->render('default/newmodel.html.twig', array('text' => $text));
    }

    /**
     * @Route("/newcolor")
     */
    public function newColorAction()
    {
        $text = "nova boja";

        return $this->render('default/newcolor.html.twig', array('text' => $text));
    }

    /**
     * @Route("/newhue")
     */
    public function newHueAction()
    {
        $text = "nova kota";

        return $this->render('default/newhue.html.twig', array('text' => $text));
    }
}
