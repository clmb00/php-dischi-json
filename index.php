<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Css -->
  <link rel="stylesheet" href="style.css">
  <!-- Axios -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.0/axios.js' integrity='sha512-nNH8gXanGmEPnnK9/yhI3ETaIrujVVJ7dstiVIwMtcfbcj1zzTlnH5whbsYhg6ihg5mFe1xNkPPLwCwwvSAUdQ==' crossorigin='anonymous'></script>
  <!-- Vue -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <title>PHP Dischi JSON</title>
</head>
<body>

  <div id="App">
    <div class="container">
      <ul>
        <li v-for="(record, index) in records" :key="index">{{record.title}}</li>
      </ul>
    </div>
  </div>

  <script src="main.js"></script>  
</body>
</html>