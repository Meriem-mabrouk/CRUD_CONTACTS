$(document).ready(function () {
    // Initialisation de la table DataTable avec une configuration spécifique
    const table = $("#contactsTable").DataTable({
      // Configuration des textes affichés dans l'interface utilisateur de DataTable
      language: {
          processing: "Traitement en cours...",
          search: "Rechercher&nbsp;:",
          lengthMenu: "Afficher _MENU_ éléments",
          info: "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
          infoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
          infoFiltered: "(filtré à partir de _MAX_ éléments au total)",
          loadingRecords: "Chargement en cours...",
          zeroRecords: "Aucun élément à afficher",
          emptyTable: "Aucune donnée disponible dans le tableau",
          paginate: {
            first: "Premier",
            previous: "Précédent",
            next: "Suivant",
            last: "Dernier"
          },
          aria: {
            sortAscending: ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant"
          }
        },
        
        // Configuration de l'appel AJAX pour récupérer les données de la table
        ajax: {
            url: "process.php", // URL du fichier serveur traitant les requêtes
            type: "GET", // Méthode HTTP GET
            data: { action: "fetch" }, // Paramètre de requête pour récupérer les contacts
            dataSrc: "data", // Source des données renvoyées par le serveur
        },
        
        // Configuration des colonnes de la table
        columns: [
            { data: "id" }, // Colonne pour l'ID
            { data: "prenom" }, // Colonne pour le prénom
            { data: "nom" }, // Colonne pour le nom
            { data: "age" }, // Colonne pour l'âge
            { data: "pays" }, // Colonne pour le pays
            { data: "email" }, // Colonne pour l'email
            { data: "telephone" }, // Colonne pour le téléphone
            {
                data: null, // Colonne d'actions personnalisées (édition et suppression)
                render: function (data) {
                    // Génère les boutons d'édition et de suppression pour chaque ligne
                    return `
                        <button class="btn btn-sm btn-warning btn-edit" data-id="${data.id}"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                    `;
                },
            },
        ],
    });
  
    // Gestion de l'ajout d'un nouveau contact
    $("#contactForm").on("submit", function (e) {
        e.preventDefault(); // Empêche le rechargement de la page lors de la soumission du formulaire
        const formData = $(this).serialize() + "&action=create"; // Sérialise les données du formulaire et ajoute l'action 'create'
        
        // Envoi des données au serveur via POST pour créer le contact
        $.post("process.php", formData, function (response) {
            Swal.fire("Succès", response.message, "success"); // Affiche une alerte de succès
            $("#createModal").modal("hide"); // Ferme le modal de création
            table.ajax.reload(); // Recharge les données de la table
        }, "json");
    });
  
    // Gestion de l'ouverture du modal d'édition et du préchargement des données
    $("#contactsTable").on("click", ".btn-edit", function () {
        const id = $(this).data("id"); // Récupère l'ID du contact sélectionné
        $.get("process.php", { action: "edit", id }, function (response) {
            const data = response.data; // Récupère les données du contact
            // Remplie le formulaire d'édition avec les données du contact
            $("#editModal #prenom").val(data.prenom);
            $("#editModal #nom").val(data.nom);
            $("#editModal #age").val(data.age);
            $("#editModal #pays").val(data.pays);
            $("#editModal #email").val(data.email);
            $("#editModal #tel").val(data.telephone);
            $("#editModal").data("id", data.id).modal("show"); // Ouvre le modal d'édition
        }, "json");
    });
  
    // Gestion de la mise à jour d'un contact
    $("#editContactForm").on("submit", function (e) {
        e.preventDefault(); // Empêche le rechargement de la page lors de la soumission du formulaire
        const id = $("#editModal").data("id"); // Récupère l'ID du contact à modifier
        const formData = $(this).serialize() + `&id=${id}&action=update`; // Sérialise les données du formulaire et ajoute l'ID et l'action 'update'
        
        // Envoi des données au serveur via POST pour mettre à jour le contact
        $.post("process.php", formData, function (response) {
            Swal.fire("Succès", response.message, "success"); // Affiche une alerte de succès
            $("#editModal").modal("hide"); // Ferme le modal d'édition
            table.ajax.reload(); // Recharge les données de la table
        }, "json");
    });
  
    // Gestion de la suppression d'un contact
    $("#contactsTable").on("click", ".btn-delete", function () {
        const id = $(this).data("id"); // Récupère l'ID du contact à supprimer
        Swal.fire({
            title: "Êtes-vous sûr?", // Affiche une alerte de confirmation avant la suppression
            text: "Cette action est irréversible!",
            icon: "warning",
            showCancelButton: true, // Permet d'annuler l'action
            confirmButtonColor: "#3085d6", // Couleur du bouton de confirmation
            cancelButtonColor: "#d33", // Couleur du bouton d'annulation
            confirmButtonText: "Oui, supprimer!", // Texte du bouton de confirmation
        }).then((result) => {
            if (result.isConfirmed) { // Si la confirmation est donnée
                $.post("process.php", { id, action: "delete" }, function (response) {
                    Swal.fire("Supprimé!", response.message, "success"); // Affiche une alerte de succès
                    table.ajax.reload(); // Recharge les données de la table
                }, "json");
            }
        });
    });
  });
  