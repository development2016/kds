$(function(){


    $('.acl').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });

    if($('#peopleUpdate').hasClass('people/update')){
       $('li#people').addClass('active');
    }

    if($('#peopleView').hasClass('people/view')){
       $('li#people').addClass('active');
    }

    $("#radio54").click(function(){
        $("#hideshow").hide(500);

    });
    $("#radio53").click(function(){
        $("#hideshow").show(500);

    });

    //kemaskini : wife
    $('#wifeCreate').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });
    $('.wifeUpdate').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });


    //kemaskini : tanggungan
    $('#tanggunganCreate').click(function(){

        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'),function(){
            $(".date-picker").datepicker();
        });
   

    });
    $('.tanggunganUpdate').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'),function(){
             $(".date-picker").datepicker();
        });

    });

    //kemaskini : answer
    $('.answerUpdate').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });

//kemaskini : tanggunganoku 
    $('#tanggunganokuCreate').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });
    $('.tanggunganokuUpdate').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });


    $("#radio2").click(function(){
        $("#hideshow").hide(500);

    });
    $("#radio1").click(function(){
        $("#hideshow").show(500);

    });


//create :  wife
    $("#addmoresukan").click(function(){
        var clone = $("#sukan").clone();
        clone.find("input[type=text]").val("");
        clone.appendTo(".adddivsukan");
        $('div#del').not(':first').show();
    });

    $(".adddivsukan").on("click", "#remove", function(e) {
        e.preventDefault(); 
       $(this).closest("#sukan").remove();  
    });
    
    $('.demographicUpdate').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });
    
    $('.perbandingan').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });

    // daerah
    $('#state_district').change(function(){
        if ($(this).val() == 21) {
            $(".bahagian_district").show(500);
        } else {
            $(".bahagian_district").hide(500);
        };
    });

    //mukim
    $('#state_mukim').change(function(){
        if ($(this).val() == 21) {
            $(".bahagian_mukim").show(500);
            $(".daerah_mukim").hide(500);
            //$(".mukim_subbase").hide(500);
            $("select#district").prop('disabled', true);
            $("select#district_bahagian").prop('disabled', false); 
        } else {
            $(".daerah_mukim").show(500);
            //$(".mukim_subbase").show(500);
            $(".bahagian_mukim").hide(500);
            $("select#district").prop('disabled', false);
            $("select#district_bahagian").prop('disabled', true); 
        };
    });





});