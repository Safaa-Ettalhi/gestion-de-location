<?php
include('db.php');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicules - Location de Voitures</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <script src="./script.js" defer></script>
    

</head>
<body class="bg-gray-100 ">

    <!-- Sidebar -->
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-64 h-[450px] md:h-auto rounded-r bg-blue-800 text-white " id="sidebar">
            <div class="p-6 border-b flex flex-row justify-between items-center">
                <img src="./safaa logo.svg">
            </div>
            <nav class="mt-10">
                <ul class="flex flex-col gap-6">
                   <li class="px-6 py-2 hover:bg-blue-700">
                        <a href="./index.php" class="flex  items-center space-x-4 text-2xl md:text-xl ">
                            <i class="ri-dashboard-line text-white"></i>
                            <span class="">Dashboard</span>
                        </a>
                    </li>
                    <li class="px-6 py-2 bg-blue-700">
                        <a href="./client.php" class="flex  items-center space-x-4 text-2xl md:text-xl">
                        <i class="ri-group-line"></i>   
                        <span class="./client.php">Clients</span>
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-blue-700">
                        <a href="./vehicule.php" class="flex  items-center space-x-4 text-2xl md:text-xl">
                            <i class="ri-car-line"></i>    
                            <span class="">Vehicules </span>
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-blue-700">
                        <a href="./contrat.php" class="flex  items-center space-x-4 text-2xl md:text-xl">
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
                <div class="flex justify-center md:justify-between md:items-center mb-4">
                    <h3 class=" text-2xl  font-bold text-gray-700">Gestion des Clients</h3>
                    <button onclick="toggleAddClientModal()" class="hidden md:flex md:px-4 md:py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 flex gap-1">
                        <i class="ri-sticky-note-add-line"></i>    
                        <span>Ajouter un Client</span>
                    </button>
                </div>
                <div class="flex justify-end md:hidden">
                    
                    <button 
                        onclick="toggleAddClientModal()" 
                        class="px-2 py-2 ml-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 flex gap-1"
                    >
                        <i class="ri-sticky-note-add-line"></i>    
                        <span>Ajouter Client</span>
                </button>
                </div>

                <!-- Tableau des clients -->
                <div class="relative bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-200 text-sm">
                        <thead class="bg-blue-600 text-white">
                        <tr>
                        <th class="border border-gray-200 px-4 py-2">ID</th>
                                <th class="border border-gray-200 px-4 py-2">Nom</th>
                                <th class="border border-gray-200 px-4 py-2">Prénom</th>
                                <th class="border border-gray-200 px-4 py-2">Email</th>
                                <th class="border border-gray-200 px-4 py-2">Téléphone</th>
                                <th class="border border-gray-200 px-4 py-2">Adresse</th>
                                <th class="border border-gray-200 px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                         <?php 
                         while ($row = $result->fetch_assoc()) {
                            echo '
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border border-gray-200 px-4 py-2 text-center">' . $row['id'] . '</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">' . $row['nom'] . '</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">' . $row['prenom'] . '</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">' . $row['email'] . '</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">' . $row['telephone'] . '</td>
                                <td class="border border-gray-200 px-4 py-2 text-center">' . $row['adresse'] . '</td>
                                <td class="border-t border-gray-200 px-4 py-2 text-center items-center flex space-x-4 justify-center">
                                    <a href="./UppClient.php?id=' . $row['id'] . ' " class="px-3 py-3 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 flex gap-2" >
                                        <i class="ri-loop-left-line"></i>
                                        <span>Modifier</span>  
                                    </a>
                                    <a href="./deleteClient.php?id=' . $row['id'] . ' " class="px-3 py-3 bg-red-500 text-white rounded-md hover:bg-red-600 flex gap-2">
                                                <i class="ri-delete-bin-6-line"></i>
                                                <span>Supprimer</span>
                                    </a>
                                </td>
                            </tr>';
    }                           
                          ?>  
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <!-- Modal pour ajouter un client -->
    <div id="AddClientModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-blue-600 mx-auto titre">Ajouter le Client</h3>
                <button class="text-gray-500 hover:text-gray-700 closeAddClient">
                    <i class="ri-close-circle-line text-2xl"></i>
                </button>
            </div>
            <form action="./addClient.php" method="post">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700" >Prénom</label>
                        <input type="text" id="nom" name="nom" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"  required>
                    </div>
                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" id="prenom" name="prenom" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                        <input type="text" id="telephone" name="telephone" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                    <textarea id="address" name="adresse" rows="3" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <div class="mt-6 flex justify-center space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 closeAddClient">Annuler</button>
                    <button type="submit" name="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

   
</body>
</html>