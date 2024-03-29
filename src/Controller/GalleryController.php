<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GalleryController extends AbstractController
{
    
    #[Route('/gallery', name: 'gallery')]
    public function index(): Response
    {   
        
        $folders = scandir('img/');
  
        
        $fileCounts = count($folders);
        

        return $this->render('gallery/index.html.twig', [
            'controller_name' => 'MainController',
            'folders' => $folders,
            'fileCounts' => $fileCounts,
        ]);
    }


    #[Route('/galery/{id}', name: 'galeryFolder')]
    public function gallery($id): Response
    {
        $folders = scandir('img/');

        $images = scandir('img/'.$id);

        $no = count($images);

        return $this->render('gallery/folder.html.twig', [
            'controller_name' => 'GaleryController',
            'Picked' => $id,
            'folders' => $folders,
            'images' => $images,
            'no' => $no,
        ]);
    }

    #[Route('/galery/{id}/{file}', name: 'imageShow', )]
    public function imageShow($id,$file): Response
    {   

         return $this->render('gallery/image.html.twig', [
             'controller_name' => 'ImageController',            
             'folder' => $id,
             'image' => $file,
         ]);
    }
}
