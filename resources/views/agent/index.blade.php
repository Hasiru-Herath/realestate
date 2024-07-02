@extends ('agent.agent_dashboard')  

@section('agent')
		<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Welcome to Agent Dashboard</h4>
          </div>
         
        </div>

    

        <div class="row">
          <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <div class="card-body">
                        <h5 class="card-title" style="text-align: center;font-size: 20px">Add New Property</h5>
                        <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="address">Property Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="form-group">
                                <label for="square_feet">Square Feet</label>
                                <input type="number" class="form-control" id="square_feet" name="square_feet" required>
                            </div>
                            <div class="form-group">
                                <label for="bedrooms">Number of Bedrooms</label>
                                <input type="number" class="form-control" id="bedrooms" name="bedrooms" required>
                            </div>
                            <div class="form-group">
                                <label for="bathrooms">Number of Bathrooms</label>
                                <input type="number" class="form-control" id="bathrooms" name="bathrooms" required>
                            </div>
                            <div class="form-group">
                                <label for="photo">Property Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                
              </div> 
            </div>
          </div>
         
        </div> <!-- row -->

			</div>


@endsection