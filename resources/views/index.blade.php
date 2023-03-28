@extends('layouts/app')

@section('content')

<div class="container note-details">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-block card-stretch">
        <div class="card-body custom-notes-space mb-4">
          <h3 class="">QR Code Image Generator</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="card card-block card-stretch mt-2">
    <div class="row">
      <div class="col ml-2 mr-2">
        <form id="form" method="POST" action="">
          <div class="modal-body">
            {{ csrf_field() }}
            <div class=" row align-items-center">
              <div class="form-group col-6">
                <label for="fname">Name:</label>
                <input type="text" class="form-control" id="fname" name="name" placeholder="Name">
              </div>
              <div class="form-group col-6">
                <label for="flinkedin">Linkedin URL:</label>
                <input type="url" class="form-control" id="flinkedin" name="linkedin_url" pattern="https://.*" placeholder="Linkedin URL">
              </div>
              <div class="form-group col-6">
                <label for="fgithub">Github URL:</label>
                <input type="url" class="form-control" id="fgithub" name="github_url" pattern="https://.*" placeholder="Github URL">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button value="submit" class="btn btn-primary mr-2">Generate</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $("form").on("submit", function(e) {
    var dataString = $(this).serialize();
    console.log(dataString);
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "<?= route('create-user') ?>",
      data: dataString,
      success: function() {
        var name = document.getElementById("fname").value;
        window.location.href = "http://localhost:8000/user/" + name;
      }
    });
  });
</script>
@endsection