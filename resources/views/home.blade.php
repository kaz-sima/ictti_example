@extends('layouts.userlayout')
@section('content')
<h4 align="center">Laravel Framework Lecture</h4>
	<section class="signa-table-section clearfix">
           <div class="container">
              <div class="row">
                 <div class="col-lg">
                    <table class="table table-responsive table-bordered" border="1" >
                       <thead>
                          <tr>
                              <th >Welcome {{ auth()->user()->name }}</th>
                              <th>&nbsp;</th>
                          </thead>
                       <tbody>
                          <tr>
                             <td style="height:100%; width: 30%;">
								<ul>
                            		<li><a href="{{route('profile.edit')}}">Edit Registration Infomation</a></li>
                            		<li><a href="{{route('book.index')}}">book borrow</a></li>
                            		<li><a href="{{route('logout')}}">logout</a></li>
                            	</ul>
							</td>
							<td style="height:100%; width: 70%;">
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
@stop
