<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Payment Page</title>
  </head>
  <body>
    <div class="container" mt-5>
    <div class="card">
        <div class="card-header">
            Make Payment
        </div>
        <div class="card-body">
          @if(session()->has('success'))
          <div class="alert alert-success">
          {{ session('success') }}
          </div>
          @endif
          @if(session()->has('error'))
          <div class="alert alert-danger"></div>
          {{ session('error') }}
          </div>
          @endif
            <form action="{{ route('make-order') }}" method="POST"> 
              @csrf
                <div class="form-group row">
                <label class="col-sm-2 col-form-label">Amount</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" placeholder="Amount" name="amount">
                @error('amount') <font color="red">{{ $message }}</font>@enderror
              </div>
            </div>
            <div class="form-group text-center">
             <button type="submit" class="btn btn-primary">Make Payment</button>
            </div>
            </form>
        </div>
    </div>
    </div>
  </body>
</html>