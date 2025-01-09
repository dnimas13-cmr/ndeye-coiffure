<x-guest-layout>

    <div class="container">
        <h2>Date & horaire</h2>
        <form id="step4Form">
            @csrf
            <div id="calendar"></div>
            <input type="hidden" id="selectedDate" name="selectedDate">
            <input type="hidden" id="selectedTime" name="selectedTime">
            <div id="dateError"></div>
            <button type="button" onclick="submitStep4()">Suivant</button>
            <button type="button" onclick="window.history.back();">Retour</button>
        </form>
    </div>
    
    <link href='fullcalendar/main.min.css' rel='stylesheet' />
    <script src='fullcalendar/main.min.js'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            selectMirror: true,
            timeGrid: {
                slotDuration: '01:00'
            },
            select: function(info) {
                document.getElementById('selectedDate').value = info.startStr;
                if (info.end) {
                    document.getElementById('selectedTime').value = info.startStr;
                }
                // Clear previous errors
                document.getElementById('dateError').innerHTML = '';
            }
        });
        calendar.render();
    });
    
    function submitStep4() {
        const selectedDate = document.getElementById('selectedDate').value;
        const selectedTime = document.getElementById('selectedTime').value;
    
        if (!selectedDate || !selectedTime) {
            document.getElementById('dateError').textContent = 'Please select both a date and time.';
            return;
        }
    
        fetch('{{ route('appointments.partials.step4') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({ date: selectedDate, time: selectedTime })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route('appointments.partials.step5') }}';
            } else {
                document.getElementById('dateError').innerHTML = data.errors.date || data.errors.time;
            }
        })
        .catch(error => console.error('Error:', error));
    }
    </script>

</x-guest-layout>