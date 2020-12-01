<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['approve'])){
            $shopId = $_POST['shopId'];
            $sql = "UPDATE `shopinfo` SET `shop_status` = '1' WHERE `shopinfo`.`shopId` = $shopId;";
            mysqli_query($con,$sql);
        }
        if(isset($_POST['disapprove'])){
            $shopId = $_POST['shopId'];
            $sql = "DELETE FROM `shopinfo` WHERE `shopinfo`.`shopId` = $shopId;";
            mysqli_query($con,$sql);
        }
        if(isset($_POST['dir'])){
            $address = $_POST['dir'];
            $address = str_replace(" ","+",$address);
            $address = str_replace(",","%2C",$address);
            $location = "https://www.google.com/maps/dir/?api=1&destination=".$address;
            head($location);
        }
    }
?>

<div class="container">
        <table class="table table-striped">
            <thead>
                <th>Shop's Approval<hr></th>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from shopinfo where shop_status = 0";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <form action="" method="post">
                        <td>
                            
                            <div class="row p-1">
                                <div class="col-12 my-1 text-center">
                                    <img src="<?php echo $row["shopImg"];?>" alt="" style="width: 10rem;" class="img-fluid">
                                </div>
                                <!-- <div class="col-12"><span>Shop's Address</span></div> -->
                                <div class="col-12 mt-4">
                                    <span>
                                        <span style="font-weight: bold;">Shop Owner's Name :</span> <?php echo $row["shopOwnerName"];?>
                                    </span>
                                    <address> <span style="font-weight: bold;">Address : </span> <?php echo $row["shopAddress"];?> </address>
                                    <span style="font-weight: bold;">Contact :</span> <?php echo $row["shopContact1"];?> &nbsp; <?php echo $row["shopContact2"];?>
                                </div>
                                    <input type="hidden" name="shopId" value="<?php echo $row['shopId'];?>">
                                    <button class="btn btn-primary btn-block m-2 p-2" name="dir" value="<?php echo $row['shopAddress']?>">Get Direction</button>
                                    <button class="btn btn-success btn-block mx-2 my-1 p-2" name="approve">Approve</button>
                                    <button class="btn btn-danger btn-block mx-2 my-1 p-2" name="disapprove">Disapprove</button>
                                    
                                </div>
                            </td>
                        </form>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>