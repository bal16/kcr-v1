//?? EVENT HANDLER
document.addEventListener("alpine:init", () => {
  Alpine.data("listMenu", () => ({
    all: [],
    list: [],
    oldList: null,
    category: null,
    searchInput: "",
    handleFilter(category = 1) {
      this.category = category;
      this.list = this.all;
      this.list = this.list.filter(item => item.category_id == category);
      this.oldList = this.list;
    },
    handleSearch(value) {
      if (value && !value == "" && value.length > 0) {
        this.list = this.all;
        this.list = this.list.filter(item => item.name.toLowerCase().includes(value.toLowerCase()) || item.price.includes(value));
      } else 
        this.list = this.oldList;
      }
    ,
    async fetchMenus() {
      try {
        const response = await fetch("/menu/all");
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        const datas = await response.json();

        this.all = datas;
      } catch (error) {
        console.error("Error fetching menus:", error);
      }
    },
    async init() {
      await this.fetchMenus();
      this.handleFilter();
    }
  }));
  Alpine.store("cart", {
    list: [],
    count: 0,
    total: 0,
    cust: "",
    add(item) {
      const foundItem = this.list.find(data => data.id === item.id);
      this.list.length;
      if (!foundItem) {
        item.qty = 1;
        item.subtotal = item.price;
        this.list.push(item);
        this.total = parseInt(this.total) + parseInt(item.subtotal);
        this.count++;
      } else {
        foundItem.qty++;
        foundItem.subtotal = foundItem.price * foundItem.qty;
        this.total = parseInt(this.total) + parseInt(foundItem.price); // Tambahkan harga item ke total
      }
    },
    remove(item, all = false) {
      const foundItem = this.list.find(data => data.id === item.id);
      if ((foundItem && foundItem.qty == 1) || (foundItem && all == true)) {
        this.total -= foundItem.price * foundItem.qty;
        this.list = this.list.filter(data => data.id !== item.id);
        this.count--;
      } else if (foundItem && foundItem.qty > 1) {
        foundItem.qty--;
        foundItem.subtotal = foundItem.price * foundItem.qty;
        this.total -= foundItem.price;
      }
    },
    clear() {
      this.list = [];
      this.total = 0;
      this.count = 0;
      this.cust = "";
    },
    async checkOut() {
      try {
        await fetch("/home/checkout/", {
          method: "POST",
          body: JSON.stringify({list: this.list, total: this.total, cust: this.cust}),
          headers: {
            "Content-type": "application/json; charset=UTF-8"
          }
        }).then(response => response.json()).then(json => console.log(json));
        await this.clear();
        handleToast("The Request Created Successfully", "success");
      } catch (error) {
        handleToast("The Request is Failed", "danger");
      }
    }
  });
  });
  
opened = false;
document.addEventListener("keydown", function (event) {
  const searchInput = document.getElementById("searchInput");
  if (event.ctrlKey && event.key === "/") {
    searchInput.focus();
    event.preventDefault();
  }
  if (event.ctrlKey && event.shiftKey && event.key === "S") {
    // console.log("ctrl shift s");
    if (opened==false){
      $("#cartModal").modal("show");
      opened = true;
    }else{
      $("#cartModal").modal("hide");
      opened = false;
    }
    // $("#cartModal").modal("hide");
    // const cartModal = document.getElementById("cartModal");
    // cartModal.modal("show");
    event.preventDefault();
  }
});

const previewImage = () => {
  const image = document.getElementById("image");
  const imgPreview = document.getElementById("imgPreview");

  imgPreview.style.display = "block";

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);
  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
};
// searchInput.addEventListener('keydown', (event)=>{if (event.key == 13) {$store.cart.checkOut();event.preventDefault();}})

document.addEventListener("shown.bs.modal", () => {
  document.getElementById("custInput").focus();
});

//?? UTIL
const toRupiah = price => {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0
  }).format(price);
};
