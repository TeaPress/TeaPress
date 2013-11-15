<?php

namespace TeaCore\Service;

use TakeATea\Service\AbstractService;

class Config extends AbstractService
{
    protected $mapper = 'TeaCore\Mapper\Config';
    
    public function get($path)
    {
        // TODO Vérifier d'abord le cache, puis en db, puis valeur par default.
        $return = $this->getMapper()->get($path);
        if($return != false) {
            return $return->getValue();
        }
        return $return;
    }
    
    /**
     * Get config from section
     * @param \TeaCore\System\Config\Section $section
     * @return array
     */
    public function getConfigFromSection($section)
    {
        $cache = $this->getServiceLocator()->get('TeaCacheConfig');
        if($cache->getCaching() && $cache->hasItem('config_section_' . $section->getName())) {
            return $cache->getItem('config_section_' . $section->getName());
        }
        
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
        
        if($cache->getCaching()) {
            $cache->setItem('config_section_' . $section->getName(), $values);
        }
        
        return $values;
    }
    
    /**
     * Save section (create or update)
     * @param \TeaCore\System\Config\Section $section
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
        
        $cache = $this->getServiceLocator()->get('TeaCacheConfig');
        if($cache->getCaching() && $cache->hasItem('config_section_' . $section->getName())) {
            return $cache->removeItem('config_section_' . $section->getName());
        }
    }
}