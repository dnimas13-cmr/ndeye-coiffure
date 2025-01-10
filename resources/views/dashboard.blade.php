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
                <li onclick="changeContent('appointments')">Mes rendez-vous</li>
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
                <h1>Mes rendez-vous</h1>
                <p>Contenu des rendez-vous...</p>
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
        function changeContent(contentType) {
    // Hide all content sections
    document.querySelectorAll('.content-section').forEach(function(section) {
        section.style.display = 'none';
    });

    // Show the selected content section
    const selectedSection = document.getElementById(contentType);
    if (selectedSection) {
        selectedSection.style.display = 'block';
    }
}

        </script>
</x-app-layout>
