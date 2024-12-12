
<?php 
include 'db.php'; 


$clientId = $_GET['id'] ?? null;

if (!$clientId) {
    echo "ID du contrat manquant.";
    exit;
}


$query = "
    SELECT c.id_client, c.id_voiture, c.date_debut, c.date_fin, c.total, c.statut,
           cl.nom, cl.prenom,
           v.marque, v.modele
    FROM contrats c
    INNER JOIN clients cl ON c.id_client = cl.id
    INNER JOIN voitures v ON c.id_voiture = v.id
    WHERE c.id = $clientId";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $contrat = $result->fetch_assoc();
} else {
    echo "Aucun contrat trouvé pour cet ID.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_client = $_POST['id_client'];
    $id_voiture = $_POST['id_voiture'];   
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $total = $_POST['total'];
    $statut = $_POST['statut'];

    $updateQuery = "
        UPDATE contrats 
        SET id_client = '$id_client', 
            id_voiture = '$id_voiture', 
            date_debut = '$date_debut', 
            date_fin = '$date_fin', 
            total = '$total', 
            statut = '$statut' 
        WHERE id = $clientId";

    if ($conn->query($updateQuery)) {
        header("Location: contrat.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour : " . $conn->error;
    }
}
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

   <?php include 'contrat.php'; ?>

   <div id="editContractModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-blue-600 mx-auto">Modifier un Contrat</h3>
            <button class="text-gray-500 hover:text-gray-700 closeContractModal">
                <i class="ri-close-circle-line text-2xl"></i>
            </button>
        </div>
        <form method="POST" action="./UppContrat.php?id=<?php echo $clientId; ?>">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="client" class="block text-sm font-medium text-gray-700">Client</label>
                    <select id="client" name="id_client" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="" disabled>Sélectionnez un client</option>
                        <?php
                        $clients = $conn->query("SELECT id, CONCAT(nom, ' ', prenom) AS nom_complet FROM clients");
                        while ($client = $clients->fetch_assoc()) {
                            $selected = ($client['id'] == $contrat['id_client']) ? 'selected' : '';
                            echo "<option value='{$client['id']}' $selected>{$client['nom_complet']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="voiture" class="block text-sm font-medium text-gray-700">Voiture</label>
                    <select id="voiture" name="id_voiture" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="" disabled>Sélectionnez une voiture</option>
                        <?php
                        $voitures = $conn->query("SELECT id, CONCAT(marque, ' ', modele) AS voiture FROM voitures");
                        while ($voiture = $voitures->fetch_assoc()) {
                            $selected = ($voiture['id'] == $contrat['id_voiture']) ? 'selected' : '';
                            echo "<option value='{$voiture['id']}' $selected>{$voiture['voiture']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="date-debut" class="block text-sm font-medium text-gray-700">Date de Début</label>
                    <input type="date" id="date-debut" name="date_debut" value="<?php echo $contrat['date_debut']; ?>" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label for="date-fin" class="block text-sm font-medium text-gray-700">Date de Fin</label>
                    <input type="date" id="date-fin" name="date_fin" value="<?php echo $contrat['date_fin']; ?>" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label for="total" class="block text-sm font-medium text-gray-700">Montant Total (€)</label>
                    <input type="number" step="0.01" id="total" name="total" value="<?php echo $contrat['total']; ?>" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                    <select id="statut" name="statut" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="En cours" <?php echo ($contrat['statut'] == 'En cours') ? 'selected' : ''; ?>>En cours</option>
                        <option value="Terminé" <?php echo ($contrat['statut'] == 'Terminé') ? 'selected' : ''; ?>>Terminé</option>
                        <option value="Annulé" <?php echo ($contrat['statut'] == 'Annulé') ? 'selected' : ''; ?>>Annulé</option>
                    </select>
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-2">
                <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 closeContractModal">Annuler</button>
                <button type="submit" name="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Enregistrer</button>
            </div>
        </form>
    </div>
   </div>

    <script>
    
        const closeButtons = document.querySelectorAll('.closeContractModal');
        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                window.location.href = 'contrat.php';
            });
        });
    </script>
</body>
</html>
