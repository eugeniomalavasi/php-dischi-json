const { createApp } = Vue;

createApp({
    data() {
        return {
            message: "hello",
            albumData: [],

        }
    }, methods: {
        addToFav(index) {
            const data = {
                action: "pref_flag",
                index: index,
            };
            axios
                .post("http://localhost/boolean/php-dischi-json/server.php", data, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((resp) => {
                    this.albumData = resp.data.results
                })
        },
    }, created() {
        axios
            .get("http://localhost/boolean/php-dischi-json/server.php")
            .then((resp) => {
                // console.log(resp);
                this.albumData = resp.data.results;
            })
    },
}).mount('#app');