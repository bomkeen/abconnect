$(function () {
    //get the click of the create button
    $('#modalButton').click(function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });
    //get login modal


    //class for grid view button
    $('.systemuser-edit').click(function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });


    $('.systemuser-create').click(function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });
    
    $('.create-job').click(function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });



    //class ใช้ทั้ง app
    $('.createmodal').click(function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });
    $('.activity-update-link').click(function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });
     $('.edit-jobdetail').click(function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });

    $(".activity-delete-link").on("click", function () {
        $('#modaldelete').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
        /*
         krajeeDialog.confirm("ต้องการลบข้อมูลใช่ไหม?", function (result) {
         if (result) {
         alert($(this).attr('value'));
         return true;
         } else {
         return false;
         }
         });*/
    });

    ///// dynamic form 
//    $(".dynamicform_wrapper").on("beforeInsert", function (e, item) {
//        console.log("beforeInsert");
//    });
//
//    $(".dynamicform_wrapper").on("afterInsert", function (e, item) {
//        console.log("afterInsert");
//    });
//
//    $(".dynamicform_wrapper").on("beforeDelete", function (e, item) {
//        if (!confirm("Are you sure you want to delete this item?")) {
//            return false;
//        }
//        return true;
//    });
//
//    $(".dynamicform_wrapper").on("afterDelete", function (e) {
//        console.log("Deleted item!");
//    });
//
//    $(".dynamicform_wrapper").on("limitReached", function (e, item) {
//        alert("Limit reached");
//    });


    ///// end dynamic form
	

	

});
