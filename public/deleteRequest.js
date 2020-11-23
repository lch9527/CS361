function deleteRequest(RID){
    $.ajax({
        url: '/Request/' + RID,
        type: 'DELETE',
        success: function(result){
            window.location.reload(true);
        }
    })
};