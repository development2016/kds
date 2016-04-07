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
/* volunteer update */
if ($('#state_volunteer').val() == 22) {
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
else if($('#state_volunteer').val() == 21){
    $(".sarawak_volunteer").show(500);
        $(".johor_volunteer").hide(500);
        $(".other_state_volunteer").hide(500);
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
else if($('#state_volunteer').val() > 22 || $('#state_volunteer').val() < 21 ){
    $(".other_state_volunteer").show(500);
        $(".sarawak_volunteer").hide(500);
        $(".johor_volunteer").hide(500);

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
/* end volunteer update */
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
/* issue conduit update */
if ($('#state_isu').val() == 22) {
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
else if($('#state_isu').val() == 21){
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
else if($('#state_isu').val() > 22 || $('#state_isu').val() < 21 ){
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
/* end issue conduit update */
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
/* */
if ($('#state_pfn').val() == 22) {
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
else if($('#state_pfn').val() == 21){
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
else if($('#state_pfn').val() > 22 || $('#state_pfn').val() < 21 ){
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
/* */
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
    }
    else{
        $(".other_state_demografic").show(500);
        $(".sarawak_demografic").hide(500);
        $(".johor_demografic").hide(500);

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
/* demografic update */
if ($('#state_demografic').val() == 22) {
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
else if($('#state_demografic').val() == 21){
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
}    
else if($('#state_demografic').val() > 22 || $('#state_demografic').val() < 21 ){
    $(".other_state_demografic").show(500);
        $(".sarawak_demografic").hide(500);
        $(".johor_demografic").hide(500);

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
/* end demografic update*/
/* end demographic by shahril */
/* manager train create by shahril */
$('#state_managertrain').change(function(){
    if ($(this).val() == 22) {
        $(".johor_managertrain").show(500);
        $(".sarawak_managertrain").hide(500);
        $(".other_state_managertrain").hide(500);

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
        $(".sarawak_managertrain").show(500);
        $(".johor_managertrain").hide(500);
        $(".other_state_managertrain").hide(500);

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
        $(".other_state_managertrain").show(500);
        $(".sarawak_managertrain").hide(500);
        $(".johor_managertrain").hide(500);

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
/* manager trained update */ 
if ($('#state_managertrain').val() == 22) {
    $(".johor_managertrain").show(500);
        $(".sarawak_managertrain").hide(500);
        $(".other_state_managertrain").hide(500);

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
else if($('#state_managertrain').val() == 21){
    $(".sarawak_managertrain").show(500);
        $(".johor_managertrain").hide(500);
        $(".other_state_managertrain").hide(500);

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
else if($('#state_managertrain').val() > 22 || $('#state_managertrain').val() < 21 ){
    $(".other_state_managertrain").show(500);
        $(".sarawak_managertrain").hide(500);
        $(".johor_managertrain").hide(500);

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
/* end manager trained update*/
/* end manager train by shahril */
/* mikroworker by shahril */
/* mikroworker/user */
$('#state_mikroworker').change(function(){
    if ($(this).val() == 22) {
        $(".johor_mikro").show(500);
        $(".sarawak_mikro").hide(500);
        $(".other_state_mikro").hide(500);

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
        $(".sarawak_mikro").show(500);
        $(".johor_mikro").hide(500);
        $(".other_state_mikro").hide(500);

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
        $(".other_state_mikro").show(500);
        $(".sarawak_mikro").hide(500);
        $(".johor_mikro").hide(500);

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
/* update mikroworker */
if ($('#state_mikroworker').val() == 22) {
    $(".johor_mikro").show(500);
        $(".sarawak_mikro").hide(500);
        $(".other_state_mikro").hide(500);

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
else if($('#state_mikroworker').val() == 21){
    $(".sarawak_mikro").show(500);
        $(".johor_mikro").hide(500);
        $(".other_state_mikro").hide(500);

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
else if($('#state_mikroworker').val() > 22 || $('#state_mikroworker').val() < 21 ){
    $(".other_state_mikro").show(500);
        $(".sarawak_mikro").hide(500);
        $(".johor_mikro").hide(500);

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
/* end update mikroworker */
/* end mikroworker by shahril*/
/* searching mikroworker */
$('#mikroworker_search').change(function(){
    if ($(this).val() == 22) {
        $(".johor_mikro").show(500);
        $(".sarawak_mikro").hide(500);
        $(".other_state_mikro").hide(500);

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
        $(".sarawak_mikro").show(500);
        $(".johor_mikro").hide(500);
        $(".other_state_mikro").hide(500);

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
        $(".other_state_mikro").show(500);
        $(".sarawak_mikro").hide(500);
        $(".johor_mikro").hide(500);

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
/* end mikroworker */
/* searching mikroworker */
if ($('#mikroworker_search').val() == 22) {
    $(".johor_mikro").show(500);
        $(".sarawak_mikro").hide(500);
        $(".other_state_mikro").hide(500);

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
else if($('#mikroworker_search').val() == 21){
    $(".sarawak_mikro").show(500);
        $(".johor_mikro").hide(500);
        $(".other_state_mikro").hide(500);

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
else if($('#mikroworker_search').val() > 22 || $('#mikroworker_search').val() < 21 ){
    $(".other_state_mikro").show(500);
        $(".sarawak_mikro").hide(500);
        $(".johor_mikro").hide(500);

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
/* end searching mikroworker */
});