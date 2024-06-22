<!-- !! Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="cartModalLabel">Shopping cart</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div x-show="$store.cart.count">
                    <div class="table-responsive">
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Item</th>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-center">Qty</th>
                                    <th scope="col"></th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(item, index) in $store.cart.list" :key="index">
                                    <tr>
                                        <th scope="row" x-text="index+1"></th>
                                        <td x-text="item.name"></td>
                                        <td>
                                            <button class="btn btn-sm bg-transparent d-inline" @click="$store.cart.remove(item)">
                                                <i class="bi bi-dash-lg"></i>
                                            </button>
                                        </td>
                                        <td class="text-center" x-text="item.qty"></td>
                                        <td>
                                            <button class="btn btn-sm bg-transparent d-inline" @click="$store.cart.add(item)">
                                                <i class="bi bi-plus-lg"></i>
                                            </button>
                                        </td>
                                        <td x-text="toRupiah(item.subtotal)"></td>
                                        <td>
                                            <button class="btn btn-sm bg-transparent d-inline" @click="$store.cart.remove(item, true)">
                                                <i class="bi bi-trash2-fill text-danger"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    <td colspan="4"> <br>
                        <div
                            class="rounded-2 p-3 border-1 bg-light text-dark d-flex justify-content-between align-items-center">
                            <p class="text-left" style="margin-right: auto;  margin-top: auto; margin-bottom: auto;">
                                <strong>Total</strong>
                            </p>
                            <p class="text-right" style="margin-left: auto;  margin-top: auto; margin-bottom: auto;">
                                <strong x-text="toRupiah($store.cart.total)"></strong>
                            </p><br>
                        </div>
                    </td>
                </div>
                <div x-show="!$store.cart.count" class="my-5 pt-3 pb-5">
                    <center>The cart list is empty. Please select a menu</center>
                </div>

            </div>
            <div class="modal-footer " x-show="$store.cart.count">
                <!-- <input type="text" class="rounded px-3 py-2" style="width: 77%;"/> -->
                <div class="input-group">
                    <div class="form-floating ">
                        <input type="name" class="form-control" id="custInput" placeholder="Cust. Identity" x-model="$store.cart.cust">
                        <label for="name">Cust. Idntity</label>
                    </div>
                    <button type="button" class="btn  input-group-text bg-oren btn-secondary border-0" @click="$store.cart.checkOut()">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="text-center" >
<div class="mt-3 mx-auto input-group w-25">
    <button class="btn border" type="submit">
        <i class="bi bi-search"></i>
    </button>
    <input class="form-control"  id="searchInput" x-model="searchInput" @keyup.debounce="handleSearch($event.target.value)" placeholder="Search (ctrl+'/')" type="text" aria-label="Search" >
</div>
<div class="">
<div class="fixed-bottom d-md-flex d-none flex-column flex-shrink-0 bg-body-teritary text-light" style="width: 4.5rem; ">
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
        <li class="nav-item" x-data="{checked:false}">
            <button x-on:click="list = all; checked = !checked;" class="nav-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="All Menus">
                <i class="bi bi-list" x-show="checked==false"></i>
                <i class="bi bi-list-nested" x-show="checked==true" ></i>
                <span class="visually-hidden">Icon-only</span>
            </button>
        </li>    
      <li class="nav-item">
        <button x-on:click="handleFilter(1)" class="nav-link py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Home" data-bs-original-title="Foods" :class="category==1?'active':''">
          <i class="bi bi-egg-fried"></i>
        </button>
      </li>
      <li>
        <button x-on:click="handleFilter(2)" class="nav-link py-3 border-bottom rounded-0" :class="category==2?'active':''" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Dashboard" data-bs-original-title="Beverages" >
          <i class="bi bi-cup-hot-fill"></i>
        </button>
      </li>
      <li>
        <button x-on:click="handleFilter(3)" class="nav-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" :class="category==3?'active':''"data-bs-placement="right" aria-label="Orders" data-bs-original-title="Extras">
          <i class="bi bi-bag-plus-fill"></i>
        </button>
      </li>
      <li class="dropdown border-top">
        <button class="nav-link py-3 border-bottom rounded-0" data-bs-toggle="dropdown" aria-expanded="false">
          <!-- <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle"> -->
          <i class="bi bi-person-circle"></i>
        </button>
        <ul class="dropdown-menu text-small shadow">
          <li><a class="dropdown-item" href="/menu/create">New menu...</a></li>
          <li><a class="dropdown-item" href="/dashboard">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
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
    <div class="position-relative container py-5 px-4 px-lg-5 mt-5" >
        <div 
            class="row gx-4 gx-lg-5 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 row-cols-xxl-4 justify-content-center min-vh-100">
        <template x-for="(menu,index) in list" :key="index">
            <div class="col mb-5">
                <div class="card h-full pb-5">
                    <!-- Product image-->
                    <template x-if="menu.image && menu.image!=''">
                    <img class="card-img-top" :src="`/assets/img/menus/${menu.image}`"
                        :alt="`image-${menu.name}`" />
                    </template>
                    <template x-if="menu.image==''||!menu.image">
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" :alt="`image-${menu.name}`" />
                    </template>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder" x-text="menu.name"></h5>
                            <!-- Product price-->
                            <span x-text="toRupiah(menu.price)"></span>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex gap-2">
                        <!-- <a href="/cart/add" class="btn btn-outline-dark mt-auto ms-auto">Add to -->
                        <button
                            x-on:click="$store.cart.add(menu)"
                            href="/cart/add" class="btn btn-outline-dark mt-auto ms-auto">Add to
                            Cart</button>
                        <div class="dropdown mt-3 me-auto">
                            <button class="btn btn-light dropdown-toggle border" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-gear-fill"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" :href="`/menu/edit/${menu.id}`">Edit</a>
                                </li>
                                <!-- <li><a class="dropdown-item" :href="`/menu/destroy/${menu.id}`">Delete</a></li> -->
                                <li><button class="dropdown-item" @click="handleDelete(menu.id)">Delete</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <div class="col mb-5" x-show="!list">
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="container" x-show="!list.length" x-transition>
            The item <b x-text="searchInput"></b> is not avaible. <br> Try using
            <kbd>ctrl + /</kbd> to automatically focused to the searchbar
        </div>
        <!-- <div class="col mb-5" x-show="list.length" x-transition.:enter.delay.5000ms>
                <div class="card h-100 px-5" style="min-height:38dvh">
                    <button type="button" onclick="location.href='/menu/create'"
                        class="btn btn-light h-100 w-100 position-absolute top-50 start-50 translate-middle h-100"
                        style="height:'10rem'">
                        <h1><i class="bi bi-file-plus text-xl-center"></i></h1>
                    </button>
                </div>
            </div> -->
        </div>
    </div>
    <div>
        
    </div>
</section>
</div>
