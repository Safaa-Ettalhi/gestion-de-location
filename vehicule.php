<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicules - Location de Voitures</title>
    <!-- Inclure Tailwind CSS depuis CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <script src="./script.js" defer></script>

</head>
<body class="bg-gray-100 ">

    <!-- Sidebar -->
    <div class="flex flex-col md:flex-row ">
        <div class="w-full md:w-64 h-[450px] md:min-h-screen lg:md:min-h-screen rounded-r bg-blue-800 text-white " id="sidebar">
            <div class="p-6 border-b flex flex-row justify-between items-center">
                <img src="./safaa logo.svg">
            </div>
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
                    <li class="px-6 py-2 bg-blue-700">
                        <a href="./vehicule.php" class="flex  items-center space-x-4 text-2xl md:text-lg ">
                            <i class="ri-car-line"></i>    
                            <span class="">Vehicules </span>
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-blue-700">
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
                    <h3 class="text-2xl font-bold text-gray-700">Gestion des Voitures</h3>
                    <button onclick="toggleAddVoitModal()" class="px-4 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 flex gap-2">
                        <i class="ri-sticky-note-add-line"></i>    
                        <span>Ajouter une Voitures</span>
                    </button>
                </div>

                <!-- Tableau des clients -->
                <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-200 text-sm">
                        <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Marque</th>
                            <th class="border border-gray-300 px-4 py-2">Modèle</th>
                            <th class="border border-gray-300 px-4 py-2">Année</th>
                            <th class="border border-gray-300 px-4 py-2">Prix/Jour</th>
                            <th class="border border-gray-300 px-4 py-2">Statut</th>
                            <th class="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border border-gray-200 px-4 py-2 text-center">1</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">Audi</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">Q8</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">2020</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">700DH</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">Disponible</td>
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

    <!-- Modal pour ajouter un client -->
    <div id="AddVoitModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-blue-600 mx-auto">Ajouter Une Voitures</h3>
                <button class="text-gray-500 hover:text-gray-700 closeAddVoit">
                    <i class="ri-close-circle-line text-2xl"></i>
                </button>
            </div>
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="first-name" class="block text-sm font-medium text-gray-700">Prénom</label>
                        <input type="text" id="first-name" name="first-name" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="last-name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" id="last-name" name="last-name" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                        <input type="text" id="phone" name="phone" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                    <textarea id="address" name="address" rows="3" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <div class="mt-6 flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 closeAddVoit">Annuler</button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
