<?php require_once 'database/DBController.php'; ?>

<?php
        $sql = "SELECT * from bottomspecification";
        $result = mysqli_query($con,$sql);
        $arr = '';
        while($row = mysqli_fetch_assoc($result)){
            $arr = $row;
        }
    if(isset($_POST['show'])){
        // $arr = unserialize($arr);
        print_r($arr);
    }

    $word = "himansHuRajKashyap";
    $count = '';
    for($i=0;$i<strlen($word);$i++){
        if(preg_match('~^\p{Lu}~u', $word[$i])){
            echo "<br>".$i."<br>";
            $count = $i;
        }
        echo "<br>".$word[$i];
    }
    // $word = preg_split('^\p{Lu}^', $word);
    $word = str_split($word,$count);
    $h = ucwords($word[0])." ".ucwords($word[1]);
    echo $h;
    print_r($word);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<style>
    .card1{
        border: 1px solid green;
    }
</style>
<body>

    <form action="" method="post">
        <button name="show">Show</button>
    </form>
    <input type="text" name="text" id="text" value="">

    <select name="selectUserId" id="selectUserId">
        <?php
            $sql = "SELECT user_id from user";
            $result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['user_id'];?>"><?php echo $row['user_id'];?></option>
                <?php
            }
        ?>
    </select>

    <select name="prodGender" id="proGender" class="form-control">
        <option value="1">Male</option>
        <option value="2">Female</option>
    </select>

    <select name="prodCategory" id="prodCategory" class="form-control">
        <option value="" disabled selected>Select Category</option>
        <?php
        $sql = "SELECT * FROM category;";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_assoc($result)){
            ?>

            <option value="<?php echo $row['cat_id']?>"><?php echo $row['cat_name']?></option>

            <?php
        }
        ?>
    </select>

    <select id="content">
            <option value="" selected disabled>Select <Datag></Datag></option>
    </select>
    <option value="" id="hmm">
    </option>

    <div class="dropShit container" id="content1">

    </div>
    <script>
        $(document).ready(function(){
            // alert("This is some shit");
        });
        $('#proGender').change(function(){
            func();
        });
        $('#selectUserId').change(function(){
            func();
        });
        $('.dropShit').click(function(){

            // alert($(this).val());
        });
        $('#text').keyup(function(){
            let name = $(this).val();
            let getName = 'fetch_data';
            let shit = "";
            if(name != ''){
                $.ajax({
                    url: "action.php",
                    method: "post",
                    data: {getName:getName, name:name},
                    success: function(data){
                        data = JSON.parse(data);
                        let html = '<ul class="list-unstyled">';
                        for(i = 0; i<data.length; i++){
                            if(data[i].includes(name)){
                                html += "<li class='dropShit'  style='cursor: pointer; border: 1px solid green;' value = '"+data[i]+"'>"+data[i]+"</li>";
                            }
                        }
                        html += '</ul>';

                        // shit = "hmm";
                        $("#content1").fadeIn();
                        $("#content1").html(html);
                    }
                });
            }
            else{
                // let fruits = ["Himanshu","Tja","kashyap"];
                // let a = "s";
                // let html = "";
                // alert(fruits);
                // for(i=0; i<fruits.length; i++){
                //     if(fruits[i].includes(a)){
                //         html += fruits[i]+"<br>";
                //     }
                // }
                // // alert(a);
                $("#content1").fadeOut();
                $("#content1").html("");
            }
        });
        $(document).on('click','li',function(){
            $('#text').val($(this).text());
            $("#content1").fadeOut();
        });
        function func(){
            alert("This method was called");
            let proGender = 1;
            // let prodCategory = $('#prodCategory').val();
            let trial = 'fetch_data';
            $.ajax({
                url: "action.php",
                type: "post",
                data: {trial:trial,proGender:proGender},
                success: function(data,status){
                    data = JSON.parse(data);
                    alert(data);
                    $("#content1").html(data);
                }
            });
        }
    </script>
</body>
</html>