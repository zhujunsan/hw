/**
 * Created by gaoyile on 2017/7/5.
 */

function delete_contact(id) {
    $.ajax({
        url:"index.php",
        type: "GET",
        data:{ 'id' : id },
        success:function(result){
            alert('删除成功');
            window.location.href = 'index.php';
        }
    });
}

function modify_contact(id) {
    console.log('modify');
    $.ajax({
        url:"modify.php",
        type: "GET",
        data:{ 'id' : id },
        success:function(result){
            // alert('删除成功');
            window.location.href = 'modify.php?id='+id;
        }
    });
}