// document.addEventListener("DOMContentLoaded", () => {
//   document.querySelectorAll('.update-input, .update-deadline-input').forEach(input => {
//     input.disabled = true; // Force disable on page load
//   });

//   document.querySelectorAll('.edit-btn').forEach(button => {
//     button.addEventListener('click', function () {
//       const form = button.closest('.update-form');
//       const updateBtn = form.querySelector('.hidden-update');
//       const taskInput = form.querySelector('.update-input');
//       const deadlineInput = form.querySelector('.update-deadline-input');

//       // Show update button
//       button.style.display = 'none';
//       updateBtn.style.display = 'inline-block';

//       // Enable input fields
//       taskInput.disabled = false;
//       deadlineInput.disabled = false;
//     });
//   });
// });




document.addEventListener("DOMContentLoaded", () => {
  // Disable all update inputs on load
  document.querySelectorAll('.update-input, .update-deadline-input').forEach(input => {
    input.disabled = true;
  });

  // Edit button logic
  document.querySelectorAll('.edit-btn').forEach(editButton => {
    editButton.addEventListener('click', () => {
      const taskItem = editButton.closest('.list');
      const updateForm = taskItem.querySelector('.update-form');
      const updateBtn = taskItem.querySelector('.hidden-update');
      const taskInput = updateForm.querySelector('.update-input');
      const deadlineInput = updateForm.querySelector('.update-deadline-input');

      // Enable inputs
      taskInput.disabled = false;
      deadlineInput.disabled = false;

      // Show Update button, hide Edit button
      updateBtn.style.display = 'inline-block';
      editButton.style.display = 'none';
    });
  });
});

