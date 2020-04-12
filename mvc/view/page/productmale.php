<?php
include("./mvc/view/page/header.php");
?>

<a id="button" style="text-decoration: none;"></a>
<br><br>

<div class="container">
    <div class="row">
        <div class="col-sm-4" style="margin-top: 10px;">
            <span class="icons-show-products">
                <span style="color:#555;font-size: 18px;font-weight: bold;">نحوه نمایش</span>
                <span style="font-size: 18px;">
                    <i id="display-az-list" class="fa fa-navicon icon-list"></i>
                </span>

                <span style="font-size: 18px;">
                    <i id="display-az-grid" class="fa fa-th icon-table"></i>
                </span>
                <input id="viewType" type="hidden" value="grid">
            </span>
        </div>

        <div class="col-sm-4">
            <span class="sort-products">
                <span style="font-size: 18px;font-weight: bold;color:#555;">مرتب سازی بر اساس</span>
                <label for="sortType"></label>
                <select class="sort-products theme-construction" id="sortType">
                    <option value="price " style="font-size: 16px;">انتخاب کنید...</option>
                    <option value="price ASC" style="font-size: 16px;">ارزان ترین</option>
                    <option value="price DESC" style="font-size: 16px;">گران ترین</option>
                    <option value="creditionTime DESC" style="font-size: 16px;">جدیدترین</option>
                    <option value="creditionTime ASC" style="font-size: 16px;">قدیمی ترین</option>
                    <option value="discount DESC" style="font-size: 16px;">فروش ویژه</option>
                </select>
            </span>
        </div>

        <div class="col-sm-4" style="margin-top: -60px;">
            <span class="search-product">
                <span style="font-size: 18px;font-weight: bold;color:#555;">جستجو</span>
                <label for="search"></label>
                    <input type="search" value="" id="keyword" class="search-products"
                           placeholder="نام محصول یا برند مورد نظرتان را جستجو کنید">
            </span>
        </div>
    </div>
</div>

<script>
    //List
    $("#display-az-list").on('click', function () {
        $('#viewType').val('list');
        reloadData();
    });

    //Grid
    $("#display-az-grid").on('click', function () {
        $('#viewType').val('grid');
        reloadData();
    });

    //Select Tag
    $("#sortType").on('change', function () {
        reloadData();
    });

    //Search Box
    $("#keyword").on('keyup', function () {
        reloadData();
    });


    function reloadData() {
        //Select Tag
        var sortType = $("#sortType").val();

        //Search Box
        var keyword = $("#keyword").val();

        //viewType
        var viewType = $("#viewType").val();

        $.ajax({
            url: "/MainProject/productsman/search",
            method: 'POST',
            data: {
                //Show Producs Type
                viewType: viewType,

                //Select Tag
                sortType: sortType,

                //Search Box
                keyword: keyword
            }
        }).done(function (output) {
            $("#productsman").empty();
            $("#productsman").append(output);
        });
    }

    function addProduct(perfumeId) {
        $.ajax({
            url: "/MainProject/productsman/addToCart/" + perfumeId,
            method: 'POST',
            dataType: "json"
        }).done(function (output) {
            $("#cart-items").text(output.cartItemsCount);
            $("#cartPreviewHolder").html(output.cartPreview);
        });
    }

    function removeProduct(perfumeId) {
        $.ajax({
            url: "/MainProject/productsman/removeFromCart/" + perfumeId,
            method: 'POST',
            dataType: "json"
        }).done(function (output) {
            $("#cart-items").text(output.cartItemsCount);
            $("#cartPreviewHolder").html(output.cartPreview);
        });
    }


    function refreshCartPreview() {
        $.ajax({
            url: "/MainProject/productsman/refreshCartPreview",
            method: 'POST',
            dataType: "json"
        }).done(function (output) {
            $("#cart-items").text(output.cartItemsCount);
            $("#cartPreviewHolder").html(output.cartPreview);
        });
    }

    $(function () {
        $("#viewType").val("<?=$_SESSION['viewType']?>");
        reloadData();
        refreshCartPreview();
    });
</script>


<script>
    var btn = $('#button');
    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '300');
    });
</script>

<!-- Products Content -->
<div id="productsman">

</div>

