<?php
function IsPalindrom($stringData){
    if (strcasecmp(strrev($stringData) ,$stringData) == 0){   
        return true;   
        
    } 
    else{ 
        return false; 
      
    } 
}
if ( IsPalindrom("mom")){
    echo "true";

}else {
    echo "false";
}

