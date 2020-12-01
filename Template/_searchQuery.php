<?php
 
    $whereinq = 0;
    $brand = $gender = $subcat =  $colour = null;

    $query = "SELECT * from product";
    $words = preg_split('/\s|\.|, /',$q);

    include_once '_synonyms.php';

    $spectable = 0;
    // Gender search from search input starts
    if(count($words)>0){
        // $genders = ['male','female'];
        // foreach($genders as $gend){
            for($i =0; $i<count($words); $i++){
                if(strtolower($words[$i]) == 'male'){
                    $gender = 1;
                    unset($words[$i]);
                    $words = array_values($words);
                    
                    if($whereinq == 0){
                        $query = $query." where item_gender = '1'";
                        $whereinq = 1;
                    }
                    else{
                        $query = $query." and item_gender = '1'";
                    }
                }
                else if(strtolower($words[$i]) == 'female'){
                    $gender = 2;
                    unset($words[$i]);
                    $words = array_values($words);
                    
                    if($whereinq == 0){
                        $query = $query." where item_gender = '2'";
                        $whereinq = 1;
                    }
                    else{
                        $query = $query." and item_gender = '2'";
                    }
                }
            }
        // }
    }
    // Gender search from search input ends

    // Brand search from search input starts
    if(count($words)>0){
        $sqlBrand = 'SELECT DISTINCT item_brand from product';
        $resultBrand = mysqli_query($con,$sqlBrand);
        while($row = mysqli_fetch_assoc($resultBrand)){
            for($i =0; $i<count($words); $i++){
                if(strtolower($words[$i]) == strtolower($row['item_brand']) || strtolower($words[$i]) == strtolower($row['item_brand']."s")){
                    $brand = $row['item_brand'];
                    unset($words[$i]);
                    $words = array_values($words);
                    
                    if($whereinq == 0){
                        $query = $query." where item_brand = '$brand'";
                        $whereinq = 1;
                    }
                    else{
                        $query = $query." and item_brand = '$brand'";
                    }
                }
            }
        }
    }
    // Brand search from search input ends

    // Sub-category search from search input starts
    if(count($words)>0){
        $sqlSubcategory = 'SELECT * from subcategory';
        $resultSubcategory = mysqli_query($con,$sqlSubcategory);
        while($row = mysqli_fetch_assoc($resultSubcategory)){
            for($i =0; $i<count($words); $i++){
                if(strtolower($words[$i]) == strtolower($row['subcat_name']) || strtolower($words[$i]) == strtolower($row['subcat_name'])."s"){
                    $subcat = $row['subcat_id'];
                    $spectable = $row['subcat_type'];
                    unset($words[$i]);
                    $words = array_values($words);
                    
                    if($whereinq == 0){
                        $query = $query." where item_subcat = '$subcat'";
                        $whereinq = 1;
                    }
                    else{
                        $query = $query." and item_subcat = '$subcat'";
                    }
                }
            }
        }
    }
    // Sub-category search from search input ends

    // Colour search from search input starts
    if(count($words)>0){
        $sqlColour = 'SELECT * from color';
        $resultColour = mysqli_query($con,$sqlColour);
        while($row = mysqli_fetch_assoc($resultColour)){
            for($i =0; $i<count($words); $i++){
                if(strtolower($words[$i]) == strtolower($row['colName'])){
                    $colour = $row['colId'];
                    unset($words[$i]);
                    $words = array_values($words);
                    
                    if($whereinq == 0){
                        $query = $query." where item_col = '$colour'";
                        $whereinq = 1;
                    }
                    else{
                        $query = $query." and item_col = '$colour'";
                    }
                }
            }
        }
    }
    // Colour search from search input ends

    // Specification search from search input starts
    if(count($words)>0){
        if($spectable==1 || $spectable==2){
            $whereinq2 = 0;
            $innerquery = "";
            $sqlSpec = $table = '';
            if($spectable == 1){
                $sqlSpec = 'SELECT COLUMN_NAME
                FROM INFORMATION_SCHEMA.COLUMNS
                WHERE TABLE_NAME = "specdropu";'; 
                $table = 'specdropu';
    
                $innerquery = "SELECT item_id from $table";
    
            }
            else if($spectable == 2){
                $sqlSpec = 'SELECT COLUMN_NAME
                FROM INFORMATION_SCHEMA.COLUMNS
                WHERE TABLE_NAME = "specdropb";'; 
                $table = 'specdropb';
    
                $innerquery = "SELECT item_id from $table";
    
            }
    
            $resultSpec = mysqli_query($con,$sqlSpec);
            while($row = mysqli_fetch_assoc($resultSpec)){
                $column = $row['COLUMN_NAME'];
                $sqlColumn = "SELECT distinct $column from $table";
                $resulColumn = mysqli_query($con,$sqlColumn);
                while($rowColumn = mysqli_fetch_assoc($resulColumn)){
                    for($i =0; $i<count($words); $i++){
                        if(strtolower($words[$i]) == strtolower($rowColumn[$column])){
                            $val = $rowColumn[$column];
                            unset($words[$i]);
                            $words = array_values($words);
                            
                            if($whereinq2 == 0){
                                $innerquery = $innerquery." where $column = '$rowColumn[$column]'";
                                $whereinq2 = 1;
                            }
                            else{
                                $innerquery = $innerquery." and $column = '$rowColumn[$column]'";
                            }
                        }
                    }
                }
            }
    
            if($whereinq2){
                if($whereinq==0){
                    $query = $query." where item_id in ($innerquery)";
                    $whereinq =1;
                }
                else{
                    $query = $query." and item_id in ($innerquery)";
                }
            }
        }
        else{
            if(count($words)>0){
                for($i=0;$i<count($words);$i++){
                    if($whereinq==0){
                        $query = $query." where item_id in (select item_id from specdropb where
        
                        distress = '$words[$i]'
                        or waistRise = '$words[$i]'
                        or fade = '$words[$i]'
                        or shade = '$words[$i]'
                        or fit = '$words[$i]'
                        or length = '$words[$i]'
                        or waistband = '$words[$i]'
                        or stretch = '$words[$i]'
                        or closure = '$words[$i]'
                        or reversible ='$words[$i]'
                        or effects = '$words[$i]'
                        or pockets = '$words[$i]'
                        or occasion = '$words[$i]'
                        or features = '$words[$i]'
                        or flyType = '$words[$i]'
                        or mainTrend = '$words[$i]'
                        or weaveType = '$words[$i]'
                        or pleat = '$words[$i]'
                        or type = '$words[$i]'
                        or pattern = '$words[$i]'
                        or patternType = '$words[$i]'
                        or fabric = '$words[$i]'
                        )
                        or item_id in (select item_id from specdropu where 
        
                        sleeveLength = '$words[$i]'
                        or collar = '$words[$i]'
                        or fit = '$words[$i]'
                        or patternType = '$words[$i]'
                        or occasion = '$words[$i]'
                        or length = '$words[$i]'
                        or hemline = '$words[$i]'
                        or placket = '$words[$i]'
                        or fabric = '$words[$i]'
                        or weavetype = '$words[$i]'
                        or sleeveStyling = '$words[$i]'
                        or pattern = '$words[$i]'
                        or neck = '$words[$i]'
                        or surfaceStyling = '$words[$i]'
                        or frontStyling = '$words[$i]'
                        or pockets = '$words[$i]'
                        or hood = '$words[$i]'
                        or closure = '$words[$i]'
                        or patternCoverage = '$words[$i]'
                        or type = '$words[$i]'
                        )";
                        $whereinq =1;
                    }
                    else{
                        $query = $query." and item_id in (select item_id from specdropb where
                       
                        distress = '$words[$i]'
                        or waistRise = '$words[$i]'
                        or fade = '$words[$i]'
                        or shade = '$words[$i]'
                        or fit = '$words[$i]'
                        or length = '$words[$i]'
                        or waistband = '$words[$i]'
                        or stretch = '$words[$i]'
                        or closure = '$words[$i]'
                        or reversible = '$words[$i]'
                        or effects = '$words[$i]'
                        or pockets = '$words[$i]'
                        or occasion = '$words[$i]'
                        or features = '$words[$i]'
                        or flyType = '$words[$i]'
                        or mainTrend = '$words[$i]'
                        or weaveType = '$words[$i]'
                        or pleat = '$words[$i]'
                        or type = '$words[$i]'
                        or pattern = '$words[$i]'
                        or patternType = '$words[$i]'
                        or fabric = '$words[$i]'
                        )
                        or item_id in (select item_id from specdropu where 
        
                        sleeveLength = '$words[$i]'
                        or collar = '$words[$i]'
                        or fit = '$words[$i]'
                        or patternType = '$words[$i]'
                        or occasion = '$words[$i]'
                        or length = '$words[$i]'
                        or hemline = '$words[$i]'
                        or placket = '$words[$i]'
                        or fabric = '$words[$i]'
                        or weavetype = '$words[$i]'
                        or sleeveStyling = '$words[$i]'
                        or pattern = '$words[$i]'
                        or neck = '$words[$i]'
                        or surfaceStyling = '$words[$i]'
                        or frontStyling = '$words[$i]'
                        or pockets = '$words[$i]'
                        or hood = '$words[$i]'
                        or closure = '$words[$i]'
                        or patternCoverage = '$words[$i]'
                        or type = '$words[$i]'
                        )";
                    }
                }
            }
        }
    }
    // Specification search from search input ends


// echo " This is on _searchQuery on line 278 <br>".$query;

?>