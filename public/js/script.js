$(document).ready(function() {
    var rent = (function(){
        var inputBoxes = $('.rent-dates');

        var rentChoose = function(){

            var dates = [];
            inputBoxesChecked = $('.rent-dates:checked');

            count = $('.rent-dates:checked').length;

            if(count > 0)
            {
                inputBoxesChecked.each(function(){
                    dates.push($(this).val());	
                });	

                if(count == 1)
                {
                    $('.rent-button').html("Wypożycz na "+ count + " dzień");
                }
                else
                {
                    $('.rent-button').html("Wypożycz na "+ count + " dni");
                }	    		
                $('.rent-button').show();
            }
            else
            {
                $('.rent-button').hide();
            }

            $('.rent-list').html(dates.toString());
            $('.dates_input').val(dates.toString());
        };


        var bindFunctions = function() {

            inputBoxes.on("change", rentChoose);
        };	

        var init = function() {
            rentChoose();
            bindFunctions();

        };

        return {
            init:init
        };
    })();

    rent.init();

});