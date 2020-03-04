@extends('layouts.adminlayout')
@section('content')

<h4 align="center">Laravel Framework Lecture</h4>
    	<section class="signa-table-section clearfix">
           <div class="container">
              <div class="row">
                 <div class="col-lg">
                    <table class="table table-responsive table-bordered" border="1" >
                       <thead>
                          <tr>
                              <th >statistics</th>
                              <th>&nbsp;</th>
                          </thead>
                       <tbody>
                          <tr>
                             <td style="height:100%; width: 20%;">
								<ul>
                            		<li><a href="{{url('admin/statistic/barchart')}}">Bar chart</a></li>
                            		<li><a href="{{url('admin/statistic/doughnutchart')}}">Doughnut chart</a></li>
                            	</ul>
							</td>
							<td style="height:100%; width: 80%;">
								@yield('content')
							</td>                            
                          </tr>
                       </tbody>
                    </table>
                 </div>
              </div>
           </div>
        </section>
@endsection
