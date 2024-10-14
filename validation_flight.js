document.getElementById('flightForm').addEventListener('submit', function(e) {
    const origin = document.getElementById('origin')
    const destination = document.getElementById('destination')
    const date = document.getElementById('date')
    const available = document.getElementById('available')
    const rate = document.getElementById('rate')

    let valid = true

    if (origin.value.trim() === '') {
        origin.placeholder = 'Debe añadir una ciudad de origen'
        valid = false
    }

    if (destination.value.trim() === '') {
        destination.placeholder = 'Debe añadir una ciudad de destino'
        valid = false
    }
    
    if (available.value.trim() === '' || isNaN(available.value) || available.value <= 0) {
        available.placeholder = 'Añadir un número válido de plazas disponibles'
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
