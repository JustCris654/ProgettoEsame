Vue.component('card-article', {
    template: `
      <div class="col">
      <div class="card shadow-sm">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
             preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{ prodname }}</title>
          <image :href="imglink"
                 height="100%" width="100%"></image>
        </svg>

        <div class="card-body">
          <p class="card-text">{{ prodname }}</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-outline-secondary" @click="showDetails">Dettagli</button>

            </div>
            <button type="button" class="price btn btn-warning">
              {{ price }} €
            </button>
          </div>
        </div>
      </div>

      <div style="position: fixed; width: 100%; height: 100%; z-index: 100; top: 0; left: 0" v-if="showdetails"
           @click="handleClick" ref="detailsMask">
        <div class="details" v-html="prodname"
             style="background-color: red; margin: 3rem; top: 0; left: 0">
        </div>
      </div>

      </div>`,

    data() {
        return {
            showdetails: false
        }
    },
    props: {
        prodname: String,
        price: Number,
        imglink: String
    },
    methods: {
        showDetails() {
            this.showdetails = true
        },
        handleClick(evt) {
            if (evt.target === this.$refs.detailsMask) {
                this.showdetails = false;
            }
        }
    }
})


new Vue({
    el: '#app',
    data() {
        return {
            articles: {},
            inputstring: ''
        };
    },
    methods: {
        //ajax usando jquery
        //evt = event -> prende la key dall'user input
        search_articles(evt) {
            //usa post
            $.ajax(
                'search.php',
                {
                    success: (data) => {
                        // console.log(data)
                        if (data !== 'not_found') {
                            this.articles = JSON.parse(data);
                        }
                        // console.log(this.articles)
                    },
                    error: function () {
                        //da errore se la ricerca non trova risultati ma
                        //non e' da tenere conto
                    },
                    method: "POST",
                    data: {search: this.inputstring}
                }
            );
        }
    },
    mounted() {
        this.search_articles()
    },
    computed: {
        get_articles() {
            // console.log(this.articles)
            return this.articles
        }
    },
});




