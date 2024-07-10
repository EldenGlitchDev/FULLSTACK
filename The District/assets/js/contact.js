document.addEventListener('DOMContentLoaded', function (){ /* L'évènement DOMContentLoaded est déclenché quand le document HTML initial est complètement chargé et analysé, sans attendre la fin du chargement des feuilles de styles, images et sous-document. */
    const formulaire = document.getElementById("formulaire");
    formulaire.addEventListener('submit', function (e){ /* La méthode addEventListener() de EventTarget attache une fonction à appeler chaque fois que l'évènement spécifié est envoyé à la cible. */
    {
        e.preventDefault()

valide=true
Nom=document.getElementById("NomJS").value
Prenom=document.getElementById("PrenomJS").value
email=document.getElementById("emailJS").value
telephone=document.getElementById("telephoneJS").value
votreadresse=document.getElementById("votreadresseJS").value

filtrechar = new RegExp(/^[A-Za-z\s]+$/)
filtrenum = new RegExp("^([0-9]{10})+$")
filtremail = new RegExp (/^[a-z0-9.-]+@[a-z0-9.-]+.[a-z0-9]+$/)

resultat=filtrechar.test(Nom)
if (resultat==false)
{
    valide=false
    alert("Nom invalide.")
}

resultat=filtrechar.test(Prenom)
if (resultat==false)
{
    valide=false
    alert("Prenom invalide.")
}

resultat=filtremail.test(email)
if (resultat==false)
{
    valide=false
    alert("Entrez un email valide.")
}

resultat=filtrenum.test(telephone)
if (resultat==false)
{
    valide=false
    alert("Entrez un numéro de téléphone valide.")
}

resultat=filtrechar.test(votreadresse)
if (resultat==false)
{
    valide=false
    alert("Tape ta demande.")
}

if (valide)
    {
        console.log("Formulaire okey")
        formulaire.submit()
    }

    }
})
})