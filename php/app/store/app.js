// function search_articles(str) {
//     if(str.length == 0){
//         document.getElementById('articles-container').innerHTML = '';
//     } else {
//         let request = new XMLHttpRequest();
//
//         //ricevo la risposta dal server php
//         request.onreadystatechange = function (){
//             if(request.readyState === 4 && request.status === 200){
//                 let response = request.response;
//                 console.log(JSON.parse(response))
//             }
//         }
//
//         //invio la richiesta al server php
//         str = str.toLowerCase();
//         request.open('GET', 'search.php?'+str, true);
//         request.send();
//     }
// }


function fill_div(data) {
    let articles_div = document.getElementById('articles');
    // articles_div.innerHTML = '';
    json_parsed = JSON.parse(data);
    articles = json_parsed;
    console.log(articles)


    // articles_div.innerHTML = `<card-article
    //                             v-for="item in articles"
    //                             :prodname="item.productName"
    //                             :price="item.price"
    //                             :key="item.id"
    //                             >
    //                             </card-article>`;
}

let articles = [
    {product_name: 'RTX 3070', price: 400, brand: 'ciao', category: 'ciao2', articleCard: ''},
    {product_name: 'RTX 3070', price: 401, brand: 'ciao', category: 'ciao2', articleCard: ''},
    {product_name: 'RTX 3070', price: 402, brand: 'ciao', category: 'ciao2', articleCard: ''},
];

// function fill_div(data) {
//     let articles_div = document.getElementById('articles');
//     articles_div.innerHTML = '';
//     let articles = JSON.parse(data);
//     for (let i = 0; i < articles.length; i++) {
//         articles_div.innerHTML += articles[i].articleCard;
//     }
// }


Vue.component('articles-container', {
    data() {
        return {
            articles: {},
        };
    },
    methods: {
        //ajax usando jquery
        search_articles: () => {
            $.ajax(
                'search.php',
                {
                    success: (data) => {
                        // let json_parsed = JSON.parse(data);
                        // console.log(json_parsed);
                        console.log(this.articles)
                        this.articles = JSON.parse(data);
                        //console.log(this.articles)

                    },
                    error: function () {
                        console.log('error');
                    }
                }
            );
        }
    },
    mounted: () => {
        this.articles = articles;
    },
    computed: {
        get_articles: () =>{
            return this.articles
        }
    }
})


const app = Vue.createApp(ArticleCard);

app.component('card-article', {
    props: {
        prodname: String,
        price: Number,
    },
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
    mounted: () => {
        console.log('ciao')
    }
});

app.mount('#app');

