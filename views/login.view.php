<?php require 'partials/header.php'; ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card">
        <div class="card-header">
          <h2>Login Page</h2>
        </div>
        <div class="card-body">
          <form action="">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="Name" id="Name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
              <button class="btn btn-info" type="submit">Login</button>
            </div>
          </form>
          <p>
            <a href="/register" class="btn btn-primary">Register</a>
            <a href="/demo-login" class="btn btn-info">Demo Login</a>
           </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require 'partials/footer.php'; ?>
