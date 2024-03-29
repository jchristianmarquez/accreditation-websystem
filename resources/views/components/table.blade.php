<div class="{{$divName}}">
    <div class="general-header">
        <h2 class="table-header">{{$table_header}}</h2>
    </div>
    <div class="line-divider"><hr></div>
    <div class="table-container">
        <button id="add-btn" class="add-btn add"><i class="fa fa-plus"></i>Add {{$itemLabel}}</button>
        <table class="table {{$tableType}}">
            <thead>
                {{$rows}}
            </thead>
            <tbody>
                {{$table_content}}
            </tbody>
        </table>
        @yield('button')
    </div>
</div>
