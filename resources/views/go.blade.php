
<head>
    <meta name="robots" content="noindex, nofollow" />
</head>
<style>
    div.container {
    margin: 0 auto;
    text-align: center;
    margin-top: 50px;
    width: 500px;
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 30px;
    display: inline-block;
}
img.loader {
    display: block;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    margin-top: 0px;
    margin-bottom: 30px;
}
user agent stylesheet
img {
    overflow-clip-margin: content-box;
    overflow: clip;
}
img.logo {
    display: block;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px;
    width: 7rem;
    height: auto;
}
</style>

<div style="display: flex; justify-content: center">
<div class="container">
    <img class="loader" src="{{asset('assets/images/loader.gif')}}" alt="Loading...">
    We are now passing you on securly to <br>{{$provider->name}} website <img src="{{asset('assets/'.$product->thumbnail_retailer)}}" border="0" alt="{{$provider->name}}" class="logo">
    <span style="font-size: 16px; font-weight: normal;">
    By using their simple &amp; secure online checkout today<br>
    you'll make the best possible savings.
    </span>
    </div>
</div>
<script>

window.onload = function() {
    setTimeout(function() {
        window.location.href = "{{$product->basket_url}}"; // Replace with your desired URL
    }, 2000);
};

</script>