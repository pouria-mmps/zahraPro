<?php
include("./mvc/view/page/managerHeader.php");
?>

    <a id="button"></a>


<?php foreach ($addresses as $address) { ?>
    <div class="box-update-address">
        <form class="frm-address-crud" action="<?= baseUrl() ?>productsman/updateAddressChecking" method="post">

            <label hidden>
                <input type="hidden" name="addressId" value="<?= $address['addressId'] ?>">
            </label>
            <br><br><br>

            <label class="frm-uaddress-txt"> نام تحویل گیرنده </label>
            <input type="text" class="frm-tran-name" name="tranName" value="<?= $address['tranName'] ?>"
                   style="text-align: center;margin-bottom: 60px;">
            <br>

            <label class="frm-uaddress-txt"> نام خانوادگی تحویل گیرنده </label>
            <input type="text" class="frm-tran-lname" name="tranLName" value="<?= $address['tranLName'] ?>"
                   style="text-align: center;margin-bottom: 60px;">
            <br>

            <label class="frm-uaddress-txt"> شماره تلفن </label>
            <input type="text" class="frm-tran-tell" name="tranTell" value="<?= $address['tranTell'] ?>"
                   style="text-align: center;margin-bottom: 60px;">
            <br>

            <label class="frm-uaddress-txt"> شماره تلفن همراه </label>
            <input type="text" class="frm-tran-phone" name="tranPhone" value="<?= $address['tranPhone'] ?>"
                   style="text-align: center;margin-bottom: 60px;">
            <br>

            <label class="frm-uaddress-txt" style="margin-bottom: -90px;"> آدرس </label>
            <textarea class="frm-tran-address" name="tranAddress"
                      style="margin-top:10px;"><?= $address['tranAddress'] ?></textarea>
            <br><br><br>

            <label class="frm-uaddress-txt"> کدپستی </label>
            <input type="text" class="frm-tran-pcode" name="tranPCode" value="<?= $address['tranPCode'] ?>"
                   style="text-align: center;margin-bottom: 60px;">
            <br><br>

            <!-- BTN POST Data -->
            <button value="register" id="btn-submit-uaddress" style="margin-right: 170px;"><i
                        class="fa fa-pencil-square-o"
                        style="margin-left: 10px;"></i>ویرایش
            </button>

            <!-- BTN Cancel -->
            <button formaction="<?= baseUrl() ?>productsman/getaddress" id="btn-cancel-uaddress" type="submit"
                    value="cancel" style="margin-right: 50px;">
                <i class="fa fa-close" style="margin-left: 5px;"></i>
                انصراف
            </button>
            <br><br><br>
        </form>
    </div>
<?php } ?>