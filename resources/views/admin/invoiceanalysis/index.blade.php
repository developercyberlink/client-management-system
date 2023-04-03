@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body">

      <h5 class="card-title">Fiscal date information</h5>

      <label for="fiscal_year">Select Fiscal Year</label>
      <select name="fiscal_year" onchange="fetchFiscalData()" id="fiscal_year" class="form-control">
        <option style="display:none">Choose a year</option>
        @foreach ($fiscal_years as $year)
            <option value="{{$year->id}}">{{$year->start_date}} | {{$year->end_date}}</option>
        @endforeach
      </select>

      <div class="row">
        <div class="col-md-6">
            <table class="table table-hover" id="table">
                <thead>
                <tr>
                    <th scope="col">Invoice no</th>
                    <th scope="col">User</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody id="table-body">
        
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            
        </div>
      </div>
    </div>

</div>

<div class="card">
    <div class="card-body">

        <h5 class="card-title">Yearly total</h5>

        <canvas id="chart" height="150%"></canvas>
    </div>
</div>

@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

<script>

    $( document ).ready(function() {
        updateChart();
    });

    function fetchFiscalData(){

        let newId = "newId"+Math.floor(Math.random()*1000);

        $("table").attr("id", newId);

        $("#table-body").empty();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'post',
            url: "{{route('admin.invoiceanalysis.fiscaldata')}}",
            data: {"id":$("#fiscal_year").val()},
            success: function(data){
                for(let row of data){
                    let htmlObj = `<tr>
                        <td>`+row.invoice_no+`</td>
                        <td>`+row.user.name+`</td>
                        <td>`+row.date_of_entry+`</td>
                        </tr>
                        `;
                    
                    $("#table-body").append(htmlObj);
                }
                $('#'+newId).DataTable();
            }
        });
    }

    function updateChart(){
        async function fetchData(){
            const url = "http://localhost:8000/admin/invoiceanalysis/allfiscaltotal";
            const response = await fetch(url);

            const datapoints = await response.json();

            console.log(datapoints);

            return datapoints;
        }

        fetchData().then(datapoints=>{
            const years = datapoints.map(function(index){
                return index.year;
            });

            const totals = datapoints.map(function(index){
                return index.total;
            });

            myChart.config.data.labels = years;
            myChart.config.data.datasets[0].data = totals;
            myChart.update();
        });
    }

    const ctx = document.getElementById('chart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Yearly Invoice Total',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },

        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

@endsection