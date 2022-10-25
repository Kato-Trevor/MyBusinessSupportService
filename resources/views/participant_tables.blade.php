@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script> -->
    <div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Participants Table</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                    Participant id
                </th>
                <th>
                  Name
                </th>
                <th>
                  Date of birth
                </th>
                <th>
                  Points
                </th>
                <th>
                  Sales Percentage
                </th>
              </tr>
            </thead>
            <tbody>
            @foreach($posts as $participant)
            <tr>
                <td>
                    {{$participant->participant_id}}
                </td>
                <td>
                    {{$participant->name}}
                </td>
                <td>
                {{$participant->date_of_birth}}
                </td>
                <td>
                {{$participant->points}}
                </td> 
                <td>
                  {{$participant->sales_percentage}}
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
 
  </div>
</div>
                          
                                        
                          
       
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
