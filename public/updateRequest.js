function updateRequest(RID){
    $.ajax({
        url: '/Request/' + RID,
        type: 'PUT',
        data: $('#update-Request').serialize(),
        success: function(result){
            window.location.replace("./");
        }
    })
};