<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/2048px-Spotify_logo_without_text.svg.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
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
    <header>
      <div class="logo">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/2048px-Spotify_logo_without_text.svg.png" alt="Logo">
      </div>
      <p>Lorem</p>
    </header>
    <main>
      <div class="container record_wrapper">
        <div class="record" v-for="(record, index) in records" :key="index" @click="clickRecord(index)">
          <div class="record_inside">
            <div class="record_info">
              <h3>{{record.title}}</h3>
            </div>
            <div class="record_img">
              <img :src="record.poster" :alt="record.title">
            </div>
            <div class="record_info">
              <h5>{{record.author}}</h5>
              <h4>{{record.year}}</h4>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div class="moreinfo" v-show="showMoreInfo">
      <h1>{{recordOpen.title}}</h1>
      <div class="record_inside">
        <div class="record_img">
          <img :src="recordOpen.poster" :alt="recordOpen.title">
        </div>
      </div>
      <h4>{{recordOpen.author}}</h4>
      <h3>{{recordOpen.year}}</h3>
      <h3>{{recordOpen.genre}}</h3>
      <div class="exit_button" @click="showMoreInfo = false">
        &#x2717;
      </div>
    </div>
  </div>

  <script src="main.js"></script>  
</body>
</html>