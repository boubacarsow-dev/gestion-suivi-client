<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - CRM</title>
</head>
<body>

    <div>
        <h1>Connexion Commercial</h1>

        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;">Email ou mot de passe incorrect.</p>
        <?php endif; ?>

        <form action="/login" method="POST">
            <label for="email_com">Adresse email</label>
            <input type="email" name="email_com" id="email_com" required placeholder="Ex: commercial@crm.com">

            <label for="password_com">Mot de passe</label>
            <input type="password" name="password_com" id="password_com" required placeholder="Votre mot de passe">

            <button type="submit">Se connecter</button>
        </form>
    </div>

</body>
</html>