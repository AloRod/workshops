<div class="container-fluid">
  <div class="jumbotron">
    <h1 class="display-4">Species</h1>
    <p class="lead">List of species</p>
    <hr class="my-4">
    <a href="species/add" class="btn btn-success">Add New Species</a>
  </div>
  <table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
      <tr>
        <th>ID</th>
        <th>Scientific Name</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($species as $key => $specie): ?>
        <tr>
          <td scope="row"><?= $key + 1; ?></td>
          <td><?= htmlspecialchars($specie['scientific_name']); ?></td>
          <td><?= htmlspecialchars($specie['name']); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
