//per fare la ricerca nella pagine store.php ho usato Vuejs, un framework javascript
//reattivo, cioe' quando la variabile definita in data cambia il framework aggiorna
//l'intero componente


//creo il componente Vue e gli assegno il nome card-article, nel mio codice html se uso il tag <card-article> </card-article>
//uso questo componente
Vue.component('card-article', {
    //il template definisce come viene renderizzato il componente ed e' composto da codice HTML con l'aggiunta che
    //posso usare delle variabili al suo interno tramite {{ variable }}
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
        <div class="details"
             v-html="'<h3>Nome prodotto: '+ prodname+'</h3>'+'<p>'+description+'</p>'+'<p>Costo:'+price+'</p>'"
             style="background-color: white;   
             width: 60%; height: 60%;
             position: absolute; top:0; 
             bottom: 0; left: 0; right: 0; 
             margin: auto; border-radius: 25px;
             border: 5px solid #4381e5;">
        </div>
      </div>

      </div>`,


    data() {
        return {
            showdetails: false
        }
    },
    //queste variabili le definisco nel'HTML in store.php e vengono usate dal template
    props: {
        prodname: String,
        price: Number,
        imglink: String,
        description: String
    },
    //definisco i metodi
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
    el: '#app',     //elemento di aggancio
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
            //eseguo una chiamata ajax usando jquery con il metodo post
            $.ajax(
                'search.php',
                {
                    success: (data) => {    //quando ricevo risposta e non si e' verificato nessun errore
                        // console.log(data)
                        if (data !== 'not_found') {
                            this.articles = JSON.parse(data);           //cambio la variabile articles e il componente vue
                                                                        //grazie alla sua rattivita' si aggiorna mostrando
                                                                        //le nuove informazioni
                        }
                        // console.log(this.articles)
                    },
                    error: function () {                                //in caso da errore
                        //da errore se la ricerca non trova risultati ma
                        //non e' da tenere conto
                    },
                    method: "POST",                                     //definisco il metodo POST per ajax
                    data: {search: this.inputstring}                    //invio l'oggetto tramite post
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




