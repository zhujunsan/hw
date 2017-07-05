/**
 * Created by Think on 2017/7/5.
 */

function edit(index) {
    let edit_block = document.getElementById('edit-' + index);
    edit_block.setAttribute('class', 'list_item__edit list_item__edit--display');

    let display_block = document.getElementById('display-' + index);
    display_block.setAttribute('class', 'list_item__detail list_item__detail--hide');
}

function cancelEdit(index) {
    let edit_block = document.getElementById('edit-' + index);
    edit_block.setAttribute('class', 'list_item__edit');

    let display_block = document.getElementById('display-' + index);
    display_block.setAttribute('class', 'list_item__detail');
}

function editSubmit(index) {
    let pass = true;
    let error_text = '';
    let btn = document.getElementById('submit-' + index);

    let name = document.getElementById('name-' + index).value;
    let gender = document.getElementById('gender-' + index).value;
    let email = document.getElementById('email-' + index).value;
    let phone = document.getElementById('phone-' + index).value;
    let birthday = document.getElementById('birthday-' + index).value;

    if(gender !== '男' && gender !== '女') {
        pass = false;
        error_text += '性别错误\n';
    }
    if(!/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/.test(email)) {
        pass = false;
        error_text += '邮箱错误\n';
    }
    if(phone.length !== 11) {
        pass = false;
        error_text += '电话位数错误\n';
    }
    if(Array.prototype.filter.call(phone, function(digit) {
        return !isNaN(digit);
    }).length !== phone.length) {
        pass = false;
        error_text += '电话输入非数字\n';
    }
    if(!/^(\d{4})-(\d{1,2})-(\d{1,2})$/.test(birthday)) {
        pass = false;
        error_text += '生日错误\n';
    }

    if(pass) {
        btn.click();
    }else {
        alert(error_text);
    }
}

function editDelete(index) {
    let btn = document.getElementById('delete-' + index);
    btn.click();
}

function addSubmit() {
    let pass = true;
    let error_text = '';
    let btn = document.getElementById('submit-add');

    let name = document.getElementById('name-add').value;
    let gender = document.getElementById('gender-add').value;
    let email = document.getElementById('email-add').value;
    let phone = document.getElementById('phone-add').value;
    let birthday = document.getElementById('birthday-add').value;

    if(gender !== '男' && gender !== '女') {
        pass = false;
        error_text += '性别错误\n';
    }
    if(!/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/.test(email)) {
        pass = false;
        error_text += '邮箱错误\n';
    }
    if(phone.length !== 11) {
        pass = false;
        error_text += '电话位数错误\n';
    }
    if(Array.prototype.filter.call(phone, function(digit) {
            return !isNaN(digit);
        }).length !== phone.length) {
        pass = false;
        error_text += '电话输入非数字\n';
    }
    if(!/^(\d{4})-(\d{1,2})-(\d{1,2})$/.test(birthday)) {
        pass = false;
        error_text += '生日错误\n';
    }

    if(pass) {
        btn.click();
    }else {
        alert(error_text);
    }
}


function cancelAdd() {
    let add_block = document.getElementById('add-person');
    add_block.setAttribute('class', 'add__border');
}

function add() {
    let add_block = document.getElementById('add-person');
    add_block.setAttribute('class', 'add__border add__border--display');
}