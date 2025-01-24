<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li onclick="changeContent('dashboard')">Tableau de bord</li>
                <li><a href="/dashboard/mes-reservations">Mes rendez-vous</a></li>
                <li onclick="changeContent('courses')">Mes cours</li>
                <li onclick="changeContent('messages')">Mes messages</li>
            </ul>
        </div>
        <div class="content">
            <div id="dashboard" class="content-section">
             
                <h1>Tableau de bord</h1>
                <p>Contenu du tableau de bord...</p>
            
            </div>
            <div id="appointments" class="content-section" style="display:none;">
                @yield('appointments')
            </div>
            <div id="courses" class="content-section" style="display:none;">
                <h1>Mes cours</h1>
                <p>Contenu des cours...</p>
            </div>
            <div id="messages" class="content-section" style="display:none;">
                <h1>Mes messages</h1>
                <p>Contenu des messages...</p>
            </div>
        </div>
    </div>

    <script>
        // Fonction pour changer le contenu affiché
        function changeContent(contentType) {
            // Cacher toutes les sections de contenu
            document.querySelectorAll('.content-section').forEach(function(section) {
                section.style.display = 'none';
            });

            // Afficher la section choisie
            const selectedSection = document.getElementById(contentType);
            if (selectedSection) {
                selectedSection.style.display = 'block';
            }
        }

        // Fonction pour charger les rendez-vous dans la div 'appointments'
        function loadAppointments() {
            fetch({{ route('mes-reservations') }}) // Cette route va charger la vue des rendez-vous
                .then(response => response.text())
                .then(html => {
                    // Injecter le contenu de la vue dans la div 'appointments'
                    document.getElementById('appointments').innerHTML = html;
                    document.getElementById('appointments').style.display = 'block';
                })
                .catch(error => {
                    console.error('Une erreur est survenue lors du chargement des rendez-vous:', error);
                    alert('Une erreur est survenue lors du chargement des données.');
                });
        }
    </script>
</x-app-layout>
