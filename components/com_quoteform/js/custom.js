    jQuery(document).ready(function(){
        jQuery('#t4-main-body .t4-section-inner').removeClass('container');
        let currentScreen = 1;
        function showScreen(screenNumber) {
            // Hide all screens
            document.querySelectorAll('.card-body').forEach(screen => {
            screen.style.display = 'none';
            });
        
            // Show the current screen
            document.getElementById(`screen${screenNumber}`).style.display = 'block';
        }               
        showScreen(currentScreen);
        jQuery(".radioCard").click(function(){
            jQuery(this).siblings(".radioCard").removeClass("active");
            jQuery(this).addClass('active')
        })

        jQuery('input[type="radio"]').on('change', function () {
            // Check if any radio button is checked
            var anyChecked = jQuery('input[type="radio"]:checked').length > 0;
            var parentID = $(this).closest('.card-body').attr('id');
            var enableBtn = "#" + parentID + " .next-button";
            // Enable/disable the "Next" button based on the checked state
            jQuery(enableBtn).prop('disabled', !anyChecked);
        });
        jQuery('input[type="text"]').on('input', function(){
            var first_name= jQuery('#first_name').val();
            var last_name= jQuery('#last_name').val();
            var parentID = $(this).closest('.card-body').attr('id');
            var enableBtn = "#" + parentID + " .next-button";
            if(first_name != "" && last_name != ""){
                // Enable/disable the "Next" button based on the checked state
                jQuery(enableBtn).prop('disabled', false);
            }
            else {
                jQuery(enableBtn).prop('disabled', true);
            }
        })
        $('#my_email').on('input', function() {
            var email = $(this).val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
            if (emailRegex.test(email)) {
                jQuery("#screen13 .next-button").prop('disabled',false)
                // Valid email format
            } else {
                jQuery("#screen13 .next-button").prop('disabled',true)
                // Invalid email format
            }
        });
        $("#address").on('input', function() {
            var address = jQuery("#address").val();
            var parentID = $(this).closest('.card-body').attr('id');
            var enableBtn = "#" + parentID + " .next-button";
            if( address != ""){
                jQuery(enableBtn).prop('disabled', false);
            } else {
                jQuery(enableBtn).prop('disabled', true)
            }
        })
        $("#range").on('input', function(){
            var slider = $("#range").val();
            var output = "$" + slider ;
            var badge_position = 100 * (slider - 50)/1150 ;
            $("#range-value").html(output); 
            $("#range-value").css('left',`${badge_position}%`);
            if(slider>=1100){
                $("#range-value").css('transform','translate(-35px)');
            } else if(1100>slider && slider>750) {
                $("#range-value").css('transform','translate(-30px)');
            } else if(750>= slider && slider >500){
                $("#range-value").css('transform','translate(-28px)');
            } else if(500>=slider && slider >300){
                $("#range-value").css('transform','translate(-25px)');
            } else {
                $("#range-value").css('transform','translate(-20px)');
            }
            
        })

         

    })

    
    function showScreen(screenNumber) {
        // Hide all screens
        document.querySelectorAll('.card-body').forEach(screen => {
          screen.style.display = 'none';
        });
    
        // Show the current screen
        document.getElementById(`screen${screenNumber}`).style.display = 'block';
    }
    

    function next_progress(step) {
        var elem = document.getElementById('myBar');   
        var progress_width = parseFloat(elem.style.width);
        if(progress_width >= 90) {
        return ;
        }
        var set_width = progress_width + 7*step;
        document.getElementById("demo").innerHTML = set_width / 7 ;
        elem.style.width = set_width  + '%';
    }
    function back_progress(step) {
        var elem = document.getElementById('myBar');   
        var progress_width = parseFloat(elem.style.width);
        if(progress_width >= 95) {
        return ;
        }
        var set_width = progress_width - 7*step;
        document.getElementById("demo").innerHTML = set_width / 7 ;
        elem.style.width = set_width  + '%';
    }
    function goback(){
         // Retrieve the array from local storage
        var storedArray = JSON.parse(localStorage.getItem('goback')) || [];

        // Check if the array is not empty
        if (storedArray.length > 0) {
            // Get the last element
            var lastElement = storedArray.pop();
            
            showScreen(lastElement[0]);
            back_progress(lastElement[1]);

            // Update the local storage with the modified array
            localStorage.setItem('goback', JSON.stringify(storedArray));
        } else {
            // Handle the case when the array is empty
            console.log('The array is empty');
        }

    }
    function goto(screennumber) {
        // Get the value of the checked radio button
        var checkname = 'input[name="step' + screennumber + '"]:checked';
        const radioValue = jQuery(checkname).val();
        console.log("radiovalue",radioValue)
        // You can use the 'radioValue' variable as needed
        if(screennumber == 1){
            // if(radioValue == "residential"){
                next_progress(1);
                showScreen(2);
                localStorage.removeItem('goback');
                var back_item = [1,1];
                var existingData = [];
                existingData.push(back_item);
                localStorage.setItem('goback', JSON.stringify(existingData));
            // }
        }
        else{
            var existingData = JSON.parse(localStorage.getItem('goback'));
            if(screennumber == 2){
                if(radioValue == "true"){
                    next_progress(2);
                    showScreen(4);
                    var back_item = [2,2];
                    existingData.push(back_item);
                } else if(radioValue){
                    next_progress(1);
                    showScreen(3)
                    var back_item = [2,1];
                    existingData.push(back_item);
                }  
            }
            if(screennumber == 3){
                if(radioValue == "shopping_someone_else" || radioValue == "shopping_hoa_or_multicondo"){
                    next_progress(1);
                    showScreen(4);
                    var back_item = [3,1];
                    existingData.push(back_item);
                } else if (radioValue == "rent_for_self"){
                    next_progress(6);
                    showScreen(9);
                    var back_item = [3,6];
                    existingData.push(back_item);
                }
            }
            if(screennumber == 4){
                next_progress(1);
                showScreen(5);
                var back_item = [4,1];
                existingData.push(back_item);
            }
            if(screennumber == 5){
                if(radioValue == "interested"){
                    next_progress(1);
                    showScreen(6);
                    var back_item = [5,1];
                    existingData.push(back_item);
                } else if (radioValue == "not_interested"){
                    next_progress(2);
                    showScreen(7);
                    var back_item = [5,2];
                    existingData.push(back_item);
                }
                
            }
            if(screennumber == 6){
                next_progress(1);
                showScreen(7);
                var back_item = [6,1];
                existingData.push(back_item);
            }
            if(screennumber == 7){
                next_progress(1);
                showScreen(8);
                var back_item = [7,1];
                existingData.push(back_item);
            }
            if(screennumber == 8){
                next_progress(1);
                showScreen(9);
                var back_item = [8,1];
                existingData.push(back_item);
            }
            if(screennumber == 9){
                next_progress(1);
                showScreen(10);
                var back_item = [9,1];
                existingData.push(back_item);
            }
            if(screennumber == 10){
                next_progress(2);
                showScreen(12);
                var back_item = [10,2];
                existingData.push(back_item);
            }
            if(screennumber == 12){
                next_progress(1);
                showScreen(13);
                var back_item = [12,1];
                existingData.push(back_item);
            }
            localStorage.setItem('goback',JSON.stringify(existingData));
        }
        
        
  
    }
   

