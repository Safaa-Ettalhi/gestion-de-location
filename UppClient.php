<?php
include 'db.php'; 
if (isset($_GET['id']) ) {
    $clientId = $_GET['id'];

    $query = "SELECT * FROM clients WHERE id = $clientId";
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
    $nom = $_POST['nom'];
    $prenom= $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    

    $updateSql = "update clients set nom='$nom', prenom='$prenom', email='$email' ,telephone='$telephone' ,adresse='$adresse' where id = $clientId";

    if ($conn->query($updateSql) === TRUE) {
        echo "Client updated successfully!";
        header("Location: client.php"); 
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
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <script src="./script.js" defer></script>
    

</head>
<body class="bg-gray-100 ">

    
<?php include 'client.php'; ?>
    <!-- Modal de modification-->
    <div id="AddClientModal" class=" fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-blue-600 mx-auto titre">Modifier le Client</h3>
                <button class="text-gray-500 hover:text-gray-700 closeAddClient">
                    <i class="ri-close-circle-line text-2xl"></i>
                </button>
            </div>
            <form action="./UppClient.php?id=<?php echo $clientId ?>" method="post">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700">Prénom</label>
                        <input 
                            type="text" 
                            id="nom" 
                            name="nom" 
                            class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            value="<?php echo $client['prenom']; ?>" 
                            required>
                    </div>
                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input 
                            type="text" 
                            id="prenom" 
                            name="prenom" 
                            class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            value="<?php echo $client['nom']; ?>" 
                            required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            value="<?php echo $client['email']; ?>"
                            required >
                    </div>
                    <div>
                        <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                        <input 
                            type="text" 
                            id="telephone" 
                            name="telephone" 
                            class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            value="<?php echo $client['telephone']; ?>"
                            required>
                    </div>
                </div>
                    <div class="mt-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                        <textarea 
                            id="address" 
                            name="adresse" 
                            rows="3" 
                            class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required><?php echo $client['adresse']; ?></textarea>
                    </div>
                    <div class="mt-6 flex justify-center space-x-2">
                        <button 
                            type="button" 
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 closeAddClient">
                            Annuler
                        </button>
                        <button 
                            type="submit" 
                            name="update" 
                            value="update"
                            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Enregistrer
                        </button>
                    </div>
             </form>

        </div>
    </div>
    <script>
    
        const closeButtons = document.querySelectorAll('.closeAddClient');
        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                window.location.href = 'client.php';
            });
        });
    </script>

</body>
</html>