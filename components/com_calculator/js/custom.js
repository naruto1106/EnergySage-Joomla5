jQuery(document).ready(function(){
    jQuery('#t4-main-body .t4-section-inner').removeClass('container');
    document.getElementById('loading-screen').style.display = 'none';
    
    
})

async function displayBlocks() {
    const blocks = document.querySelectorAll('.loading-image');
    const background_color = ["rgb(127,63,152)", "rgb(189,32,111)", "rgb(246,177,64)", "rgb(97,165,67)", "rgb(53,182,170)"]
    for(i=0; i<blocks.length; i++)
    {
        await    new Promise(resolve => setTimeout(resolve, 1000));
        blocks[i].style.visibility = 'visible';
        document.getElementById('id_market-estimate-gif').style.backgroundColor = background_color[i]; 

    }
        
}

async function submitForm() {

    if (document.getElementById('full-address').checkValidity() && document.getElementById('monthly-bill').checkValidity()) {
        document.getElementById('hero-contain').style.display = 'none';
        document.getElementById('loading-screen').style.display = 'block';
        await displayBlocks();   
        document.forms[0].submit();
    } else {
        alert('Please fill out the required field.');
    }
    
    
         
 

}