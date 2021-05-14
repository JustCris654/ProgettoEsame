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

//ajax usando jquery
function search_articles() {
    $.ajax(
        'search.php',
        {
            success: function (data) {
                let json_parsed = JSON.parse(data);
                console.log(json_parsed);
                console.log(data)
                fill_div(data)
            },
            error: function () {
                console.log('error');
            }
        }
    );
}

function fill_div(data) {
    let articles_div = document.getElementById('articles-container');
    articles_div.innerHTML = '';
    let articles = JSON.parse(data);
    for (let i = 0; i < articles.length; i++) {
        articles_div.innerHTML += articles[i].articleCard;
    }
}