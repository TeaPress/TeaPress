<?php
namespace TeaAdmin\Form\View\Helper;

use Zend\Form\View\Helper\FormLabel as BaseFormLabel;
use Zend\Form\ElementInterface;

class FormLabel extends BaseFormLabel
{
    
    public function __invoke(ElementInterface $element = null, $labelContent = null, $position = null)
    {
        if (!$element) {
            return $this;
        }

        $openTag = $this->openTag($element);
        $label   = '';
        if ($labelContent === null || $position !== null) {
            $label = $element->getLabel();
            if (empty($label)) {
                throw new Exception\DomainException(sprintf(
                    '%s expects either label content as the second argument, ' .
                        'or that the element provided has a label attribute; neither found',
                    __METHOD__
                ));
            }

            if (null !== ($translator = $this->getTranslator())) {
                $label = $translator->translate(
                    $label, $this->getTranslatorTextDomain()
                );
            }
        }

        if ($label && $labelContent) {
            switch ($position) {
                case self::APPEND:
                    $labelContent .= $label;
                    break;
                case self::PREPEND:
                default:
                    $labelContent = $label . $labelContent;
                    break;
            }
        }

        if ($label && null === $labelContent) {
            $labelContent = $label;
        }
        
        if(method_exists($element, 'getLabelTips')) {
            $tips = $element->getLabelTips();
            if (null !== ($translator = $this->getTranslator())) {
                $tips = $translator->translate(
                    $tips, $this->getTranslatorTextDomain()
                );
            }
            $labelContent .=  '<span class="note">' . $tips . '</span>';
        }

        return $openTag . $labelContent . $this->closeTag();
    }
}
