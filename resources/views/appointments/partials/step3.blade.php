<x-guest-layout>

    <div class="container">
        <h2>Quand aurez-vous besoin de coiffure ?</h2>
        <form id="step3Form">
            @csrf
            <select name="timing" id="timing" required onchange="checkOther(this.value);">
                <option value="">Sélectionnez une option</option>
                <option value="je suis flexible">Je suis flexible</option>
                <option value="dans les prochains jours">Dans les prochains jours</option>
                <option value="dès que possible">Dès que possible</option>
                <option value="à une date précise">À une date précise</option>
                <option value="autres">Autres (précisez)</option>
            </select>
            <input type="text" id="otherDetail" name="otherDetail" placeholder="Précisez" style="display:none;" required>
            <div id="timingError"></div>
            <button type="button" onclick="submitStep3()">Suivant</button>
            <button type="button" onclick="window.history.back();">Retour</button>
        </form>
    </div>
    
    <script>
    function checkOther(value) {
        var otherInput = document.getElementById('otherDetail');
        otherInput.style.display = value === 'autres' ? 'block' : 'none';
    }
    
    function submitStep3() {
        const form = document.getElementById('step3Form');
        const timing = document.getElementById('timing').value;
        const otherDetail = document.getElementById('otherDetail').style.display === 'block' ? document.getElementById('otherDetail').value : '';
    
        fetch('{{ route('appointments.partials.step3') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({ timing: timing, otherDetail: otherDetail })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route('appointments.partials.step4') }}';
            } else {
                document.getElementById('timingError').innerHTML = data.errors.timing ? data.errors.timing : '';
                if (data.errors.otherDetail) {
                    document.getElementById('timingError').innerHTML += data.errors.otherDetail;
                }
            }
        })
        .catch(error => console.error('Error:', error));
    }
    </script>

</x-guest-layout>