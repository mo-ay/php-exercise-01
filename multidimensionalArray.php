<?php
$multiDarray =[ "musicals" => ["Oklahoma", "The Music Man", "South Pacific "]
,"dramas" =>[ "Lawrence of Arabia", "To Kill a Mockingbird", "Casablanca "] ,"mysteries"
=>["The Maltese Falcon",  "Rear Window",  "North by Northwest"]];
rsort($multiDarray);
foreach ($multiDarray as $key => $value) {
    echo strtoupper($key) . "<br>"; 
    foreach ($value as $sub_key => $sub_val){
        echo "----> $sub_key = $sub_val <br>";
    }
}
rsort($multiDarray);

?>