<?php
function isValid(string $title, int $time, string $publishedAt):bool
{
    if(strlen($title)>1 && strlen($title)<255){
        if($time > 1){
            try {
                $publishedAt = new DateTime($publishedAt);
                return true;
            }catch(Exception $e){
                return false;
            }
        }
        return false;
    }
    return false;
}