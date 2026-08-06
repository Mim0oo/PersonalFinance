import * as bootstrap from 'bootstrap';

window.onload = (event) => {
  const toastTrigger = document.getElementById('liveToastBtn')
  const toastLiveExample = document.getElementById('liveToast')
  const alertNav = document.getElementById('alert-nav')
  var delayInMilliseconds = 0;

  if (toastLiveExample) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
    //toastTrigger.addEventListener('click', () => {
      setTimeout(function() {
        toastBootstrap.show();
        
      }, delayInMilliseconds);
      // Future adjustments
      // setTimeout(function() {
      //   alertNav.classList.add('fade');
      //   setTimeout(function() {
      //     alertNav.parentNode.removeChild(alertNav);
      // }, 400);
      //   //alertNav.parentNode.removeChild(alertNav);
      // }, 8000);
  }
}
document.getElementById('closeModal').addEventListener('click', () => {
  var elems = document.querySelectorAll(".red-highlight");

  [].forEach.call(elems, function(el) {
      el.classList.remove("red-highlight");
  });
    // Button that triggered the modal
    // let button = event.relatedTarget;
    // button.parentNode.parentNode.classList.remove('red-highlight');
});

document.getElementById('confirmModal').addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    let button = event.relatedTarget;

    button.parentNode.parentNode.classList.add('red-highlight');
    
    // Extract info from data-* attributes
    let itemId = button.getAttribute('data-id');
    let itemName = button.getAttribute('data-name');
    
    // Update the text in the modal body
    //const bodyText = document.getElementById('modal-body-text').textContent;
    document.getElementById('modal-body-id').textContent = itemId;
    //document.getElementById('delete-item-id').value = itemId;
    
    // Dynamically update the Form action URL (replaces '0' with the actual ID)
    let form = document.getElementById('deleteItemForm');
    let currentAction = form.getAttribute('action');
    form.setAttribute('action', currentAction.substring(0, currentAction.lastIndexOf('/')) + '/' + itemId);
});