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
      <form action="index.php">
        <select name="selectGenre" id="select_genre" @change="filterRecords($event)">
          <option value="null" hidden disabled selected>Select Genre</option>
          <option value="Pop">Pop</option>
          <option value="Rock">Rock</option>
          <option value="Metal">Metal</option>
          <option value="Jazz">Jazz</option>
          <option value="">All</option>
        </select>
      </form>
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

        <div class="record" @click="showFormNew = true">
          <div class="record_inside">
            <div class="record_info">
              <h3>New</h3>
            </div>
            <div class="record_img">
              <img src="./img/new-record.png" alt="+">
            </div>
            <div class="record_info">
              <h5>Add a new record</h5>
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
      <button class="delete_record" @click.stop="deleteRecord(recordOpen.title)">Delete Record</button>
    </div>

    <div class="moreinfo" v-show="showFormNew">
      <form action="index.php">
        <h1>Add a New Record</h1>
        <label for="newTitle">Title: </label>
        <input type="text" name="newTitle" id="newTitle" v-model="newRecord.title" placeholder="Insert the title...">
        <label for="newAuthor">Author: </label>
        <input type="text" name="newAuthor" id="newAuthor" v-model="newRecord.author" placeholder="Insert the author...">
        <label for="newYear">Year: </label>
        <input type="text" name="newYear" id="newYear" v-model="newRecord.year" placeholder="Insert the year...">
        <label for="newGenre">Genre: </label>
        <select name="newGenre" v-model="newRecord.genre" id="newGenre">
          <option value="null" hidden disabled selected>Select Genre</option>
          <option value="Pop">Pop</option>
          <option value="Rock">Rock</option>
          <option value="Metal">Metal</option>
          <option value="Jazz">Jazz</option>
        </select>
        <label for="newUrl">Image: </label>
        <input type="text" name="newUrl" id="newUrl" v-model="newRecord.poster" placeholder="Insert a url">
      </form>
      <button @click="callNewRecord(); showFormNew = false">Add</button>
      <div class="exit_button" @click="showFormNew = false">
        &#x2717;
      </div>
    </div>

  </div>

  <script src="main.js"></script>  
</body>
</html>