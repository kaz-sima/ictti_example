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
                              <th >Welcome</th>
                              <th>&nbsp;</th>
                          </thead>
                       <tbody>
                          <tr>
                             <td style="height:100%; width: 20%;">
								<ul>
                            		<li><a href="{{route('admin.book')}}">Book Management</a></li>
                            		<li><a href="#">loan Management</a></li>
                            		<li><a href="#">User Management</a></li>
                            		<li><a href="{{route('admin.ctgry.index')}}">Category Management</a></li>
                            		<li><a href="{{route('admin.logout')}}">Logout</a></li>
                            	</ul>
							</td>                             
							<td style="height:100%; width: 80%;">
								@yield('content')
							</td> 
                          </tr>
                          <tr>
                          	<td align="left">&copy; Copyright 2019</td>
                    		<td align="right">Created by ICTTI (Advanced Web Development)</td>
                          </tr>
                       </tbody>
                    </table>
                 </div>
              </div>
           </div>
        </section>
@endsection

