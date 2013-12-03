<?php

namespace TeaBlogAdmin\Form;

use TakeATea\Form\AbstractForm;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class Category extends AbstractForm
{
    public function init()
    {
        parent::init();
        
        $this->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new \TeaBlog\Model\Category());
        
        $title = new \TeaAdmin\Form\Element\Text('categoryTitle');
        $title->setLabel('Title');
        $title->setAttribute('placeholder', 'Put your title here, make it uniq!');
        $title->setAttribute('maxlength', '140');
        $this->add($title);
        
        $slug = new \TeaAdmin\Form\Element\Text('categorySlug');
        $slug->setLabel('Slug');
        $title->setAttribute('maxlength', '250');
        $this->add($slug);
        
        $content = new \TeaAdmin\Form\Element\Textarea('categoryContent');
        $content->setLabel('Contents');
        $content->setAttribute('resize', 'none');
        $this->add($content);
        
        $thumb = new \Zend\Form\Element\File('thumb');
        $thumb->setLabel('Media');
        $this->add($thumb);
        
        $metaTitle = new \TeaAdmin\Form\Element\Text('categoryMetaTitle');
        $metaTitle->setLabel('Page title');
        $metaTitle->setLabelTips('Write to 70 characters');
        $metaTitle->setAttribute('maxlength', '70');
        $this->add($metaTitle);
        
        $metaDescription = new \TeaAdmin\Form\Element\Textarea('categoryMetaDescription');
        $metaDescription->setLabel('Meta description');
        $metaDescription->setLabelTips('Write to 160 characters');
        $metaDescription->setAttribute('maxlength', '160');
        $this->add($metaDescription);
        
        $metaKeywords = new \TeaAdmin\Form\Element\Text('categoryMetaKeywords');
        $metaKeywords->setLabel('Meta news keywords');
        $this->add($metaKeywords);
        
        $visibility = new \TeaAdmin\Form\Element\Radio('categoryVisibility');
        $visibility->setLabel('Visibility');
        $visibility->setValueOptions(array(
            '1' => 'Visible', 
            '0' => 'Hidden'
        ));
        $this->add($visibility);
        
        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setValue('Save');
        $this->add($submit);
    }
}