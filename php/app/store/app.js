function search_articles(str) {
    if(str.length == 0){
        document.getElementById('articles-container').innerHTML = '';
    } else {
        let request = new XMLHttpRequest();

        request.onreadystatechange = function (){
            if(request.readyState === 4 && request.status === 200){
                let response = request.response;

            }
        }

        //invio la richiesta alla pagin php
        str = str.toLowerCase();
        request.open('GET', 'search.php?'+str, true);
        request.send();
    }
}