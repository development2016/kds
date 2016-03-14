$(function(){

    if ($('input#form_control_1').val() != "") {
         $('input#form_control_1').addClass('form-control edited');
    };

    $("#radio54").click(function(){
        $("#hideshow").hide(500);

    });
    $("#radio53").click(function(){
        $("#hideshow").show(500);

    });

    $("input[id^='ic_no']").keyup(function(e){
        if ($('#ic_no').val().length > 0) {
             $('#btn').removeAttr("disabled");
        } else {
            $('#btn').attr("disabled", "true");
        };
    });

    $("#password").keyup(function(e){
        if ($('#password').val().length > 0) {
             $('#btnreset').removeAttr("disabled");
        } else {
            $('#btnreset').attr("disabled", "true");
        };
    });

    $('#check').click(function(){
        if($(this).is(':checked')){
            $("#pass").show();  // checked
            $(".ya").show();
            $(".newpass").show();
            $("#btn").show();
            $("input[type=password]").val("");
            $("#form_control_1").removeClass('edited');

        }else {
            
            $("#pass").hide();  // checked
            $(".ya").hide();
            $(".newpass").hide();
            $("#btn").hide();
        }

    });




//kemaskini : answer
    $('.answerUpdate').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });


    if($('#volunteerView').hasClass('volunteer/view')){
       $('li#volunteer').addClass('active');
    }
    if($('#issueView').hasClass('issue-conduit/view')){
       $('li#issue').addClass('active');
    }
    if($('#peopleCreate').hasClass('people/create')){
       $('li#people').addClass('active');
    }
    if($('#peopleUpdate').hasClass('people/update')){
       $('li#people').addClass('active');
    }
    if($('#peopleView').hasClass('people/view')){
       $('li#people').addClass('active');
    }
    if($('#peopleViewp').hasClass('people/viewp')){
       $('li#profil').addClass('active');
    }

    if($('#pfnView').hasClass('pfn/view')){
       $('li#pfn').addClass('active');
    }
    if($('#demographicView').hasClass('demographic/view')){
       $('li#demographic').addClass('active');
    }
    if($('#organizationView').hasClass('organization/view')){
       $('li#organization').addClass('active');
    }
    if($('#programView').hasClass('program/view')){
       $('li#program').addClass('active');
    }
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

    if($('#peopleCreate').hasClass('people/create')){
       $('li#people').addClass('active');
    }

    if($('#peopleUpdate').hasClass('people/update')){
       $('li#people').addClass('active');
    }

    if($('#peopleView').hasClass('people/view')){
       $('li#people').addClass('active');
    }

    if($('#profilView').hasClass('people/viewp')){
       $('li#profil').addClass('active');
    }
    if($('#kawasan').hasClass('kawasan/state')){
       $('li#kp').addClass('active');
    }
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


    
//create :  wife
    $("#addmorewife").click(function(){
        var clone = $("#wife").clone();
        clone.find("input[type=text]").val("");
        clone.appendTo(".adddivwife");
        $('div#del').not(':first').show();
    });

    $(".adddivwife").on("click", "#remove", function(e) {
        e.preventDefault(); 
       $(this).closest("#wife").remove();  
    });
 /// create : tanggungan
    $("#addmoreson").click(function(){
        var clone = $("#son").clone();
        clone.find("input[type=text]").val("");
        clone.appendTo(".adddivson");
        $('.hrson').show();
        $('div#delson').not(':first').show();
        $(".date-picker").datepicker();
    });

    $(".adddivson").on("click", "#removeson", function(e) {
        e.preventDefault(); 
       $(this).closest("#son").remove();  

    });

// create : okutanggungan
    $("#addmoreoku").click(function(){
        var clone = $("#tanggugnan_oku").clone();
        clone.find("input[type=text]").val("");
        clone.appendTo(".adddivokutanggungan");
        $('.hroku').show();
        $('div#deltanggunganoku').not(':first').show();
    });

    $(".adddivokutanggungan").on("click", "#removetanggunganoku", function(e) {
        e.preventDefault(); 
       $(this).closest("#tanggugnan_oku").remove();  

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


// to show question
    $("#radio1").click(function(){
        $('.soalan').show(1000);
    });
    $("#radio2").click(function(){
        $('.soalan').hide(1000);
    });
    $("#radio3").click(function(){
        $('.soalan2').show(1000);
    });
    $("#radio4").click(function(){
        $('.soalan2').hide(1000);
    });

    $("#radio9").click(function(){
        $('.soalan3').show(1000);
    });
    $("#radio10").click(function(){
        $('.soalan3').hide(1000);
    });

    $("#radio11").click(function(){
        $('.adddivokutanggungan').show(1000);
    });
    $("#radio12").click(function(){
        $('.adddivokutanggungan').hide(1000);
    });


    $('#liststate').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });
    $('#listdistrict').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });
    $('#listsubbase').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });
    $('#listcluster').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });
    $('#listkampung').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    }); 

    $("#addmoreakademik").click(function(){
            var clone = $("#akademik").clone();
            clone.find("input[type=text]").val("");
            $('.hrakademik').show();
            clone.appendTo(".addakademik");
            $('div#delaka').not(':first').show();
            $(".date-picker").datepicker();
    });

    $(".addakademik").on("click", "#remove", function(e) {
        e.preventDefault(); 
       $(this).closest("#akademik").remove();  
    });
    
    $("#addmorepengalaman").click(function(){
            var clone = $("#pengalaman").clone();
            clone.find("input[type=text]").val("");
            $('.hrpengalaman').show();
            clone.appendTo(".addpengalaman");
            $('div#delpengalaman').not(':first').show();
            $(".date-picker").datepicker();
    });

    $(".addpengalaman").on("click", "#remove", function(e) {
        e.preventDefault(); 
       $(this).closest("#pengalaman").remove();  
    });

    $('#modelUserAddAkademik').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'),function(){
             $(".date-picker").datepicker();
        });

    });

    $('.modelUserUpdateAkademik').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'),function(){
             $(".date-picker").datepicker();
        });

    });

    $('#modelUserAddPengalaman').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'),function(){
             $(".date-picker").datepicker();
        });

    });

    $('.modelUserUpdatePengalaman').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
       .load($(this).attr('value'),function(){
             $(".date-picker").datepicker();
        });
    });


    $('#checkbox_perakuan').click(function(){
        if($(this).is(':checked')){
           $('.submit_perakuan').removeAttr("disabled");
        }else {
            
             $('.submit_perakuan').attr("disabled", "true");
        }

    });

    if ($('div#error-signup').is(':visible')) {
        $('#password_hash_signup').val("");
         //$('input#form_control_1').addClass('form-control edited');
    };



    $('.role_member').change(function(){
        if($('.role_member').val() == 1) {
            $('.ketua_kampung').show('slow');
            $("select#state_ketua_kampung").prop('disabled', false);
            $("select#district_ketua_kampung").prop('disabled', false);
            $("select#mukim_ketua_kampung").prop('disabled', false);
            $("select#kampung_ketua_kampung").prop('disabled', false);  
        } else {
            $('.ketua_kampung').hide();
            $("select#state_ketua_kampung").prop('disabled', true);
            $("select#district_ketua_kampung").prop('disabled', true);
            $("select#mukim_ketua_kampung").prop('disabled', true);
            $("select#kampung_ketua_kampung").prop('disabled', true);  


        } 
    });

    $('.role_member').change(function(){
        if($('.role_member').val() == 3) {
            $('.pejabat_daerah').show('slow');
            $("select#state_pejabat_daerah").prop('disabled', false);
            $("select#district_pejabat_daerah").prop('disabled', false); 
        } else {
            $('.pejabat_daerah').hide();
            $("select#state_pejabat_daerah").prop('disabled', true);
            $("select#district_pejabat_daerah").prop('disabled', true); 
        } 
    });

    $('.role_member').change(function(){
        if($('.role_member').val() == 4) {
            $('.upen').show('slow');
            $("select#state_upen").prop('disabled', false);
        } else {
            $('.upen').hide();
            $("select#state_upen").prop('disabled', true); 
        } 
    });
    
    $('.role_member').change(function(){
        if($('.role_member').val() == 11) {
            $('.penghulu').show('slow');
            $("select#state_penghulu").prop('disabled', false);
            $("select#district_penghulu").prop('disabled', false);
            $("select#mukim_penghulu").prop('disabled', false);  
        } else {
            $('.penghulu').hide();
            $("select#state_penghulu").prop('disabled', true);
            $("select#district_penghulu").prop('disabled', true);
            $("select#mukim_penghulu").prop('disabled', true);  
        } 
    });

    $('.request-form').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });

/* PEOPLE UPDATE :: CREATE BY SHAHRIL ANUAR*/
if ($('#state').val() == 22) {
        $(".johor").show(500);
        $(".bahagian_mukim").hide(500);
        $(".lainState").hide(500);

        $("select#district_bahagian").prop('disabled', true);
        $("select#subbasesarawak").prop('disabled', true);
        $("select#clustersarawak").prop('disabled', true);
        $("select#bahagian").prop('disabled', true);
        $("select#kampungsarawak").prop('disabled', true);
        $("select#district").prop('disabled', true);
        $("select#subbase_other").prop('disabled', true);
        $("select#cluster_other").prop('disabled', true);
        $("select#kampung_other").prop('disabled', true);
            
        $("select#johordistrict").prop('disabled', false);
        $("select#mukim_johor").prop('disabled', false);
        $("select#subbasejohor").prop('disabled', false);
        $("select#clusterjohor").prop('disabled', false);
        $("select#kampungjohor").prop('disabled', false);
}
else if($('#state').val() == 21){
    $(".johor").hide(500);
    $(".lainState").hide(500);
    $(".bahagian_mukim").show(500);    

    $("select#district").prop('disabled', true);
    $("select#subbase_other").prop('disabled', true);
    $("select#johordistrict").prop('disabled', true);
    $("select#cluster_other").prop('disabled', true);
    $("select#kampung_other").prop('disabled', true);
    $("select#mukim_johor").prop('disabled', true);
    $("select#subbasejohor").prop('disabled', true);
    $("select#clusterjohor").prop('disabled', true);
    $("select#kampungjohor").prop('disabled', true);

    $("select#district_bahagian").prop('disabled', false);
    $("select#subbasesarawak").prop('disabled', false);
    $("select#clustersarawak").prop('disabled', false);
    $("select#bahagian").prop('disabled', false);
    $("select#kampungsarawak").prop('disabled', false);
}
else{
    $(".lainState").show(500);
    $(".johor").hide(500);
    $(".bahagian_mukim").hide(500);

    $("select#johordistrict").prop('disabled', true);
    $("select#mukim_johor").prop('disabled', true);
    $("select#subbasejohor").prop('disabled', true);
    $("select#clusterjohor").prop('disabled', true);
    $("select#kampungjohor").prop('disabled', true);
    $("select#district_bahagian").prop('disabled', true);
    $("select#subbasesarawak").prop('disabled', true);
    $("select#clustersarawak").prop('disabled', true);
    $("select#bahagian").prop('disabled', true);
    $("select#kampungsarawak").prop('disabled', true);

    $("select#district").prop('disabled', false);
    $("select#subbase_other").prop('disabled', false);
    $("select#cluster_other").prop('disabled', false);
    $("select#kampung_other").prop('disabled', false);

}
/* END PEOPLE UPDATE  */ 
/* PEOPLE STATE DRILL DOWN :: CREATE BY SHAHRIL*/ 
    $('#state').change(function(){

       /* if ($(this).val() == 21) {
            $('.not_sarawak').hide();
            $('.show_sarawak').show();
        } else {
            $('.not_sarawak').show();
            $('.show_sarawak').hide();
        };*/
        if ($(this).val() == 21) {
            $('.not_sarawak').hide();
            $('.show_sarawak').show();
            $(".johor").hide(500);
            $(".lainState").hide(500);
            $(".bahagian_mukim").show(500);

            $("select#district").prop('disabled', true);
            $("select#subbase_other").prop('disabled', true);
            $("select#johordistrict").prop('disabled', true);
            $("select#cluster_other").prop('disabled', true);
            $("select#kampung_other").prop('disabled', true);
            $("select#mukim_johor").prop('disabled', true);
            $("select#subbasejohor").prop('disabled', true);
            $("select#clusterjohor").prop('disabled', true);
            $("select#kampungjohor").prop('disabled', true);

            $("select#district_bahagian").prop('disabled', false);
            $("select#subbasesarawak").prop('disabled', false);
            $("select#clustersarawak").prop('disabled', false);
            $("select#bahagian").prop('disabled', false);
            $("select#kampungsarawak").prop('disabled', false);
            

        } else if($(this).val() == 22) {
            $('.not_sarawak').show();
            $('.show_sarawak').hide();
            $(".bahagian_mukim").hide(500);
            $(".lainState").hide(500);
            $(".johor").show(500);

            $("select#district_bahagian").prop('disabled', true);
            $("select#subbasesarawak").prop('disabled', true);
            $("select#clustersarawak").prop('disabled', true);
            $("select#bahagian").prop('disabled', true);
            $("select#kampungsarawak").prop('disabled', true);
            $("select#district").prop('disabled', true);
            $("select#subbase_other").prop('disabled', true);
            $("select#cluster_other").prop('disabled', true);
            $("select#kampung_other").prop('disabled', true);
            

            $("select#johordistrict").prop('disabled', false);
            $("select#mukim_johor").prop('disabled', false);
            $("select#subbasejohor").prop('disabled', false);
            $("select#clusterjohor").prop('disabled', false);
            $("select#kampungjohor").prop('disabled', false);
        }
        else{
            $(".lainState").show(500);
            $('.not_sarawak').show();
            $('.show_sarawak').hide();
            $(".johor").hide(500);
            $(".bahagian_mukim").hide(500);

            $("select#johordistrict").prop('disabled', true);
            $("select#mukim_johor").prop('disabled', true);
            $("select#subbasejohor").prop('disabled', true);
            $("select#clusterjohor").prop('disabled', true);
            $("select#kampungjohor").prop('disabled', true);
            $("select#district_bahagian").prop('disabled', true);
            $("select#subbasesarawak").prop('disabled', true);
            $("select#clustersarawak").prop('disabled', true);
            $("select#bahagian").prop('disabled', true);
            $("select#kampungsarawak").prop('disabled', true);

            $("select#district").prop('disabled', false);
            $("select#subbase_other").prop('disabled', false);
            $("select#cluster_other").prop('disabled', false);
            $("select#kampung_other").prop('disabled', false);


        }

    }); 
/* END STATE DRILL DOWN*/ 
    $("#radio13").click(function(){

        $('.sukarelawan_temp').hide(1000);
    });
    $("#radio14").click(function(){

        $('.sukarelawan_temp').hide(1000);
    });

    $("#radio15").click(function(){

        $('.sukarelawan_temp').show(1000);
    });
    $("#radio16").click(function(){

        $('.sukarelawan_temp').show(1000);
    });

});