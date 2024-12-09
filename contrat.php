<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients - Location de Voitures</title>
    <!-- Inclure Tailwind CSS depuis CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <script src="./script.js" defer></script>

</head>
<body class="bg-gray-100 ">

    <!-- Sidebar -->
    <div class="flex flex-col md:flex-row ">
        <div class="w-full md:w-64 h-[450px] md:min-h-screen lg:md:min-h-screen rounded-r bg-blue-800 text-white " id="sidebar">
            <div class="p-6 text-center text-2xl font-bold">Location de Voitures</div>
            <nav class="mt-10">
                <ul class="flex flex-col gap-6">
                   <li class="px-6 py-2 hover:bg-blue-700">
                        <a href="./index.php" class="flex  items-center space-x-4 text-2xl md:text-xl  ">
                            <i class="ri-dashboard-line text-white"></i>
                            <span class="">Dashboard</span>
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-blue-700">
                        <a href="./client.php" class="flex  items-center space-x-4 text-2xl md:text-lg ">
                        <i class="ri-group-line"></i>   
                        <span class="./client.php">Clients</span>
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-blue-700">
                        <a href="./vehicule.php" class="flex  items-center space-x-4 text-2xl md:text-lg ">
                            <i class="ri-car-line"></i>    
                            <span class="">Vehicules </span>
                        </a>
                    </li>
                    <li class="px-6 py-2 bg-blue-700">
                        <a href="./contrat.php" class="flex  items-center space-x-4 text-2xl md:text-lg ">
                           <i class="ri-save-line"></i>
                           <span class="">Contrats </span>
                        </a>
                    </li>
                    <!-- <li><a href="#" class="block px-4 py-2 text-lg hover:bg-blue-700">Reservations</a></li> -->
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-6 space-y-6">
            <!-- Header -->
            <header class="flex items-center justify-between space-y-4">
                <i class="ri-sidebar-fold-line text-2xl text-blue-800 hover:text-gray-700 transition" id="sidebarIcon"></i>
                <h2 class="text-2xl font-bold text-blue-800">Bienvenue, Safaa</h2>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="ri-notification-line text-xl"></i>
                    </button>
                    <img src="./safaa.jpg" alt="User" class="w-10 h-10 rounded-full shadow-md">
                </div>
            </header>
            <!-- Section Gestion des Clients -->
            <section>
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-2xl font-bold text-gray-700">Gestion des Contrats</h3>
                    <button onclick="toggleADDContratModal()" class="px-4 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 flex gap-2">
                        <i class="ri-sticky-note-add-line"></i>    
                        <span>Ajouter un Contrat</span>
                    </button>
                </div>

                <!-- Tableau des clients -->
                <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-200 text-sm">
                        <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Client</th>
                            <th class="border border-gray-300 px-4 py-2">Voiture</th>
                            <th class="border border-gray-300 px-4 py-2">Date Début</th>
                            <th class="border border-gray-300 px-4 py-2">Date Fin</th>
                            <th class="border border-gray-300 px-4 py-2">Total</th>
                            <th class="border border-gray-300 px-4 py-2">Statut</th>
                            <th class="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border border-gray-200 px-4 py-2 text-center">1</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">safaa</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">AUDi</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">12/12/2024</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">22/12/2024</td>
                                <th class="border border-gray-300 px-4 py-2">Statut</th>
                                <th class="border border-gray-300 px-4 py-2">En cours</th>
                                <td class="border border-gray-200 px-4 py-2 text-center flex space-x-4 justify-center">
                                    <button class="px-3 py-3 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 flex gap-2 ">
                                        <i class="ri-loop-left-line"></i>
                                        <span>Modifier</span>  
                                    </button>
                                    <button class="px-3 py-3 bg-red-500 text-white rounded-md hover:bg-red-600 flex gap-2">
                                        <i class="ri-delete-bin-6-line"></i>
                                        <span>Supprimer</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
       
    </div>
    


    
</body>
</html>
