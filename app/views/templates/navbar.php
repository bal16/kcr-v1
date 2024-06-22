<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Kantin <span class="text-custom">Citra Rasa</span></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Filter</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><button x-on:click="list = all" class="dropdown-item" >All Products</button></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><button x-on:click="handleFilter(1)"  class="dropdown-item" >Makanan</button></li>
                        <li><button  x-on:click="handleFilter(2)" class="dropdown-item">Minuman</button></li>
                        <li><button x-on:click="handleFilter(3)"  class="dropdown-item">Ekstra</button></li>
                    </ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item " >Hello, <?= $data['username'] ?></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="/profile/edit/124231412">Edit Profile</a></li>
                        <li>
                            <!-- <form action="/auth/logout" method="post"> -->
                                <button onclick="handleLogOut()" class="dropdown-item">
                                    Logout
                                </button>
                            <!-- </form> -->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="d-flex ms-auto me-2">
            <button class="btn btn-outline" type="button" data-bs-toggle="modal" data-bs-target="#cartModal">
                <i class="bi-cart-fill me-1"></i>
                <span class="badge badge-sm bg-dark text-white ms-1 rounded-pill position-relative" style="right:1rem; top:-0.5rem; margin-right: -1.5rem;" x-show="$store.cart.count" x-text="$store.cart.count" ></span>
            </button>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>

    </div>
</nav>