<html><html lang="en">
    <head>
        <title>Home</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"> 

    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Image Slider Using HTML and CSS - Easy Tutorials</title>
    
    <link rel="stylesheet" href="css/home.css">
       
    <body  onload="slider()">
      <div class="banner">
   
    <div class="slider">
    
    <img src="img/minimal-plant1.jpg" id="slideImg">
    
    </div>
    
    <div class="overlay">
        <div class="navbar">

            <h1 class="section-title">GARDENEA</h1>    
        </div>  <a href=" login.php "> <button type="button"> login</button> </a>
        <button type="button"> abaut us</button></div>
    
    </div>
    <script>

        var slideImg = document.getElementById("slideImg");
        
        var images = new Array(
        
        "img/663dc3cf-d291-4e36-9dd8-55ca77fcb5e0.jpg",

        "img/6980348f-5ce2-4b65-aaa0-d1ebb675c2a3.jpg",
        
        
        
        "img/minimal-plant2.jpg",
        
       
        
        );
        
        var len  = images.length; 
        var i=0;
        function slider(){ if(i > len-1){
        
        i = 0;
        
        }
        
        slideImg.src = images[i];
        i++;

setTimeout('slider()',3000);

}

</script> </body>
    
    </html>