const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

function handleToast(massage, type = 'success') {
  if (type == 'success') {
    color = "#9DC183"
  } else if (type == 'danger') {
    color = "#dc3545"
  } else if (type == 'info') {
    color = "#0d6efd"
  } else if (type == 'warning') {
    color = "#fd7e14"
  }
  return Toastify({
    text: massage,
    duration: 3000,
    close: true,
    className: "",
    gravity: "top", // `top` or `bottom`
    position: "right", // `left`, `center` or `right`
    stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
      background: color,
    },
    onClick: function() {} // Callback after click
  }).showToast();
}


function handleLogOut() {
  Swal.fire({
    title: "Are you sure?",
    text: "You want to loging out!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Logout"
  }).then((result) => {
    if (result.isConfirmed) {
      // setTimeout(async () =>{
      // }, 5000)
      fetch('/auth/logout', {
          method: "POST"
        })
        //}
        .then(() => Swal.fire({
          title: "You're Logged Out!",
          text: "See you again.",
          icon: "success",
          timer: 5000,
          timerProgressBar: true,
          preConfirm: () => {
            Swal.showLoading()
            return new Promise((resolve) => {
              setTimeout(() => {
                resolve(true)
              }, 3000)
            })
          },
        })).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            // console.log("I was closed by the timer");
          }
          window.location.reload()
        })
    }
  });
}
async function handleDelete(id){
  Swal.fire({
    title: "Are you sure to delete this menu?",
    text: "This action cannot reverted!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Delete"
  }).then((result) => {
    if (result.isConfirmed) {
      // setTimeout(async () =>{
      // }, 5000)
      fetch(`/menu/destroy/${id}`,{method: 'DELETE'})          //}
        .then(() => Swal.fire({
          title: "The Menu Deleted Successfully!",
          text: "Click OK to continue.",
          icon: "success",
          timer: 5000,
          timerProgressBar: true,
          preConfirm: () => {
            Swal.showLoading()
            return new Promise((resolve) => {
              setTimeout(() => {
                resolve(true)
              }, 3000)
            })
          },
        })).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            // console.log("I was closed by the timer");
          }
          window.location.reload()
        })
    }
  });

}