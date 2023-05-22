const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

function start() {
    getPost()
}

function getPost() {
    const article_id = $('.box-post').getAttribute('data-id-article')
    fetch(`http://127.0.0.1:8000/api/article/${article_id}`)
        .then(response => response.json())
        .then(data => {
            let status = data.status_article;
            $('#categories').innerHTML = data.data_article[0].data.text
            let htmls = `
                <div class="info-author">
                        <div class="author">
                            <img src="${data.data_user[0].url}"
                                alt="" class="img-author">
                            <p class="name-author">
                                ${data.data_user[0].name}
                            </p>
                            <p class="date-time">${(new Date(data.created_at)).toLocaleString()}</p>
                            <div class="contact-author">
                                <img src="${data.data_user[0].url}" alt="">
                                <p class="name-author">${data.data_user[0].name}</p>
                                <button class="mess-author" data-receiver-id="${data.data_user[0].user_id}">Nhắn tin</button>
                            </div>
                        </div>
                    </div>`

            htmls += data.data_article.map(ele => {
                if (ele.type == "subheadline" && ele.level == 2) {
                    return `<p class="subheadline">- ${ele.data.text}</p>`
                } else if (ele.type == "paragraph") {
                    return `<p class="text">${ele.data.text}</p>`
                } else if (ele.type == "image") {
                    return `<div class="box-post-img">
                                <img src="${ele.data.url}"
                                    alt="" class="post-img">
                                <p class="post-img-text">${ele.data.caption}</p>
                            </div>`
                }
            }).join('')
            $('.box-list-item').innerHTML = htmls
            return status;
        })
        .then(status => { 
            if (status === 1)
                $('#status').innerHTML = 'Bản nháp'
            else if (status === 2) 
                $('#status').innerHTML = 'Bài viết đang trong thời gian đợi kiểm duyệt <br> Vui lòng đợi!'
            else $('#status').style.display = 'none'
        })
}

start()