<div>
    <div class="page-section">
        <!-- .section-block -->
        <div class="section-block">
          <!-- grid row -->
          <div class="row mb-4">
            <!-- .col -->
            <div class="col">
              <!-- .has-clearable -->
              <div class="has-clearable">
                <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button> <input type="text" class="form-control" placeholder="Search" wire:model="search">
              </div><!-- /.has-clearable -->
            </div><!-- /.col -->
            <!-- .col-auto -->
          </div><!-- /grid row -->
          <!-- grid row -->
          <div class="row">
            <!-- grid column -->
            @foreach ($data as $career)  
              <div class="col-lg-6">
                <!-- .card --> 
                <div class="card">
                  <!-- .card-header -->
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="badge bg-muted" data-toggle="tooltip" data-placement="bottom" title="Deadline"><span class="sr-only">Deadline</span> <i class="fa fa-calendar-alt text-muted mr-1"></i>{{ \Carbon\Carbon::parse($career->created_at)->diffForHumans() }}</span>
                      <div class="dropdown">
                        <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <div class="dropdown-arrow"></div><a href="{{ route('jobportal-show',$career->id) }}" class="dropdown-item">View Job</a>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.card-header -->
                  <!-- .card-body -->
                  <div class="card-body text-center">
                    <!-- avatars -->
                    <img src="https://karir-production.nos.jkt-1.neo.id/logos/72/3341172/download.png" width="300px" alt=""> <!-- /avatars -->
                    <!-- /.media -->
                    <h5 class="card-title">
                      <a href="{{ route('jobportal-show',$career->id) }}">{{ $career->jobname }}</a>
                    </h5>
                    <p class="card-subtitle text-muted"> {{ $career->company['company'] }} </p><!-- .my-3 -->
                    <div class="my-3">
                      <p class="card-subtitle text-muted"> <i class="fas fa-map-marker-alt"></i> {{ $career->location }} </p>
                    </div><!-- /.my-3 -->
                    <!-- grid row -->
                    <div class="row">
                      <!-- grid column -->
                      <div class="col">
                        <strong>Salary</strong> <span class="d-block" style="color: green">{{ $career->salary }}</span>
                      </div><!-- /grid column -->
                      <!-- grid column -->
                      <div class="col">
                        <strong>Graduate</strong> <span class="d-block"><span class="badge badge-danger">{{ $career->graduate }}</span></span>
                      </div><!-- /grid column -->
                    </div><!-- /grid row -->
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /grid column -->
            @endforeach
            <!-- grid column -->
          </div><!-- /grid row -->
        </div><!-- /.section-block -->
      </div>
</div>
