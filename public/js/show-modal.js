//Add Modal Script
$(document).ready(function(){
    $('.add-btn').on('click', function(){
      $('#addModal').modal('show');
        console.log("Add Modal Shown")
    });
});

//Edit Modal Script
$(document).ready(function(){
    $('.edit-btn').on('click', function(){
      $('#editModal').modal('show');
        console.log("Edit Modal Shown")
    });
});
$(document).ready(function(){
    $('.cellEdit').on('click', function(){
      $('#editModal').modal('show');
        console.log("Edit Modal Shown")
    });
});


//Delete Modal Script
$(document).ready(function(){
    $('.delete-btn').on('click', function(){
      $('#deleteModal').modal('show');
        console.log("Delete Modal Shown")
    });
});

//View Modal Script
$(document).ready(function(){
    $('.viewcomment').on('click', function(){
        $('#viewAllCommentsModal').modal('show');

    });
});
