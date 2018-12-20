<?php 
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return array(
            new TwigFunction('checkQuizzData', array($this, 'checkQuizzData')),
        );
    }

    public function checkQuizzData(Request $request)
    {   
        dump($request);
        
    }
}