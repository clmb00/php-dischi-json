const { createApp } = Vue;

createApp({
  data(){
    return{
      apiUrl: 'server.php',
      records: [],
      recordOpen: {
        title: 'none',
        author: 'none'
      },
      showMoreInfo: false 
    }
  },
  methods:{
    callApi(){
      axios.get(this.apiUrl)
       .then((result)=>{
        console.log(result.data);
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
      const data = new FormData();
      data.append('toggleActive', index);

      axios.post(this.apiUrl, data)
       .then((singles)=>{
        console.log(singles.data);
        this.recordOpen = singles.data;
       })
       .catch((error)=>{
        console.log(error.code);
       })
    }
  },
  mounted(){
    this.callApi();
  }
}).mount('#App');