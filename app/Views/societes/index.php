<div>
    <div class="section_societe_btn">
        <h1>Mes clients</h1>
        <a href="">Creer nouvelle societe</a>
    </div>

    <!-- sections cards -->
     <div class="card_container">
    <div class="card">
        <h2>Total Societe</h2>
        <p><strong><?= htmlspecialchars($total_societe) ?></strong></p>
    </div>

    <div class="card">
        <h2>Nouveaux Clients</h2>
        <p><strong><?= htmlspecialchars($nouveaux) ?></strong></p>
    </div>
     </div>

     <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Nom Societe</th>
                    <th>Secteur</th>
                    <th>Ville</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
               

             <tbody>
                <?php if(!empty($liste_des_societes)): ?>
                <?php foreach($liste_des_societes as $s): ?>
                    <tr>
                    <td><?= htmlspecialchars($s->raison_sociale_societe) ?></td>
                    <td><?= htmlspecialchars($s->secteur_societe) ?></td>
                    <td><?= htmlspecialchars($s->ville_societe) ?></td>
                    <td><?= htmlspecialchars($s->statut_societe) ?></td>
                    <td><a href="/societes/show.php?id=?<?=$s->id_societe?>">voir</a></td>
                    </tr>
                <?php endforeach ;?>

                <?php else: ?>
                    <tr>
                        <td clospan="5">aucune entreprise trouvee</td>
                    </tr>
                <?php endif ;?>    
             </tbody>  
        </table>
     </div>
</div>