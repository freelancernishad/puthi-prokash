<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="content-language" content="en">
  <meta name="keywords" content="website, blog, foo, bar">
  <meta name="author" content="John Doe">
  <meta name="publisher" content="John Doe">
  <meta name="copyright" content="John Doe">
  <meta name="description" content="This short description describes my website.">
  <meta name="page-topic" content="Media">
  <meta name="page-type" content="Blogging">
  <meta name="audience" content="Everyone">
  <meta name="robots" content="index, follow">

  <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>Welcome to PuthiProkash</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/image/only_Logo.png') }}" />


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla:ital@0;1&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/styles/styles.css?var=1.0.6') }}">
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
</style>


</head>

<body style="font-family: 'Tiro Bangla', serif !important;">


    <div id="app">

        @php
        if(Auth::user()){

            $users = Auth::user();
        }else{
            $users = json_encode([]);
        }

       @endphp


        <component :is="$route.meta.layout || 'div'"  :user="{{$users}}"  :categories="{{$categories}}"  :sliders="{{$sliders}}" :settings="{{$settings}}"  >
            <router-view />
          </component>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>





    <script src="{{ asset('js/frontend.js?ver=1.0.87') }}" async ></script>

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
		localStorage.removeItem('userid')
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
  chatbox.setAttribute("page_id", "115295298247240");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
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

    document.addEventListener("contextmenu", (e) => {
    e.preventDefault();
    });

    </script>



</body>
</html>
