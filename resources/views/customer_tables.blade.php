@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script> -->
    <div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Customers Table</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                    Customer id
                </th>
                <th>
                  First name
                </th>
                <th>
                  Last Name
                </th>
                <th>
                  Email
                </th>
                <th>
                  Address
                </th>
                <th>
                  telephone number
                </th>
                <th>
                  Gender
                </th>
              </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>
                    {{$customer->customer_id}}
                </td>
                <td>
                    {{$customer->first_name}}
                </td>
                <td>
                {{$customer->last_name}}
                </td>
                <td>
                {{$customer->Email}}
                </td>
                <td>
                {{$customer->address}}
                </td>
                <td>
                {{$customer->telephone_number}}
                </td>
                <td>
                {{$customer->gender}}
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
                          
                                        
                          
       
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
