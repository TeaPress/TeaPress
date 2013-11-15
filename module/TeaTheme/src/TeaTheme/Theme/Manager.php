<?php
namespace TeaTheme\Theme;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\PriorityQueue;

class Manager 
{
    protected $themes = array();
    protected $current_theme;
    protected $serviceLocator;
    
    public function __construct($serviceLocator, $themes)
    {
        $this->setServiceLocator($serviceLocator);
        
        foreach ($themes as $key => $options) {
            $this->themes[$key] = $options;
        }
        
        $currentTheme = $this->getCurrentTheme();
        
        $viewResolver = $this->getServiceLocator()->get('ViewResolver');
        $themeResolver = new \Zend\View\Resolver\AggregateResolver();
        if (isset($currentTheme['template_map'])){
            $viewResolverMap = $this->getServiceLocator()->get('ViewTemplateMapResolver');
            $viewResolverMap->add($currentTheme['template_map']);
            $mapResolver = new \Zend\View\Resolver\TemplateMapResolver(
                $currentTheme['template_map']
            );
            $themeResolver->attach($mapResolver);
        }

        if (isset($currentTheme['template_path_stack'])){
            $viewResolverPathStack = $this->getServiceLocator()->get('ViewTemplatePathStack');
            $viewResolverPathStack->addPaths($currentTheme['template_path_stack']);
            $pathResolver = new \Zend\View\Resolver\TemplatePathStack(
                array('script_paths'=>$currentTheme['template_path_stack'])
            );
            $defaultPathStack = $this->getServiceLocator()->get('ViewTemplatePathStack');
            $pathResolver->setDefaultSuffix($defaultPathStack->getDefaultSuffix());
            $themeResolver->attach($pathResolver);
        }
        
        $viewResolver->attach($themeResolver, 100);
    }
    
    public function getThemes()
    {
        return $this->themes;
    }
    
    /**
     * Service for admin System Config
     */
    public function getThemesForConfig()
    {
        $return = array();
        foreach ($this->themes as $key => $options) {
            $return[$key] = $options['label'];
        }
        return $return;
    }
    
    public function getCurrentTheme()
    {
        if(!isset($this->current_theme)) {
            $current_theme = $this->getServiceLocator()->get('TeaConfig')->get('design/theme/current');
            $this->current_theme = $this->themes[$current_theme];
        }
        return $this->current_theme;
    }
    
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }
}
