<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/sb-admin-2/js/sb-admin-2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/assets/js/util.js"></script>
<script>
  <?= !($data['massage'] == 'welcome') ? "" : "handleToast('Login Success', 'success');setTimeout(() => {handleToast('Welcome Back, " . $data['username'] . "', 'success');}, 1000);" ?>
  <?= !($data['massage'] == 'sys') ? "" : "handleToast('Logout Successfully', 'success');setTimeout(() => {handleToast('Thanks for using our services', 'success');}, 1000);" ?>
  <?= !($data['massage'] == 'pwnsm') ? "" : "handleToast('Registration Failed', 'danger');setTimeout(() => {handleToast('Hint: Your password is not match', 'warning');}, 1000);" ?>
  <?= !($data['massage'] == 'usnmnu') ? "" : "handleToast('Registration Failed', 'danger');setTimeout(() => {handleToast('Hint: The username is already used', 'warning');}, 1000);" ?>
  <?= !($data['massage'] == 'lgfl') ? "" : "handleToast('Login Failed', 'danger');setTimeout(() => {handleToast('Hint: Some credentials didn\'t not match with our records', 'warning');}, 1000);" ?>
  <?= !($data['massage'] == 'updated') ? "" : "handleToast('The Menu Updated Successfully', 'success')" ?>
  <?= !($data['massage'] == 'created') ? "" : "handleToast('The Menu Created Successfully', 'success')" ?>
</script>
</body>

</html>