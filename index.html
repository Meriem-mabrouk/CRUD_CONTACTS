<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Contacts</title>
  <!-- Importation de Bootstrap pour la mise en page -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Importation des icônes FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
  <!-- Importation de DataTables pour les tableaux interactifs -->
  <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css">
</head>

<body>
  <header>
    <!-- Barre de navigation en haut de la page -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Gestion des Contacts</a>
      </div>
    </nav>
  </header>

  <section class="container py-5">
    <!-- Titre principal -->
    <div class="row">
      <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary">CRUD PHP POO MYSQL JS AJAX</h1>
      </div>
    </div>

    <div class="dropdown-divider border-warning"></div>

    <!-- Bouton pour ajouter un nouveau contact -->
    <div class="row mb-4">
      <div class="col-md-6">
        <h5 class="fw-bold mb-0">Liste des contacts</h5>
      </div>
      <div class="col-md-6">
        <div class="d-flex justify-content-end">
          <button class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-folder-plus"></i> Nouveau
          </button>
        </div>
      </div>
    </div>

    <div class="dropdown-divider border-warning"></div>

    <!-- Tableau affichant la liste des contacts -->
    <div class="row">
      <div class="table-responsive">
        <table id="contactsTable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Prénom</th>
              <th>Nom</th>
              <th>Âge</th>
              <th>Pays</th>
              <th>Email</th>
              <th>Téléphone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Les données seront injectées ici via AJAX -->
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Modal pour l'ajout de contact -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">Ajouter un contact</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="contactForm">
          <div class="modal-body">
            <!-- Ligne pour le prénom et le nom -->
            <div class="row g-3">
              <div class="col-md-6">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
              </div>
            </div>
            <!-- Ligne pour l'âge et le pays -->
            <div class="row g-3 mt-3">
              <div class="col-md-3">
                <label for="age" class="form-label">Âge</label>
                <!-- Validation: âge > 0 -->
                <input type="number" id="age" name="age" class="form-control" min="1" required>
              </div>
              <div class="col-md-9">
                <label for="pays" class="form-label">Pays</label>
                <input type="text" id="pays" name="pays" class="form-control" required>
              </div>
            </div>
            <!-- Champ pour l'email -->
            <div class="mt-3">
              <label for="email" class="form-label">Email</label>
              <!-- Validation: email valide -->
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <!-- Champ pour le téléphone -->
            <div class="mt-3">
              <label for="tel" class="form-label">Téléphone</label>
              <!-- Validation: format +code suivi de 8 chiffres -->
              <input type="tel" id="tel" name="telephone" class="form-control" pattern="\+\d{1,4}\d{8}" placeholder="Ex: +21612345678" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary" id="saveContactBtn">
              Ajouter <i class="fas fa-plus ms-2"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal pour l'édition de contact -->
  <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">Modifier le contact</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editContactForm">
          <div class="modal-body">
            <div class="mb-3">
              <label for="prenom" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="mb-3">
              <label for="nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
              <label for="age" class="form-label">Âge</label>
              <input type="number" class="form-control" id="age" name="age" min="1" required>
            </div>
            <div class="mb-3">
              <label for="pays" class="form-label">Pays</label>
              <input type="text" class="form-control" id="pays" name="pays" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="tel" class="form-label">Téléphone</label>
              <input type="tel" class="form-control" id="tel" name="telephone" pattern="\+\d{1,4}\d{8}" placeholder="Ex: +21612345678" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Importation des scripts nécessaires -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-2.1.8/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="process.js"></script>
</body>

</html>
