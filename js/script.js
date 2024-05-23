const { createApp } = Vue;

createApp({
    data() {
        return {
            message: "hello",
            albumData: [],
        }
    }, methods: {
        
    }, created() {
        axios
        .get("http://localhost/boolean/php-dischi-json/server.php")
        .then((resp) =>{
            // console.log(resp);
            this.albumData = resp.data.results;
            console.log(this.albumData);
        })
    },
}).mount('#app');