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
/* PEOPLE UPDATE :: CREATE BY SHAHRIL ANUAR*/
if ($('#state').val() == 22) {
        $(".johor").show(500);
        $(".bahagian_sarawak").hide(500);
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
    $(".bahagian_sarawak").show(500);    

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
else if($('#state').val() > 22 || $('#state').val() < 21 ){
    $(".lainState").show(500);
    $(".johor").hide(500);
    $(".bahagian_sarawak").hide(500);

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
            $(".bahagian_sarawak").show(500);

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
            $(".bahagian_sarawak").hide(500);
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
            $(".bahagian_sarawak").hide(500);

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

    // daerah
    $('#state_district').change(function(){
        if ($(this).val() == 21) {
            $(".bahagian_district").show(500);
            $("select#bahagian").prop('disabled', false);
        } else {
            $(".bahagian_district").hide(500);
            $("select#bahagian").prop('disabled', true);
        };
    });
/* lookup district update */
if ($('#state_district').val() == 21) {
    $(".bahagian_district").show(500);
}
/* end lookup district update */
    //mukim
    /*$('#state_mukim').change(function(){
        if ($(this).val() == 22) {
            $(".mukim").show(500);
            $(".others").hide(500);
            $(".sendMukim").show(500);
            //$(".mukim_subbase").hide(500);
            $("select#district").prop('disabled', false);            
        }
         else {
            $(".others").show(500);
            $(".mukim").hide(500);
            $(".sendMukim").hide(500);

        };
    });*/

    //subbase
    $('#lookup_subbase').change(function(){
        if ($(this).val() == 21) {
            $(".bahagian_mukim").show(500);
            $(".daerah_mukim").hide(500);
            $(".johor").hide(500);
            //$(".mukim_subbase").hide(500);
            $("select#district").prop('disabled', true);
            $("select#johordistrict").prop('disabled', true);
            $("select#mukim_johor").prop('disabled', true);
            $("select#district_bahagian").prop('disabled', false);
            $("select#mukim_bahagian").prop('disabled', false);
            $("select#bahagian").prop('disabled', false);
            
        }
        else if($(this).val() == 22){
            $(".johor").show(500);
            $(".bahagian_mukim").hide(500);
            $(".daerah_mukim").hide(500);
            $("select#district").prop('disabled', true);
            $("select#district_bahagian").prop('disabled', true);
            $("select#bahagian").prop('disabled', true);
            $("select#mukim_bahagian").prop('disabled', true);
            $("select#johordistrict").prop('disabled', false);
            $("select#mukim_johor").prop('disabled', false);
        }
         else {
            $(".daerah_mukim").show(500);
            //$(".mukim_subbase").show(500);
            $(".bahagian_mukim").hide(500);
            $(".johor").hide(500);
            $("select#district").prop('disabled', false);
            $("select#bahagian").prop('disabled', true);
            $("select#district_bahagian").prop('disabled', true);
            $("select#mukim_bahagian").prop('disabled', true);
            $("select#johordistrict").prop('disabled', true);
            $("select#mukim_johor").prop('disabled', true);
        };
    });
/*  lookup_subbase update  */
if ($('#lookup_subbase').val() == 22) {
    $(".johor").show(500);
    $(".bahagian_mukim").hide(500);
    $(".daerah_mukim").hide(500);
    $("select#district").prop('disabled', true);
    $("select#district_bahagian").prop('disabled', true);
    $("select#bahagian").prop('disabled', true);
    $("select#mukim_bahagian").prop('disabled', true);
    $("select#johordistrict").prop('disabled', false);
    $("select#mukim_johor").prop('disabled', false);
}
else if($('#lookup_subbase').val() == 21){
    $(".bahagian_mukim").show(500);
    $(".daerah_mukim").hide(500);
    $(".johor").hide(500);
    //$(".mukim_subbase").hide(500);
    $("select#district").prop('disabled', true);
    $("select#johordistrict").prop('disabled', true);
    $("select#mukim_johor").prop('disabled', true);
    $("select#district_bahagian").prop('disabled', false);
    $("select#mukim_bahagian").prop('disabled', false);
    $("select#bahagian").prop('disabled', false);
}
else if($('#lookup_subbase').val() > 22 || $('#lookup_subbase').val() < 21 ){
    $(".daerah_mukim").show(500);
            //$(".mukim_subbase").show(500);
    $(".bahagian_mukim").hide(500);
    $(".johor").hide(500);
    $("select#district").prop('disabled', false);
    $("select#bahagian").prop('disabled', true);
    $("select#district_bahagian").prop('disabled', true);
    $("select#mukim_bahagian").prop('disabled', true);
    $("select#johordistrict").prop('disabled', true);
    $("select#mukim_johor").prop('disabled', true);

}
/* end lookup-update*/
//CLUSTER
    $('#state_cluster').change(function(){
        if ($(this).val() == 21) {
            $(".bahagian_sarawak_cluster").show(500);
            $(".lainState_cluster").hide(500);
            $(".johorcluster").hide(500);
            //$(".mukim_subbase").hide(500);
            $("select#district").prop('disabled', true);
            $("select#subbase_other").prop('disabled', true);
            $("select#johordistrict").prop('disabled', true);
            $("select#mukim_johor").prop('disabled', true);
            $("select#subbase_johor").prop('disabled', true);
            $("select#district_bahagian").prop('disabled', false);
            $("select#mukim_bahagian").prop('disabled', false);
            $("select#subbase_bahagian").prop('disabled', false);
            $("select#bahagian").prop('disabled', false);
        }
        else if($(this).val() == 22){
            $(".johorcluster").show(500);
            $(".bahagian_sarawak_cluster").hide(500);
            $(".lainState_cluster").hide(500);
            $("select#district").prop('disabled', true);
            $("select#bahagian").prop('disabled', true);
            $("select#subbase_other").prop('disabled', true);
            $("select#district_bahagian").prop('disabled', true);
            $("select#mukim_bahagian").prop('disabled', true);
            $("select#subbase_bahagian").prop('disabled', true);
            $("select#johordistrict").prop('disabled', false); //enable
            $("select#mukim_johor").prop('disabled', false); //enable
            $("select#subbase_johor").prop('disabled', false);   //enable
        }
         else {
            $(".lainState_cluster").show(500);
            //$(".mukim_subbase").show(500);
            $(".bahagian_sarawak_cluster").hide(500);
            $(".johorcluster").hide(500);
            $("select#district").prop('disabled', false);
            $("select#subbase_other").prop('disabled', false);
            $("select#district_bahagian").prop('disabled', true);
            $("select#mukim_bahagian").prop('disabled', true);
            $("select#subbase_bahagian").prop('disabled', true);
            $("select#johordistrict").prop('disabled', true);
            $("select#mukim_johor").prop('disabled', true);
            $("select#subbase_johor").prop('disabled', true);
            $("select#bahagian").prop('disabled', true);
        };
    });
/* lookup cluster update  */
if ($('#state_cluster').val() == 22) {
    $(".johorcluster").show(500);
    $(".bahagian_sarawak_cluster").hide(500);
    $(".lainState_cluster").hide(500);
    $("select#district").prop('disabled', true);
    $("select#bahagian").prop('disabled', true);
    $("select#subbase_other").prop('disabled', true);
    $("select#district_bahagian").prop('disabled', true);
    $("select#mukim_bahagian").prop('disabled', true);
    $("select#subbase_bahagian").prop('disabled', true);
    $("select#johordistrict").prop('disabled', false); //enable
    $("select#mukim_johor").prop('disabled', false); //enable
    $("select#subbase_johor").prop('disabled', false);   //enable
}
else if($('#state_cluster').val() == 21){
    $(".bahagian_sarawak_cluster").show(500);
    $(".lainState_cluster").hide(500);
    $(".johorcluster").hide(500);
    //$(".mukim_subbase").hide(500);
    $("select#district").prop('disabled', true);
    $("select#subbase_other").prop('disabled', true);
    $("select#johordistrict").prop('disabled', true);
    $("select#mukim_johor").prop('disabled', true);
    $("select#subbase_johor").prop('disabled', true);
    $("select#district_bahagian").prop('disabled', false);
    $("select#mukim_bahagian").prop('disabled', false);
    $("select#subbase_bahagian").prop('disabled', false);
    $("select#bahagian").prop('disabled', false);
}
else if($('#state_cluster').val() > 22 || $('#state_cluster').val() < 21 ){
    $(".lainState_cluster").show(500);
    //$(".mukim_subbase").show(500);
    $(".bahagian_sarawak_cluster").hide(500);
    $(".johorcluster").hide(500);
    $("select#district").prop('disabled', false);
    $("select#subbase_other").prop('disabled', false);
    $("select#district_bahagian").prop('disabled', true);
    $("select#mukim_bahagian").prop('disabled', true);
    $("select#subbase_bahagian").prop('disabled', true);
    $("select#johordistrict").prop('disabled', true);
    $("select#mukim_johor").prop('disabled', true);
    $("select#subbase_johor").prop('disabled', true);
    $("select#bahagian").prop('disabled', true);

}
/* end lookup-update*/
//kampung
    $('#state_kg').change(function(){
        if ($(this).val() == 21) {
            $(".bahagian_sarawak").show(500);
            $(".lainState").hide(500);
            $(".johor").hide(500);
            //$(".mukim_subbase").hide(500);
            $("select#district").prop('disabled', true);
            $("select#subbase_other").prop('disabled', true);
            $("select#johordistrict").prop('disabled', true);
            $("select#mukim_johor").prop('disabled', true);
            $("select#subbasejohor").prop('disabled', true);
            $("select#clusterjohor").prop('disabled', true);
            $("select#cluster_other").prop('disabled', true);

            $("select#district_bahagian").prop('disabled', false);
            //$("select#mukim_bahagian").prop('disabled', false);
            $("select#subbasesarawak").prop('disabled', false);
            $("select#clustersarawak").prop('disabled', false);
            $("select#bahagian").prop('disabled', false);

        }
        else if($(this).val() == 22){
            $(".johor").show(500);
            $(".bahagian_sarawak").hide(500);
            $(".lainState").hide(500);
            $("select#district").prop('disabled', true);
            $("select#bahagian").prop('disabled', true);
            $("select#subbase_other").prop('disabled', true);
            $("select#district_bahagian").prop('disabled', true);
            //$("select#mukim_bahagian").prop('disabled', true);
            $("select#subbasesarawak").prop('disabled', true);
            $("select#cluster_other").prop('disabled', true);
            $("select#clustersarawak").prop('disabled', true);

            $("select#johordistrict").prop('disabled', false); //enable
            $("select#mukim_johor").prop('disabled', false); //enable
            $("select#subbasejohor").prop('disabled', false);   //enable
            $("select#clusterjohor").prop('disabled', false); //enable
        }
         else {
            $(".lainState").show(500);
            //$(".mukim_subbase").show(500);
            $(".bahagian_sarawak").hide(500);
            $(".johor").hide(500);
            $("select#district").prop('disabled', false);
            $("select#subbase_other").prop('disabled', false);
            $("select#cluster_other").prop('disabled', false);

            $("select#district_bahagian").prop('disabled', true);
            //$("select#mukim_bahagian").prop('disabled', true);
            $("select#subbasesarawak").prop('disabled', true);
            $("select#johordistrict").prop('disabled', true);
            $("select#mukim_johor").prop('disabled', true);
            $("select#subbasejohor").prop('disabled', true);
            $("select#clusterjohor").prop('disabled', true);
            $("select#clustersarawak").prop('disabled', true);
            $("select#bahagian").prop('disabled', true);
        };
    });
/* lookup kampung update  */
if ($('#state_kg').val() == 22) {
        $(".johor").show(500);
        $(".bahagian_sarawak").hide(500);
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
else if($('#state_kg').val() == 21){
    $(".johor").hide(500);
    $(".lainState").hide(500);
    $(".bahagian_sarawak").show(500);    

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
    //$("select#kampungsarawak").prop('disabled', false);
}
else if($('#state_kg').val() > 22 || $('#state_kg').val() < 21 ){
    $(".lainState").show(500);
    $(".johor").hide(500);
    $(".bahagian_sarawak").hide(500);

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
/* end lookup kampung update */ 
/* volunteer :: create by shahril */
$('#state_volunteer').change(function(){
    if ($(this).val() == 22) {
        $(".johor_volunteer").show(500);
        $(".sarawak_volunteer").hide(500);
        $(".other_state_volunteer").hide(500);

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
    else if($(this).val() == 21) {
        $(".sarawak_volunteer").show(500);
        $(".johor_volunteer").hide(500);
        $(".other_state_volunteer").hide(500);

        $("select#johordistrict").prop('disabled', true);
        $("select#mukim_johor").prop('disabled', true);
        $("select#subbasejohor").prop('disabled', true);
        $("select#clusterjohor").prop('disabled', true);
        $("select#kampungjohor").prop('disabled', true);
        $("select#district").prop('disabled', true);
        $("select#subbase_other").prop('disabled', true);
        $("select#cluster_other").prop('disabled', true);
        $("select#kampung_other").prop('disabled', true);

        $("select#district_bahagian").prop('disabled', false);
        $("select#subbasesarawak").prop('disabled', false);
        $("select#clustersarawak").prop('disabled', false);
        $("select#kampungsarawak").prop('disabled', false);
        $("select#bahagian").prop('disabled', false);
    }
    else{
        $(".other_state_volunteer").show(500);
        $(".sarawak_volunteer").hide(500);
        $(".johor_volunteer").hide(500);

        $("select#district_bahagian").prop('disabled', true);
        $("select#subbasesarawak").prop('disabled', true);
        $("select#clustersarawak").prop('disabled', true);
        $("select#kampungsarawak").prop('disabled', true);
        $("select#bahagian").prop('disabled', true);
        $("select#johordistrict").prop('disabled', true);
        $("select#mukim_johor").prop('disabled', true);
        $("select#subbasejohor").prop('disabled', true);
        $("select#clusterjohor").prop('disabled', true);
        $("select#kampungjohor").prop('disabled', true);

        $("select#district").prop('disabled', false);
        $("select#subbase_other").prop('disabled', false);
        $("select#cluster_other").prop('disabled', false);
        $("select#kampung_other").prop('disabled', false);
    }
});
/* end volunteer  */ 
/* issue conduit create by shahril */
$('#state_isu').change(function(){
    if ($(this).val() == 22) {
        $(".johor_isu").show(500);
        $(".sarawak_isu").hide(500);
        $(".other_state_isu").hide(500);

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
    else if($(this).val() == 21) {
        $(".sarawak_isu").show(500);
        $(".johor_isu").hide(500);
        $(".other_state_isu").hide(500);

        $("select#johordistrict").prop('disabled', true);
        $("select#mukim_johor").prop('disabled', true);
        $("select#subbasejohor").prop('disabled', true);
        $("select#clusterjohor").prop('disabled', true);
        $("select#kampungjohor").prop('disabled', true);
        $("select#district").prop('disabled', true);
        $("select#subbase_other").prop('disabled', true);
        $("select#cluster_other").prop('disabled', true);
        $("select#kampung_other").prop('disabled', true);

        $("select#district_bahagian").prop('disabled', false);
        $("select#subbasesarawak").prop('disabled', false);
        $("select#clustersarawak").prop('disabled', false);
        $("select#kampungsarawak").prop('disabled', false);
        $("select#bahagian").prop('disabled', false);
    }
    else{
        $(".other_state_isu").show(500);
        $(".sarawak_isu").hide(500);
        $(".johor_isu").hide(500);

        $("select#district_bahagian").prop('disabled', true);
        $("select#subbasesarawak").prop('disabled', true);
        $("select#clustersarawak").prop('disabled', true);
        $("select#kampungsarawak").prop('disabled', true);
        $("select#bahagian").prop('disabled', true);
        $("select#johordistrict").prop('disabled', true);
        $("select#mukim_johor").prop('disabled', true);
        $("select#subbasejohor").prop('disabled', true);
        $("select#clusterjohor").prop('disabled', true);
        $("select#kampungjohor").prop('disabled', true);

        $("select#district").prop('disabled', false);
        $("select#subbase_other").prop('disabled', false);
        $("select#cluster_other").prop('disabled', false);
        $("select#kampung_other").prop('disabled', false);
    }
});
/* end issue conduit by shahril*/
/* PFN create by shahril */
$('#state_pfn').change(function(){
    if ($(this).val() == 22) {
        $(".johor_pfn").show(500);
        $(".sarawak_pfn").hide(500);
        $(".other_state_pfn").hide(500);

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
    else if($(this).val() == 21) {
        $(".sarawak_pfn").show(500);
        $(".johor_pfn").hide(500);
        $(".other_state_pfn").hide(500);

        $("select#johordistrict").prop('disabled', true);
        $("select#mukim_johor").prop('disabled', true);
        $("select#subbasejohor").prop('disabled', true);
        $("select#clusterjohor").prop('disabled', true);
        $("select#kampungjohor").prop('disabled', true);
        $("select#district").prop('disabled', true);
        $("select#subbase_other").prop('disabled', true);
        $("select#cluster_other").prop('disabled', true);
        $("select#kampung_other").prop('disabled', true);

        $("select#district_bahagian").prop('disabled', false);
        $("select#subbasesarawak").prop('disabled', false);
        $("select#clustersarawak").prop('disabled', false);
        $("select#kampungsarawak").prop('disabled', false);
        $("select#bahagian").prop('disabled', false);
    }
    else{
        $(".other_state_pfn").show(500);
        $(".sarawak_pfn").hide(500);
        $(".johor_pfn").hide(500);

        $("select#district_bahagian").prop('disabled', true);
        $("select#subbasesarawak").prop('disabled', true);
        $("select#clustersarawak").prop('disabled', true);
        $("select#kampungsarawak").prop('disabled', true);
        $("select#bahagian").prop('disabled', true);
        $("select#johordistrict").prop('disabled', true);
        $("select#mukim_johor").prop('disabled', true);
        $("select#subbasejohor").prop('disabled', true);
        $("select#clusterjohor").prop('disabled', true);
        $("select#kampungjohor").prop('disabled', true);

        $("select#district").prop('disabled', false);
        $("select#subbase_other").prop('disabled', false);
        $("select#cluster_other").prop('disabled', false);
        $("select#kampung_other").prop('disabled', false);
    }
});
/* end PFN by shahril */
/* demographic create by shahril */
$('#state_demografic').change(function(){
    if ($(this).val() == 22) {
        $(".johor_demografic").show(500);
        $(".sarawak_demografic").hide(500);
        $(".other_state_demografic").hide(500);

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
    else if($(this).val() == 21) {
        $(".sarawak_demografic").show(500);
        $(".johor_demografic").hide(500);
        $(".other_state_demografic").hide(500);

        $("select#johordistrict").prop('disabled', true);
        $("select#mukim_johor").prop('disabled', true);
        $("select#subbasejohor").prop('disabled', true);
        $("select#clusterjohor").prop('disabled', true);
        $("select#kampungjohor").prop('disabled', true);
        $("select#district").prop('disabled', true);
        $("select#subbase_other").prop('disabled', true);
        $("select#cluster_other").prop('disabled', true);
        $("select#kampung_other").prop('disabled', true);

        $("select#district_bahagian").prop('disabled', false);
        $("select#subbasesarawak").prop('disabled', false);
        $("select#clustersarawak").prop('disabled', false);
        $("select#kampungsarawak").prop('disabled', false);
        $("select#bahagian").prop('disabled', false);
    }  vÒ  xÒ  zÒ                                        6Ò       ÄÄ 
Ä                     8Ò  :Ò  <Ò  >Ò  @Ò  BÒ                                            (Ò       Äà  ò                    	E« â« 2Ò  4Ò  5» ˝∆ JÒ  LÒ  PÒ                                                                                            ºÒ                                 æÒ  ¿Ò  ¬Ò                        VÒ                                 XÒ                            òÒ       ÄÄ                       öÒ  úÒ  †Ò  §Ò                    TÒ      ÄàÄ                      â… ZÒ  jÒ  —« |Ò  ÄÒ  y  A…                               äÒ       ÄÄÄ Ç                     åÒ  íÒ  ñÒ  Õ… ¶Ò  ∞Ò  ∏Ò                                        ƒÒ                                ∆Ò  »Ò                        ËÚ         Ä                        ÍÚ                                ÃÒ                                 ŒÒ  –Ò  “Ò                    ZÚ        Ç  "                     \Ú  ^Ú  `Ú  bÚ  dÚ  fÚ  hÚ                                        (Û      ÄàÄ (†                     	*Û  ,Û  .Û  0Û  :Û  >Û  BÛ  — jÛ                                                                                            Ò      ÄÄ† ÇÄ@                   ÚÒ  ÙÒ  ˆÒ  ˙Ò  ¸Ò  ˛Ò  
Ú  Ú  Ú   Ú  "Ú                                                                                        &Ú        ÄÄäÄ                   	(Ú  :Ú  JÚ  LÚ  NÚ  PÚ  RÚ  VÚ  XÚ                                                                                            ÇÚ      ÄÄÄ                       ÑÚ  ÜÚ  àÚ  äÚ  åÚ                                                îÚ        @                      ñÚ  òÚ  öÚ  úÚ  ûÚ  =œ                                       ‹Ú          Ää                     ﬁÚ  ‡Ú  ‚Ú  ‰Ú  ÊÚ                                                †Ú      Ùë@=                      ¢Ú  §Ú  ¶Ú  ™Ú  ÆÚ  ∞Ú  ≤Ú  ¥Ú  ∂Ú  ∏Ú  ƒÚ  ∆Ú  »Ú  ÃÚ  ŒÚ  –Ú  “Ú  ‘Ú                                                                                                                                                                                        ¿Û                                 ¬Û  ƒÛ                            ‰Û       ÄÄÄ Ä                     ÊÛ  ÓÛ  ¸Û  Ù  Ù                                            HÛ       ÄÄÄ  Ä                    JÛ  `Û  bÛ  dÛ  hÛ                                                |Û        à†                     ~Û  ÇÛ  àÛ  äÛ  éÛ  êÛ  îÛ                                    pÛ     @ëÄÄ ÇÉ                    rÛ  tÛ  vÛ  xÛ  zÛ  u— ºÛ  a– Å“ ÃÛ  ŒÛ  ≈“ ÿÛ  ⁄Û  ‹Û                                                                        ∆Û                                  »Û   Û                        ‘Û         Ä                        ÷Û                                ﬁÛ                                  ‡Û                            Ù       Ä                        Ù  Ù  Ù                        Ù                               Ù   Ù  "Ù  $Ù                DÙ       Ä    Ä                     u’ JÙ                            ,Ù                                 .Ù  0Ù  2Ù                    ı      H0                          ı  ı  ı  ı  ı                                                *Ù     Å "à à                    %‘ 4Ù  6Ù  8Ù  :Ù  <Ù  >Ù  @Ù  BÙ  ›” LÙ  NÙ                                                                                FÙ          Ä                       HÙ                                VÙ                                XÙ  ZÙ                        àÙ                               5◊ éÙ  êÙ                        bÙ         Ä                        dÙ                            \Ù      Ç®àÄ(äÄ                    ^Ù  `Ù  I÷ fÙ  hÙ  jÙ  lÙ  nÙ  pÙ  rÙ  vÙ  xÙ  ÇÙ  ÑÙ  ÜÙ                                                                        äÙ                                 åÙ                            Jı           "Ä                     Lı  Nı  Pı                        îÙ                                 ñÙ  òÙ  öÙ