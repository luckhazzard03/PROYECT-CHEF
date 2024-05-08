/*const myModal = new bootstrap.Modal(document.getElementById("my-modal"));
const myForm = document.getElementById("my-form");

function showModal() {
  myModal.show();
}

function hiddenModal() {
  myModal.hidden();
}

myForm.addEventListener("submit", (e) => {
  e.preventDefault();
  var getDataInput = myForm.querySelectorAll("input");
  var formData = new FormData();
  for (let i = 0; i < getDataInput.length; i++) {
    formData.append(getDataInput[i].id, getDataInput[i].value);
  }
  console.log(formData);
});*/
const myModal = new bootstrap.Modal(document.getElementById("my-modal"));
const myForm = document.getElementById("my-form");

function showModal() {
  myModal.show();
}

function hiddenModal() {
  myModal.hidden();
}

myForm.addEventListener("submit", (e) => {
  e.preventDefault();
  var formData = new FormData(myForm);
  formData.forEach(function (value, key) {
    console.log(key, value);
  });
});
