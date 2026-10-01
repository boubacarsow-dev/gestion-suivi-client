<div>
    <form action="/contacts/store" method="POST">
        <input type="hidden" name="id_societe" value="<?= $_GET['id_societe']?? '' ;?>">
        <label for="nom_contact">Nom</label>
        <input type="text" name="nom_contact" id="nom_contact" required placeholder="nom">

         <label for="prenom_contact">Prenom</label>
        <input type="text" name="prenom_contact" id="prenom_contact" required placeholder="prenom">

        <label for="email_contact">email</label>
        <input type="email" name="email_contact" id="email_contact" required placeholder="email">

        <label for="tel_contact">telephone</label>
        <input type="tel" name="tel_contact" id="tel_contact" required placeholder="telephone">
        
     <label for="poste_contact">poste</label>
        <input type="text" name="poste_contact" id="poste_contact" required placeholder="poste">
    <button type="submit">Enregistrer</button>
    </form>
</div>