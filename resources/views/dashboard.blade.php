<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MapMyReads</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    
</head>
<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <a class="navbar-brand brand-logo me-5" href="/dashboard"><img src="assets/images/newhome/image1.png" class="me-2" alt="logo" /></a>
            
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                            <span class="input-group-text" id="search">
                                <i class="icon-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="icon-bell mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                <p class="font-weight-light small-text mb-0 text-muted"> Just now </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="ti-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Settings</h6>
                                <p class="font-weight-light small-text mb-0 text-muted"> Private message </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="ti-user mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                <p class="font-weight-light small-text mb-0 text-muted"> 2 days ago </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <img src="assets/images/faces/face28.jpg" alt="profile" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="ti-settings text-primary"></i> Settings
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-power-off text-primary"></i> Logout
                        </a>
                    </div>
                </li>
                <li class="nav-item nav-settings d-none d-lg-flex">
                    <a class="nav-link" href="/login">
                        <i class="icon-ellipsis"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Book Heaven</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="kategoris">Kategori</a></li>
                            <li class="nav-item"> <a class="nav-link" href="bukus">Buku</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-checkcam" aria-expanded="false" aria-controls="ui-checkcam">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Checkcam</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-checkcam">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="photo">Snapshot</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="map">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Map Quest</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('messages.create') }}">
                        <i class="fas fa-envelope menu-icon"></i><!-- Ubah icon sesuai kebutuhan -->
                        <span class="menu-title">Messages</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('chat.index') }}">
                        <i class="fas fa-envelope menu-icon"></i><!-- Ubah icon sesuai kebutuhan -->
                        <span class="menu-title">Docs</span>
                    </a>
                </li>
                @foreach($menus as $menu)
                <li class="nav-item">
                    <a class="nav-link" href="{{ $menu->url }}">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">{{ $menu->title }}</span>
                    </a>
                </li>
                @endforeach

                <!-- Additional Menu Items -->
                @auth
                    @if (auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.add-barang') }}">
                                <i class="icon-plus menu-icon"></i>
                                <span class="menu-title">Add Barang</span>
                            </a>
                        </li>
                    {{-- @endif
                @endauth
                @auth --}}
                {{-- @if (auth()->user()->isAdmin()) --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu.create') }}">
                            <i class="icon-plus menu-icon"></i>
                            <span class="menu-title">Add Menu</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu.manajemen') }}">
                            <i class="icon-plus menu-icon"></i>
                            <span class="menu-title">Menu Manajemen</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.add-user') }}">
                            <i class="icon-plus menu-icon"></i>
                            <span class="menu-title">Add User</span>
                        </a>
                    </li>
                   
                @endif
            @endauth
            </ul>
        </nav>


        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Post a Photo</h4>
                        <form action="/post-photo" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="photo">Select Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Photo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
            
                            <div id="postedContent">
                                @foreach($posts as $post)
                                <div class="post">
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Posted Image" class="img-fluid" />
                                    <div>
                                        <form method="POST" action="{{ route('posts.like', $post->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-secondary btn-sm like-button">
                                                <i class="far fa-heart"></i> Like
                                            </button>
                                            <span class="like-count">{{ $post->likes }} Likes</span>
                                        </form>
                                    </div>
                                    <div class="comment-section">
                                        <form method="POST" action="{{ route('posts.comments', $post->id) }}">
                                            @csrf
                                            <input type="text" class="form-control comment-input" name="content" placeholder="Add a comment..." required />
                                            <button type="submit" class="btn btn-primary btn-sm add-comment">Comment</button>
                                        </form>
                                        <div class="comments">
                                            @foreach($post->comments as $comment)
                                                <div>{{ $comment->content }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
        
        </div>
        
    </div>

    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/chart.min.js"></script>
    <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
    <script src="assets/js/select.dataTables.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script>
        // JavaScript untuk menambahkan interaktivitas
        document.getElementById('postForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const fileInput = document.getElementById('photo');
            const file = fileInput.files[0];

            // Mengupload foto ke server (simulasi)
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.className = 'img-fluid';

            const postDiv = document.createElement('div');
            postDiv.className = 'post';
            postDiv.appendChild(img);

            const likeButton = document.createElement('button');
            likeButton.className = 'btn btn-outline-secondary btn-sm like-button';
            likeButton.innerHTML = '<i class="far fa-heart"></i> Like';
            postDiv.appendChild(likeButton);

            const likeCountSpan = document.createElement('span');
            likeCountSpan.className = 'like-count';
            likeCountSpan.textContent = '0 Likes';
            postDiv.appendChild(likeCountSpan);

            const commentSection = document.createElement('div');
            commentSection.className = 'comment-section';
            const commentInput = document.createElement('input');
            commentInput.className = 'form-control comment-input';
            commentInput.placeholder = 'Add a comment...';
            commentSection.appendChild(commentInput);

            const commentButton = document.createElement('button');
            commentButton.className = 'btn btn-primary btn-sm add-comment';
            commentButton.textContent = 'Comment';
            commentSection.appendChild(commentButton);

            const commentsDiv = document.createElement('div');
            commentsDiv.className = 'comments';
            commentSection.appendChild(commentsDiv);

            postDiv.appendChild(commentSection);
            document.getElementById('postedContent').prepend(postDiv);

            // Reset form
            fileInput.value = '';
        });

        // Menambahkan event listener untuk like dan komentar
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('like-button')) {
                const postDiv = e.target.closest('.post');
                const likeCount = postDiv.querySelector('.like-count');
                let count = parseInt(likeCount.textContent);
                count++;
                likeCount.textContent = count + ' Likes';
            } else if (e.target.classList.contains('add-comment')) {
                const postDiv = e.target.closest('.post');
                const commentInput = postDiv.querySelector('.comment-input');
                const commentsDiv = postDiv.querySelector('.comments');
                const newComment = document.createElement('div');
                newComment.textContent = commentInput.value;
                commentsDiv.appendChild(newComment);
                commentInput.value = '';
            }
        });
    </script>
    <!-- endinject -->
</body>
</html>
