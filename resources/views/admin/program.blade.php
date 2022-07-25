<x-app-layout>
    <x-table tableType="control-panel" itemLabel="Program">
        <x-slot name="divName">program-div</x-slot>
        <x-slot name="table_header">
            List of Programs
            <x-slot name="rows">
                <tr>
                    <th>Accronym</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </x-slot>
            <x-slot name="table_content">
                @foreach ($programs as $program)
                <tr>
                    <td data-label="Accronym">{{$program->shortname}}</td>
                    <td data-label="Name">{{$program->longname}}</td>
                    <td data-label="Description">{{$program->description}}</td>
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
            Add Program
        </x-slot>
        <div class="editForm">
            <form method="POST" action="{{ url('add-program') }}" id='addform'>
                @csrf

                <!-- short name -->
                <x-label class="font-weight-bold" for="shortname" :value="__('Short Name')" />
                <x-input id="shortname" class="block mt-1 w-full mb-3" type="text" name="shortname" :value="old('shortname')" required autofocus />

                <!-- Deparment -->
                <x-label class="font-weight-bold" for="shortname" :value="__('Department')" />
                <x-dropdown-select class="block mt-1 w-full mb-3" name="department">
                        <option hidden>Select Department</option>
                    @foreach ($departments as $department)
                        <option class="rounded-md shadow-sm border-gray-300" value="{{$department->shortname}}">{{$department->longname. "(".$department->shortname.")"}}</option>
                    @endforeach
                </x-dropdown-select>

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
            Edit Program
        </x-slot>
        <div class="editForm">
            <form method="POST" action="{{ url('update-program') }}" id='editform'>
                @csrf

                <!-- short name -->
                <x-label class="font-weight-bold" for="shortname" :value="__('Short Name')" />
                <x-input id="editShortname" class="block mt-1 w-full mb-3" type="text" name="shortname" :value="old('shortname')" required autofocus />

                <!-- Deparment -->
                <x-label class="font-weight-bold" for="shortname" :value="__('Department')" />
                <x-dropdown-select class="block mt-1 w-full mb-3" name="department">
                    <option hidden>Select Department</option>
                    @foreach ($departments as $department)
                        <option class="" value="{{ $department->shortname }}">{{ $department->longname }}</option>
                    @endforeach
                </x-dropdown-select>

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
            Delete Program
        </x-slot>
        <div class="deleteForm">
            <form method="POST" action="{{ url('delete-program') }}" id='deleteform'>
                @csrf

                <!-- short name -->
                <x-label class="font-weight-bold" for="shortname" :value="__('Short Name')" />
                <x-read id="deleteShortname" class="block mt-1 w-full mb-3" type="text" name="shortname" :value="old('shortname')" required autofocus />

                <!-- Deparment -->
                <x-label class="font-weight-bold" for="shortname" :value="__('Department')" />
                <x-dropdown-select class="block mt-1 w-full mb-3">
                    <option hidden>Select Department</option>
                    @foreach ($departments as $department)
                        <option name="department" class="" value="{{ $department->shortname }}">{{ $department->longname }}</option>
                    @endforeach
                </x-dropdown-select>

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
