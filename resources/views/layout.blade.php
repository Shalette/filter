<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', '')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ URL::asset('css/index.css') }}">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
       Assignment: Filter
     </nav><br>
      <div class="container">

          <div class="row">

            <div class="input-group mb-3">
                <input type="text" class="form-control" id="tags" placeholder="Search by Keyword (Separate using commas)">
                <div class="input-group-append">
                  <button class="btn btn-success" id="addTag">Add Tag</button>
                </div>
            </div>

            <div class="col-md-4 border">
              <form action="{{ route('filter') }}" method="POST">
                {{ csrf_field() }}
                <br>
                  <h3>FILTERS</h3>
                  <br>
                  <h5>Skills</h5>
                  <input type="hidden" id="skills" name="skills">
                  <div class="card">
                    <div class="card-body" id="skillsCard">
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="sel1">Minimum Hours per Week:</label>
                    <select name="avail" class="form-control" id="sel1">
                      <option value="10">10</option>
                      <option value="20">20</option>
                      <option value="30">30</option>
                      <option value="40">40</option>
                      <option value="41">> 40</option>
                    </select>
                  </div>
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="availNow" value="1">Available Now
                    </label>
                  </div>
                  <br><br>
                  <h5>Pay rate / hr between</h5>
                  <div style="display:flex; justify-content: space-between">
                    <div style="flex:1"><input type="number" name="minPay" class="form-control" id="minPay" value=1 onchange="determine()"
                      oninvalid="this.setCustomValidity('Enter Valid Min. Pay')" oninput="this.setCustomValidity('')"></div>&nbsp;&nbsp;
                    <div style="flex:1"><input type="number" name="maxPay" class="form-control" id="maxPay" value=40 onchange="determine()"
                      oninvalid="this.setCustomValidity('Enter Valid Max. Pay')" oninput="this.setCustomValidity('')"></div>
                  </div>
                  <br>
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="withoutPay" value="1">Include Profiles Without Pay rates
                    </label>
                  </div>
                  <br><br>
                  <h5>Maximum Years of Experience</h5>
                  <input type="number" name="maxYears" class="form-control" max=40 value=10
                  oninvalid="this.setCustomValidity('Enter Valid Years of Experience')" oninput="this.setCustomValidity('')"><br>
                  <button class="btn btn-info" type="submit">Filter</button><br><br>
            </form>
          </div>
      @yield('content')
      </div>
    </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
      <script src="{{ URL::asset('js/index.js') }}"></script>

    </body>
</html>
