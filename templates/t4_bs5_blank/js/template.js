jQuery(document).ready(function() {
    jQuery(document).on("scroll", onScroll);
    onepageNavLinks = jQuery('.onepage .t4-navbar .nav-link');

    jQuery("#t4-about-careers-image .t4-section-inner").removeClass("container");

    function onScroll(event){
        var scrollPos = jQuery(document).scrollTop();
        onepageNavLinks.each(function () {
            var currLink = jQuery(this);
            var refElement = jQuery(currLink.attr("href"));
            if (refElement.position().top <= scrollPos /* && refElement.position().top + refElement.height() > scrollPos*/ ) {
                onepageNavLinks.removeClass("active");
                currLink.addClass("active");
            }
            else{
                currLink.removeClass("active");
            }
        });
    }
    jQuery(".clean-energy-item").click(function(){
      jQuery(this).siblings(".clean-energy-item").removeClass("active");
      jQuery(this).addClass("active");
    })

    //about image team member
    $('.cardImg').hover(
        function() {
          $(this).find('.image-hover').fadeOut(500);
          $(this).find('.description').fadeIn(500);
      },
      function() {
          $(this).find('.description').fadeOut(500);
          $(this).find('.image-hover').fadeIn(500);
      }
    );
    //about carousel section
    let items = document.querySelectorAll('.carousel .carousel-item')

    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i=1; i<minPerSlide; i++) {
            if (!next) {
                // wrap carousel by using first child
              next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
        }
    })

    
     
    

    function wrapInnerDivs(className, wrapperClassName) {
        var elements = document.getElementsByClassName(className);

        for (var i = 0; i < elements.length; i++) {
            var wrapperDiv = document.createElement('div');
            wrapperDiv.className = wrapperClassName;

            // Move the inner divs into the wrapper div
            while (elements[i].firstChild) {
                wrapperDiv.appendChild(elements[i].firstChild);
            }

            // Append the wrapper div under the original div
            elements[i].appendChild(wrapperDiv);
        }
    }

    // Call the function with the desired class names
    wrapInnerDivs('contain-sidebar-panel', 'contain-sidebar-panel-inner');

})

if (typeof Virtuemart === "undefined")
  var Virtuemart = {};

jQuery(window).on('load', () => {
  const $ = jQuery;

  $(document).off("updateVirtueMartCartModule", "body", Virtuemart.customUpdateVirtueMartCartModule);

  Virtuemart.customUpdateVirtueMartCartModule = function (el, options) {
    var base = this;
    base.el = $(".vmCartModule");
    base.options = $.extend({}, Virtuemart.customUpdateVirtueMartCartModule.defaults, options);

    base.init = function () {
      $.ajaxSetup({ cache: false })
      $.getJSON(Virtuemart.vmSiteurl + "index.php?option=com_virtuemart&nosef=1&view=cart&task=viewJS&format=json" + Virtuemart.vmLang,
        function (datas, textStatus) {
          base.el.each(function (index, module) {
            if (datas.totalProduct > 0) {
              $(module).find(".vm_cart_products").html("");
              $.each(datas.products, function (key, val) {
                //$("#hiddencontainer .vmcontainer").clone().appendTo(".vmcontainer .vm_cart_products");
                $(module).find(".hiddencontainer .vmcontainer .product_row").clone().appendTo($(module).find(".vm_cart_products"));
                $.each(val, function (key, val) {
                  $(module).find(".vm_cart_products ." + key).last().html(val);
                });
              });
            }
            $(module).find(".show_cart").html(datas.cart_show);
            $(module).find(".total_products").html(datas.totalProduct);
            $(module).find(".total").html(datas.billTotal);
          });
        }
      );
    };
    base.init();
  };
  // Definition Of Defaults
  Virtuemart.customUpdateVirtueMartCartModule.defaults = {
    name1: 'value1'
  };

  $(document).on("updateVirtueMartCartModule", "body", Virtuemart.customUpdateVirtueMartCartModule);


  
});


function jsAdvanceSearchResultsNotice(click) {
  document.getElementById("notice").style.display = 'none';
}
