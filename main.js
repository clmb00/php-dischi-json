const { createApp } = Vue;

createApp({
  data(){
    return{
      apiUrl: 'server.php',
      records: []
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
    }
  },
  mounted(){
    this.callApi();
  }
}).mount('#App');