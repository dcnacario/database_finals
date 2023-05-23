// Get all the edit buttons
var editButtons = document.getElementsByClassName('model_btn_edit');

// Loop through each edit button
for (var i = 0; i < editButtons.length; i++) {
  var btn = editButtons[i];
  btn.onclick = function() {
    var modalId = this.getAttribute('data-modal-id');
    var modal = document.getElementById(modalId);
    modal.classList.add('show');
  };
}

// Get all the close buttons
var closeButtons = document.getElementsByClassName('close');

// Loop through each close button
for (var j = 0; j < closeButtons.length; j++) {
  var closeButton = closeButtons[j];
  closeButton.onclick = function() {
    var modal = this.closest('.model_modal');
    modal.classList.remove('show');
  };
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
  if (event.target.classList.contains('model_modal')) {
    event.target.classList.remove('show');
  }
};
