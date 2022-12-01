$(document).ready(function(){
    load_data();

    function load_data(page){
        $.ajax({
            url: "functions/blog.pag.php",
            method: "POST",
            data:{page:page},
            success:function(data){
                $('#pagination_data').html(data);
            }
        })
    }

    $(document).on("click", ".page-item", function(){
        let page = $(this).attr("id");
        load_data(page);
    })

    // For Political
    load_pol_data();

    function load_pol_data(page){
        $.ajax({
            url: "functions/political.pag.php",
            method: "POST",
            data: {page:page},
            success:function(data){
                $('#political_data').html(data);
            }
        })
    }

    $(document).on("click", ".page-item", function(){
        let page = $(this).attr("id");
        load_pol_data(page);
    })

    // For Entertainment
    load_entertain_data();

    function load_entertain_data(page){
        $.ajax({
            url: "functions/entertainment.pag.php",
            method: "POST",
            data: {page:page},
            success:function(data){
                $('#entertainment_data').html(data);
            }
        })
    }

    $(document).on("click", ".page-item", function(){
        let page = $(this).attr("id");
        load_entertain_data(page);
    })

    // For Sport
    load_sport_data();

    function load_sport_data(page){
        $.ajax({
            url: "functions/sport.pag.php",
            method: "POST",
            data: {page:page},
            success:function(data){
                $('#sport_data').html(data);
            }
        })
    }

    $(document).on("click", ".page-item", function(){
        let page = $(this).attr("id");
        load_sport_data(page);
    })

    // For Businesss
    load_business_data();

    function load_business_data(page){
        $.ajax({
            url: "functions/business.pag.php",
            method: "POST",
            data: {page:page},
            success:function(data){
                $('#business_data').html(data);
            }
        })
    }

    $(document).on("click", ".page-item", function(){
        let page = $(this).attr("id");
        load_business_data(page);
    })

     // For Businesss
     load_tech_data();

    function load_tech_data(page){
        $.ajax({
            url: "functions/tech.pag.php",
            method: "POST",
            data: {page:page},
            success:function(data){
                $('#tech_data').html(data);
            }
        })
    }

    $(document).on("click", ".page-item", function(){
        let page = $(this).attr("id");
        load_tech_data(page);
    })

    // For Businesss
    load_food_data();

    function load_food_data(page){
        $.ajax({
            url: "functions/food.pag.php",
            method: "POST",
            data: {page:page},
            success:function(data){
                $('#food_data').html(data);
            }
        })
    }

    $(document).on("click", ".page-item", function(){
        let page = $(this).attr("id");
        load_food_data(page);
    })

    // For Businesss
    load_lifestyle_data();

    function load_lifestyle_data(page){
        $.ajax({
            url: "functions/lifestyle.pag.php",
            method: "POST",
            data: {page:page},
            success:function(data){
                $('#lifestyle_data').html(data);
            }
        })
    }

    $(document).on("click", ".page-item", function(){
        let page = $(this).attr("id");
        load_lifestyle_data(page);
    })

    // For Subscribers
    $('#subscribe').click(function(){
        $(this).attr('disabled', 'disabled');

        let userEmail = $('#userEmail').val();

        $.ajax({
            url: "functions/subscribe.php",
            method: "POST",
            data: {
                send: 1,
                email: userEmail
            },
            success:function(data){
                if(data == 'success'){

                }else if(data == 'emailExist'){

                }else if(data == 'failed'){

                }
            }

        })
    })

    // Main Search
    $("#main_search").keyup(function () {

        var input = $(this).val();
        // alert(input);
        if(input != ""){
            $.ajax({
                url:"functions/search.php",
                method: "POST",
                data:{input:input},
                success:function(data){
                    $('#pagination_data').html(data);
                }
            });
        }else{
            alert("Search For A Blog!!!");
            window.location.reload();
        }
    });

    // Comments
    $("#Comment").submit(function(){
        alert("Hello")
    })
});




 // Aside Scrolling
//  $(function() {
//     var offset = $("#sidebar").offset();
//     var topPadding = 15;
//     $(window).scroll(function() {
//         if ($(window).scrollTop() > offset.top) {
//             $("#sidebar").stop().animate({
//                 marginTop: $(window).scrollTop() - offset.top + topPadding
//             });
//         } else {
//             $("#sidebar").stop().animate({
//                 marginTop: 0
//             });
//         };
//     });
// });

