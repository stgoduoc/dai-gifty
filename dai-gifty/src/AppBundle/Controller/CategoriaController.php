<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class CategoriaController extends Controller {

    /**
     * @Route("/categoria")
     */
    public function indexAction(Request $request, EntityManagerInterface $em) {
        $categoria = new \AppBundle\Entity\Categoria();

        $form = $this->createFormBuilder($categoria)
                //->add('id', IntegerType::class)
                ->add('nombre', TextType::class)
                ->add('descripcion', TextType::class)
                ->add('save', SubmitType::class, array('label' => 'Crear Categoría'))
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $categoria = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em->persist($categoria);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/new.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

}
