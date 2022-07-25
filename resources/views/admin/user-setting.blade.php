<x-app-layout>
    <x-table tableType="user-setting" itemLabel="User">
        <x-slot name="divName">user-div</x-slot>
        <x-slot name="table_header">
            List of Users
            <x-slot name="rows">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </x-slot>
            <x-slot name="table_content">
                @foreach ($users as $user)
                <tr>
                    <td data-label="ID">{{$user->id}}</td>
                    <td data-label="Name">{{$user->name}}</td>
                    <td data-label="Department">{{$user->department}}</td>
                    <td data-label="Position">{{$user->position}}</td>
                    <td data-label="Email">{{$user->email}}</td>
                    <td data-label="Action">
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
            <form method="POST" action="{{ url('add-user') }}" id='addform'>
                @csrf

                <!-- Name -->
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full mb-2" type="text" name="name" :value="old('name')" required autofocus />

                {{-- Department --}}
                <x-label for="department" :value="__('Department')" />
                <select class="input-bg form-control form-select mb-2" name="department" class="validate[required]">
                    <option value="disabled">Choose Department </option>
                    @foreach ($departments as $department )
                        <option value= "{{ $department->shortname }}">{{ $department['longname'] }}</option>
                    @endforeach
                </select>

                {{-- Position --}}
                <x-label for="position" :value="__('Position')" />
                <select class="input-bg form-control form-select mb-2" name="position" class="validate[required]">
                    <option value="disabled">Choose Position</option>
                    <option value="qa">Quality Assurance</option>
                    <option value="director">Director</option>
                    <option value="faculty">Faculty</option>
                </select>

                {{-- Email --}}
                <x-label for="editEmail" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full mb-2" type="email" name="email" :value="old('email')" required autofocus />

                {{-- Password --}}
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full mb-2" type="password" name="password" :value="old('password')" required autofocus />


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
            <form method="POST" action="{{ url('update-user') }}" id='editform'>
                @csrf

                {{-- id --}}
                <x-input id="editId" class="block mt-1 w-full" type="hidden" name="id" required autofocus />

                <!-- Name -->
                <x-label for="name" :value="__('Name')" />
                <x-input id="editName" class="block mt-1 w-full mb-2" type="text" name="name" :value="old('name')" required autofocus />

                {{-- Department --}}
                <x-label for="department" :value="__('Department')" />
                <select class="input-bg form-control form-select mb-2" name="department">
                    <option value="disabled">Choose Department </option>
                    @foreach ($departments as $department )
                        <option value= "{{ $department['shortname'] }}">{{ $department['longname'] }}</option>
                    @endforeach
                </select>

                {{-- Position --}}
                <x-label for="position" :value="__('Position')" />
                <select class="input-bg form-control form-select mb-2" name="position" class="required">
                    <option value="disabled">Choose Position</option>
                    <option value="qa">Quality Assurance</option>
                    <option value="director">Director</option>
                    <option value="faculty">Faculty</option>
                </select>

                {{-- Email --}}
                <x-label for="email" :value="__('Email')" />
                <x-read id="editEmail" class="block mt-1 w-full mb-2" type="email" name="email" :value="old('email')" required autofocus />

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
            <form method="POST" action="{{ url('delete-user') }}" id='deleteform'>
                @csrf

                {{-- id --}}
                <x-read id="deleteId" class="block mt-1 w-full" type="hidden" name="id" required autofocus />

                <!-- Name -->
                <x-label for="name" :value="__('Name')" />
                <x-read id="deleteName" class="block mt-1 w-full mb-2" type="text" name="name" :value="old('name')" required autofocus />

                {{-- Department --}}
                <x-label for="department" :value="__('Department')" />
                <x-read id="deleteDepartment" class="block mt-1 w-full mb-2" type="text" name="department" :value="old('departmet')" required autofocus />

                {{-- Position --}}
                <x-label for="position" :value="__('Position')" />
                <x-read id="deletePosition" class="block mt-1 w-full mb-2" type="text" name="position" :value="old('position')" required autofocus />

                {{-- Email --}}
                <x-label for="email" :value="__('Email')" />
                <x-read id="deleteEmail" class="block mt-1 w-full mb-2" type="email" name="email" :value="old('email')" required autofocus />

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

            $('#editId').val(data[0]);
            $('#editName').val(data[1]);
            $('#editDepartment').val(data[2]);
            $('#editPosition').val(data[3]);
            $('#editEmail').val(data[4]);
        });
    });

    $(document).ready(function(){
        $('.delete-btn').on('click', function(){
            $tr =$(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#deleteId').val(data[0]);
            $('#deleteName').val(data[1]);
            $('#deleteDepartment').val(data[2]);
            $('#deletePosition').val(data[3]);
            $('#deleteEmail').val(data[4]);
        });
    });
</script>
