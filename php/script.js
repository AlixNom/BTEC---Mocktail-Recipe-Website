const container = document.createElement(".container");
const optionsContainer = document.createElement(".options-container");

const country = "uk";
const topic = "mocktail";

let requestURL;

const generateUI = (articles) => {
    for(let items of articles){
        let card = document.createElement("div");
        card.classList.add("news-card");
        card.innerHTML = `<div class = "news-image-container">
        <img scr="${item.urlToImage || "./newspaper.jpg"}" alt="" ></div>`
    }
};
const init =  () => {
    optionsContainer.innerHTML = "";
    getNews();
    createOptions();

};

window.onload=() => {
    requestURL = `https://newsapi.org/v2/top-headlines?country=${country}&category=${topic}&apiKey=${apiKey}`;
    init();
}
