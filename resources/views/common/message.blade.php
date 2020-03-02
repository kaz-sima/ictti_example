@if (Session::has('samebookborrow'))
    <div class="text-center">
    <font color="red">{{ Session::get('samebookborrow') }}</font>
    </div>
@endif
@if (Session::has('samebookreserve'))
    <div class="text-center">
    <font color="red">{{ Session::get('samebookreserve') }}</font>
    </div>
@endif
@if (Session::has('successborrow'))
    <div class="text-center">
    <font color="blue">{{ Session::get('successborrow') }}</font>
    </div>
@endif
@if (Session::has('successreserve'))
    <div class="text-center">
    <font color="blue">{{ Session::get('successreserve') }}</font>
    </div>
@endif
