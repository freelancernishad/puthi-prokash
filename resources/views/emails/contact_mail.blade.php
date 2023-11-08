<html>
<head>
    <title>Custom Email</title>
</head>
<body>

    @php
        $contact_info = json_decode($contact_detials);
    @endphp

    <h1>Hello, {{ $contact_info->name }}</h1>

    <p><b> Subject : {{ $contact_info->subject }}</b></p>

    <p>{{ $contact_info->message }}</p>

    <p>Contact : {{ $contact_info->contact }}</p>
</body>
</html>
