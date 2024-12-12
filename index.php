<?php
include('db.php');
// Nouvelle variable pour exécuter la requête SQL
$queryResult = "
    SELECT v.marque AS marque, COUNT(co.id) AS nombre_contrats
    FROM voitures v
    JOIN contrats co ON v.id = co.id_voiture
    GROUP BY v.marque
";

$result = $conn->query($queryResult); 

$labels = [];
$data = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['marque']; 
    $data[] = $row['nombre_contrats']; 
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Location de Voitures</title>
    <!-- Inclure Tailwind CSS depuis CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <script src="./script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   

</head>
<body class="bg-gray-100 ">

    <!-- Sidebar -->
    <div class="flex flex-col md:flex-row ">
        <div class="w-full md:w-64 h-[450px] md:h-auto rounded-r bg-blue-800 text-white " id="sidebar">
            <div class="p-6 border-b flex justify-between items-center ">
                <img src="./safaa logo.svg">
            </div>
            <nav class="mt-10">
                <ul class="flex flex-col gap-6">
                   <li class="px-6 py-2 bg-blue-700">
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
             <!-- Cards -->
             <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <h3 class="text-lg font-bold text-gray-600">Nombre de Clients</h3>
                    <?php

                      $row = $nbrClient->fetch_row();
                      if($row){
                        echo'
                        <p class="text-4xl font-bold text-blue-700 ">' . $row[0] . '</p>';
                      }else{
                        echo'
                        <p class="text-4xl font-bold text-blue-700 ">0</p>';
                      }
                    ?>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <h3 class="text-lg font-bold text-gray-600">Nombre de Voitures</h3>
                    <?php

                        $row = $nbrVoit->fetch_row();
                        if($row){
                            echo'
                            <p class="text-4xl font-bold text-green-600 ">' . $row[0] . '</p>';
                        }else{
                            echo'
                            <p class="text-4xl font-bold text-green-600 ">0</p>';
                            }
                    ?>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <h3 class="text-lg font-bold text-gray-600">Voitures Louées</h3>
                    <?php

                        $row = $nbrVoiLouer->fetch_row();
                        if($row){
                            echo'
                            <p class="text-4xl font-bold text-red-600 ">' . $row[0] . '</p>';
                        }else{
                            echo'
                            <p class="text-4xl font-bold text-red-600 ">0</p>';
                            }
                    ?>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <h3 class="text-lg font-bold text-gray-600">Voitures Disponibles</h3>
                    <?php

                        $row = $nbrVoiDisp->fetch_row();
                        if($row){
                            echo'
                            <p class="text-4xl font-bold text-yellow-500 ">' . $row[0] . '</p>';
                        }else{
                            echo'
                            <p class="text-4xl font-bold text-yellow-500 ">0</p>';
                            }
                    ?>
                </div>
            </section>

            <!-- Chart Section -->
            <section class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-bold text-gray-600">Statistiques des Voitures</h3>
                <canvas id="voituresChart" class="mt-2"></canvas>
            </section>

        
                <h3 class="text-lg font-bold text-gray-600">Activités Récentes</h3>
                <table class="min-w-full border-collapse  text-sm">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left font-semibold">Client</th>
                            <th class="px-4 py-2 text-left font-semibold">Voiture</th>
                            <th class="px-4 py-2 text-left font-semibold">Date Début</th>
                            <th class="px-4 py-2 text-left font-semibold">Date Fin</th>
                            <th class="px-4 py-2 text-left font-semibold">Description</th>
                            <th class="px-4 py-2 text-left font-semibold">Date de l'Activité</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                     

                        $result = $conn->query("SELECT 
                            c.nom AS client,
                            v.marque AS voiture,
                            co.date_debut,
                            co.date_fin,
                            a.description,
                            a.created_at
                        FROM activites a
                        JOIN contrats co ON a.id_contrat = co.id
                        JOIN clients c ON co.id_client = c.id
                        JOIN voitures v ON co.id_voiture = v.id
                        ORDER BY a.created_at DESC  LIMIT 5
                        ");

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='px-4 py-2'>{$row['client']}</td>";
                            echo "<td class='px-4 py-2'>{$row['voiture']}</td>";
                            echo "<td class='px-4 py-2'>{$row['date_debut']}</td>";
                            echo "<td class='px-4 py-2'>{$row['date_fin']}</td>";
                            echo "<td class='px-4 py-2'>{$row['description']}</td>";
                            echo "<td class='px-4 py-2'>{$row['created_at']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='px-4 py-2 text-center text-gray-500'>Aucune activité récente</td></tr>";
                    }

?>

                    </tbody>

    </table>
</section> -->


      </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    
    const labels = <?php echo json_encode($labels); ?>;
    const data = <?php echo json_encode($data); ?>;

  
    const dataVoitures = {
        labels: labels, 
        datasets: [{
            label: 'Nombre de contrats',
            data: data, 
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    };


    const configVoituresChart = {
        type: 'bar', 
        data: dataVoitures,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Nombre de contrats par marque de voiture'
                }
            },
            scales: {
                y: {
                    beginAtZero: true 
                }
            }
        }
    };

    
    const voituresChart = new Chart(
        document.getElementById('voituresChart'),
        configVoituresChart
    );
</script>
</body>
</html>
