<?php
namespace DCGov\HavenBundle\Twig;


class DCGovTwigExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('json_decode', array($this, 'jsonDecode')),
        );
    }
	
    /**
     * Call this method to return Json string into an array
     * @param unknown $str
     * @return mixed
     */
	public function jsonDecode($str) {
        return json_decode($str);
    }
    
    public function getName()
    {
        return 'app_extension';
    }
    
}