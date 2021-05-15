let articles = [
    {product_name: 'RTX 3071', price: 400, brand: 'ciao', category: 'ciao2', articleCard: ''},
    {product_name: 'RTX 3072', price: 401, brand: 'ciao', category: 'ciao2', articleCard: ''},
    {product_name: 'RTX 3073', price: 402, brand: 'ciao', category: 'ciao2', articleCard: ''},
];


Vue.component('card-article', {
    template: `
      <div class="col">
      <div class="card shadow-sm">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
             preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{ prodname }}</title>
          <image href="https://images-na.ssl-images-amazon.com/images/I/51F79GDGXGL._AC_SL1000_.jpg"
                 height="100%" width="100%"></image>
        </svg>

        <div class="card-body">
          <p class="card-text">{{ prodname }}</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-outline-secondary">Dettagli</button>

            </div>
            <button type="button" class="price btn btn-warning">
              {{ price }} €
            </button>
          </div>
        </div>
      </div>
      </div>`,
    props: {
        prodname: String,
        price: Number,
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
                        this.articles = JSON.parse(data);
                    },
                    error: function () {
                        console.log('error');
                    },
                    method: "POST",
                    data: this.inputstring
                }
            );
        }
    },
    mounted() {
        this.search_articles()
    },
    computed: {
        get_articles() {
            return this.articles
        }
    },
});




