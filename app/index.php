<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <style media="screen">
      @media only screen and (min-width: 900px) {
        .position-img {
            margin-top: -205px;
        }
      }

      @media only screen and (max-width: 900px) {
        .position-img {
            margin-top: -120px;
        }
      }

      @media only screen and (max-width: 400px) {
        .position-img {
            margin-top: -30px;
        }
      }
    </style>

  </head>
  <body>
    <img width="100%" src="/assets/img/hospital.jpg" alt="">

    <div class="container position-img">
      <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
          <div class="card">
            <div class="card-body">
              <div class="text-center" style="margin-bottom:40px">
                <h2 style="color:#2196f3">Sistema de Gerenciamento Hospitalar</h2>

                <hr style="width:200px;">
              </div>
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn-block btn btn-primary">Acessar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>
