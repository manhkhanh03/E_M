const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

function start() {
    getPost()
}

function getPost() {
    const mode_id = "C4LhfHe6otoItSSaTrHh"
    fetch(`http://127.0.0.1:8000/api/archived/${mode_id}`)
        .then(response => response.json())
        .then(data => {
            $('#categories').innerHTML = data[0].header
            let html = data.map(ele => {
                if (ele.name) {
                    return `
                        <div class="info-author">
                                <div class="author">
                                    <img src="https://www.bing.com/images/search?view=detailV2&ccid=36fCycmx&id=B8462FEA5438778C8A68C9DD33E9BB9822F0DE7E&thid=OIP.36fCycmxr3gzbABn5gmJjgHaHa&mediaurl=https%3a%2f%2fstatic.vecteezy.com%2fsystem%2fresources%2fpreviews%2f000%2f404%2f984%2foriginal%2fmodern-company-logo-design-vector.jpg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.dfa7c2c9c9b1af78336c0067e609898e%3frik%3dft7wIpi76TPdyQ%26pid%3dImgRaw%26r%3d0&exph=2084&expw=2084&q=logo&simid=608050228648815104&FORM=IRPRST&ck=6AA71B27ED88417E62C56718D798B111&selectedIndex=8"
                                        alt="" class="img-author">
                                    <p class="name-author">
                                        ${ele.name}
                                    </p>
                                    <p class="date-time">20:00:00 - 16/04/2023</p>
                                    <div class="contact-author">
                                        <img src="https://www.bing.com/images/search?view=detailV2&ccid=36fCycmx&id=B8462FEA5438778C8A68C9DD33E9BB9822F0DE7E&thid=OIP.36fCycmxr3gzbABn5gmJjgHaHa&mediaurl=https%3a%2f%2fstatic.vecteezy.com%2fsystem%2fresources%2fpreviews%2f000%2f404%2f984%2foriginal%2fmodern-company-logo-design-vector.jpg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.dfa7c2c9c9b1af78336c0067e609898e%3frik%3dft7wIpi76TPdyQ%26pid%3dImgRaw%26r%3d0&exph=2084&expw=2084&q=logo&simid=608050228648815104&FORM=IRPRST&ck=6AA71B27ED88417E62C56718D798B111&selectedIndex=8" alt="">
                                        <p class="name-author">${ele.name}</p>
                                        <button class="mess-author" data-receiver-id="${ele.user_id}">Nhắn tin</button>
                                    </div>
                                </div>
                            </div>`
                } else if (ele.type == "subheadline") {
                    return `<p class="subheadline">- ${ele.subheadline}</p>`
                } else if (ele.type == "paragraph") {
                    return `<p class="text">${ele.content}</p>`
                } else if (ele.type == "image") { 
                    return `<div class="box-post-img">
                                <img src="${ele.url}"
                                    alt="" class="post-img">
                                <p class="post-img-text">${ele.caption}</p>
                            </div>`
                }
            })
            $('.box-list-item').innerHTML = html.join('')
        })
}

start()