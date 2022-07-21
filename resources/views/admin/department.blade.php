<x-app-layout>
    <x-table tableType="control-panel" itemLabel="Department">
        <x-slot name="table_header">
            List of Departments
            <x-slot name="rows">
                <tr>
                    <th>Accronym</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </x-slot>
            <x-slot name="table_content">
                @foreach ($departments as $department)
                <tr>
                    <td data-label="Accronym">{{$department->shortname}}</td>
                    <td data-label="Name">{{$department->longname}}</td>
                    <td data-label="Description">{{$department->description}}</td>
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
    <x-modal-type id="addModal">
        <x-slot name="modal_heading">
            Add Department
        </x-slot>
        <div class="editForm">
            <form method="POST" action="{{ url('add-department') }}" id='addform'>
                @csrf

                <!-- short name -->
                <x-label class="font-weight-bold" for="shortname" :value="__('Short Name')" />
                <x-input id="shortname" class="block mt-1 w-full mb-3" type="text" name="shortname" :value="old('shortname')" required autofocus />

                <!-- long name -->
                <x-label for="longname" :value="__('Long Name')" />
                <x-input id="longname" class="block mt-1 w-full mb-3" type="text" name="longname" :value="old('longname')" required autofocus/>


                <!-- description -->
                <x-label for="description" :value="__('Description')" />
                <x-textarea-input id="description" class="block mt-1 w-full mb-3" type="text" name="description" :value="old('description')" required autofocus />

                <button class="modal-btn btn-modal-edit" type ='submit'>
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </x-modal-type>

    {{-- EDIT MODAL --}}
    <x-modal-type id="editModal">
        <x-slot name="modal_heading">
            Edit Department
        </x-slot>
        <div class="editForm">
            <form method="POST" action="{{ url('update-department') }}" id='editform'>
                @csrf

                <!-- short name -->
                <x-label class="font-weight-bold" for="shortname" :value="__('Short Name')" />
                <x-input id="editShortname" class="block mt-1 w-full mb-3" type="text" name="shortname" :value="old('shortname')" required autofocus />

                <!-- long name -->
                <x-label for="longname" :value="__('Long Name')" />
                <x-input id="editLongname" class="block mt-1 w-full mb-3" type="text" name="longname" :value="old('longname')" required autofocus/>


                <!-- description -->
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
            Delete Department
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
