<?php
namespace TeaAdmin\Form\View\Helper;

use Zend\Form\View\Helper\FormLabel as BaseFormLabel;

class FormLabel extends BaseFormLabel
{
    protected $attributes = array(
        'class' => 'note'
    );
    
    public function __invoke(ElementInterface $element = null)
    {
        if (!$element) {
            return $this;
        }
        
        $description = '';
        if(method_exists($element, 'getDescription')) {
            $description = $element->getDescription();
            if (null !== ($translator = $this->getTranslator())) {
                $description = $translator->translate(
                    $description, $this->getTranslatorTextDomain()
                );
            }
            
            return $this->openTag($element) . $description . $this->closeTag();
        }
        
        return $description;
    }
    /**
     * Generate an opening label tag
     *
     * @param  null|array|ElementInterface $attributesOrElement
     * @throws Exception\InvalidArgumentException
     * @throws Exception\DomainException
     * @return string
     */
    public function openTag($attributesOrElement = null)
    {
        if (null === $attributesOrElement) {
            return '<p>';
        }

        if (is_array($attributesOrElement)) {
            $attributes = $this->createAttributesString($attributesOrElement);
            return sprintf('<p %s>', $attributes);
        }

        if (!$attributesOrElement instanceof ElementInterface) {
            throw new Exception\InvalidArgumentException(sprintf(
                '%s expects an array or Zend\Form\ElementInterface instance; received "%s"',
                __METHOD__,
                (is_object($attributesOrElement) ? get_class($attributesOrElement) : gettype($attributesOrElement))
            ));
        }

        $attributes = $this->createAttributesString($this->attributes);
        return sprintf('<p %s>', $attributes);
    }

    /**
     * Return a closing label tag
     *
     * @return string
     */
    public function closeTag()
    {
        return '</p>';
    }
    
}
