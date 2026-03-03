function transformToUpperCase() {
  let elements = document.querySelectorAll('input[type="text"], textarea');
  elements.forEach(function (element) {
    element.value = element.value.toUpperCase();
  });
}

function disablePlaceholderOption() {
  var selectElement = document.getElementById("txtCarrera");
  var placeholderOption = selectElement.querySelector("option[value='']");
  if (placeholderOption) {
    placeholderOption.disabled = true;
  }
}

function confirmDelete() {
  return confirm("¿Estás seguro de eliminar este elemento?");
}
