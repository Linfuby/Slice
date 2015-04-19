<?php

namespace PHPixie\Slice\Type\ArrayData;

class Editable extends    \PHPixie\Slice\Type\ArrayData
               implements \PHPixie\Slice\Data\Editable
{
    public function set($path, $value)
    {
        if ($path === null) {
            
            if (!is_array($value)) {
                throw new \PHPixie\Slice\Exception("Only array values can be set as root");
            }
            $this->data = $value;
            return;
        }
        
        list($path, $key) = $this->splitPath($path);
        $parent = &$this->findGroup($path, true);
        $parent[$key] = $value;
    }

    public function remove($path = null)
    {
        if ($path === null) {
            $this->data = array();
            return;
        }
        
        list($path, $key) = $this->splitPath($path);
        $parent = &$this->findGroup($path);
        
        if($parent !== null) {
            unset($parent[$key]);
        }
    }
    
    public function slice($path = null)
    {
        return $this->sliceBuilder->editableSlice($this, $path);
    }
}