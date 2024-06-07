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
        <img scr="${item.urlToImage || "./newspaper.jpg"}" alt="" ></div>
        <div class ="news-content">
            <div class = "news-title">
                ${item.title}
            </div>
            <div class ="news-description">
            ${item.description || item.content || ""}</div>
            <a href="${item.url}" target="_blank" class ="view-button">Read More</a>
        </div>`;
    container.appendChild(card);
    }
};
const init =  () => {
    optionsContainer.innerHTML = "";
    getNews();
    createOptions();

};

const getNews = async() => {
    container.innerHTML = "";
    let response = await fetch("requestURL");
    if(!response.ok) {
        alert("Data unavailable at the moment. Please wait!");
        return false;
    }
    let data = await response.json();
    generateUI(data.articles)
}

window.onload=() => {
    requestURL = `https://newsapi.org/v2/top-headlines?country=${country}&category=${topic}&apiKey=${apiKey}`;
    init();
}
