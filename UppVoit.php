<?php
include 'db.php'; 
if (isset($_GET['id']) ) {
    $clientId = $_GET['id'];

    $query = "SELECT * FROM voitures WHERE id = $clientId";
    $result = $conn->query($query);

    
    if ($result->num_rows > 0) {
        $client = $result->fetch_assoc();
    } else {
        echo "Client ID is missing.";
        exit;
    }
} else {
    echo "Client ID is missing.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marque = $_POST['marque'];
    $modele= $_POST['modele'];
    $annee = $_POST['annee'];
    $prix_jour = $_POST['prix_jour'];
    $statut = $_POST['statut'];
    

    $updateSql = "update voitures set marque='$marque', modele='$modele', annee='$annee' ,prix_jour='$prix_jour' ,statut='$statut' where id = $clientId";
    if ($conn->query($updateSql)) {
        echo "Client updated successfully!";
        header("Location: vehicule.php"); 
        exit;
    } else {
        echo "Error updating client: " . $conn->error;
    }


}


$conn->close();
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

   <?php include 'vehicule.php'; ?>

    <!-- Modal pour modifier une voiture -->
    <div id="UpVoitModal" class=" fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-blue-600 mx-auto">Ajouter Une Voitures</h3>
                <button class="text-gray-500 hover:text-gray-700 closeAddVoit">
                    <i class="ri-close-circle-line text-2xl"></i>
                </button>
            </div>
            <form action="./UppVoit.php?id=<?php echo $clientId ?>" method="post">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="marque" class="block text-sm font-medium text-gray-700">Marque</label>
                        <input type="text" id="marque" name="marque" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $client['marque']; ?>" required>
                    </div>
                    <div>
                        <label for="model" class="block text-sm font-medium text-gray-700">Modele</label>
                        <input type="text" id="model" name="modele" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $client['modele']; ?>" required>
                    </div>
                    <div>
                        <label for="annee" class="block text-sm font-medium text-gray-700">Année</label>
                        <input type="number" id="annee" name="annee" placeholder="Y-Y-Y-Y" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $client['annee']; ?>" required>
                    </div>
                    <div>
                        <label for="prix" class="block text-sm font-medium text-gray-700">Prix_jour</label>
                        <input type="number"  step="0.01"  id="prix_jour" name="prix_jour" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $client['prix_jour']; ?>" required>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                    <select id="statut" name="statut" 
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="Disponible" <?php echo ($client['statut'] == 'Disponible') ? 'selected' : ''; ?> >Disponible</option>
                        <option value="Louée" <?php echo ($client['statut'] == 'Louée') ? 'selected' : ''; ?>>Louée</option>
                        <option value="Entretien" <?php echo ($client['statut'] == 'Entretien') ? 'selected' : ''; ?>>Entretien</option>
                    </select>
                </div>
                <div class="mt-6 flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 closeAddVoit">Annuler</button>
                    <button type="submit" name="submit"  class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
    <script>
    
        const closeButtons = document.querySelectorAll('.closeAddVoit');
        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                window.location.href = 'vehicule.php';
            });
        });
    </script>
</body>
</html>
