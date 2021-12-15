<?php

function isValid(string $name, int $age, ?int $id = null):bool
{
    if(!is_null($id) && $id<0){
        return false;
    }
    if(strlen($name)>1 && strlen($name)<255){
        if($age > 1 && $age < 150){
            return true;
        }
        return false;
    }
    return false;
}