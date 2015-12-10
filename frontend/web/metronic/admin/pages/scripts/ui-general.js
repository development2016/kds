var UIGeneral = function () {

    var handlePulsate = function () {
        if (!jQuery().pulsate) {
            return;
        }

        if (Metronic.isIE8() == true) {
            return; // pulsate plugin does not support IE8 and below
        }

        if (jQuery().pulsate) {
            jQuery('#pulsate-regular').pulsate({
                color: "#bf1c56"
            });

            jQuery('#pulsate-once').click(function () {
                $('#pulsate-once-target').pulsate({
                    color: "#399bc3",
                    repeat: false
                });
            });

            jQuery('#pulsate-crazy').click(function () {
                $('#pulsate-crazy-target').pulsate({
                    color: "#fdbe41",
                    reach: 50,
                    repeat: 10,
                    speed: 100,
                    glow: true
                });
            });
        }
    }



    return {
        //main function to initiate the module
        init: function () {
            handlePulsate();
            //handleDynamicPagination();
        }

    };

}();