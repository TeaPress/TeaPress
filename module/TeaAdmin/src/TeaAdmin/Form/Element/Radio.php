<?php
namespace TeaAdmin\Form\Element;

use Zend\Form\Element\Radio as BaseRadio;

class Radio extends BaseRadio
{
    protected $description;
    protected $labelTips;
    
    /**
     * @param  array $options
     * @return MultiCheckbox
     */
    public function setValueOptions(array $options)
    {
        $newOptions = array();
        foreach ($options as $key => $optionSpec) {
            if(is_array($optionSpec)) {
                $newOptions[] = $optionSpec['label_attributes'] = array('class' => 'choice');
            } else {
                $newOptions[] = array(
                    'value' => $key,
                    'label' => $optionSpec,
                    'label_attributes' => array('class' => 'choice')
                );
            }
        }
        
        return parent::setValueOptions($newOptions);
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    
    public function getLabelTips()
    {
        return $this->labelTips;
    }
    
    public function setLabelTips($labelTips)
    {
        $this->labelTips = $labelTips;
        return $this;
    }
}

