<?php
    echo $_POST['name'];
    echo $_POST['add'];
    $text = "This is a longer, sentence, and i just wanted to split it.";

    $parts = preg_split('/\s|\.|, /',$text);

    if(count($parts)>0){
        foreach($parts as $part){
            echo $part. '<br/>';
        }
    }
?>