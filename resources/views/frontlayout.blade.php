<!DOCTYPE HTML>
<html lang="en-US">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="content-language" content="en">
    <title>{{ $web_details->name }}</title>

    <meta name="keywords" content="পুথিপ্রকাশ, Puthiprokash,website, blog, publication, book shop">
    <meta name="author" content="forhadlabs.com">
    <meta name="publisher" content="puthiprokash">
    <meta name="copyright" content="puthiprokash">
    <meta name="description" content="ক'জন উদ্যমী লেখক ও চিত্রশিল্পীর হাত ধরে  শুরু পুথিপ্রকাশের পথ চলা। প্রথম থেকেই শিক্ষার্থী ও সাধারণ পাঠকদের জন্য মানসম্পন্ন বই রচনায় মনোনিবেশ করে পুথিপ্রকাশ। পান্ডুলিপিকে বইয়ের পর্যায়ে উন্নীত করার লক্ষ্যে বিভিন্ন ধাপের গবেষণাসম কাজগুলো সূক্ষ্মভাবে সম্পন্ন করতে পুথিপ্রকাশ গ্রহণ করে  "ধীরে চলো নীতি"। আমাদের কাছে বইপ্রকাশের অন্যতম প্রধান উদ্দেশ্য হলো- পাঠককে তার আত্মস্থ জ্ঞানমূলের খোঁজ পেতে উৎসাহ দেওয়া।">
    <meta name="page-topic" content="book shop">
    <meta name="page-type" content="shop">
    <meta name="audience" content="Everyone">
    <meta name="robots" content="index, follow">

    <meta name="title" content="{{ $web_details->name }}" />
    {{-- <meta name="description" content="{{ $web_details->short_description }}" /> --}}
    {{-- <meta name="keywords" content="{{ $web_details->slug }}" /> --}}

    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $web_details->name }}" />
    {{-- <meta property="og:description" content="{{ $web_details->short_description }}" /> --}}
    <meta property="og:image" content="{{ $web_details->fiture }}" />
    <meta property="og:image:width" content="1200px" />
    <meta name="brand_name" content="পুথিপ্রকাশ" />

    <meta property="fb:app_id" content="863998424666012"/>

    <meta name="google-site-verification" content="e_K5IV1WLsrjyRpbQ0eqbIZChu0riqsnqzRP74YyQLM" />




    <meta name="csrf-token" content="{{ csrf_token() }}" />



<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.jpg') }}" />


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="{{ asset('css/TiroBangla.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/styles/styles.css?var=1.0.7') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/responsive.css?var=1.0.2') }}">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v6.4.0/css/pro.min.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset('css/app.css?ver=1.0.1') }}">




<meta name="csrf-token"             ="{{ csrf_token() }}" />
	{{-- <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet"> --}}

    <!-- Add SmoothScrollbar CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/smooth-scrollbar/dist/smooth-scrollbar.css"> --}}

    <!-- Your other CSS links -->


<style>




*{
    --defaultColor: #F15C46;
    --defaultBg: #AEBFC9;
    user-select: none;
}

.defaultColor{
    color: var(--defaultColor);
}
.defaultBg{
    background-color: var(--defaultBg);
}

.defaultColor2{
    color: var(--defaultBg);
}
.defaultBg2{
    background-color: var(--defaultColor);
}

ol#carousel-1___BV_indicators_ li {
    background: white;
    margin: 3px 5px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
}ol#carousel-1___BV_indicators_ li.active {
    background: #F05D41;
}

li.page-item a {
    color: var(--defaultColor) !important;
}

li.page-item.active a {
    background: var(--defaultColor);
    color: white !important;
    border: var(--defaultColor);
}

</style>
<style>
    /* Preloader styles */
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
    }

/* Center the loader */


.loader {
    background-image: url(/assets/image/logo-animation.gif);
    /* border: 14px solid #f3f3f3; */
    /* border-top: 14px solid #F15C46; */
    /* border-radius: 50%; */
    width: 200px;
    height: 200px;
    /* animation: spin 2s linear infinite; */
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

div#overlay-circular {
    z-index: 999999999 !important;
}

             /* Style for content animation */
             .content {
            transition: transform 0.5s ease;
            overflow-y: auto; /* Enable vertical scrolling */
            height: 100%; /* Ensure content fills the container */
        }

.card-body.iframeContainer iframe {
    width: 100% !important;
    height: 100% !important;
}
#app {
  width: 100%;
  height: 100vh;
  overflow: scroll;
}
  </style>

</head>

<body style="font-family: 'Tiro Bangla', serif !important;" >

    <div class="preloader" id="preloader">
        <div class="loader"></div>
  </div>

    <div id="app">


        @php
        if(Auth::user()){

            $users = Auth::user();
        }else{
            $users = json_encode([]);
        }

        $web_details = json_encode($web_details);
       @endphp




     <component :is="$route.meta.layout || 'div'"  :user="{{$users}}"  :categories="{{$categories}}"  :sliders="{{$sliders}}" :settings="{{$settings}}" :web_details="{{$web_details}}"  >
        <router-view />
    </component>


    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>




<script src="{{ asset('js/frontend.js?ver=1.1.28') }}" async ></script>







<script>


if ("{{ Auth::user() }}") {
    const storeToken = localStorage.getItem('token');


    if(!storeToken){

        let data = {'_token': "{{ csrf_token() }}"};
        fetch("/logout", {
        method: "POST",
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
        }).then(res => {

        });


    }


}else{
    // User.loggedOut()



		localStorage.removeItem('token')
		localStorage.removeItem('user')
		// localStorage.removeItem('userid')
		localStorage.removeItem('role')
		localStorage.removeItem('position')




}

</script>



{{--


<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js"></script>
<script  type="text/javascript">
    var firebaseConfig = {
    apiKey: "AIzaSyD_k0gk3nJNbiZm3xF4wSD1nMIT5jBDzDE",
    authDomain: "webpush2-cc9ed.firebaseapp.com",
    projectId: "webpush2-cc9ed",
    storageBucket: "webpush2-cc9ed.appspot.com",
    messagingSenderId: "16480631991",
    appId: "1:16480631991:web:db0e4adbad0ce8e475e132",
    measurementId: "G-DS86HSG4Y5"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging=firebase.messaging();

    function IntitalizeFireBaseMessaging() {
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification Permission");

                return messaging.getToken();
            })
            .then(function (token) {
                console.log("Token : "+token);


			var myHeaders = new Headers();
			var requestOptions = {
			  method: 'GET',
			  headers: myHeaders,
			  redirect: 'follow'
			};
            // console.log(window.location.origin)
            var orgin = window.location.origin;
			fetch(orgin+"/api/set/notification?key="+token, requestOptions)
			  .then(response => response.text())
			  .then(result => console.log(result))
			  .catch(error => console.log('error', error));


               // document.getElementById("token").innerHTML=token;
            })
            .catch(function (reason) {
                console.log(reason);
            });
    }

    messaging.onMessage(function (payload) {
        console.log(payload);
        const notificationOption={
            body:payload.notification.body,
            icon:payload.notification.icon
        };

        if(Notification.permission==="granted"){
            var notification=new Notification(payload.notification.title,notificationOption);

            notification.onclick=function (ev) {
                ev.preventDefault();
                window.open(payload.notification.click_action,'_blank');
                notification.close();
            }
        }

    });
    messaging.onTokenRefresh(function () {
        messaging.getToken()
            .then(function (newtoken) {
                console.log("New Token : "+ newtoken);
            })
            .catch(function (reason) {
                console.log(reason);
				//alert(reason);
            })
    })
    IntitalizeFireBaseMessaging();
</script>
 --}}


<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "111380527893647");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>

setTimeout(() => {

    window.fbAsyncInit = function() {
        FB.init({
      xfbml            : true,
      version          : 'v17.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
}, 3000);

    document.addEventListener("contextmenu", (e) => {
    e.preventDefault();
    });



    </script>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FB1NM172LT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FB1NM172LT');
</script>


    <!-- Add SmoothScrollbar JS -->
    <script src="https://cdn.jsdelivr.net/npm/smooth-scrollbar" defer></script>
    <!-- Initialize SmoothScrollbar after document loaded -->
    <script>

      </script>



</body>
</html>
