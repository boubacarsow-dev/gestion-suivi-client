function traiterPaiement(panier,solde) {
    let total=0;
    
    for(let x of panier){
        if(typeof x !== 'number' || x<0){
            throw new Error("Prix invalide détecté");
            
        }
        total +=x;
        
    }
    if(total>solde){
        throw new Error("Fonds insuffisants");
    }

    return solde-total;
}

try {
    let test = traiterPaiement([2000, 56.55, 8000], 15000);
    console.log("Reste du solde :", test); // Affiche : 4943.45
} catch (erreur) {
    console.error("Erreur :", erreur.message);
}
Number.