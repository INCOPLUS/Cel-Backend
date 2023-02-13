<!DOCTYPE html>
<html>
<head>
    <title>Compo En Ligne (CEL)</title>
</head>
<body>
    <h1>Bienvenu(e) sur CEL. Vos identifiants d'accès sont:</h1>
    <p><u>Identifiant</u> : <strong>{{ $details['identifiant'] }}</strong></p>
    <p><u>Mot de passe</u> : <strong>{{ $details['mdp'] }}</strong></p>
    <br>
    <p>Accédez à votre espace CEL en cliquant ici {{ route('connexion') }}</p>
</body>
</html>