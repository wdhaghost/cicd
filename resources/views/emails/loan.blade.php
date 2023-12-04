
<!DOCTYPE html>
<html>
<head>
    <title>Rappel de Prêt</title>
</head>
<body>
    <h1>Rappel de Prêt</h1>
    <p>
        C'est un rappel que vous avez emprunté : {{ $equipmentName }}.
    </p>
    <p>
        Date de prêt : {{ $loanDate }}<br>
        Date de retour : {{ $returnDate }}
    </p>
    <p>Veuillez vous assurer de retourner l'équipement à temps.</p>
</body>
</html>