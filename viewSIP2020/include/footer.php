        <footer class="footer">
            <div class="container padding-10px-top">
                <div class="row text-center">
                    <div class="col-12 py-2">      
                        <!-- <img class="center" src/="<?=base_url('assets/images/header-footer/Share-yuk.png');?> " style="max-width: 160px"/> -->
                        <h4><span class="stay-touch">Stay in Touch!</span></h4>
                    </div>
                    <div class="col-12">                        
                        <ul class="socials">
                            <li><a target="_blank" href="https://www.instagram.com/sahabatibupintar/"><i class="fa fa-instagram"></i></a></li>
                            <li><a target="_blank" href="https://www.facebook.com/Sahabat-Ibu-Pintar-321950228571076/"><i class="fa fa-facebook-f" aria-hidden="true"></i></a></li>
                            <!-- <li><a target="_blank" href="https://www.instagram.com/sahabatibupintar/"><i class="fa fa-whatsapp"></i></a></li> -->
                        </ul>
                    </div>
                    <div class="col-12 mtm20">
                        <img class="center img-fluid" src="<?=base_url('assets/images/header-footer/logoSIP.png');?> " style="max-height: 100px;"/>
                    </div>
                </div>
            </div>
            
            <div class="footer__copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center margin-20px-bottom">
                            <span class="ft-sk ">Kebijakan | Syarat & Ketentuan | Copyright 2020 Sahabat Ibu Pintar. All rights reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
        <!-- end scroll to top -->
        <!-- javascript libraries -->
        
        <script type="text/javascript" src="<?=base_url('assets/js/popper.min.js');?> "></script>
        <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js');?> "></script>
        <!-- setting -->
        <script type="text/javascript" src="<?=base_url('assets/js/main.js');?> "></script>
        <!-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>         -->
        <script type="text/javascript" src="<?=base_url('assets/js/jquery-migrate-1.2.1.min.js');?>"></script>        
        <script type="text/javascript" src="<?=base_url('assets/plugins/slick/slick.js');?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/js/select2.min.js');?>"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->

        <script type="text/javascript">
            $(document).ready(function(){

                $('#category').on('change', function() {
                    let category = $(this).val();
                    if (category == "1") {
                        $('#all').hide();
                        $('#modern_parenting').show();
                        $('#bayi').hide();
                        $('#balita').hide();
                        $('#kehamilan').hide();
                        $('#snm').hide();
                    } else if (category == "2") {
                        $('#all').hide();
                        $('#modern_parenting').hide();
                        $('#bayi').show();
                        $('#balita').hide();
                        $('#kehamilan').hide();
                        $('#snm').hide();
                    } else if (category == "3") {
                        $('#all').hide();
                        $('#modern_parenting').hide();
                        $('#bayi').hide();
                        $('#balita').show();
                        $('#kehamilan').hide();
                        $('#snm').hide();
                    } else if (category == "4") {
                        $('#all').hide();
                        $('#modern_parenting').hide();
                        $('#bayi').hide();
                        $('#balita').hide();
                        $('#kehamilan').show();
                        $('#snm').hide();
                    } else if (category == "5") {
                        $('#all').hide();
                        $('#modern_parenting').hide();
                        $('#bayi').hide();
                        $('#balita').hide();
                        $('#kehamilan').hide();
                        $('#snm').show();
                    } else {
                        $('#all').show();
                        $('#modern_parenting').hide();
                        $('#bayi').hide();
                        $('#balita').hide();
                        $('#kehamilan').hide();
                        $('#snm').hide();
                    }
                });

                $('#category_promo').on('change', function() {
                    let category_promo = $(this).val();
                    if (category_promo == "6") {
                        $('#promo_all').hide();
                        $('#ibuanak').show();
                        $('#sehatcantik').hide();
                        $('#homeliving').hide();
                        $('#elektronik').hide();
                        $('#mainan').hide();
                        $('#bliblimart').hide();
                    } else if (category_promo == "7") {
                        $('#promo_all').hide();
                        $('#ibuanak').hide();
                        $('#sehatcantik').show();
                        $('#homeliving').hide();
                        $('#elektronik').hide();
                        $('#mainan').hide();
                        $('#bliblimart').hide();
                    } else if (category_promo == "8") {
                        $('#promo_all').hide();
                        $('#ibuanak').hide();
                        $('#sehatcantik').hide();
                        $('#homeliving').show();
                        $('#elektronik').hide();
                        $('#mainan').hide();
                        $('#bliblimart').hide();
                    } else if (category_promo == "9") {
                        $('#promo_all').hide();
                        $('#ibuanak').hide();
                        $('#sehatcantik').hide();
                        $('#homeliving').hide();
                        $('#elektronik').show();
                        $('#mainan').hide();
                        $('#bliblimart').hide();
                    } else if (category_promo == "10") {
                        $('#promo_all').hide();
                        $('#ibuanak').hide();
                        $('#sehatcantik').hide();
                        $('#homeliving').hide();
                        $('#elektronik').hide();
                        $('#mainan').show();
                        $('#bliblimart').hide();
                    } else if (category_promo == "11") {
                        $('#promo_all').hide();
                        $('#ibuanak').hide();
                        $('#sehatcantik').hide();
                        $('#homeliving').hide();
                        $('#elektronik').hide();
                        $('#mainan').hide();
                        $('#bliblimart').show();
                    } else {
                        $('#promo_all').show();
                        $('#ibuanak').hide();
                        $('#sehatcantik').hide();
                        $('#homeliving').hide();
                        $('#elektronik').hide();
                        $('#mainan').hide();
                        $('#bliblimart').hide();
                    }
                });
                
                $(".cool-link").click(function () {
                    $(".cool-link").removeClass("active");
                    // $(".tab").addClass("active"); // instead of this do the below 
                    $(this).addClass("active");   
                });
                $('.items').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    arrows: true,
                    autoplaySpeed: 3000,
                    infinite: true,
                    touchMove: false,
                    responsive: [
                        {
                            breakpoint: 767,
                            settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            }
                        }
                    ]
                    // centerMode: true,
                    // centerPadding: '60px'
                    
                });
                $('.rekomended-produk').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    prevArrow: false,
                    nextArrow: false,
                    autoplaySpeed: 3000,
                    infinite: true,
                    touchMove: false,
                    dots: true,
                    cssEase: 'linear',
                    responsive: [
                        {
                            breakpoint: 767,
                            settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            }
                        }
                    ]
                    // centerMode: true,
                    // centerPadding: '60px'
                    
                });
                $('.banner').slick({
                    dots: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 1,
                    centerMode: true,
                    centerPadding: '700px',
                    responsive: [
                        {
                            breakpoint: 767,
                            settings: {
                            centerMode: true,
                            centerPadding: '55px',
                            slidesToShow: 1,
                            }
                        },
                        {
                            breakpoint: 2000,
                            settings: {
                            centerMode: true,
                            centerPadding: '200px',
                            slidesToShow: 1,
                            }
                        },
                        {
                            breakpoint: 800,
                            settings: {
                                centerMode: true,
                                centerPadding: '100px',
                                slidesToShow: 1
                            }
                        }                           
                    ]
                });

                let size_li = $("#myList div.moreArticles").length;
                let x = 6;
                // size_li = $("#myList div.moreArticles").length;
                // x=6;
                $('#myList div.moreArticles:lt('+x+')').show();
                $('#loadMore').click(function () {
                    x= (x+2 <= size_li) ? x+2 : size_li;
                    $('#myList div.moreArticles:lt('+x+')').show();
                });
                $('#showLess').click(function () {
                    x=(x-5<0) ? 2 : x-2;
                    $('#myList div.moreArticles').not(':lt('+x+')').hide();
                });

                let size_li2 = $("#myList2 div.moreArticles2").length;
                let xx = 6;
                $('#myList2 div.moreArticles2:lt('+xx+')').show();
                $('#loadMore2').click(function () {
                    xx= (xx+2 <= size_li2) ? xx+2 : size_li2;
                    $('#myList2 div.moreArticles2:lt('+xx+')').show();
                });
                $('#showLess').click(function () {
                    xx=(xx-5<0) ? 2 : xx-2;
                    $('#myList2 div.moreArticles2').not(':lt('+xx+')').hide();
                });

                var size_li3 = $("#myList3 div.moreArticles3").length;
                var xxx = 6;
                $('#myList3 div.moreArticles3:lt('+xxx+')').show();
                $('#loadMore3').click(function () {
                    xxx= (xxx+2 <= size_li3) ? xxx+2 : size_li3;
                    $('#myList3 div.moreArticles3:lt('+xxx+')').show();
                });
                $('#showLess').click(function () {
                    xxx=(xxx-5<0) ? 2 : xxx-2;
                    $('#myList3 div.moreArticles3').not(':lt('+xxx+')').hide();
                });

                var size_li4 = $("#myList4 div.moreArticles4").length;
                var xxxx = 6;
                $('#myList4 div.moreArticles4:lt('+xxxx+')').show();
                $('#loadMore4').click(function () {
                    xxxx= (xxxx+2 <= size_li4) ? xxxx+2 : size_li4;
                    $('#myList4 div.moreArticles4:lt('+xxxx+')').show();
                });
                $('#showLess').click(function () {
                    xxxx=(xxxx-5<0) ? 2 : xxxx-2;
                    $('#myList4 div.moreArticles4').not(':lt('+xxxx+')').hide();
                });

                var size_li5 = $("#myList5 div.moreArticles5").length;
                var xxxxx = 6;
                $('#myList5 div.moreArticles5:lt('+xxxxx+')').show();
                $('#loadMore').click(function () {
                    xxxxx= (xxxxx+2 <= size_li5) ? xxxxx+2 : size_li5;
                    $('#myList5 div.moreArticles5:lt('+xxxxx+')').show();
                });
                $('#showLess5').click(function () {
                    xxxxx=(xxxxx-5<0) ? 2 : xxxxx-2;
                    $('#myList5 div.moreArticles5').not(':lt('+xxxxx+')').hide();
                });

                var size_li6 = $("#myList6 div.moreArticles6").length;
                var xxxxxx = 6;
                $('#myList6 div.moreArticles6:lt('+xxxxxx+')').show();
                $('#loadMore').click(function () {
                    xxxxxx= (xxxxxx+2 <= size_li6) ? xxxxxx+2 : size_li6;
                    $('#myList6 div.moreArticles6:lt('+xxxxxx+')').show();
                });
                $('#showLess6').click(function () {
                    xxxxxx=(xxxxxx-5<0) ? 2 : xxxxxx-2;
                    $('#myList6 div.moreArticles6').not(':lt('+xxxxxx+')').hide();
                });

                let size_lip = $("#promo_all div.morepromo").length;
                let xp = 6;
                $('#promo_all div.morepromo:lt('+xp+')').show();
                $('#loadMoreP').click(function () {
                    xp= (xp+2 <= size_lip) ? xp+2 : size_lip;
                    $('#promo_all div.morepromo:lt('+xp+')').show();
                });
                $('#showLess').click(function () {
                    xp=(xp-5<0) ? 2 : xp-2;
                    $('#promo_all div.morepromo').not(':lt('+xp+')').hide();
                });

                let size_lip2 = $("#ibuanak div.morepromo2").length;
                let xp2 = 6;
                $('#ibuanak div.morepromo2:lt('+xp2+')').show();
                $('#loadMoreP2').click(function () {
                    xp2= (xp2+2 <= size_lip2) ? xp2+2 : size_lip2;
                    $('#ibuanak div.morepromo2:lt('+xp2+')').show();
                });
                $('#showLess').click(function () {
                    xp2=(xp2-5<0) ? 2 : xp2-2;
                    $('#ibuanak div.morepromo2').not(':lt('+xp2+')').hide();
                });

                let size_lip3 = $("#sehatcantik div.morepromo3").length;
                let xp3 = 6;
                $('#sehatcantik div.morepromo3:lt('+xp3+')').show();
                $('#loadMoreP3').click(function () {
                    xp3= (xp3+2 <= size_lip3) ? xp3+2 : size_lip3;
                    $('#sehatcantik div.morepromo3:lt('+xp3+')').show();
                });
                $('#showLess').click(function () {
                    xp3=(xp3-5<0) ? 2 : xp3-2;
                    $('#sehatcantik div.morepromo3').not(':lt('+xp3+')').hide();
                });

                let size_lip4 = $("#homeliving div.morepromo4").length;
                let xp4 = 6;
                $('#homeliving div.morepromo4:lt('+xp4+')').show();
                $('#loadMoreP4').click(function () {
                    xp4= (xp4+2 <= size_lip4) ? xp4+2 : size_lip4;
                    $('#homeliving div.morepromo4:lt('+xp4+')').show();
                });
                $('#showLess').click(function () {
                    xp4=(xp4-5<0) ? 2 : xp4-2;
                    $('#homeliving div.morepromo4').not(':lt('+xp4+')').hide();
                });

                let size_lip5 = $("#elektronik div.morepromo5").length;
                let xp5 = 6;
                $('#elektronik div.morepromo5:lt('+xp5+')').show();
                $('#loadMoreP5').click(function () {
                    xp5= (xp5+2 <= size_lip5) ? xp5+2 : size_lip5;
                    $('#elektronik div.morepromo5:lt('+xp5+')').show();
                });
                $('#showLess').click(function () {
                    xp5=(xp5-5<0) ? 2 : xp5-2;
                    $('#elektronik div.morepromo5').not(':lt('+xp5+')').hide();
                });

                let size_lip6 = $("#mainan div.morepromo6").length;
                let xp6 = 6;
                $('#mainan div.morepromo6:lt('+xp6+')').show();
                $('#loadMoreP6').click(function () {
                    xp6= (xp6+2 <= size_lip6) ? xp6+2 : size_lip6;
                    $('#mainan div.morepromo6:lt('+xp6+')').show();
                });
                $('#showLess').click(function () {
                    xp6=(xp6-5<0) ? 2 : xp6-2;
                    $('#mainan div.morepromo6').not(':lt('+xp6+')').hide();
                });

                let size_lip7 = $("#bliblimart div.morepromo7").length;
                let xp7 = 6;
                $('#bliblimart div.morepromo7:lt('+xp7+')').show();
                $('#loadMoreP7').click(function () {
                    xp7= (xp7+2 <= size_lip7) ? xp7+2 : size_lip7;
                    $('#bliblimart div.morepromo7:lt('+xp7+')').show();
                });
                $('#showLess').click(function () {
                    xp7=(xp7-5<0) ? 2 : xp7-2;
                    $('#bliblimart div.morepromo7').not(':lt('+xp7+')').hide();
                });

                let listKip = $("#listKip div.moreKip").length;
                let xkip = 5;

                $('#listKip div.moreKip:lt('+xkip+')').show();
                
                $('#loadMorekip').click(function () {
                    xkip= (xkip+2 <= listKip) ? xkip+2 : listKip;
                    $('#listKip div.moreKip:lt('+xkip+')').show();
                });
                $('#showLess').click(function () {
                    xkip=(xkip-5<0) ? 2 : xkip-2;
                    $('#listKip div.moreKip').not(':lt('+xkip+')').hide();
                });

            });

            $("#provinsi").select2({
                placeholder: 'Pilih Provinsi',
                language: "id"
            });
            $("#kota").select2({
                placeholder: 'Pilih Kota',
                language: "id"
            });

            $('#provinsi').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('verifikasi2/get_cities/');?>"+id,
                    method : "GET",
                    //data : {csrf_test_name : csrf_token, id: id},
                    async : true,
                    dataType : 'json',
                    contentType: 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                        }
                        $('#kota').html(html);
 
                    }
                });
                return false;
            }); 

            // $('#category').on('change', function() {
            //     let id = $(this).val();
            //     $.ajax({
            //         url : "<?php echo base_url('inspirasi/category_id');?>",
            //         method : "POST",
            //         data : {id: id},
            //         async : true,
            //         dataType : 'json',
            //         success: function(data){
            //             console.log(data); 
            //         },
            //         error:function(result) {
            //             console.log(result);
            //         }
            //     });
            // });
           
            $(".gallery").slice(0, 1).show(); // select the first ten
                $("#loads").click(function(e) { // click event for load more
                e.preventDefault();
                $(".gallery:hidden").slice(0, 2).show(); // select next 10 hidden divs and show them
                if ($(".gallery:hidden").length == 0) { // check if any hidden divs still exist
                    alert("No more divs"); // alert if there are none left
                }
            });

            

            // $("#pills-home-tab").click(function() {
            //     $('.prev').show();
            //     $('.now').hide();
            //     $('.next').hide();
                
            // });
            // $("#pills-profile-tab").click(function() {
            //     $('.prev').hide();
            //     $('.now').show();
            //     $('.next').hide();                
            // });
            // $("#pills-contact-tab").click(function() {
            //     $('.prev').hide();
            //     $('.now').hide();
            //     $('.next').show();                
            // });

            
            
        </script>
    </body>
</html>