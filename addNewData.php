<div class="row">
    <span style="font-size:0.9rem;font-weight:600; border:none!important" class="form-control">CONTACT DETAILS</span>
    <div class="col-12">
        <label for="name" style="font-size:small">Name</label>
        <input type="text" name="addNewName" id="addNewName" class="form-control shadow-none" placeholder="">
        <p style="color: red; font-size:small;" id="addNewNameError"></p>
    </div>
    <div class="col-12">
        <label for="name" style="font-size:small">Mobile No.</label>
        <input type="text" name="addNewMobile" id="addNewMobile" class="form-control shadow-none" placeholder="">
        <p style="color: red; font-size:small;" id="addNewMobileError"></p>
    </div>
    <span style="font-size:0.9rem;font-weight:600; border:none!important" class="form-control">ADDRESS</span>
    <div class="col-12">
        <label for="name" style="font-size:small">Pincode</label>
        <input type="text" name="addNewPin" id="addNewPin" class="form-control shadow-none" placeholder="">
        <p style="color: red; font-size:small;" id="addNewPinError"></p>
    </div>
    <div class="col-12">
        <label for="name" style="font-size:small">Address</label>
        <input type="text" name="addNewAdderss" id="addNewAdderss" class="form-control shadow-none" placeholder="">
        <p style="color: red; font-size:small;" id="addNewAdderssError"></p>
    </div>
    <div class="col-12">
        <label for="name" style="font-size:small">City</label>
        <input type="text" name="addNewCity" id="addNewCity" class="form-control shadow-none" placeholder="">
        <p style="color: red; font-size:small;" id="addNewCityError"></p>
    </div>
    <?php 
    // print_r($addArr);
    if(!is_array($addArr) || empty($addArr)){
        ?>
        <div class="col-12">
            <button type="button" id="addAddress" name="addAddress" class="btn btn-lg btn-block shadow-none" style="font-weight: 500; font-size:0.9rem; color: white; background-color: tomato;">ADD ADDRESS</button>
        </div>
        <?php
    }
    ?>
</div>