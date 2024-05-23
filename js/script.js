const { createApp } = Vue;

createApp({
    data() {
        return {
            message: "hello",
            albumData: [],
            curIndex : 0,
            prefAlbum: []
        }
    }, methods: {
        addToFav () {
            axios
            .post("http://localhost/boolean/php-dischi-json/server.php")
            .then ((resp) => {

                let favAlbum = resp.data.results[this.curIndex].preferred;
                favAlbum = !favAlbum;
                console.log(favAlbum);
                console.log(this.curIndex);

            })
        },
    }, created() {
        axios
        .get("http://localhost/boolean/php-dischi-json/server.php")
        .then((resp) =>{
            // console.log(resp);
            this.albumData = resp.data.results;
        })
    },
}).mount('#app');