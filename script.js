const originSelect = document.getElementById("origin")
const destinationSelect = document.getElementById("destination")

originSelect.addEventListener("change", function () {
  const selectedOrigin = this.value

  Array.from(destinationSelect.options).forEach((option) => {
    option.disabled = option.value === selectedOrigin;
  })
})

destinationSelect.addEventListener("change", function () {
  const selectedDestination = this.value;

  Array.from(originSelect.options).forEach((option) => {
    option.disabled = option.value === selectedDestination
  })
})
