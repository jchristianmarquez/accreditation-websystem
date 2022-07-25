

<x-app-layout>
    <x-table tableType="comment-table" itemLabel="Row">
        <x-slot name="divName">comment-div</x-slot>
        <x-slot name="table_header">
            Area {{$area}} - {{$areaTitle}}
            <x-slot name="rows">
                <x-category-switch>
                    <x-slot name="areas">
                        <option hidden>{{$area}} - {{$listOfAreas->where('areaNumber', $area)->first()->areaName}}</option>
                        @foreach ($listOfAreas as $areas)
                            <option value="/comments/{{$areas->areaNumber}}/{{$report}}">{{$areas->areaNumber}} - {{$areas->areaName}}</option>
                        @endforeach
                    </x-slot>
                    <x-slot name="files">
                        <option hidden>{{$reportTypes->where('reportType', $report)->first()->reportLabel}}</option>
                        @foreach ($reportTypes as $reportType)
                            <option value="/comments/{{$area}}/{{$reportType->reportType}}">{{$reportType->reportLabel}}</option>
                        @endforeach
                    </x-slot>
                </x-category-switch>
                <tr>
                    <th>Row</th>
                    <th>Program</th>
                    <th>Comment</th>
                    <th>Edited by</th>
                    <th>Approval</th>
                    <th>Action</th>
                </tr>
            </x-slot>
            <x-slot name="table_content">
                @foreach ($listOfRow as $comment)
                <tr>
                    <td data-label="Row">{{$comment->tblRow}}</td>
                    <td data-label="Program">{{$comment->program}}</td>
                    <td data-label="Comment">
                        <button type="submit" class=" btn-comments add-btn" name="viewcomment"><i class="fa-solid fa-plus"></i> Add Comment</button><br>
                        <button type="submit" class="btn-comments viewcomment" data-id = {{ $loop->iteration}}><i class="fa-solid fa-eye"></i> View Comments</button>
                    </td>
                    <td data-label="Edited by"></td>
                    <td data-label="Approval">
                        <button id="approve-btn" class="action-btn approve-btn">Approve</button>
                    </td>
                    <td data-label="Action">
                        <button>
                            <a href="{{ url('/table_info/'.$comment->program.'/'.$area.'/'.$comment->reportType) }}">
                                <i class="fa-solid fa-eye"></i> View Table
                            </a>
                        </button>
                    </td>
                </tr>
                @endforeach
            </x-slot>
        </x-slot>
    </x-table>

    {{-- View MODAL --}}
    <x-modal-type id="viewAllCommentsModal" class="area_manager">
        <x-slot name="modal_heading">
            All Comments
        </x-slot>
        <div class="addForm">
            @foreach ($listOfComments->where() as $comment)
                <h5 id= 'viewallcomment-title' class="card-title mt-8">Area: {{$comment['area'] }} | Row: {{ $comment['tblRow'] }}</h5>
                <h6 id= 'viewallcomment-creator' class="card-subtitle">Created By: {{$comment['edited_by'] }}</h6>
                <span id='viewallcomment-content' class="card-text">{{ $comment['comment'] }}</span>
                <form method="POST" action="{{ url('delete-comment') }}" id='deleteform'>
                    @csrf
                        <x-read name="accred_level" type="hidden" :value="1" required autofocus />
                        <x-read id="commentProgram[{{$loop->index}}]" name="program" type="text" :value="old('program')" required autofocus />
                        <x-read name="area" type="hidden" :value="$area" required autofocus />
                        <x-read name="reportType" type="hidden" :value="$report" required autofocus />
                        <x-read name="tblRow" type="hidden" :value="$comment['tblRow']" required autofocus />
                        <x-read id="deleteComment" class="block mt-1 w-full mb-2" type="hidden" name="comment" :value="$comment['comment']" required autofocus />
                    <button class="modal-btn btn-modal-delete" type ='submit'>
                        {{ __('Delete Comment') }}
                    </button>
                </form>
            @endforeach

        </div>
    </x-modal-type>

    {{-- ADD MODAL --}}
    <x-modal-type id="addModal" class="area_manager">
        <x-slot name="modal_heading">
            Add Comment
        </x-slot>
        <div class="addForm">
            <form method="POST" action="{{ url('add-comment') }}" id='addform'>
                @csrf

                <!-- Area Number -->
                <x-read id="area" class="block mt-1 w-full mb-3" name="area" type="hidden" :value="$area" required autofocus />
                <!-- Report Type -->
                <x-read id="reportType" class="block mt-1 w-full mb-3" name="reportType" type="hidden" :value="$report" required autofocus />

                <!-- Row Number -->
                <x-label class="font-weight-bold" for="tblRow" :value="__('Row Number')" />
                <x-read id="tblRow" class="block mt-1 w-full mb-3" type="text" name="tblRow" :value="old('tblRow')" required autofocus />

                <!-- Program -->
                <x-label class="font-weight-bold" for="program" :value="__('Program')" />
                <x-read class="block mt-1 w-full mb-3" type="text" name="program" :value="old('program')" required autofocus />

                <!-- Edited By -->
                <x-label class="font-weight-bold" for="editedBy" :value="__('Edited By')" />
                <x-read id="editedBy" class="block mt-1 w-full mb-3" type="text" name="editedBy" :value="old('editedBy')" required autofocus />

                <!-- Comment -->
                <x-label for="comment" :value="__('Comment')" />
                <x-textarea-input id="comment" class="block mt-1 w-full mb-3" type="text" name="comment" :value="old('comment')" required autofocus />

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
                    <x-read id="deleteRow" class="block mt-1 w-full mb-2" type="number" name="tblRow" :value="old('tblRow')" required autofocus />

                <button class="modal-btn btn-modal-delete" type ='submit'>
                    {{ __('Delete') }}
                </button>
            </form>
        </div>
    </x-modal-type>
</x-app-layout>

{{-- Script for showing modal --}}
<script src="{{ asset('js/show-modal.js') }}"></script>
{{-- Script for Getting Values --}}
<script>
    $(document).ready(function(){
        $('.add-btn').on('click', function(){
            $tr =$(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            var userName = {!! json_encode(Auth::user()->name) !!};

            console.log(data);
            console.log(userName);

            $('#tblRow').val(data[0]);
            $('#program').val(data[1]);
            $('#editedBy').val(userName);

        });
    });
    $(document).ready(function(){
        $('.viewcomment').on('click', function(){
            $tr =$(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            var commentCount = {!! json_encode($listOfComments->count()) !!};


            console.log("Comment Count: " +commentCount);
            console.log(data);

            for(let index=0; index<commentCount; index++){

                var idArray = '#commentProgram['+index+']';
                console.log(idArray);
                $(idArray).val(data[1]);
            }

        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.cellEdit').on('click', function(){


        });
});

    $(document).ready(function(){
        $('.delete-btn').on('click', function(){
            $tr =$(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
            }).get();

            console.log(data);

            $('#program').val(data[2]);
        });
    });
</script>

<script>

  $(document).ready(function(){
    $('.viewitemcomment').click(function(){
      const item = $(this).attr('data-id');
      $.ajax({
        url:'item-comment/'+item,
        type: 'get',
        data: {'item':item},
        success:function(data){
          console.log(data);
          $('#comment-content').html('');
          $.map(data, function(val, key) {

              $('#comment-content').append("<div class='card comment-content' style='width: 100%'><h6 class='card-title'>"+val.edited_by+"</h6>\
                                          <span>"+val.comment+"</span></div>");
          })
        }
      })
    })
  })
</script>
