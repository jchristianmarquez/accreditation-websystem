<x-app-layout>
    <x-table tableType="area-manager" itemLabel="Area">
        <x-slot name="table_header">
            List of Areas
            <x-slot name="rows">
                <tr>
                    <th>Area</th>
                    <th>Area Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </x-slot>
            <x-slot name="table_content">
                @foreach ($areas as $area)
                <tr>
                    <td data-label="Area">{{$area->areaNumber}}</td>
                    <td data-label="Area Title">{{$area->areaName}}</td>
                    <td data-label="Status">
                        {{$department->approvalStatus}}
                        <button id="view-btn" class="action-btn edit-btn">Edit</button>
                    </td>
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
            Add Area
        </x-slot>
        <div class="addForm">
            <form method="POST" action="{{ url('add-area') }}" id='addform'>
                @csrf

                <!-- Area Number -->
                <x-label class="font-weight-bold" for="areaNumber" :value="__('Area Number')" />
                <x-input id="areaNumber" class="block mt-1 w-2 mb-3" type="number" name="areaNumber" :value="old('areaNumber')" required autofocus />

                <!-- Area Name -->
                <x-label for="areaName" :value="__('Area Title')" />
                <x-input id="areaName" class="block mt-1 w-full mb-3" type="text" name="areaName" :value="old('areaName')" required autofocus/>

                <button class="modal-btn btn-modal-edit" type ='submit'>
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </x-modal-type>

    {{-- EDIT MODAL --}}
    <x-modal-type id="editModal">
        <x-slot name="modal_heading">
            Edit Area
        </x-slot>
        <div class="editForm">
            <form method="POST" action="{{ url('update-department') }}" id='editform'>
                @csrf

                <!-- Area Number -->
                <x-label class="font-weight-bold" for="shortname" :value="__('Short Name')" />
                <x-input id="editShortname" class="block mt-1 w-full mb-3" type="text" name="shortname" :value="old('shortname')" required autofocus />

                <!-- Area Name -->
                <x-label for="longname" :value="__('Long Name')" />
                <x-input id="editLongname" class="block mt-1 w-full mb-3" type="text" name="longname" :value="old('longname')" required autofocus/>

                <!-- Approval Type -->
                <x-label for="description" :value="__('Description')" />
                <x-textarea-input id="editDescription" class="block mt-1 w-full mb-3" type="text" name="description" :value="old('description')" required autofocus />

                <!-- Status -->
                <x-label for="description" :value="__('Description')" />
                <x-textarea-input id="editDescription" class="block mt-1 w-full mb-3" type="text" name="description" :value="old('description')" required autofocus />

                <button class="modal-btn btn-modal-edit" type ='submit'>
                    {{ __('Save') }}
                </button>
            </form>
        </div>
    </x-modal-type>

    {{-- DELETE MODAL --}}
    <x-modal-type id="deleteModal">
        <x-slot name="modal_heading">
            Delete Area
        </x-slot>
        <div class="deleteForm">
            <form method="POST" action="{{ url('delete-department') }}" id='deleteform'>
                @csrf

                <!-- short name -->
                <x-label class="font-weight-bold" for="shortname" :value="__('Short Name')" />
                <x-read id="deleteShortname" class="block mt-1 w-full mb-3" type="text" name="shortname" :value="old('shortname')" required autofocus />

                <!-- long name -->
                <x-label for="longname" :value="__('Long Name')" />
                <x-read id="deleteLongname" class="block mt-1 w-full mb-3" type="text" name="longname" :value="old('longname')" required autofocus/>

                <!-- description -->
                <x-label for="description" :value="__('Description')" />
                <x-textarea-read id="deleteDescription" class="block mt-1 w-full mb-3" type="text" name="description" :value="old('description')" required autofocus />

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

            $('#editShortname').val(data[0]);
            $('#editLongname').val(data[1]);
            $('#editDescription').val(data[2]);
        });
    });

    $(document).ready(function(){
        $('.delete-btn').on('click', function(){
            $tr =$(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#deleteShortname').val(data[0]);
            $('#deleteLongname').val(data[1]);
            $('#deleteDescription').val(data[2]);
        });
    });
</script>
