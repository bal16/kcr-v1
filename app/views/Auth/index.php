<section class="h-100 w-100 bg-oren position-absolute" x-data="{open:true, seen:false}">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6" x-show="!open" x-transition:enter.duration.1000ms >
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-secondary">
                  <h1 class="mb-3">
                    Registration Form
                  </h1>
                  <form action="/auth/register" method="POST">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="name" placeholder="name" required>
                      <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="username" placeholder="username" required>
                      <label for="username">Username</label>
                    </div>
                    <div class="d-grid w-full gap-3" style="grid-template-columns: 1fr 1fr 0.1fr;">
                      <div class="form-floating mb-3 w-full flex-grow">
                        <input :type="seen==false ? 'password' : 'text'" class="form-control" name="password" placeholder="password" required>
                        <label for="password">Password</label>
                      </div>
                      <div class="form-floating mb-3 w-full">
                        <input :type="seen==false ? 'password' : 'text'" class="form-control" name="password1" placeholder="password" required>
                        <label for="password">Confirmation</label>
                      </div>
                      <div class="mb-3">
                        <label for="showpass" class="btn btn-light h-100 border-1 border-light-subtle text-center pt-3">
                          <i class="bi my-2" :class="seen==false ? 'bi-eye' : 'bi-eye-slash'" ></i>
                        </label>
                        <input type="checkbox" class="d-none" id="showpass" @change="seen = !seen">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary mt-3 mb-5 w-100" id="registerBtn">Register</button>
                  </form>
                  <p>Already have an account? <button x-on:click="open =!open" class="border-0 bg-transparent text-decoration-underline p-0">Login now!</button></p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4 d-xl-flex d-none">
                <div class="w-100 h-100">
                  <img src="/assets/img/pexels-maria-orlova-4913468.jpg" class="w-100 h-100 text-center rounded-3 object-fit-cover">
                </div>
              </div>
            </div>
            <div class="col-lg-6" x-show="open" x-transition:enter.duration.1000ms>
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-secondary">
                  <h1 class="mb-3">
                    Login Form
                  </h1>
                  <form action="/auth/login" method="post">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="username" placeholder="username" required autofocus>
                      <label for="username">Username</label>
                    </div>
                    <!-- <div class="form-floating mb-3">
                      <input type="password" class="form-control" name="password" placeholder="password" required>
                      <label for="password">Password</label>
                    </div> -->
                    <div class="d-grid w-full gap-3" style="grid-template-columns: 1fr 0.1fr;">
                      <div class="form-floating mb-3 w-full flex-grow">
                        <input :type="seen==false ? 'password' : 'text'" class="form-control" name="password" placeholder="password" required>
                        <label for="password">Password</label>
                      </div>
                      <div class="mb-3">
                        <label for="showpass" class="btn btn-light h-100 border-1 border-light-subtle text-center pt-3">
                          <i class="bi my-2" :class="seen==false ? 'bi-eye' : 'bi-eye-slash'" ></i>
                        </label>
                        <input type="checkbox" class="d-none" id="showpass" @change="seen = !seen">
                      </div>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="stay" id="staylogin">
                      <label class="form-check-label" for="staylogin">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary mt-3 mb-5 w-100" id="loginBtn">Login</button>
                  </form>
                  <p class="mt-auto mb-0">Don't have an account? <button x-on:click="open =!open" class="border-0 bg-transparent text-decoration-underline p-0">Register now!</button></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>