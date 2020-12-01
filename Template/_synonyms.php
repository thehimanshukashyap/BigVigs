<?php
    if(count($words)> 0){
        for($i=0;$i<count($words);$i++){
            if(strtolower($words[$i])== 'men' || strtolower($words[$i])== 'man' || strtolower($words[$i])== 'boy' || strtolower($words[$i])== 'mens' || strtolower($words[$i])== 'mans' || strtolower($words[$i])== 'boys'){
                $words[$i] = 'male';
            }
            if(strtolower($words[$i])== 'women' || strtolower($words[$i])== 'wemen' || strtolower($words[$i])== 'femae' || strtolower($words[$i])== 'woman' || strtolower($words[$i])== 'girl' || strtolower($words[$i])== 'womens' || strtolower($words[$i])== 'womans' || strtolower($words[$i])== 'girls'){
                $words[$i] = 'female';
            }
            if(strtolower($words[$i])== 'tshirts' || strtolower($words[$i])== 'tshirt' || strtolower($words[$i])== 't-shirts' || strtolower($words[$i])== 't-shirt' || strtolower($words[$i])== 't-shits' || strtolower($words[$i])== 't-shrts' || strtolower($words[$i])== 't-shrt' || strtolower($words[$i])== 't-shurts' || strtolower($words[$i])== 'tshirts' || strtolower($words[$i])== 'tshits' || strtolower($words[$i])== 'tshrts' || strtolower($words[$i])== 'tshrt' || strtolower($words[$i])== 'tshurts'){
                $words[$i] = 'T-Shirt';
            }
            if(strtolower($words[$i])== 'shirts' || strtolower($words[$i])== 'shits' || strtolower($words[$i])== 'shrts' || strtolower($words[$i])== 'shrt' || strtolower($words[$i])== 'shurts'){
                $words[$i] = 'Shirt';
            }
            if(strtolower($words[$i])== 'sweatshirts' || strtolower($words[$i])== 'sweatshits' || strtolower($words[$i])== 'sweatshrts' || strtolower($words[$i])== 'sweatshrt' || strtolower($words[$i])== 'sweatshurts' || strtolower($words[$i])== 'swetshirts' || strtolower($words[$i])== 'swatshirts' || strtolower($words[$i])== 'swatshits' || strtolower($words[$i])== 'swetshits' || strtolower($words[$i])== 'swatshrts' || strtolower($words[$i])== 'swetshrts' || strtolower($words[$i])== 'swetshrt' || strtolower($words[$i])== 'swatshrt' || strtolower($words[$i])== 'swatshurts' || strtolower($words[$i])== 'swetshurts'){
                $words[$i] = 'Sweatshirt';
            }
            if(strtolower($words[$i])== 'sweaters' || strtolower($words[$i])== 'swatar' || strtolower($words[$i])== 'sweatar' || strtolower($words[$i])== 'sweter' || strtolower($words[$i])== 'svetar' || strtolower($words[$i])== 'svatar'){
                $words[$i] = 'Sweater';
            }
            if(strtolower($words[$i])== 'jackets' || strtolower($words[$i])== 'jakats' || strtolower($words[$i])== 'jakat' || strtolower($words[$i])== 'jakets' || strtolower($words[$i])== 'jaket' || strtolower($words[$i])== 'jeket' || strtolower($words[$i])== 'jackat' || strtolower($words[$i])== 'jackats' || strtolower($words[$i])== 'jakets'){
                $words[$i] = 'Jacket';
            }
            if(strtolower($words[$i])== 'blazers' || strtolower($words[$i])== 'blaser' || strtolower($words[$i])== 'blasers' || strtolower($words[$i])== 'blesers' || strtolower($words[$i])== 'bleser' || strtolower($words[$i])== 'blezer' || strtolower($words[$i])== 'blezar'){
                $words[$i] = 'Blazer';
            }
            if(strtolower($words[$i])== 'koat' || strtolower($words[$i])== 'koats' || strtolower($words[$i])== 'kots' || strtolower($words[$i])== 'kot'){
                $words[$i] = 'Coat';
            }
            if(strtolower($words[$i])== 'suit' || strtolower($words[$i])== 'suts' || strtolower($words[$i])== 'sut' || strtolower($words[$i])== 'soot' || strtolower($words[$i])== 'siut'){
                $words[$i] = 'Suits';
            }
            if(strtolower($words[$i])== 'koorta' || strtolower($words[$i])== 'kuta'){
                $words[$i] = 'Kurta';
            }
            if(strtolower($words[$i])== 'shervani' || strtolower($words[$i])== 'sherva' || strtolower($words[$i])== 'sharvani' || strtolower($words[$i])== 'serwani' || strtolower($words[$i])== 'shervani'){
                $words[$i] = 'Sherwani';
            }
            if(strtolower($words[$i])== 'jeens' || strtolower($words[$i])== 'jins' || strtolower($words[$i])== 'jean'){
                $words[$i] = 'Jeans';
            }
            if(strtolower($words[$i])== 'truser' || strtolower($words[$i])== 'trousars' || strtolower($words[$i])== 'trousars' || strtolower($words[$i])== 'trosers' || strtolower($words[$i])== 'trausers' || strtolower($words[$i])== 'pants' || strtolower($words[$i])== 'pant' || strtolower($words[$i])== 'punts' || strtolower($words[$i])== 'punt' || strtolower($words[$i])== 'pents'){
                $words[$i] = 'Trousers';
            }
            if(strtolower($words[$i])== 'jogger' || strtolower($words[$i])== 'jogers' || strtolower($words[$i])== 'joggars' || strtolower($words[$i])== 'joger' || strtolower($words[$i])== 'jogar'){
                $words[$i] = 'Joggers';
            }
            if(strtolower($words[$i])== 'sendo' || strtolower($words[$i])== 'sedo' || strtolower($words[$i])== 'sado'){
                $words[$i] = 'Sando';
            }
            if(strtolower($words[$i])== 'chudidar' || strtolower($words[$i])== 'hudidars' || strtolower($words[$i])== 'choodiars' || strtolower($words[$i])== 'choodidars' || strtolower($words[$i])== 'chudidaras'){
                $words[$i] = 'Chudidars';
            }
            if(strtolower($words[$i])== 'pajsmas' || strtolower($words[$i])== 'pjama' || strtolower($words[$i])== 'pyjmas' || strtolower($words[$i])== 'pyjamaa' || strtolower($words[$i])== 'pajama' || strtolower($words[$i])== 'pajamas'){
                $words[$i] = 'Pyjama';
            }
            if(strtolower($words[$i])== 'salvar' || strtolower($words[$i])== 'salvars' || strtolower($words[$i])== 'sulvars' || strtolower($words[$i])== 'sulwars' || strtolower($words[$i])== 'sulvaars'){
                $words[$i] = 'Salwar';
            }
            if(strtolower($words[$i])== 'hudie' || strtolower($words[$i])== 'hoodee' || strtolower($words[$i])== 'hoodi' || strtolower($words[$i])== 'huudie'){
                $words[$i] = 'Hoodie';
            }
            if(strtolower($words[$i])== 'raincoats' || strtolower($words[$i])== 'raincoat' || strtolower($words[$i])== 'rainjackets' || strtolower($words[$i])== 'rainjacket' || strtolower($words[$i])== 'raincots' || strtolower($words[$i])== 'rainkots' || strtolower($words[$i])== 'rainjaket'){
                $words[$i] = 'Rain Jackets';
            }


            if(strtolower($words[$i])=='t' && ( strtolower($words[$i+1]) == 'shirts' || strtolower($words[$i+1]) == 'shirt'  || strtolower( $words[$i+1] )== 'shits' || strtolower($words[$i+1])== 'shrts' || strtolower($words[$i+1])== 'shrt' || strtolower($words[$i+1])== 'shurts' ) ){
                unset($words[$i+1]);
                $words[$i] = 'T-Shirt';
                $words = array_values($words);
            }

            if(strtolower($words[$i])=='rain' && ( strtolower($words[$i+1])=='coats' || strtolower($words[$i+1])=='coat' || strtolower($words[$i+1])=='cot' || strtolower($words[$i+1])=='koat' || strtolower($words[$i+1])=='jakets' || strtolower($words[$i+1])=='jackets' || strtolower($words[$i+1])=='jekets') ){
                unset($words[$i+1]);
                $words[$i] = 'Rain Jacket';
                $words = array_values($words);
            }
            
            if(strtolower($words[$i])=='nehru' && ( strtolower($words[$i+1])=='coats' || strtolower($words[$i+1])=='coat' || strtolower($words[$i+1])=='cot' || strtolower($words[$i+1])=='koat' || strtolower($words[$i+1])=='jakets' || strtolower($words[$i+1])=='jackets' || strtolower($words[$i+1])=='jekets') ){
                unset($words[$i+1]);
                $words[$i] = 'Nehru Jacket';
                $words = array_values($words);
            }
            
            if(strtolower($words[$i])=='track' || strtolower($words[$i])=='trak' && ( strtolower($words[$i+1])== 'pants' || strtolower($words[$i+1])== 'pant' || strtolower($words[$i+1])== 'punts' || strtolower($words[$i+1])== 'punt' || strtolower($words[$i+1])== 'pents') ){
                unset($words[$i+1]);
                $words[$i] = 'Track Pants';
                $words = array_values($words);
            }
            
            if(strtolower($words[$i])=='lounge' || strtolower($words[$i])=='longe' && ( strtolower($words[$i+1])== 'pants' || strtolower($words[$i+1])== 'pant' || strtolower($words[$i+1])== 'punts' || strtolower($words[$i+1])== 'punt' || strtolower($words[$i+1])== 'pents') ){
                unset($words[$i+1]);
                $words[$i] = 'Lounge Pants';
                $words = array_values($words);
            }
            
            if(strtolower($words[$i])=='night' || strtolower($words[$i])=='longe' && strtolower($words[$i])== 'suit' || strtolower($words[$i])== 'suts' || strtolower($words[$i])== 'sut' || strtolower($words[$i])== 'soot' || strtolower($words[$i])== 'siut'){
                unset($words[$i+1]);
                $words[$i] = 'Night Suit';
                $words = array_values($words);
            }
            
            if(strtolower($words[$i])== 'swet' || strtolower($words[$i])== 'swat' || strtolower($words[$i])== 'sweat' && (strtolower($words[$i+1]) == 'shirts' || strtolower($words[$i+1]) == 'shirt'  || strtolower( $words[$i+1] )== 'shits' || strtolower($words[$i+1])== 'shrts' || strtolower($words[$i+1])== 'shrt' || strtolower($words[$i+1])== 'shurts') ){
                unset($words[$i+1]);
                $words[$i] = 'Sweatshirt';
                $words = array_values($words);
            }
        }
    }