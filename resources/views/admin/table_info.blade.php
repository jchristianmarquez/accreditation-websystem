<x-app-layout>
    <x-table tableType="area-manager" itemLabel="Row">
        <x-slot name="table_header">
            Table Information

            <x-slot name="rows">
                <tr>
                    @foreach ($templates as $column)
                        <th>{{$column->columnName}}</th>
                    @endforeach
                    <th colspan="1">Action</th>
                </tr>
            </x-slot>


            <x-slot name="table_content">
                @foreach ($areas as $area)
                <tr>
                    <td data-label="Area">{{$area->areaNumber}}</td>
                    <td data-label="Area Title">{{$area->areaName}}</td>
                    <td data-label="Status">
                        <span class="{{$area->publishStatus}}">{{$area->publishStatus}}</span>
                        <button id="view-btn" class="view-btn"><i class="fa-solid fa-info-circle"></i>Status</button>
                        <a href="/templates/{{$area->areaNumber}}/compliance"><button id="view-btn" class="view-btn"><i class="fa-solid fa-eye"></i>View</button></a>
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
                <x-input id="areaNumber" class="block mt-1 w-full mb-3" type="number" name="areaNumber" :value="old('areaNumber')" required autofocus />

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
    <x-modal-type id="editModal" class="area_manager">
        <x-slot name="modal_heading">
            Edit Area
        </x-slot>
        <div class="editForm">
            <form method="POST" action="{{ url('update-area') }}" id='editform'>
                @csrf

                <!-- Area Number -->
                <x-label class="font-weight-bold" for="areaNumber" :value="__('Area Number')" />
                <x-input id="editAreaNumber" class="block mt-1 w-full mb-3" type="number" name="areaNumber" :value="old('areaNumber')" required autofocus />

                <!-- Area Name -->
                <x-label for="areaName" :value="__('Area Title')" />
                <x-input id="editAreaName" class="block mt-1 w-full mb-3" type="text" name="areaName" :value="old('areaName')" required autofocus/>

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
            <form method="POST" action="{{ url('delete-area') }}" id='deleteform'>
                @csrf

                <!-- Area Number -->
                <x-label class="font-weight-bold" for="areaNumber" :value="__('Area Number')" />
                <x-read id="deleteAreaNumber" class="block mt-1 w-full mb-3" type="number" name="areaNumber" :value="old('areaNumber')" required autofocus />

                <!-- Area Name -->
                <x-label for="areaName" :value="__('Area Title')" />
                <x-read id="deleteAreaName" class="block mt-1 w-full mb-3" type="text" name="areaName" :value="old('areaName')" required autofocus/>

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

            $('#editAreaNumber').val(data[0]);
            $('#editAreaName').val(data[1]);
        });
    });

    $(document).ready(function(){
        $('.delete-btn').on('click', function(){
            $tr =$(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#deleteAreaNumber').val(data[0]);
            $('#deleteAreaName').val(data[1]);
        });
    });
</script>
