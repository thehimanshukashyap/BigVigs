<?php
include_once 'header.php';
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["submit"])){
        $file_name = $_FILES['uploadfile']['name'];
        $file_type = $_FILES['uploadfile']['type'];
        $file_size = $_FILES['uploadfile']['size'];
        $file_temp_loc = $_FILES['uploadfile']['tmp_name'];
        $file_store = "trialimage/".$file_name;
        // echo $file_store;
        move_uploaded_file($file_temp_loc,$file_store);
    }
}
$array  = ["Himahshu","raj"];
$barray[] = $array;
print_r($barray);
echo serialize($array);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        document.getElementById("btn1").click(function(){
            alert("Thlis");
        });
        
        function str(event){
            alert("hmm");
        }

        

    </script>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadfile" value=""/>
        <input type="submit" name="submit" value="Upload File">
    </form>
    <?php
        $word = "ThIs pAlF";
        $maps = ["This Palf","is","shit"];
        $i=0;
        if(strtolower($word) == strtolower($maps[$i+1])){
            echo "This is a match";
        }
        else{
            echo "This was not an match.";
        }
        // $hmmm = $_GET['item_id'];
        // echo $hmmm;
        // echo strtolower($maps[$i]);
        $arr = array("Himanshu","Raj","kashayp");
        $arr = serialize($arr);
        $sql = "UPDATE `product` SET `item_size` = '$arr' WHERE `product`.`item_id` = 9";
        $result = mysqli_query($con,$sql);
        if($result){
            echo "done";
        }
        else{
            echo "not done";
        } 
         $sql2 = "SELECT item_size from product where item_id = 9";
         $result = mysqli_query($con,$sql2);
         $arr2 = '';
         while($row = mysqli_fetch_assoc($result)){
            $arr2 = unserialize($row['item_size']);
         }

         print_r($arr2);
    ?>

         <div style="display: flex;  flex-basis: auto; overflow-x:scroll;">
         <?php for($i=0;$i<32;$i++){ ?>
             <div style="display: block;border: 2px solid black; flex-shrink: 0;" class="mx-2"><img src="Images/model.jpg" alt="" style="height:30vh; width:10vw; margin: 0 1rem;"></div>
        <?php }?>
         </div>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="uploadfile" id="uploadfile" value="" />
                <button style="border: 1px solid black; padding: 1rem;" id="btn1" >Hmmm</button>
            </form>

    <script>
        $("#btn1").click(function(event){
            alert("This was clicked");
            event.preventDefault();
            file = $("#uploadfile")[0].files;
            var fd = new FormData();
            fd.append('shopImgUpload',file[0]);
            fd.append('updateStoreData', 'fetch_dataa');
            fd.append('shopName', 'Bhagwati Store');
            fd.append('shopEmail', 'himanshu@gmail.com');
            fd.append('shopOwnerName', 'Himanshu Kashyap');
            fd.append('shopAddress', 'Hariom Nagar');
            fd.append('shopOpenTime', '');
            fd.append('shopCloseTime', '');
            fd.append('shopContact1', '9874563214');
            fd.append('shopContact2', '2636145698');
            fd.append('shopDesc', 'hmmmadf');
            fd.append('shopImg', 'hmmm');
            fd.append('closeDays', 'hmmm');
            alert(file[0]);
            $.ajax({
                url:"upload.php",
                type: "post",
                data:fd,
                contentType: false,
                processData: false,
                success: function(data){
                    alert(data);
                },
                error: function(data){
                    alert(data);
                }
            });
        });
    </script>            
</body>
</html>
