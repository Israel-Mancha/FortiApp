const inputFile = document.getElementById("archivo");
const fileName = document.getElementById("file-name");

inputFile.addEventListener("change", function() {
  fileName.textContent = this.value.split("\\").pop();
});