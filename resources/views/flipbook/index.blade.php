
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Basic HTML Template</title>

    <style>

html,
body {
  background-color: #efefef;
  height: 100%;
  margin: 0;
  overflow: hidden;
}

.wrapper {
  align-items: center;
  display: flex;
  /* height: 50%; */
  justify-content: center;
  /* margin: 5%; */
  width: 100%;
}

.aspect {
  /* padding-bottom: 70%; */
  position: relative;
  width: 100%;
}

.aspect-inner {
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
}

.flipbook {
  height: 100%;
  transition: margin-left 0.25s ease-out;
  width: 100%;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.flipbook .page {
  height: 100%;
  width: 100%;
}

.flipbook .page img {
  max-width: 100%;
  height: 100%;
}
div#flipbook {
    margin: 0 auto !important;
}


div#fbToolBar {
  display: flex;
    justify-content: space-between;
    position: fixed;
    width: 97%;
    bottom: 0;
    padding: 13px 20px;
}

.buttonBar.left {
    display: flex;
    align-items: center;
}

.pageBar {
    display: flex;
    align-items: center;
}

.buttonBar.right {
    display: flex;
    align-items: center;
}


    </style>

    </head>
    <body>


      <header>
        <img src="https://panjeree.com/ebook/class-four-4/files/mobile-ext/appLogoIcon.png" width="200px" alt="">
      </header>


        <div class="wrapper">
            <div class="aspect">
              <div class="aspect-inner">
                <div class="flipbook" id="flipbook" style="margin: 0 auto !important">
                  <div class="page"><img src="https://raw.github.com/blasten/turn.js/master/demos/magazine/pages/01.jpg" draggable="false" alt="" /></div>
                  <div class="page"><img src="https://raw.github.com/blasten/turn.js/master/demos/magazine/pages/02.jpg" draggable="false" alt="" /></div>
                  <div class="page"><img src="https://raw.github.com/blasten/turn.js/master/demos/magazine/pages/03.jpg" draggable="false" alt="" /></div>
                  <div class="page"><img src="https://raw.github.com/blasten/turn.js/master/demos/magazine/pages/04.jpg" draggable="false" alt="" /></div>
                  <div class="page"><img src="https://raw.github.com/blasten/turn.js/master/demos/magazine/pages/05.jpg" draggable="false" alt="" /></div>
                  <div class="page"><img src="https://raw.github.com/blasten/turn.js/master/demos/magazine/pages/06.jpg" draggable="false" alt="" /></div>
                </div>
              </div>
            </div>
          </div>



          <div id="fbToolBar" class="fbToolBar" style="background-color: rgb(255, 255, 255); transform: translate3d(0px, 0px, 0px);">
            <div class="buttonBar left" >
                <div class="button left" title="Home"  id="firstpage" style="cursor: pointer;">
                    <img
                        style="pointer-events: none;"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAAXNSR0IArs4c6QAAAHlJREFUSEvt1dsKgCAQBNDx/z+6EFpQ28ussFGQTz2sh3EQayharcjFK+DjOh0VhhoC0FGZHb/NJhlYg0I8gj3AxT04TLVUNNViwQwqkDqrwRnUxFd4B1XxR6voCTLJ6Y5/eLrf3+w48w+4XdvoEcrg1FuxDcrGssQnCrAeF82smX4AAAAASUVORK5CYII="
                    />

                </div>
                <div class="button left" title="zoom" id="zoompage" style="cursor: pointer; background-color: transparent;">
                    <img
                        style="pointer-events: none;"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAAXNSR0IArs4c6QAAASBJREFUSEvV1L0uBWEQxvHfSYgboBBciY9bUKBAIQoNCo2rkJOQoFGIhoKKO/BxJ4KEO1CQkXeTPee862yxG/F2m8z+Z+aZZ6ajpddpietPwHPYwTwm8I4HnOBxWKe5ikdwhO0EusMLJrGISHiKPXxWJciBz7CGDdxkflzGBS6xVRc8m9pcqYAWnIBfp+qfcvD+iqOKmaRrOf6LgUGH3s9YrQN+QxcHfcE58H7SeaoOOADrSb+Ij+/+V3QZczjHWB1waxVfYboNjcOjMZRhrlhKronlyS5LzsfH2Kzh49B3t66PI24Uh2nz7nGL19LmRZWxebGZlbfmtyNU3IoFjOMDkah8K3I2/GmiieuWhTcBLvzew2oKPABvEtxjkP8H/gZVwzsXFKqvdQAAAABJRU5ErkJggg=="
                    />

                </div>
                <div class="button left" title="middleMenu" style="cursor: pointer; background-color: transparent;">
                    <img
                        style="pointer-events: none;"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAAXNSR0IArs4c6QAAAFdJREFUSEtjZKARYKSRuQx0M/g/Hh/AHEGMGgwXgzRh8wWyODFqRg1GhAB6eBITfsSowRrGuBIGRamCavllNIPAQ4CuqWI0S4OTMDFFIjFq6FfQD/6cBwAQ4zAXl9lP9QAAAABJRU5ErkJggg=="
                    />

                </div>
            </div>
            <div class="pageBar" >
                <div class="pageNumber" id="tfPageIndex" style="left: 630px; top: 14px; width: 61px; display: block;">
                    <input type="text" id="currentPageIndexTextField" size="4" autofill-prediction="UNKNOWN_TYPE" style="color: rgb(0, 0, 0); text-align: center;" />
                </div>
                <div class="button" title="firstpage" id="firstpage1" style="cursor: pointer; left: 535px; background-color: transparent;">
                    <img
                        style="pointer-events: none;"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAAXNSR0IArs4c6QAAAGxJREFUSEvV1MEKACAIA1D7/48uOhQUpNvEQ13DV8msWdFqRa79D3cz9xXR/u7s3QqvEEanjsIUisI0isASGsEy6sEp9AVnhnGH4ZWKkhuvw1J4lGMZj+DZbwlHYAlHYRpnYAr//6PPTN1ROwBkPx0X8urPnQAAAABJRU5ErkJggg=="
                    />

                </div>
                <div class="button" title="pevious" id="prePage" style="cursor: pointer; left: 580px; background-color: transparent;">
                    <img
                        style="pointer-events: none;"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAAXNSR0IArs4c6QAAAGNJREFUSEvd0jEOACAIA0D4/6M1DLohbQ2D8oBLgbo1jTe59j88zLAtmVPAaPwNhSkUhWkUgSW0gmX0BF+hGRyoOrsMWStaEq+0V3jVYxmv4Egv4Qgs4ShM4wxM4SwM9/s9eAKzYA8X49tYJAAAAABJRU5ErkJggg=="
                    />

                </div>
                <div class="button" title="next" id="nextpage" style="cursor: pointer; left: 696px; background-color: transparent;">
                    <img
                        style="pointer-events: none;"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAAXNSR0IArs4c6QAAAGZJREFUSEvd08ENACAIA0DYf2gNH18gUEQTGeBSpTA1DTe59D88iGKvRL4ihCOw7NvFUdjFK/AWr8ImfgJWcQ2WxaCzvKuJs2nV6lUTm32uwNsjQeGWy3NRWVI2cQhF4HBjsonfwxNjUQ8XZQkFVgAAAABJRU5ErkJggg=="
                    />

                </div>
                <div class="button" title="lastpage" id="lastpage" style="cursor: pointer; left: 741px; background-color: transparent;">
                    <img
                        style="pointer-events: none;"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAAXNSR0IArs4c6QAAAGtJREFUSEvd1EEKACAIBED7/6OLDoWFSuLupa7CWLbVhLQayZW/4S4SnvCoZ0cR4SV43rWHl2EPh8AWDoNvHAprPIRnsbJ2yrJxs5qunUJHoTEYfOcZAluPpAxTXh7lr6D+bs8ZR+TYbEaDBwQDHRdsi2UGAAAAAElFTkSuQmCC"
                    />

                </div>
            </div>
            <div class="buttonBar right" >

                <div class="button right" title="auto play" id="autoPlay" style="cursor: pointer; background-color: transparent;">
                    <img
                        style="pointer-events: none;"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAAXNSR0IArs4c6QAAAHJJREFUSEvVlDkOACAIBOX/j9ZQUKAgEcTDUsO4LAeUpANJ3HIMXJ0ZDAL7CwSvZkExLPYq2MrCrZh81ywKgRGqKQ+DsWEk+LvgFCvQhrTiaUPp9tia8vtgS6H0PvT56sKZfTpdQjQEHtWsc3YqZmL+AzfGizUX2WhiUQAAAABJRU5ErkJggg=="
                    />

                </div>
                <div class="button right" title="menu" style="cursor: pointer; background-color: transparent;">
                    <img
                        style="pointer-events: none;"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAAXNSR0IArs4c6QAAAFpJREFUSEtjZKARYKSRuQzDw+D/SMED8hEyn1DIwUMAW1CADIIZSHZQ4TIY5jKqupiQd4mSJ9urhEynq8GjqYJQdJAmT9fII81pOFTTNeeNlhVUiTO4ITRLbgBYIBIXn/upHQAAAABJRU5ErkJggg=="
                    />

                </div>
            </div>
        </div>





          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
          <script src="https://rkei0.csb.app/turn.min.js"></script>
    <script>

    $(document).ready(function() {
  var currentPage = 1;
  var totalPages = $('#flipbook .page').length;
  var flipping = false;
  var way = 1;
  var someCondition = 0;







  $( "#autoPlay" ).click(function() {
    var way = 1;

  // Start the interval
  const intervalId = setInterval(autoPaly, 5000); // Execute myFunction every 1000 milliseconds (1 second)


      function autoPaly() {
        if (way==1) {
          $("#flipbook").turn("next");

          if ($("#flipbook").turn("page")== $("#flipbook").turn("pages")) {
            way = 2;
            $("#flipbook").turn("options", {turnCorners: "tl,tr"});
          }
        } else {
          $("#flipbook").turn("previous");

          if ($("#flipbook").turn("page")==1) {
            way = 1;
            $("#flipbook").turn("options", {turnCorners: "bl,br"});
          }
        }

        if (someCondition) {
            clearInterval(intervalId); // Clear the interval
          }
      };
  });








  $( "#firstpage" ).click(function() {
    flipToPage(1);
  });

  $( "#firstpage1" ).click(function() {
    flipToPage(1);
  });
  $( "#prePage" ).click(function() {
    $("#flipbook").turn("previous");
  });

  $( "#nextpage" ).click(function() {
    $("#flipbook").turn("next");
  });

var zoomValue = 1;

  $( "#zoompage" ).click(function() {
    zoomValue+=0.5;
    $("#flipbook").turn("zoom", zoomValue);
  });


  $( "#lastpage" ).click(function() {
    flipToPage(totalPages);
  });






  function flipToPage(pageNumber) {
    if (pageNumber < 1 || pageNumber > totalPages || flipping) {
      return;
    }

    flipping = true;

    currentPage = pageNumber;
    $('#flipbook').turn('page', currentPage);





    // Change the route based on the page number
    var newRoute = '/books?page=' + currentPage;
    history.pushState(null, null, newRoute);

    flipping = false;
  }

  $('#flipbook').turn({
    direction:'ltr',
    width:400,
    height:300,
    pages:totalPages,
    // turnCorners: 'bl,br || tl,tr',



  });







   // Define pages with specific turn corners
   var pagesWithCustomTurnCorners = {
    2: 'tl,tr', // Page 2 with top-left and top-right corners
    4: 'bl,br'  // Page 4 with bottom-left and bottom-right corners
  };

  $('#flipbook').bind('turning', function(event, page, view) {

    flipToPage(page);
  });




  // Handle browser back/forward buttons
  window.onload = function(event) {
    // Extract the page number from the current

    var currentPageFromRoute = parseInt(location.href.split('page=').pop(), 10);
    if (!isNaN(currentPageFromRoute)) {
      flipToPage(currentPageFromRoute);
    }
  };







});

    </script>


    </body>
    </html>
