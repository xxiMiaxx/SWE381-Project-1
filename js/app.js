$("#bookRequest").submit(function(e) {
  e.preventDefault();
});

function bookrequest(){

  var bookname= $("[name=BookName]").val();
  var authorname= $("[name=AuthorName]").val();
  var publisher= $("[name=Publisher]").val();
  var edition= $("[name=Edition]").val();
  var category= $('#cat').find(":selected").text();
// after the form is submitted ?
$("#request-panel").toggle("form");
// sending to the admin requests as a table
var requests = new Array();
    requests.push([bookname, authorname, publisher, edition, category]);
    // requests.push([1, "John Hammond", "United States"]);
    // requests.push([2, "Mudassar Khan", "India"]);
    // requests.push([3, "Suzanne Mathews", "France"]);
    // requests.push([4, "Robert Schidner", "Russia"]);

    //Create a HTML Table element.
    var table = document.createElement("TABLE");
    table.border = "1";

    //Get the count of columns.
    var columnCount = requests[0].length;

    //Add the header row.
    var row = table.insertRow(-1);
    for (var i = 0; i < columnCount; i++) {
        var headerCell = document.createElement("TH");
        headerCell.innerHTML = requests[0][i];
        row.appendChild(headerCell);
    }

    //Add the data rows.
    for (var i = 1; i < requests.length; i++) {
        row = table.insertRow(-1);
        for (var j = 0; j < columnCount; j++) {
            var cell = row.insertCell(-1);
            cell.innerHTML = requests[i][j];
        }
    }

    var userRequests = document.getElementById("userRequests");
    userRequests.innerHTML = "";
    userRequests.appendChild(table);
}



/*------- Smooth Scroll -------*/

$('a[href^="#"]').on('click', function(event) {

    var target = $( $(this).attr('href') );

    if( target.length ) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top
        }, 1000);
    }

});



/**
 * Swiper 3.4.0
 * Most modern mobile touch slider and framework with hardware accelerated transitions
 *
 * http://www.idangero.us/swiper/
 *
 * Copyright 2016, Vladimir Kharlampidi
 * The iDangero.us
 * http://www.idangero.us/
 *
 * Licensed under MIT
 *
 * Released on: October 16, 2016
 */

//# sourceMappingURL=maps/swiper.min.js.map

/*------- Swiper Slider -------*/
       var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        centeredSlides: true,
        autoplay: 3500,
           speed: 1500,
           loop: true,
        autoplayDisableOnInteraction: false
    });






    /* ========================================================================
 * ScrollPos-Styler v0.6
 * https://github.com/acch/scrollpos-styler
 * ========================================================================
 * Copyright 2015 Achim Christ
 * Licensed under MIT (https://github.com/acch/scrollpos-styler/blob/master/LICENSE)
 * ======================================================================== */

// JSHint directives
/* exported ScrollPosStyler */

var ScrollPosStyler = (function(document, window) {
  "use strict";

  /* ====================
   * private variables
   * ==================== */
  var scrollPosY = 0,
      busy = false,
      onTop = true,

      // toggle style / class when scrolling below this position (in px)
      scrollOffsetY = 1,

      // choose elements to apply style / class to
      elements = document.getElementsByClassName("sps");


  /* ====================
   * private funcion to check scroll position
   * ==================== */
  function onScroll() {
    // ensure that events don't stack
    if (!busy) {
      // get current scroll position from window
      scrollPosY = window.pageYOffset;

      // if we were above, and are now below scroll position...
      if (onTop && scrollPosY > scrollOffsetY) {
        // suspend accepting scroll events
        busy = true;

        // remember that we are below scroll position
        onTop = false;

        // asynchronuously add style / class to elements
        window.requestAnimationFrame(belowScrollPos);

      // if we were below, and are now above scroll position...
      } else if (!onTop && scrollPosY <= scrollOffsetY) {
        // suspend accepting scroll events
        busy = true;

        // remember that we are above scroll position
        onTop = true;

        // asynchronuously add style / class to elements
        window.requestAnimationFrame(aboveScrollPos);
      }
    }
  }


  /* ====================
   * private function to style elements when above scroll position
   * ==================== */
  function aboveScrollPos() {
    // iterate over elements
    // for (var elem of elements) {
    for (var i = 0; elements[i]; ++i) { // chrome workaround
      // add style / class to element
      elements[i].classList.add("sps--abv");
      elements[i].classList.remove("sps--blw");
    }

    // resume accepting scroll events
    busy = false;
  }

  /* ====================
   * private function to style elements when below scroll position
   * ==================== */
  function belowScrollPos() {
    // iterate over elements
    // for (var elem of elements) {
    for (var i = 0; elements[i]; ++i) { // chrome workaround
      // add style / class to element
      elements[i].classList.add("sps--blw");
      elements[i].classList.remove("sps--abv");
    }

    // resume accepting scroll events
    busy = false;
  }


  /* ====================
   * public function to initially style elements based on scroll position
   * ==================== */
  var pub = {
    init: function() {
      // suspend accepting scroll events
      busy = true;

      // get current scroll position from window
      scrollPosY = window.pageYOffset;

      // if we are below scroll position...
      if (scrollPosY > scrollOffsetY) {
        // remember that we are below scroll position
        onTop = false;

        // asynchronuously add style / class to elements
        window.requestAnimationFrame(belowScrollPos);

      // if we are above scroll position...
      } else { // (scrollPosY <= scrollOffsetY)
        // remember that we are above scroll position
        onTop = true;

        // asynchronuously add style / class to elements
        window.requestAnimationFrame(aboveScrollPos);
      }
    }
  };


  /* ====================
   * main initialization
   * ==================== */
  // add initial style / class to elements when DOM is ready
  document.addEventListener("DOMContentLoaded", function() {
    // defer initialization to allow browser to restore scroll position
    window.setTimeout(pub.init, 1);
  });

  // register for window scroll events
  window.addEventListener("scroll", onScroll);


  return pub;
})(document, window);
