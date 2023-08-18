
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Basic HTML Template</title>
    <link href="https://kit-pro.fontawesome.com/releases/v6.4.0/css/pro.min.css" rel="stylesheet">
    <style>

html,
body {
  background-color: #efefef;
  height: 100%;
  margin: 0;
  overflow: hidden;
  user-select: none;
}

header{
    display: flex;
    align-items: center;
    grid-gap: 14px;
    padding: 11px 20px;
    justify-content: space-between;
}
.headerLeft{
    display: flex;
    align-items: center;
    grid-gap: 14px;
    padding: 0 20px;
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
  position: relative;
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
.middleBooksMenu {
    position: absolute;
    height: 200px;
    background: #bdbdbd;
    padding: 14px 11px;
    width: -webkit-fill-available;
    top: 41%;
    z-index: 99999;
}

.swiper-slide {
    display: flex !important;
    align-items: center !important;
    padding: 0 27px;
}

.swiper-slide.active {
    border: 2px solid red;

}
.displayNone{
  display: none;
}
.displayBlock{
  display: block;
}


.sideMenu {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    overflow: auto;
    background: #dfdfdf;
    display: flex;
    flex-direction: column;
    width: 255px;
    z-index: 99;
}

div.sideMenuItem {
    border-bottom: 2px solid #cfcfcf;
    padding: 7px 12px;
    cursor: pointer;
}

.sideMenuItem.active {
    background: #706f6f59;
}



#flipbook .shadow,
#flipbook.shadow{
  -webkit-box-shadow: 0 4px 10px #666;
  -moz-box-shadow: 0 4px 10px #666;
  -ms-box-shadow: 0 4px 10px #666;
  -o-box-shadow: 0 4px 10px #666;
  box-shadow: 0 4px 10px #666;
}

#flipbook .page-wrapper{
   -webkit-perspective:2000px;
   -moz-perspective: 2000px;
   -ms-perspective: 2000px;
   perspective: 2000px;
}

.leftArrow {
  position: absolute;
    top: 50%;
    font-size: 50px;
    color: #939393bf;
    cursor: pointer;
    left: 10px;
    align-items: center;
    display: flex;
    z-index: 1;
}

.rightArrow {
  position: absolute;

    top: 50%;
    font-size: 50px;
    color: #939393bf;
    cursor: pointer;
    right: 10px;
    align-items: center;
    display: flex;
    z-index: 1;
}

.mobileNavClose,.mobileNav{
    cursor: pointer;
    padding: 6px 6px;
    font-size: 24px;
}
.mobileNav{
    display: none;
}

.mobileNavClose{
    position: absolute;
    top: 6px;
    left: 264px;
    font-size: 23px;
}
.deskFooterIcon i {
    font-size: 23px;
    margin: 0px 6px;
    padding: 6px 8px;
}




.mbFooter ul {
    list-style: none;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    padding: 0px 0px;
}

.mbFooter ul li {
    padding: 6px 7px;
    font-size: 24px;
}

.mbFooter {
    position: fixed;
    width: 100%;
    bottom: 0;
    z-index: 99999;
    background: white;
    padding: 0;
    margin: 0;
    height: 60px;
    display: none;
}

.mb2Footer {
    position: fixed;
    width: 100%;
    bottom: 61px;
    z-index: 99999;
    background: white;
    padding: 0;
    margin: 0;
    height: 60px;
    display: none;
}
.mb2Footer ul {
    list-style: none;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    padding: 0px 0px;
}

.mb2Footer ul li {
    padding: 6px 7px;
    font-size: 24px;
}

div#middleBooksMenu2 {
    position: absolute;
    top: 54px;
    left: 0;
    background: #0000009e;
    z-index: 9999999;
    padding: 40px 5px;
    overflow: scroll;
    height: 100vh;
}

.mobileMiddleMenu {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    grid-gap:20px;
}
.headerRight{
    display:none;
}
.headerRight2{
    display:block;
}




p.bookMenuList {
    position: absolute;
    left: calc(1% + 250px);
    transform: rotate(-90deg);
    margin: 0;
    padding: 7px 13px;
    top: calc(15% + 19px);
    background: #4596c5;
    color: white;
    font-size: 12px;
    cursor: pointer;
}

.searchBox:focus{
    outline: none;
}
.searchBox{
    border: 1px solid #F15C46;
    padding: 5px 5px;
    border-radius: 7px;
}



@media  (min-width: 768px){

    .page.even:after {
    content: '';
    position: absolute;
    top: 0;
    right: 0px;
    width: 8%;
    height: 100%;
    background: linear-gradient(to left,#38383852, #14141424, #ffffff00);
}

.page.odd:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 8%;
    height: 100%;
    background: linear-gradient(to right,#38383852, #14141424, #ffffff00);
}
}
@media  (max-width: 768px){
    .bookMenuList{
        display: none;
    }
    .mobileNav{
        display: block;
    }
    .mbFooter{
        display: block;
    }
    .mb2Footer.activeMenu{
      display: block;
    }
    .headerRight{
        display:block;
    }
    .headerRight2{
        display:none;
    }
#fbToolBar, .leftArrow , .rightArrow{
    display: none !important;
}
}



    </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    </head>
    <body>



      <header>

        <div class="headerLeft">
          <div class="mobileNav" onclick="sidemenuButton()"><i class="fa-solid fa-bars"></i></div>
          <img src="{{ asset($settings->header_logo) }}" width="170px" alt="">
        </div>

        <div class="headerRight">
          <span onclick="middleMenu2()"><i class="fa-sharp fa-light fa-grid-2"></i></span>
        </div>

        <div class="headerRight2">
          Search: <input type="Number" id="searchItem" class="searchBox"> <button onclick="SearchItem()">Go</button>
        </div>


      </header>

      <div class="sideMainContainer displayNone" id="sideMenu" style="z-index: 99999;">

        <div class="mobileNavClose" onclick="sidemenuButton()"><i class="fa-solid fa-xmark"></i></div>

      <div class="sideMenu" >
        @php
            $i = 1;
        @endphp
        @foreach ($flipping_books as $item)
        <div class="sideMenuItem" onclick="clicksideMenuItem('{{ $i }}')" id="sideMenuItem{{ $i }}">{{ $item->name }}</div>
        @php
            $i++;
        @endphp
        @endforeach
      </div>
      </div>

    </div>


      <div class="middleBooksMenu displayNone" id="middleBooksMenu">
        <div class="middleBooksMenufix">

          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @php
                $i2 = 1;
                @endphp
                @foreach ($flipping_books as $item)
                <div class="swiper-slide" onclick="clickMiddlebookMenu('{{ $i2 }}')" id="middlepage'{{ $i2 }}'"><img  width="100%" src="placeholder.jpg" data-src="{{ asset($item->image) }}" draggable="false" alt="" /></div>
                @php
                $i2++;
                @endphp
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
        </div>


      <div class="middleBooksMenu2 displayNone" id="middleBooksMenu2">
        <div class="middleBooksMenufix">

          <div class="mobileMiddleMenu">


                @php
                $i2 = 1;
                @endphp
                @foreach ($flipping_books as $item)
                <div class="swiper-slidess" style="width:130px" onclick="clickMiddlebookMenu('{{ $i2 }}')" id="middlepage'{{ $i2 }}'"><img  width="100%" src="placeholder.jpg" data-src="{{ asset($item->image) }}" draggable="false" alt="" /></div>
                @php
                $i2++;
                @endphp
                @endforeach

          </div>
        </div>
        </div>


        <div class="leftArrow" onclick="prePage()">
          <i class="fa-solid fa-chevron-left"></i>
        </div>

        <div class="wrapper">
            <div class="aspect">
              <div class="aspect-inner">


                  <p class="bookMenuList" id="bookMenuList" onclick="sidemenuButton()" style="display: none">সূচি পত্র</p>
                  <div class="flipbook" id="flipbook" style="margin: 0 auto !important">
                    @foreach ($flipping_books as $item)
                    <div class="page">
                      <img class="sliderimage" src="{{ asset($item->image) }}"  draggable="false" alt="" />
                    </div>
                    @endforeach
                  </div>


              </div>
            </div>
          </div>

          <div class="rightArrow"  onclick="nextPage()">
            <i class="fa-solid fa-chevron-right"></i>
          </div>



          <div id="fbToolBar" class="fbToolBar" style="background-color: rgb(255, 255, 255); transform: translate3d(0px, 0px, 0px);z-index: 99999;">
            <div class="buttonBar left" >
                <div class="button left deskFooterIcon" title="Home"  id="firstpage"  onclick="firstpage()" style="cursor: pointer;"><i class="fa-light fa-house"></i></div>

                <div class="button left deskFooterIcon" title="zoom" id="zoompage" onclick="zoompage()" style="cursor: pointer; background-color: transparent;"><i class="fa-light fa-magnifying-glass-plus"></i></div>
                <div class="button left deskFooterIcon" title="middleMenu" id="middleMenu" onclick="middleMenu()" style="cursor: pointer; background-color: transparent;"><i class="fa-sharp fa-light fa-grid-2"></i></div>
            </div>
            <div class="pageBar" >

                <div class="button deskFooterIcon" title="firstpage" id="firstpage1" onclick="firstpage()" style="cursor: pointer; left: 535px; background-color: transparent;"><i class="fa-sharp fa-light fa-arrow-left-to-line"></i></div>

                <div class="button deskFooterIcon" title="pevious" id="prePage" onclick="prePage()" style="cursor: pointer; left: 580px; background-color: transparent;"><i class="fa-thin fa-arrow-left"></i></div>


                <div class="pageNumber" id="tfPageIndex" style="width: 61px; display: block;text-align:center" >

                  {{-- <input type="text" id="currentPageIndexTextField" size="4" autofill-prediction="UNKNOWN_TYPE" style="color: rgb(0, 0, 0); text-align: center;" /> --}}
              </div>
                <div class="button deskFooterIcon" title="next" id="nextpage" onclick="nextPage()" style="cursor: pointer; left: 696px; background-color: transparent;"><i class="fa-thin fa-arrow-right"></i></div>
                <div class="button deskFooterIcon" title="lastpage" id="lastpage" onclick="lastpage()" style="cursor: pointer; left: 741px; background-color: transparent;"><i class="fa-sharp fa-light fa-arrow-right-to-line"></i></div>
            </div>
            <div class="buttonBar right" >
            <div class="button right deskFooterIcon" title="auto play" id="autoPlay" onclick="autoPlay()" style="cursor: pointer; background-color: transparent;"><i class="fa-sharp fa-light fa-circle-play"></i></div>
            <div class="button right deskFooterIcon" title="menu" id="sidemenuButton" onclick="sidemenuButton()" style="cursor: pointer; background-color: transparent;"><i class="fa-solid fa-list"></i></div>
            </div>
        </div>

        <div class="mbFooter">
            <ul>
                <li onclick="sidemenuButton()"><i class="fa-solid fa-list"></i></li>
                <li onclick="showSubmenu()"><i class="fa-thin fa-arrows-left-right-to-line"></i></li>
                <li onclick="autoPlay()"><i class="fa-light fa-stopwatch"></i></li>
                <li onclick="zoompage()"><i class="fa-light fa-magnifying-glass-plus"></i></li>
            </ul>
        </div>

        <div class="mb2Footer" id="mb2Footer">
            <ul>
                <li  onclick="firstpage()"><i class="fa-sharp fa-light fa-arrow-left-to-line"></i></</li>
                <li onclick="prePage()"><i class="fa-thin fa-arrow-left"></i></li>
                <li onclick="nextPage()"><i class="fa-thin fa-arrow-right"></i></li>
                <li onclick="lastpage()"><i class="fa-sharp fa-light fa-arrow-right-to-line"></i></li>
            </ul>
        </div>



<input type="hidden" id="MainPage" value="{{ "/books/$Books->slug/$Books->id?page=" }}">

          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
          <script src="https://rkei0.csb.app/turn.min.js"></script>

          <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


    <script>


document.addEventListener('DOMContentLoaded', function() {
    var lazyImages = [].slice.call(document.querySelectorAll('img[data-src]'));

    if ('IntersectionObserver' in window) {
      var lazyImageObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            var lazyImage = entry.target;
            lazyImage.src = lazyImage.dataset.src;
            lazyImageObserver.unobserve(lazyImage);
          }
        });
      });

      lazyImages.forEach(function(lazyImage) {
        lazyImageObserver.observe(lazyImage);
      });
    } else {
      // Fallback for browsers without Intersection Observer support
      lazyImages.forEach(function(lazyImage) {
        lazyImage.src = lazyImage.dataset.src;
      });
    }
  });


document.addEventListener('DOMContentLoaded', function() {
    var lazyImages = [].slice.call(document.querySelectorAll('img.sliderimage[data-src]'));

    if ('IntersectionObserver' in window) {
      var lazyImageObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            var lazyImage = entry.target;
            lazyImage.src = lazyImage.dataset.src;
            lazyImageObserver.unobserve(lazyImage);
          }
        });
      });

      lazyImages.forEach(function(lazyImage) {
        lazyImageObserver.observe(lazyImage);
      });
    } else {
      // Fallback for browsers without Intersection Observer support
      lazyImages.forEach(function(lazyImage) {
        lazyImage.src = lazyImage.dataset.src;
      });
    }
  });



var swiper = new Swiper(".mySwiper", {
      slidesPerView: 8,
      spaceBetween: 20,
    });
    function clicksideMenuItem(id){
      flipToPage(id)

            sidemenuButton()

    }
    function clickMiddlebookMenu(id){
      flipToPage(id)

      var windowWidth = $(window).width();
    if(windowWidth<768){
        middleMenu2()
    }else{
          middleMenu()
    }

    }
// $(document).ready(function() {
  var currentPage = 1;
  var totalPages = $('#flipbook .page').length;
  var flipping = false;
  var way = 1;
  var someCondition = 1;







    function autoPlay(){
    if(someCondition){
      someCondition = 0
    }else{
      someCondition = 1
    }


    var way = 1;

  // Start the interval
  const intervalId = setInterval(autoPaly, 4000); // Execute myFunction every 1000 milliseconds (1 second)


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
  };








  // $( "#middleMenu" ).click(function() {

    function middleMenu(){


      $("#middleBooksMenu").toggleClass("displayNone");
      $("#middleBooksMenu").toggleClass("displayBlock");
    }

    function middleMenu2(){


      $("#middleBooksMenu2").toggleClass("displayNone");
      $("#middleBooksMenu2").toggleClass("displayBlock");
    }



    // $('#middleBooksMenu').css({'dispaly':'block'});
  // });




    function showSubmenu(){
    $("#mb2Footer").toggleClass("activeMenu");
    // $("#mb2Footer").toggleClass("activeMenu");
    }


    function sidemenuButton(){
    $("#sideMenu").toggleClass("displayNone");
    $("#sideMenu").toggleClass("displayBlock");
    }


    function SearchItem(){
        var element = document.getElementById('searchItem');
        var pageNo = element.value;
        flipToPage(pageNo);
        element.value = "";

    }

    function firstpage(){
      flipToPage(1);
    }




  function prePage(){
    $("#flipbook").turn("previous");
  }
  function nextPage(){
    $("#flipbook").turn("next");
  }





var zoomValue = 1;


    function zoompage(){
    zoomValue+=0.5;
    $("#flipbook").turn("zoom", zoomValue);
  };


  function lastpage(){
    flipToPage(totalPages);
  }





  $("#flipbook").bind("start", (event, pageObject, corner)=> {
    if(corner=='tr' || corner=='tl'){
      $("#flipbook").turn("options", {turnCorners: "tl,tr"});
    }else{
      $("#flipbook").turn("options", {turnCorners: "bl,br"});

    }

      // $("#tfPageIndex").html(view[0]+'-'+view[1]+'/'+totalPages);
  });



  $("#flipbook").bind("turning", (event, page, view)=> {

    console.log(page)
    var windowWidth = $(window).width();
    if(windowWidth<768){
        $("#tfPageIndex").html(view[0]+'/'+totalPages);
      }else{
        $("#tfPageIndex").html(view[0]+'-'+view[1]+'/'+totalPages);
    }
    if(currentPage==1){
        document.getElementById('bookMenuList').style.display= `none`;

    }else{

        document.getElementById('bookMenuList').style.display= `block`;
    }

  });



  function flipToPage(pageNumber) {
    if (pageNumber < 1 || pageNumber > totalPages || flipping) {

      return;
    }




    $("#tfPageIndex").html('0-1'+'/'+totalPages);
    document.getElementById('bookMenuList').style.display= `none`;


    $(".swiper-slide").removeClass("active");
    $(".sideMenuItem").removeClass("active");

    $("#middlepage"+pageNumber).addClass("active");
    $("#sideMenuItem"+pageNumber).addClass("active");





    flipping = true;

    currentPage = pageNumber;
    $('#flipbook').turn('page', currentPage);




    var MainPage = document.getElementById('MainPage').value;
    // Change the route based on the page number
    var newRoute = MainPage + currentPage;
    history.pushState(null, null, newRoute);

    flipping = false;
  }

  $('#flipbook').turn({
        direction:'ltr',
        width:730,
        height:520,
        pages:totalPages,
        autoCenter: true,
        duration:1000,
      });



  function turnEx(){
    var windowWidth = $(window).width();

    console.log(windowWidth)

    if(windowWidth<769){

        document.getElementById('bookMenuList').style.left= `calc(1% + 27px)`;
    }else if(windowWidth<1025){
        document.getElementById('bookMenuList').style.left= `calc(1% + 86px)`;
    }else if(windowWidth<1193){
        document.getElementById('bookMenuList').style.left= `calc(1% + 170px)`;
    }else if(windowWidth<1312){
        document.getElementById('bookMenuList').style.left= `calc(1% + 228px)`;
    }else if(windowWidth<1314){
        document.getElementById('bookMenuList').style.left= `calc(1% + 228px)`;
    }else if(windowWidth<1341){
        document.getElementById('bookMenuList').style.left= `calc(1% + 242px)`;
    }else if(windowWidth<1361){
        document.getElementById('bookMenuList').style.left= `calc(1% + 250px)`;
    }else if(windowWidth<1367){
        document.getElementById('bookMenuList').style.left= `calc(1% + 228px)`;
    }else if(windowWidth<1441){
        document.getElementById('bookMenuList').style.left= `calc(1% + 290px)`;

    }else if(windowWidth<1457){
        document.getElementById('bookMenuList').style.left= `calc(1% + 300px)`;

    }else if(windowWidth<2561){
        document.getElementById('bookMenuList').style.left= `calc(1% + 840px)`;

    }




//   if(windowWidth<800){
//     $('#flipbook').turn('options', {
//       width: 700,
//       height: 500,
//       display:'double'
//     });
//   }

//   if(windowWidth<700){
//     $('#flipbook').turn('options', {
//       width: 650,
//       height: 470,
//       display:'double'
//     });
//   }

if(windowWidth<401){
      $('#flipbook').turn('options', {
        direction:'ltr',
        width: 340,
        height: 460,
        display:'single',
        pages:totalPages,
        autoCenter: true,
      });
    }else if(windowWidth<501){
      $('#flipbook').turn('options', {
        direction:'ltr',
        width: 400,
        height: 450,
        display:'single',
        pages:totalPages,
        autoCenter: true,
      });
    }else if(windowWidth<768){
      $('#flipbook').turn('options', {
        direction:'ltr',
        width: 350,
        height: 570,
        display:'single',
        pages:totalPages,
        autoCenter: true,
      });
    }else if(windowWidth<961){

      $('#flipbook').turn('options', {
        direction:'ltr',
        width: 600,
        height: 570,
        display:'double',
        pages:totalPages,
        autoCenter: true,
      });
    }



  }


  turnEx();
  window.addEventListener("resize", () => {

    turnEx();




  });






  // Add overlay to prevent click events
  var overlay = $('<div id="flipbook-overlay"></div>');
  $('#flipbook').append(overlay);


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








// });
document.addEventListener("contextmenu", (e) => {
    e.preventDefault();
    });

    </script>


    </body>
    </html>
