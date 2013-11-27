<?php

namespace TeaBlogAdmin\Form;

use TakeATea\Form\AbstractForm;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class Post extends AbstractForm
{
    public function init()
    {
        parent::init();
        
        $this->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new \TeaBlog\Model\Post());
        
        $postId = new \Zend\Form\Element\Hidden('postId');
        $this->add($postId);
        
        $title = new \TeaAdmin\Form\Element\Text('postTitle');
        $title->setAttribute('placeholder', 'Put your title here, make it uniq!');
        $title->setLabel('Title');
        $this->add($title);
        
        $slug = new \TeaAdmin\Form\Element\Text('postSlug');
        $slug->setAttribute('placeholder', 'Slug');
        $slug->setLabel('Slug');
        $this->add($slug);
        
        $content = new \TeaAdmin\Form\Element\Textarea('postContent');
        $content->setAttribute('placeholder', 'Contents');
        $content->setDescription('To make better search engine optimizations, write between 300 and 800 words and repeat to 8 times your main tags.');
        $content->setLabel('Contents');
        $this->add($content);
        
        $excerpt = new \TeaAdmin\Form\Element\Textarea('postExcerpt');
        $excerpt->setAttribute('placeholder', 'Excerpt');
        $excerpt->setDescription('Excerpts are optional hand-crafted summaries of your content that can be used in your theme.');
        $excerpt->setLabel('Excerpt');
        $this->add($excerpt);
        
        $thumb = new \Zend\Form\Element\File('thumb');
        $thumb->setLabel('Media');
        $this->add($thumb);
        
        $category = new \TeaAdmin\Form\Element\Select('categoryId');
        $category->setLabel('Category');
        
        // Get root category for parent category
        $rootCategorys = $this->getServiceLocator()->getServiceLocator()->get('TeaBlog\Service\Category')->getAllRootCategory(false);
        $options = array();
        foreach($rootCategorys as $rootCategory) {
            $options[$rootCategory->getCategoryId()] = $rootCategory->getTitle();
        }
        $category->setEmptyOption('Select a category');
        $category->setValueOptions($options);
        $this->add($category);
        
        $tags = new \TeaAdmin\Form\Element\Text('postTags');
        $tags->setLabel('Tags');
        $this->add($tags);
        
        $metaTitle = new \TeaAdmin\Form\Element\Text('postMetaTitle');
        $metaTitle->setLabel('Page title');
        $this->add($metaTitle);
        
        $metaDescription = new \TeaAdmin\Form\Element\Textarea('postMetaDescription');
        $metaDescription->setLabel('Meta description');
        $this->add($metaDescription);
        
        $metaKeywords = new \TeaAdmin\Form\Element\Text('postMetaKeywords');
        $metaKeywords->setLabel('Meta news keywords');
        $this->add($metaKeywords);
        
        $visibility = new \TeaAdmin\Form\Element\Radio('postVisibility');
        $visibility->setLabel('Visibility');
        $visibility->setValueOptions(array('1' => 'Visible', '0' => 'Hidden'));
        $this->add($visibility);
        
        $comments = new \TeaAdmin\Form\Element\Radio('postComment');
        $comments->setLabel('Comments');
        $comments->setValueOptions(array(
            '0' => 'Comments are disabled', 
            '1' => 'Comments are allowed, pending moderation',
            '2' => 'Comments are allowed, and are automatically published'));
        $this->add($comments);
        
        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setValue('Save');
        $this->add($submit);
    }
}