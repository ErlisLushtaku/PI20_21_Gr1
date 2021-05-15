<!DOCTYPE html>
<html>
  <head>
<link rel="stylesheet" href="rateus.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<title>Rate Us</title>
<link rel="shortcut icon" type="image/png" href="images/3d.png">
</head>
  <body>
    <div class="control">
      <label>Rate Us</label>
      <input id="my-score" type="text">
<button type="button" onclick="myFunction();myfunc()">Summbit</button>
<p id="p01"></p>
    </div>
    
    <!-- background track -->
    <canvas id="track" width="260" height="140"></canvas>
    <!-- gradient stroke -->
    <canvas id="stroke" width="260" height="140"></canvas>
    
    <div class="info">
      <span id="score"></span>
    </div>
    <script src="rateus.js"></script>
  </body>
</html>