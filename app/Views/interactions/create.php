<div>
    <form action="/interactions/store.php" method="POST">
        <label for="type_inter">Type d'echange</label>
        <select name="type_inter" id="type_inter" required>
            <option value="appel">Appel</option>
            <option value="email">Email</option>
            <option value="rdv">RDV</option>
        </select>
        <label for="date_inter">date de l'echange</label>
        <input type="date" name="date_inter" id="date_inter" required>

        <label for="compterend_inter">Compte rendu</label>
        <textarea name="compterend_inter" id="compterend_inter" placeholder="details de l'echange" required></textarea>
                <input type="hidden" name="code_contact" value="<?= $_GET['code_contact'] ?? '' ?>">

        <button type="submit">Enregistrer interaction</button>
    </form>
</div>