<?php

// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

if ($request_uri == "/" || $request_uri == "/index.html") { ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>通讯录</title>
        <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container" id="contacts-app">
        <div class="col-md-12 column">
            <div>
                <h1>
                    通讯录
                </h1>
                <p>
                    一个简单的通讯录
                </p>
                <p>
                    <button class="btn btn-default" @click="create({NAME:'NEW',EMAIL:'new@new.com'})">新建联系人</button>
                </p>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>姓名</th>
                <th>邮箱</th>
                <th>电话</th>
                <th>生日</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="contact in contacts">
                <td>
                    {{contact.NAME}}
                </td>
                <td>
                    {{contact.EMAIL}}
                </td>
                <td>
                    {{contact.TEL}}
                </td>
                <td>
                    {{contact.BIRTHDAY}}
                </td>
                <td>
                    <a class="btn btn-default" @click="destroy(contact)">删除</a>
                    <a class="btn btn-default" @click="alter(contact)">修改</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    </body>
    <script src="https://cdn.bootcss.com/vue/2.3.4/vue.js"></script>
    <script src="https://cdn.bootcss.com/vue-resource/1.3.4/vue-resource.min.js"></script>
    <script>
        window.onload = function () {

            const contacts = [];
            Vue.http.get('/contacts').then(response => {
                let len = response.body.length;
                for (let i = 0; i < len; i++)
                    contacts.push(response.body[i]);
            }, response => {
                console.log("fetch error");
            });

            /* the view modal of todoapp */
            const vm = new Vue({
                el: '#contacts-app',
                data: {
                    contacts: contacts
                }, methods: {
                    destroy: function (contact) {
                        const index = this.contacts.indexOf(contact);
                        this.$http.delete('/contacts/' + contact["ID"], JSON.stringify(contact))
                            .then(null, null);
                        this.contacts.splice(index, 1);
                    },
                    create: function (contact) {
                        this.contacts.push(contact);
                        this.$http.post('/contacts', JSON.stringify(contact))
                            .then(null, null);
                    },
                    alter: function (contact) {
                        contact["NAME"] = "changed name";
                    }
                }, watch: {
                    contacts: {
                        handler: function (val, oldVal) {
                            val.forEach(contact => {
                                    this.$http.put('/contacts/' + contact["ID"], JSON.stringify(contact))
                                        .then(null, null);
                                }
                            );
                        },
                        deep: true
                    }
                }
            });
        };
    </script>

    </html>

    <?php return;
}


$path_info = $_SERVER['PATH_INFO'];
$request = explode('/', trim($path_info, '/'));


$input = json_decode(file_get_contents('php://input'), true);


if ($input == null) {
    $input = array();
}


$db = new SQLite3('data.sqlite');


// retrieve the table and key from the path
$table = preg_replace('/[^a-z0-9_]+/i', '', array_shift($request));
$key_str = array_shift($request);
$key = $key_str != null ? $key_str + 0 : -1;

// escape the columns and values from the input object
$columns = preg_replace('/[^a-z0-9_]+/i', '', array_keys($input));
$values = array_map(function ($value) {
    if ($value === null) return null;
    return SQLite3::escapeString((string)$value);
}, array_values($input));

// build the SET part of the SQL command
$set1 = '';
$set2 = '';
for ($i = 0; $i < count($columns); $i++) {
    if ($i != 0) {
        $set1 .= ",";
        $set2 .= ",";
    }
    $set1 .= ($columns[$i] === null ? 'NULL' : '"' . $columns[$i] . '"');
    $set2 .= ($values[$i] === null ? 'NULL' : '"' . $values[$i] . '"');
}

$set = '';
for ($i = 0; $i < count($columns); $i++) {
    $set .= ($i > 0 ? ',' : '') . '`' . $columns[$i] . '`=';
    $set .= ($values[$i] === null ? 'NULL' : '"' . $values[$i] . '"');
}

// create SQL based on HTTP method
switch ($method) {
    case 'GET':
        $sql = "select * from `$table`" . ($key != -1 ? " WHERE id=$key" : '');
        break;
    case 'PUT':
        $sql = "update `$table` set $set where id=$key";
        break;
    case 'POST':
        $sql = "insert into `$table` ($set1) VALUES ($set2)";
        break;
    case 'DELETE':
        $sql = "delete from `$table` where id=$key";
        break;
}


// execute SQL statement
$result = $db->query($sql);

// die if SQL statement failed
if (!$result) {
    http_response_code(404);
    die("error");
}

// print results, insert id or affected row count
if ($method == 'GET') {
    if ($key == -1) echo '[';
    $i = 0;
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo ($i++ > 0 ? ',' : '') . json_encode($row);
    }
    if ($key == -1) echo ']';
} elseif ($method == 'POST') {
    echo $db->lastInsertRowID();
} else {
    echo $db->changes();
} ?>