<section class="h-100 w-100 bg-oren position-absolute" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4 d-xl-grid d-none" style="grid-template-rows: 0.01fr 1fr; ">
                <a class="btn btn-primary btn-sm" href="/" style="width:3rem;">&laquo; Back</a>
                <!-- <div class="w-100">
                </div> -->
                <div class="w-100 h-100 mt-3" >
                    <img  class="w-100 h-100 text-center rounded-3 object-fit-cover" id="imgPreview" src="/assets/img/menus/<?= $data['menu']['image'] ?>">
                </div>    
              </div>
            </div>
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">    
                <div class="text-secondary">
                <h1 class="mb-3">
                    Edit <?= $data ['menu']['name']  ?> 
                </h1>
                    <form action="/menu/update/<?= $data['menu']['id'] ?>" method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="name" value="<?= $data ['menu']['name'] ?>" required autofocus>
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="price" placeholder="price" value="<?= $data ['menu']['price'] ?>" required autofocus>
                            <label for="price">Price</label>
                        </div>
                        <div class="mb-3">
                          <input class="form-control" type="hidden" name="oldImage" value="<?= $data ['menu']['image'] ?>">
                          <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                        </div>
                        <select class="form-select mb-3" name="category">
                          <option>No category chosen</option>
                          <option value="1" <?= ($data['menu']['category_id']=="1")?"selected":"" ?> >Foods</option>
                          <option value="2" <?= ($data['menu']['category_id']=="2")?"selected":"" ?> >Beverages</option>
                          <option value="3" <?= ($data['menu']['category_id']=="3")?"selected":"" ?> >Extras</option>
                        </select>
                        <div class="form-floating mb-3">
                          <textarea class="form-control" name="description" placeholder="Description"><?= $data['menu']['description']  ?></textarea>
                          <label for="description">Description</label>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary mt-3 mb-5 w-100">Edit</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
