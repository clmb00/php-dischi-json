const { createApp } = Vue;

createApp({
  data(){
    return{
      prova: 'ok?'
    }
  },
  mounted(){
    console.log(this.prova)
  }
}).mount('#App');