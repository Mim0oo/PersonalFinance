import 'bootstrap'; // Loads Bootstrap's JavaScript components
function confirmDelete() { // Load function delete confirmation
  return window.confirm("Are you sure you want to delete?");
}

window.confirmDelete = confirmDelete;
