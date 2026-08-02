import * as bootstrap from 'bootstrap';
function confirmDelete() { // Load function delete confirmation
  return window.confirm("Are you sure you want to delete?");
}

window.confirmDelete = confirmDelete;
window.onload = (event) => {
  const toastTrigger = document.getElementById('liveToastBtn')
  const toastLiveExample = document.getElementById('liveToast')
  const alertNav = document.getElementById('alert-nav')
  var delayInMilliseconds = 200;

  if (toastLiveExample) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
    //toastTrigger.addEventListener('click', () => {
      setTimeout(function() {
        toastBootstrap.show();
        
      }, delayInMilliseconds);
      // Future adjustments
      // setTimeout(function() {
      //   alertNav.classList.add('fade');
      //   alertNav.parentNode.removeChild(alertNav);
      // }, 1000);
  }
}
