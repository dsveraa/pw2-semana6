document.getElementById('hotelForm').addEventListener('submit', function(e) {
    const name = document.getElementById('name')
    const location = document.getElementById('location')
    const rooms = document.getElementById('rooms')
    const rate = document.getElementById('rate')

    let valid = true

    if (name.value.trim() === '') {
        name.placeholder = 'Debe añadir el nombre del hotel'
        valid = false
    }

    if (location.value.trim() === '') {
        location.placeholder = 'La ubicación del hotel es obligatoria'
        valid = false
    }

    if (rooms.value.trim() === '' || isNaN(rooms.value) || rooms.value <= 0) {
        rooms.placeholder = 'Añadir un número válido de habitaciones'
        valid = false
    }

    if (rate.value.trim() === '' || isNaN(rate.value) || rate.value <= 0) {
        rate.placeholder = 'Una tarifa válida es necesaria'
        valid = false
    }

    if (!valid) {
        e.preventDefault()
    }
})
