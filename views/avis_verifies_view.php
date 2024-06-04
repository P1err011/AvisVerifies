<!-- http://localhost:3000/views/avis_verifies_view.php?fournisseur=M-dev.com -->

<!-- https://manias.alwaysdata.net/avis_verifies/views/avis_verifies_view.php?fournisseur=M-dev.com -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Set the character encoding to UTF-8 -->
    <meta charset="UTF-8">
    <!-- Define the viewport for responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Set the title of the page -->
    <title>Donnez un avis</title>
    <!-- Link to the external CSS stylesheet -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Define the shortcut icon for the page -->
    <link rel="shortcut icon" href="../images/logo-Mdev-sans-contour.png" type="image/x-icon">
    <!-- Link to the JavaScript file for star rating functionality -->
    <script src="../js/star.js"></script>
    <!-- Link to the JavaScript file for form validation -->
    <script src="../js/ctrl_form.js"></script>
    <!-- Link to the JavaScript file for QR code generation -->
    <script src="../js/QRCode.js"></script>
</head>
<body>
    <!-- Container for the form -->
    <div class="container">
        <!-- Title of the form -->
        <h2>Donnez nous votre avis</h2>
        <!-- Form for submitting feedback -->
        <form action="../controller/avis_verifies_ctrl.php" method="POST">
            <!-- Input field for the professional being rated -->
            <label for="fournisseur">Professionnel que vous notez :</label>
            <!-- Error message for the professional input -->
            <span id="fournisseur-error" class="error-message"></span>
            <!-- Text input for the professional's name -->
            <input type="text" id="fournisseur" name="fournisseur" required>

            <!-- Input field for the client's name -->
            <label for="client">Votre nom :</label>
            <!-- Error message for the client input -->
            <span id="client-error" class="error-message"></span>
            <!-- Text input for the client's name -->
            <input type="text" id="client" name="client" required>

            <!-- Input field for the service or purchase performed -->
            <label for="prestation">Prestation ou achat réalisé :</label>
            <!-- Error message for the service input -->
            <span id="prestation-error" class="error-message"></span>
            <!-- Text input for the service or purchase -->
            <input type="text" id="prestation" name="prestation" required>

            <!-- Input field for the rating -->
            <label for="bareme">Votre note :</label>
            <!-- Star rating system -->
            <div class="rating" id="rating">
                <!-- Individual stars for rating -->
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div>
            <!-- Hidden input field to store the selected rating -->
            <input type="hidden" id="bareme" name="bareme" required>

            <!-- Input field for the feedback/comment -->
            <label for="texte">Votre commentaire sur la prestation ou l'achat réalisé :</label>
            <!-- Error message for the feedback/comment input -->
            <span id="texte-error" class="error-message"></span>
            <!-- Textarea for the feedback/comment -->
            <textarea id="texte" name="texte" required></textarea>

            <!-- Submit button -->
            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>