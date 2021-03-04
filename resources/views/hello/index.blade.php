<html>
<head>
   <title>Hello/Index</title>
   <style>
   body {font-size:16pt; color:#999; }
   h1 { font-size:50pt; text-align:right; color:#f6f6f6;
       margin:-20px 0px -30px 0px; letter-spacing:-4pt; }
   </style>
</head>
<body>
   <h1>Blade/Index</h1>
   
@if ($msg != '')
    <p>こんにちは {{$msg}} さん</p>
    
@else
    名前を書いてください。

@endif

 <form method="POST" action="/hello">
    @csrf 
    <input type="text" name="input">
    <input type="submit">
 </form>
 
</body>
</html>