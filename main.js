const { createApp } = Vue;

createApp({
  data(){
    return{
      apiUrl: 'server.php',
      records: [],
      recordOpen: {},
      newRecord: {
        "title": '',
        "author": '',
        "year": '',
        "poster": '',
        "genre": ''
      },
      showMoreInfo: false,
      showFormNew: false
    }
  },
  methods:{
    callApi(){
      axios.get(this.apiUrl)
       .then((result)=>{
        this.records = result.data;
       })
       .catch((error)=>{
        console.log(error.code);
       })
    },
    clickRecord(index){
      this.showMoreInfo = true;
      this.callSingleRecord(index);
    },
    callSingleRecord(index){
      const params = {
        toggleActive: index
      }

      axios.get(this.apiUrl,{ params })
       .then((singles)=>{
        this.recordOpen = singles.data;
       })
       .catch((error)=>{
        console.log(error.code);
       })
    },
    filterRecords(value){
      const genre = value.srcElement.value;
      const params = {
        searchGenre: genre
      }

      axios.get(this.apiUrl, { params })
       .then((result)=>{
        this.records = result.data;
       })
       .catch((error)=>{
        console.log(error.code);
       })
    },
    callNewRecord(){
      if(this.newRecord.title == '' || this.newRecord.author == '' || this.newRecord.poster == '' || this.newRecord.year == '' || this.newRecord.genre == ''){
        alert('Fill all the campi')
      } else {
        const data = this.newRecord;
  
        axios.post(this.apiUrl, data, {
          headers: {'Content-Type' : 'multipart/form-data'}
        })
         .then(result => {
          this.records = result.data;
         })
         .catch((error)=>{
          console.log(error.code);
         })
      }
    },
    deleteRecord(title){
      if(confirm("Are you sure you want to delete? The operation is irreversible")){
        const data = new FormData();
        data.append('deleteRecord', title);

        axios.post(this.apiUrl, data)
        .then((result)=>{
          this.records = result.data;
        })
        .catch((error)=>{
          console.log(error.code);
        })
        this.showMoreInfo = false;
      }
    }
  },
  mounted(){
    this.callApi();
  }
}).mount('#App');