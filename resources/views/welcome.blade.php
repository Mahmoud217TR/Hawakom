@extends('layouts.app')

@section('content')
<div class="container" style ="height:100vh;">
    <div class="row justify-content-center">
        <div >
            
            <h1 style = "color:white">Welcome to Hawakom</h1>
           
        </div>
    </div>
</div>
<script>
    const images = new Array("{{asset('images/tt/2.jpg')}}", "{{asset('images/tt/1.jpg')}}", "{{asset('images/tt/3.jpg')}}", "{{asset('images/tt/ig_serenity-٢٠٢١٠٥٢٩-0002.jpg')}}","{{asset('images/tt/ig_serenity-٢٠٢١٠٥٢٩-0003.jpg')}}","{{asset('images/tt/ig_serenity-٢٠٢١٠٥٢٩-0001.jpg')}}");
    var curImgId = 0;
    var numberOfImages = 6;
    document.body.style.backgroundImage = "url("+images[curImgId]+")";
    window.setInterval(function() {
        document.body.style.backgroundImage = "url("+images[curImgId]+")";
        console.log(curImgId);
        curImgId = (curImgId + 1) % numberOfImages;
    }, 3 * 1000);
    
</script>
<style>
body{
    background-size: cover;
}
</style>
@endsection