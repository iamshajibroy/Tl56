  <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
      <!-- Search Widget -->
      <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-info" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-5 offset-lg-2">
              <ul class="list-unstyled mb-0">
                
                @foreach($categories as $category)
                <li>
                  <a href="#">{{ $category->category_name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
            
          </div>
        </div>
      </div>
      <!-- Add Button -->
      <div class="card my-4">
        <h5 class="card-header">Post Your ad. right now</h5>
        <div class="card-body">
          <a class="btn btn-primary btn-block"  href="{{url('/adPost')}}">Post AD. <br>  </a>
        </div>
      </div>
      <!-- Side Widget -->
      <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
          You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
      </div>
    </div>