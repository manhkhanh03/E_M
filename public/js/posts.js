const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
import { mess } from "./main.js";

function listTopicPost() {
    let url;
    if ($('#categories'))
        url = `http://127.0.0.1:8000/api/post/theme_type/${$('#categories').getAttribute('data-cate-id')}`
    else url = 'http://127.0.0.1:8000/api/post/hot_0'

    fetch(url)
        .then(response => response.json())
        .then((posts) => {
            posts.sort(() => Math.random() - 0.5);
            const listpost = $('.list-post-topic')
            const htmls = posts.map((post, index) => {
                if (index <= 7)
                    return `
                    <li class="topic-item">
                        <img src="${post.image}" alt="">
                        <div class="information-post-right">
                            <h3>${post.title}</h3>
                            <div class="info-author">
                                <div class="author">
                                    <img src="${post.author[0].url}" alt="" class="img-author">
                                    <p class="name-author">
                                       ${post.author[0].name}
                                    </p>
                                    <p class="date-time">${post.created_at}</p>
                                    <div class="contact-author">
                                        <img src="${post.author[0].url}" alt="">
                                        <p class="name-author">${post.author[0].name}</p>
                                        <button class="mess-author" data-receiver-id="${post.user_id}">Nhắn tin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                `
            })
            listpost.innerHTML = htmls.join('')
            mess()
        })
}

function postHost() {
    fetch('http://127.0.0.1:8000/api/post/hot')
        .then(response => response.json())
        .then(data => {
            let htmls = `
            <div class="post-1" data-article-id="${data[0].id}">
                <a href="http://127.0.0.1:8000/articles/${data[0].id}">
                    <img src="${data[0].image}" alt="">
                    <h3>${data[0].title}</h3>
                    <p>${data[0].subheadline}</p>
                    <div class="info-author">
                        <div class="author">
                            <img src="${data[0].author[0].url}" alt="" class="img-author">
                            <p class="name-author">
                                ${data[0].author[0].name}
                            </p>
                            <p class="date-time">${(new Date(data[0].created_at)).toLocaleString()}</p>
                            <div class="contact-author">
                                <img src="${data[0].author[0].url}" alt="">
                                <p class="name-author"> ${data[0].author[0].name}</p>
                                <button class="mess-author" data-receiver-id="${data[0].author_id}">Nhắn tin</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="post-2">`
            htmls += data.map((value, index) => {
                if (value.hot == 2 && index <= 3) {
                    return `
                        <a href="http://127.0.0.1:8000/articles/${value.id}">
                            <div class="box-post-2" data-article-id="${value.id}">
                                <img src="${value.image}" alt="">
                                <h5>${value.title}</h5>
                                <p>${value.subheadline}</p>
                                <div class="info-author">
                                    <div class="author">
                                        <img src="${value.author[0].url}" alt="" class="img-author">
                                        <p class="name-author">
                                            ${value.author[0].name}
                                        </p>
                                        <p class="date-time">${(new Date(value.created_at)).toLocaleString()}</p>
                                        <div class="contact-author">
                                            <img src="${value.author[0].url}" alt="">
                                            <p class="name-author">${value.author[0].name}</p>
                                            <button class="mess-author" data-receiver-id="${value.author_id}">Nhắn tin</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    `
                }
            }).join('')
            htmls += `</div><div class="poster">
                    <img src="/img/blob.jpg" alt="">
                </div>`
            $('.post-host').innerHTML = htmls
            mess()
        })
}

function listPost() {
    fetch('http://127.0.0.1:8000/api/post/hot_0')
        .then(response => response.json())
        .then(posts => {
            const boxListPost = $('.list-posts')
            console.log(posts)
            let htmls = posts.map(post => `
            <a href="http://127.0.0.1:8000/articles/${post.id}">
                <li class="post-item" data-theme-type="${post.categorie_id}" data-article-id="${post.id}">
                    <div class="post-item-div">
                        <img class="img-post" src="${post.image}" alt="">
                        <div class="information-post">
                            <h3>${post.title}</h3>
                            <p>${post.subheadline}</p>
                            <div class="info-author">
                                <div class="author">
                                    <img src="${post.author[0].url}" alt="" class="img-author">
                                    <p class="name-author">
                                        ${post.author[0].name}
                                    </p>
                                    <p class="date-time">${(new Date(post.created_at)).toLocaleString()}</p>
                                    <div class="contact-author">
                                        <img src="${post.author[0].url}" alt="">
                                        <p class="name-author">${post.author[0].name}</p>
                                        <button class="mess-author" data-receiver-id="${post.user_id}">Nhắn tin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </a>
            `)

            boxListPost.innerHTML = htmls.join('')
        })
        .then(() => {
            setBtnlistPost()
            mess()
        })
}

function setBtnlistPost() {
    const btnList = $$('.fun-item')
    const postItem = $$('.post-item')
    postItem.forEach((element, index) => {
        if (element.getAttribute('data-theme-type') === btnList[0].getAttribute('data-theme-type')) {
            element.classList.add('active_list_post')
        }
    })
    btnList.forEach((e) => {
        e.onclick = () => {
            postItem.forEach((element, index) => {
                if (element.getAttribute('data-theme-type') === e.getAttribute('data-theme-type')) {
                    element.classList.add('active_list_post')
                } else element.classList.remove('active_list_post')
                $('.fun-item.active').classList.remove('active')
                e.classList.add('active')
            });

        }
    })

}

function start() {
    postHost()
    listPost()
    listTopicPost()
}

start()