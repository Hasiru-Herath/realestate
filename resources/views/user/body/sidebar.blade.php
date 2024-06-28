<style>
  
  .sidebar {
            background-color: #0c1427;
            color: #fff;
            padding: 15px;
            border-radius: 0px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .sidebar h5 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
            margin-left: 20%;
        }
        .sidebar .form-group {
            margin-bottom: 20px;
        }
        .sidebar .form-control {
            background-color: #495057;
            border: none;
            color: #fff;
        }
        .sidebar .btn-primary {
            background-color: #17a2b8;
            border: none;
            width: 75%;
            margin-left: 12.5%;
        }
        .sidebar .btn-primary:hover {
            background-color: #0d8ba0;
        }
</style>

<nav class="sidebar">
        

        <div class="col-md-3">
                    <div class="sidebar">
                        <h5>Filter Options</h5>
                        <form method="GET" action="{{ route('user.filter.properties') }}">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <select class="form-control" id="price" name="price">
                                    <option value="">Select Price Range</option>
                                    <option value="0-100000">$0 - $100,000</option>
                                    <option value="100000-200000">$100,000 - $200,000</option>
                                    <option value="200000-300000">$200,000 - $300,000</option>
                                    <option value="300000-400000">$300,000 - $400,000</option>
                                    <option value="400000+">$400,000+</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="min_sq_ft">Min Square Feet</label>
                              <select class="form-control" id="min_sq_ft" name="min_sq_ft">
                                  <option value="">Select Min Square Feet</option>
                                  <option value="0">0 sq ft</option>
                                  <option value="1000">1000 sq ft</option>
                                  <option value="2000">2000 sq ft</option>
                                  <option value="3000">3000 sq ft</option>
                                  <option value="4000">4000 sq ft</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="max_sq_ft">Max Square Feet</label>
                              <select class="form-control" id="max_sq_ft" name="max_sq_ft">
                                  <option value="">Select Max Square Feet</option>
                                  <option value="1000">1000 sq ft</option>
                                  <option value="2000">2000 sq ft</option>
                                  <option value="3000">3000 sq ft</option>
                                  <option value="4000">4000 sq ft</option>
                                  <option value="5000">5000 sq ft</option>
                              </select>
                          </div>
                            <!-- <div class="form-group">
                                <label for="area">Area</label>
                                <select class="form-control" id="area" name="area">
                                    <option value="">Select Area</option>
                                    <option value="downtown">Downtown</option>
                                    <option value="suburbs">Suburbs</option>
                                    <option value="rural">Rural</option>
                                </select>
                            </div> -->
                            <button type="submit" class="btn btn-primary">Apply Filters</button>
                        </form>
                    </div>
                </div>
    </nav>