<x-app-layout>
    <x-table tableType="area-manager template-btn" itemLabel="Column">
        <x-slot name="table_header">
            Area Columns
            <x-slot name="rows">
                <tr>
                    <th>Column No.</th>
                    <th>Column Name</th>
                    <th>Actions</th>
                </tr>
            </x-slot>
            <x-slot name="table_content">
                @foreach ($templates as $template)
                <tr>
                    <td data-label="Area">{{$template->columnNumber}}</td>
                    <td data-label="Area Title">{{$template->columnName}}</td>
                    <td data-label="Actions">
                        <button id="edit-btn" class="action-btn edit-btn">Edit</button>
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
            Add Column
        </x-slot>
        <div class="addForm">
            <form method="POST" action="{{ url('add-columnn') }}" id='addform'>
                @csrf
                <!-- Area Number -->
                <x-read id="area" class="block mt-1 w-full mb-3" name="area" type="hidden" :value="$area" required autofocus />
                <!-- Report Type -->
                <x-read id="reportType" class="block mt-1 w-full mb-3" name="reportType" type="hidden" :value="$report" required autofocus />

                <!-- Column Number -->
                <x-label class="font-weight-bold" for="columnNumber" :value="__('Column Number')" />
                <x-input id="columnNumber" class="block mt-1 w-full mb-3" type="number" name="columnNumber" :value="old('columnNumber')" required autofocus />

                <!-- Column Name -->
                <x-label for="columnName" :value="__('Column Title')" />
                <x-input id="columnName" class="block mt-1 w-full mb-3" type="text" name="columnName" :value="old('columnName')" required autofocus/>

                <button class="modal-btn btn-modal-edit" type ='submit'>
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </x-modal-type>

    {{-- EDIT MODAL --}}
    <x-modal-type id="editModal" class="area_manager">
        <x-slot name="modal_heading">
            Edit Column
        </x-slot>
        <div class="editForm">
            <form method="POST" action="{{ url('update-column') }}" id='editform'>
                @csrf
                <!-- Area Number -->
                <x-read id="editArea" class="block mt-1 w-full mb-3" type="hidden" name="area" :value="$area" required autofocus />

                <!-- Report Type -->
                <x-read id="reportType" class="block mt-1 w-full mb-3" type="hidden" name="reportType" :value="$report" required autofocus />

                <!-- Column Number -->
                <x-label class="font-weight-bold" for="columnNumber" :value="__('Column Number')" />
                <x-input id="editcolumnNumber" class="block mt-1 w-full mb-3" type="number" name="columnNumber" :value="old('columnNumber')" required autofocus />

                <!-- Column Name -->
                <x-label for="columnName" :value="__('Column Title')" />
                <x-input id="editcolumnName" class="block mt-1 w-full mb-3" type="text" name="columnName" :value="old('columnName')" required autofocus/>

                <button class="modal-btn btn-modal-edit" type ='submit'>
                    {{ __('Save') }}
                </button>
            </form>
        </div>
    </x-modal-type>

    {{-- DELETE MODAL --}}
    <x-modal-type id="deleteModal" class="area_manager">
        <x-slot name="modal_heading">
            Delete Column
        </x-slot>
        <div class="deleteForm">
            <form method="POST" action="{{ url('delete-column') }}" id='deleteform'>
                @csrf

                <!-- Area Number -->
                <x-read id="editArea" class="block mt-1 w-full mb-3" type="hidden" name="area" :value="$area" required autofocus />

                <!-- Report Type -->
                <x-read id="reportType" class="block mt-1 w-full mb-3" type="hidden" name="reportType" :value="$report" required autofocus />

                <!-- Column Number -->
                <x-label class="font-weight-bold" for="columnNumber" :value="__('Column Number')" />
                <x-read id="deletecolumnNumber" class="block mt-1 w-full mb-3" type="number" name="columnNumber" :value="old('columnNumber')" required autofocus />

                <!-- Column Name -->
                <x-label for="columnName" :value="__('Column Title')" />
                <x-read id="deletecolumnName" class="block mt-1 w-full mb-3" type="text" name="columnName" :value="old('columnName')" required autofocus/>

                <button class="modal-btn btn-modal-delete" type ='submit'>
                    {{ __('Delete') }}
                </button>
            </form>
        </div>
    </x-modal-type>
</x-app-layout>

{{-- Script for showing modal --}}

<script src="{{ asset('js/show-modal.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.edit-btn').on('click', function(){
            $tr =$(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#editcolumnNumber').val(data[0]);
            $('#editcolumnName').val(data[1]);
        });
    });

    $(document).ready(function(){
        $('.delete-btn').on('click', function(){
            $tr =$(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#deletecolumnNumber').val(data[0]);
            $('#deletecolumnName').val(data[1]);
        });
    });
</script>
