<div>
  <div class="wrapper">
    <!-- .page -->
    <div class="page">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
        </div><input type="text" class="form-control" name="keyword" placeholder="Search..." wire:model="search">
      </div>
      <div class="page-inner">
        <div class="page-section">
          <div class="row">
            @foreach ($data as $key => $career)
            <div class="col-lg-6 col-xl-4">
              <!-- .card -->
              <div class="card card-fluid">
                <!-- .card-header -->
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="badge bg-muted" data-toggle="tooltip" data-placement="bottom" title="Deadline"><span class="sr-only">Deadline</span> <i class="fa fa-calendar-alt text-muted mr-1"></i> 07 Aug 2018</span>
                    <div class="dropdown">
                      <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-arrow"></div><a href="#" class="dropdown-item">View Project</a> <a href="#" class="dropdown-item">Add Member</a> <a href="#" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Remove</a>
                      </div>
                    </div>
                  </div>
                </div><!-- /.card-header -->
                <!-- .card-body -->
                <div class="card-body text-center">
                  <h1>{{ $career->user->count() }}</h1>
                  <h3 class="card-title">
                    <a href="page-project.html">{{ $career->jobname }}</a>
                  </h3>
                  <p class="card-subtitle text-muted"> {{ $career->company['company'] }} </p><!-- .my-3 -->

                </div><!-- /.card-body -->
              </div><!-- /.card -->
            </div>
            @endforeach
          </div>
        </div>
      </div><!-- /.page-inner -->
    </div><!-- /.page -->
  </div><!-- .app-footer -->
  <footer class="app-footer">
    <ul class="list-inline">
      <li class="list-inline-item">
        <a class="text-muted" href="#">Support</a>
      </li>
      <li class="list-inline-item">
        <a class="text-muted" href="#">Help Center</a>
      </li>
      <li class="list-inline-item">
        <a class="text-muted" href="#">Privacy</a>
      </li>
      <li class="list-inline-item">
        <a class="text-muted" href="#">Terms of Service</a>
      </li>
    </ul>
    <div class="copyright"> Copyright © 2018. All right reserved. </div>
  </footer><!-- /.app-footer -->
</div>