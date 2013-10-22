<?php

namespace TeaAdmin\Service;

use TakeATea\Service\AbstractService;

class Config extends AbstractService
{
    protected $mapper = 'TeaAdmin\Mapper\Config';
    
    /**
     * Get config from section
     * @param \TeaAdmin\System\Config\Section $section
     * @return array
     */
    public function getConfigFromSection($section)
    {
        $dbConfig = $this->getMapper()->getConfigFromPaths($section->getName())->toArray();
        
        $config = $this->getServiceLocator()->get('Config');
        $defaultConfig = $config['system']['values'];
        
        $values = array();
        foreach ($section->getGroups() as $group) {
            foreach($group->getFields() as $field) {
                $path = $section->getName() . '/' . $group->getName() . '/' . $field->getName();
                
                $find = false;
                foreach($dbConfig as $item) {
                    if($item['path'] == $path) {
                        $values[$field->getName()] = $item['value'];
                        $find = true;
                    }
                }
                
                if($find) {
                    continue;
                } elseif(isset($defaultConfig[$section->getName()]) && isset($defaultConfig[$section->getName()][$group->getName()]) && isset($defaultConfig[$section->getName()][$group->getName()][$field->getName()])) {
                    $values[$field->getName()] = $defaultConfig[$section->getName()][$group->getName()][$field->getName()];
                } else {
                    $values[$field->getName()] = '';
                }
            }
        }
        
        return $values;
    }
    
    /**
     * Save section (create or update)
     * @param \TeaAdmin\System\Config\Section $section
     * @return 
     */
    public function saveSection($section)
    {
        foreach($section->getGroups() as $group) {
            foreach($group->getFields() as $field) {
                $path = $section->getName() . '/' . $group->getName() . '/' . $field->getName();
                $data = array('config_id' => $field->getId(), 'path' => $path, 'value' => $field->getValue());
                $this->getMapper()->save($data);
            }
        }
    }
}