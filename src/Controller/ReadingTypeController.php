<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Entity\ReadingType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReadingTypeController extends Controller
{

	/**
    * @Route("/admin/readingtypes/new", name="new_reading_type")
    * @Security("has_role('ROLE_ADMIN')")
    */
	public function new(Request $request)
    {
    		
        // creates a readingtype and gives it some dummy data for this example
        $readingtype = new ReadingType();
        $readingtype->setIsPublic(true);
        //$readingtype->setreadingtype('Write a blog post');
        //$readingtype->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($readingtype)
            ->add('CommonName', TextType::class)
            ->add('ScientificName', TextType::class)
            ->add('Units', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Reading Type'))
            ->getForm();

    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {
    		// $form->getData() holds the submitted values
    		// but, the original `$readingtype` variable has also been updated
    		$readingtype = $form->getData();
    		$entityManager = $this->getDoctrine()->getManager();
    		$entityManager->persist($readingtype);
    		$entityManager->flush();

    		return $this->redirectToRoute('admin');
    	}

        return $this->render('admin/readingtypes/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
	* @Route("/admin/readingtypes/list", name="readingtype_list")
	* @Security("has_role('ROLE_ADMIN')")
	*/

	public function list()
	{
		$repository = $this->getDoctrine()->getRepository(ReadingType::class);
		$readingtypes = $repository->findAll();

		return $this->render('admin/readingtypes/list.html.twig', ['readingtypes' => $readingtypes]);
	}

    /**
	* @Route("/admin/readingtypes/{id}", name="readingtype_show")
	* @Security("has_role('ROLE_ADMIN')")
	*/
	public function show($id)
	{
	    $readingtype = $this->getDoctrine()
	        ->getRepository(ReadingType::class)
	        ->find($id);

	    if (!$readingtype) {
	        throw $this->createNotFoundException(
	            'No readingtype found for id '.$id
	        );
	    }

	    //return new Response('Check out this great readingtype: '.$readingtype->getName());

	    // or render a template
	    // in the template, print things with {{ readingtype.name }}
	    return $this->render('admin/readingtypes/show.html.twig', ['readingtype' => $readingtype]);
	}
}    