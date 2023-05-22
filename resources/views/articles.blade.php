<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/categories.css">
    <link rel="stylesheet" href="/css/post.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="wst">
        <menu>
            <div class="menu-left">
                <p>Tải ứng dụng</p>
                <p>Quét mã QR</p>
            </div>
            <div class="menu-right">
                <div class="noti">
                    <i class="fa-solid fa-bell"></i>
                    <div class="box-noti">
                        <h2>Thông báo</h2>
                        <div class="info-post">
                            <!-- <img src="/img/qh.webp" alt="">
                            <div class="header">
                                <header class="header-post">Nga - Ukraine trao đổi tù binh quy mô lớn</header>
                                <p class="subtitle">Khi ông mặt trời thức dậy ....</p>
                            </div>
                        </div>
                        <div class="info-post">
                            <img src="/img/qh.webp" alt="">
                            <div class="header">
                                <header class="header-post">Nga - Ukraine trao đổi tù binh quy mô lớn</header>
                                <p class="subtitle">Khi ông mặt trời thức dậy ....</p>
                            </div>
                        </div>
                        <div class="info-post">
                            <img src="/img/qh.webp" alt="">
                            <div class="header">
                                <header class="header-post">Nga - Ukraine trao đổi tù binh quy mô lớn</header>
                                <p class="subtitle">Khi ông mặt trời thức dậy ....</p>
                            </div> -->
                        </div>
                        <div class="see-post">
                            Xem toàn bộ thông báo?
                        </div>
                    </div>
                </div>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
                <div class="box-user"></div>
            </div>
        </menu>
        <div class="logo-bn">
            <img src="/img/LACAII.png" alt="Lacai" class="logo">
            <img src="/img/A room without books is like a body without a soul..png" alt="" class="banner">
        </div>

        <nav class="nav">
            <ul class="list-nav">
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/index/index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Thế giới') }}">Thế giới</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Kinh tế') }}">Kinh tế</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Thể thao') }}">Thể thao</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Giải trí') }}">Giải trí</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Khoa học - Công nghệ') }}">KH-CN</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Văn hóa - Xã hội') }}">VH-XH</a>
                </li>
                <li class="nav-item other">
                    <p>...</p>
                    <ul class="list-other">
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/Pháp luật') }}">Pháp luật</a>
                        </li>
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/Giáo dục') }}">Giáo dục</a>
                        </li>
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/An ninh') }}">An ninh</a>
                        </li>
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/Sức khỏe') }}">Sức khỏe</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="box-search">
                <input type="text" class="input-search" id="search" placeholder="Tìm kiếm bài viết...">
            </div>
        </nav>

        <!-- Body -->

        <main>
            <p id="status" style="width: 100%; text-align: center; font-size: 26px; margin: 30px 0"></p>
            <div class="box-post" data-id-article="{{$id_article}}">
                <h1 id="categories" data-cate-id="2"></h1>
                <div class="posts">
                    <div class="post-left">
                        <div class="box-list-item">
                            {{-- <div class="info-author">
                                <div class="author">
                                    <img src="/img/gg.webp" alt="" class="img-author">
                                    <p class="name-author">
                                        Mạnh Khánh
                                    </p>
                                    <p class="date-time">20:00:00 - 16/04/2023</p>
                                    <div class="contact-author">
                                        <img src="/img/gg.webp" alt="">
                                        <p class="name-author">Mạnh Khánh</p>
                                        <button class="mess-author" data-receiver-id="${post.user_id}">Nhắn
                                            tin</button>
                                    </div>
                                </div>
                            </div>
                            <p class="subheadline">- PSG đã bất ngờ xóa án phạt treo giò nội bộ với Messi. Điều đó
                                có
                                nghĩa rằng, El Pulga có thể ra
                                sân trong trận đấu với
                                Ajaccio vào đêm nay.</p>
                            <p class="text">
                                Như đã biết, Messi đã bị treo giò nội bộ trong hai tuần sau khi tự ý tới Saudi
                                Arabia mà
                                không nhận được sự đồng ý
                                của
                                ban lãnh đạo PSG. Điều đáng nói là sau khi công khai xin lỗi, Messi đã được đội bóng
                                thành Paris cho phép tập luyện
                                một
                                mình từ thứ Hai.
                            </p>
                            <div class="box-post-img">
                                <img src="https://icdn.dantri.com.vn/thumb_w/1020/2023/05/13/messiii-1683942927314.jpeg"
                                    alt="" class="post-img">
                                <p class="post-img-text">La la la la la la la la la al</p>
                            </div>
                            <p class="text">Chưa dừng ở đó, theo báo giới Pháp, PSG đã quyết định xóa án treo giò
                                với
                                Messi. Chia sẻ trong buổi họp
                                báo trước trận
                                đấu với Ajaccio, HLV Christophe Galtier tiết lộ rằng sẽ bố trí siêu sao người
                                Argentina
                                ra sân trong đội hình xuất
                                phát.
                                <br><br>
                                HLV trưởng của PSG cho biết: "Tôi đã nói chuyện với Messi vào hôm thứ Năm. Cậu ấy
                                rất
                                quyết tâm và muốn giành một
                                danh
                                hiệu nữa với PSG. Trong trận đấu với Ajaccio, Messi sẽ ra sân trong đội hình xuất
                                phát".
                                <br><br>
                                Mặc dù mâu thuẫn trong ngắn hạn giữa Messi và PSG đã được giải quyết nhưng tương lai
                                của
                                siêu sao số 30 ở CLB thành
                                Paris vẫn là dấu hỏi lớn. Hợp đồng của Messi sẽ hết hạn vào tháng 6 năm nay nhưng
                                tới
                                thời điểm này, hai bên vẫn
                                chưa
                                đạt được thỏa thuận gia hạn.
                            </p>
                            <div class="box-post-img">
                                <img src="https://icdn.dantri.com.vn/thumb_w/1020/2023/05/13/03-1683942959129.jpg"
                                    alt="" class="post-img">
                                <p class="post-img-text">Messi đã tập luyện trong những ngày qua và sẵn sàng ra sân
                                    trong trận đấu với Ajaccio (Ảnh:
                                    Getty).</p>
                            </div>
                            <p class="text">
                                Messi cảm thấy không vui với cuộc sống ở PSG. Mặc dù đã đóng góp 20 bàn thắng và 19
                                đường kiến tạo ở mùa này nhưng
                                anh
                                vẫn bị đối xử như tội đồ. Đặc biệt, sau khi PSG bị loại khỏi Champions League, những
                                cổ
                                động viên đội bóng liên tục
                                la
                                ó, chửi rủa Messi trong các trận đấu.
                                <br><br>
                                Thời gian qua, Messi được đồn chuyển tới thi đấu ở Saudi Arabia. CLB Al Hilal sẵn
                                sàng
                                chi mức lương 400 triệu USD
                                mỗi
                                năm để mời gọi siêu sao người Argentina. Câu chuyện tương lai của El Pulga sẽ còn
                                nóng
                                bỏng trong mùa Hè tới.
                                <br><br>
                                Trước mắt, nhiệm vụ của Messi là giúp PSG giành chức vô địch Ligue 1. Hiện tại, đội
                                bóng
                                này đang dẫn đầu bảng với
                                75
                                điểm sau 34 trận, hơn Lens 3 điểm và thi đấu ít hơn một trận. Để chắc chắn vô địch,
                                PSG
                                cần giành chiến thắng trong
                                2/4
                                trận đấu cuối cùng.
                            </p> --}}
                        </div>
                        <div id="concerned">
                            <h3>Tin liên quan</h3>
                            <div style="width: 100%; height: 1px; background-color: var(--color); margin: 6px auto;">
                            </div>
                            <ul class="list-posts">
                                <li class="post-item" data-theme-type="">
                                    <div class="post-item-div">
                                        <img class="img-post" src="/img/hdbh.jpg" alt="">
                                        <div class="information-post">
                                            <h3>Động thái vô cùng bất ngờ của PSG với Messi</h3>
                                            <p>- PSG đã bất ngờ xóa án phạt treo giò nội bộ với Messi. Điều đó có nghĩa
                                                rằng, El Pulga có thể ra sân trong trận đấu với
                                                Ajaccio vào đêm nay.</p>
                                            <div class="info-author">
                                                <div class="author">
                                                    <img src="${post.user_data[0].url_user}" alt=""
                                                        class="img-author">
                                                    <p class="name-author">
                                                        ${post.user_data[0].name}
                                                    </p>
                                                    <p class="date-time">${post.created_at}</p>
                                                    <div class="contact-author">
                                                        <img src="${post.user_data[0].url_user}" alt="">
                                                        <p class="name-author">${post.user_data[0].name}</p>
                                                        <button class="mess-author"
                                                            data-receiver-id="${post.user_id}">Nhắn tin</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="post-item" data-theme-type="">
                                    <div class="post-item-div">
                                        <img class="img-post" src="/img/hdbh.jpg" alt="">
                                        <div class="information-post">
                                            <h3>Động thái vô cùng bất ngờ của PSG với Messi</h3>
                                            <p>- PSG đã bất ngờ xóa án phạt treo giò nội bộ với Messi. Điều đó có nghĩa
                                                rằng, El Pulga có thể ra sân trong trận đấu với
                                                Ajaccio vào đêm nay.</p>
                                            <div class="info-author">
                                                <div class="author">
                                                    <img src="${post.user_data[0].url_user}" alt=""
                                                        class="img-author">
                                                    <p class="name-author">
                                                        ${post.user_data[0].name}
                                                    </p>
                                                    <p class="date-time">${post.created_at}</p>
                                                    <div class="contact-author">
                                                        <img src="${post.user_data[0].url_user}" alt="">
                                                        <p class="name-author">${post.user_data[0].name}</p>
                                                        <button class="mess-author"
                                                            data-receiver-id="${post.user_id}">Nhắn tin</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="post-right">
                        <h3>Truy cập nhiều nhất</h3>
                    </div>
                </div>
                <div class="messenger">
                    <div class="box-icon-mess">
                        <i class="fa-brands fa-facebook-messenger"></i>
                        <p class="quantity-info">1</p>
                    </div>
                    <div class="box-mess" style="display: none;">
                        <!-- <div class="box-mess"> -->
                        <div class="header-mess">
                            <h3>Messenger</h3>
                        </div>
                        <div class="item-mess">
                            <div class="none">Không có tin nhắn nào</div>
                        </div>

                        <div class="privacy-dialog">
                            <div class="box-privacy-dialog"></div>
                        </div>
                    </div>
                </div>

                <div class="info-post">
                    <p>26 lượt thích</p>
                    <div class="info-post-box">
                        <p>13 bình luận</p>
                        <p>6 chia sẻ</p>
                    </div>
                </div>
                <div class="feeling">
                    <div class="feeling-box">
                        <i class="fa-regular fa-thumbs-up"></i>
                        <p>Thích</p>
                    </div>
                    <div class="feeling-box">
                        <i class="fa-regular fa-comment"></i>
                        <p>Bình luận</p>
                    </div>
                    <div class="feeling-box">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        <p>Chia sẻ</p>
                    </div>
                    <div class="feeling-box">
                        <i class="fa-solid fa-print"></i>
                        <p>In bài viết</p>
                    </div>
                </div>

                <div class="comment">
                    <div class="comment-box">
                        <div class="cm-item">
                            <img src="/img/gg.webp" alt="">
                            <div class="cm-item-info-feeling">
                                <div class="cm-item-info">
                                    <h5 class="name">Manh Khanh</h5>
                                    <p>Hay vai o</p>
                                </div>
                                <ul class="cm-item-feeling">
                                    <li>Thích</li>
                                    <li>Phản hồi</li>
                                    <li>4 giờ trước</li>
                                </ul>
                            </div>
                        </div>
                        <div class="cm-item">
                            <img src="/img/gg.webp" alt="">
                            <div class="cm-item-info-feeling">
                                <div class="cm-item-info">
                                    <h5 class="name">Manh Khanh</h5>
                                    <p>alo alo Nghe ro tra loi alo alo</p>
                                </div>
                                <ul class="cm-item-feeling">
                                    <li>Thích</li>
                                    <li>Phản hồi</li>
                                    <li>4 giờ trước</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="write-comment">
                        <img src="/img/fb.jpg" alt="">
                        <input type="text" placeholder="Nhập bình luận...">
                        <i class="fa-regular fa-paper-plane"></i>
                    </div>
                </div>
                <!-- <div style="width: 100%; height: 2px; background-color: var(--color); margin: 30px 0;"></div>
            <div style="width: 100%; height: 2px; background-color: var(--color); margin: 30px 0;"></div>
            <div style="width: 100%; height: 2px; background-color: var(--color); margin: 30px 0;"></div> -->
            </div>
        </main>

    </div>
    <!-- Footer -->
    <footer>
        <div class="box-ft">
            <div class="ft-info">
                <img src="/img/LACAI-White.png" alt="" class="ft-logo">
                <div class="box-ft-info">
                    <i class="fa-solid fa-phone"></i>
                    <span>0987654321</span>
                </div>
                <div class="box-ft-info">
                    <i class="fa-solid fa-envelope"></i>
                    <span>lacaisupport@gmail.com</span>
                </div>
                <div class="box-ft-info-mxh">
                    <div class="box-icon"><i class="fa-brands fa-facebook-f"></i></div>
                    <div class="box-icon" style="margin: 0 20px;"><i class="fa-brands fa-instagram"></i></div>
                    <div class="box-icon"><i class="fa-brands fa-twitter"></i></div>
                </div>
            </div>

            <div class="ft-info">
                <h2>LACAI Công ty một thành viên</h2>
                <p>Tổng biên tập: Mạnh Khánh</p>
                <p>Địa chỉ: No Address</p>
                <i class="fa-regular fa-copyright"></i>
                <span>Copy-Paste 2023</span>
            </div>
            <div class="ft-info">
                <h2>Về công ty</h2>
                <p>Về chúng tôi</p>
                <p>Liên hệ</p>
            </div>
        </div>
    </footer>
    <script type="module" src="/js/main.js"></script>
    <script type="module" src="/js/article.js"></script>
</body>

</html>
