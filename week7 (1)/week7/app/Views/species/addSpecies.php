<div class="container-fluid">
  <div class="jumbotron">
    <h1 class="display-4">Add a New Species</h1>
    <p class="lead">Complete the form below to add a new species.</p>
    <hr class="my-4">
  </div>
  <form action="/species/create" method="POST">
    <div class="form-group">
      <label for="scientific_name">Scientific Name</label>
      <input type="text" class="form-control" id="scientific_name" name="scientific_name" placeholder="Enter scientific name" required>
    </div>
    <div class="form-group">
      <label for="name">Common Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter common name" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Species</button>
  </form>
</div>
