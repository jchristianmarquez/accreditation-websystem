<x-app-layout>
    <x-table tableType="table-information" itemLabel="Row">
        <x-slot name="divName">table-info-div</x-slot>
        <x-slot name="table_header">
            {{$programTitle}}
            <x-slot name="rows">
                <tr>
                    @foreach ($templates as $column)
                        <th>{{$column->columnName}}</th>
                    @endforeach
                    <th colspan="1">Action</th>
                </tr>
            </x-slot>
            <x-slot name="table_content">
                @foreach($uniqueRows as $row)
                    <tr>
                        @foreach($table_info->where('tblRow',$row->tblRow) as $col)
                        <td class="cellEdit">
                            <div>{!!$col->cellText!!}</div>
                        </td>
                        @endforeach
                        <td data-label="Actions">
                            <button id="delete-btn" class="action-btn delete-btn">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-slot>
    </x-table>

    {{-- ADD MODAL --}}
    <x-modal-type id="addModal" class="area_manager">
        <x-slot name="modal_heading">
            Add Area
        </x-slot>
        <div class="addForm">
            Add another Row in this Table?
            <form method="POST" action="{{ url('add-row') }}" id='addform'>
                @csrf
                <x-read name="program" type="hidden" :value="$program" required autofocus />
                <x-read name="area" type="hidden" :value="$area" required autofocus />
                <x-read name="reportType" type="hidden" :value="$report" required autofocus />

                @for($index = 1; $index<=count($columnCount); $index++)
                    {{-- Table Row - tblRow = Last Value of Row + 1 --}}
                    <x-read name="tblRow[]" type="hidden" :value="$uniqueRows->count()+1" required autofocus />
                    {{-- Table Column --}}
                    <x-read name="tblCol[]" type="hidden" :value="$index" required autofocus />
                @endfor

                <button class="modal-btn btn-modal-edit" type ='submit'>
                    {{ __('Confirm') }}
                </button>
            </form>
        </div>
    </x-modal-type>

    {{-- EDIT MODAL --}}
    <x-modal-type id="editModal" class="area_manager">
        <x-slot name="modal_heading">
            Edit Area
        </x-slot>
        <div class="editForm">
            <form method="POST" action="{{ url('update-cell') }}" id='editform'>
                @csrf

                <x-read name="program" type="hidden" :value="$program" required autofocus />
                <x-read name="area" type="hidden" :value="$area" required autofocus />
                <x-read name="reportType" type="hidden" :value="$report" required autofocus />
                <x-read id="tblRow" name="tblRow" :value="old('tblRow')" required autofocus />
                <x-read id="tblCol" name="tblCol" :value="old('tblCol')" required autofocus />

                <!-- CKEDITOR Textarea -->
                <textarea id="my-editor" name="cellText" class="form-control">{!! old('cellText', 'content') !!}</textarea>

                <button class="modal-btn btn-modal-edit" type ='submit'>
                    {{ __('Save') }}
                </button>
            </form>
        </div>
    </x-modal-type>

    {{-- DELETE MODAL --}}
    <x-modal-type id="deleteModal" class="area_manager">
        <x-slot name="modal_heading">
            Delete Area
        </x-slot>
        <div class="deleteForm">
            Delete this Row in this Table?
            <form method="POST" action="{{ url('delete-row') }}" id='deleteform'>
                @csrf
                    <x-read name="accred_level" type="hidden" :value="1" required autofocus />
                    <x-read name="program" type="hidden" :value="$program" required autofocus />
                    <x-read name="area" type="hidden" :value="$area" required autofocus />
                    <x-read name="reportType" type="hidden" :value="$report" required autofocus />

                    <x-read id="deleteRow" class="block mt-1 w-full mb-2" type="number" name="tblRow" :value="old('tblRow')" required autofocus />

                <button class="modal-btn btn-modal-delete" type ='submit'>
                    {{ __('Delete') }}
                </button>
            </form>
        </div>
    </x-modal-type>
</x-app-layout>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

    var editor = CKEDITOR.replace('my-editor', options);
</script>


{{-- Script for showing modal --}}
<script src="{{ asset('js/show-modal.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.cellEdit').on('click', function(){
        var program = {!! json_encode($program) !!};
        var area = {!! json_encode($area) !!};
        var report = {!! json_encode($report) !!};

        var row = $(this).closest('tr').index() +1;
        var col = $(this).closest('td').index() +1;
        var cellText = $(this).closest('td').find('div').html();

        editor.setData(cellText);
        console.log(cellText);
        console.log(row);
        console.log(col);

      $('#tblRow').val(row);
      $('#tblCol').val(col);
    });
    $('#editModal').modal({
        focus: false
    });
    });

    $(document).ready(function(){
        $('.delete-btn').on('click', function(){
            var row = $(this).closest('tr').index();
            console.log(row);

            $('#deleteRow').val(row);
        });
    });
</script>
<script>
    $(document).ready(function () {
       $(document).on('mouseenter', '.cellEdit', function () {
           $(this).find("#editbutton").show();
           $(this).animate({
                opacity: 0.6,
            }, 100);
            console.log()
       }).on('mouseleave', '.cellEdit', function () {
           $(this).find("#editbutton").hide();
           $(this).animate({
                opacity: 1,
            }, 100);
       });
   });
</script>
