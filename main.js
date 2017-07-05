/**
 * Created by gaoyile on 2017/7/5.
 */

function delete_contact(id) {
    console.log(id);
    $.ajax({
        url:"index.php",           //the page containing php script
        type: "GET",               //request type
        data:{ 'id' : id },
        success:function(result){
            alert('删除成功');
        }
    });
}