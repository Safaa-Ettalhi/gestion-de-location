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
        <div class="w-full md:w-64 h-[450px] md:h-auto rounded-r bg-blue-800 text-white " id="sidebar">
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
                        <?php  
                            while($row = $resultVoit->fetch_assoc()){ 
                                echo '
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="border border-gray-200 px-4 py-2 text-center">' . $row['id'] . '</td>
                                    <td class="border border-gray-200 px-4 py-2 text-center">' . $row['marque'] . '</td>
                                    <td class="border border-gray-200 px-4 py-2 text-center">' . $row['modele'] . '</td>
                                    <td class="border border-gray-200 px-4 py-2 text-center">' . $row['annee'] . '</td>
                                    <td class="border border-gray-200 px-4 py-2 text-center">' . $row['prix_jour'] . '</td>
                                    <td class="border border-gray-200 px-4 py-2 text-center">' . $row['statut'] . '</td> 
                                    <td class="border border-gray-200 px-4 py-2 text-center flex space-x-4 justify-center">
                                    <a href="./UppVoit.php?id=' . $row['id'] . ' " class="px-3 py-3 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 flex gap-2" >
                                       <i class="ri-loop-left-line"></i>
                                       <span>Modifier</span>  
                                    </a>
                                        <a href="./deleteVoiture.php?id=' . $row['id'] . ' " class="px-3 py-3 bg-red-500 text-white rounded-md hover:bg-red-600 flex gap-2">
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
    <div id="AddVoitModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-blue-600 mx-auto">Ajouter Une Voitures</h3>
                <button class="text-gray-500 hover:text-gray-700 closeAddVoit">
                    <i class="ri-close-circle-line text-2xl"></i>
                </button>
            </div>
            <form action="./addVoit.php" method="post">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="marque" class="block text-sm font-medium text-gray-700">Marque</label>
                        <input type="text" id="marque" name="marque" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="model" class="block text-sm font-medium text-gray-700">Modele</label>
                        <input type="text" id="model" name="modele" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="annee" class="block text-sm font-medium text-gray-700">Année</label>
                        <input type="number" id="annee" name="annee" placeholder="Y-Y-Y-Y" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="prix" class="block text-sm font-medium text-gray-700">Prix_jour</label>
                        <input type="number"  step="0.01"  id="prix_jour" name="prix_jour" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                    <select id="statut" name="statut" 
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="Disponible">Disponible</option>
                        <option value="Louée">Louée</option>
                        <option value="Entretien">Entretien</option>
                    </select>
                </div>
                <div class="mt-6 flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 closeAddVoit">Annuler</button>
                    <button type="submit" name="submit"  class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
