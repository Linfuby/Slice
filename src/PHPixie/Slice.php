<?php

namespace PHPixie;

class Slice
{
    public function iterator($data)
    {
        return new Slice\Iterator($data);
    }
    
    public function slice($data, $path = null)
    {
        return new Slice\Type\Slice($this, $data, $path);
    }
    
    public function editableSlice($data, $path = null)
    {
        return new Slice\Type\Slice\Editable($this, $data, $path);
    }
    
    public function arrayData($data = null)
    {
        return new Slice\Type\ArrayData($this, $data);
    }
}