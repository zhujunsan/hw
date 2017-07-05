<!DOCTYPE html>
<html>
<head>
    <title>通讯录</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="./src/material.min.css">
    <link rel="stylesheet" href="./src/index.css">
    <script src="./src/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div class="header">
        Tiny Address Book
    </div>

    <div>
        <?php
        include("AddressItem.php");

        //测试用写入数据
//            $myfile = fopen("tinyList.txt", "w") or die("Unable to open file!");
//
//            $example1 = new AddressItem("everstar", "男",
//                "i@tsengkasing.me", "18200000000", "1996-03-21");
//            $example2 = new AddressItem("hhhhh", "女",
//                "hhhh@abc.com", "18200001111", "1996-01-01");
//            $example3 = new AddressItem("nina", "女",
//                "nina@abc.com", "18200002222", "1996-02-02");
//            $example4 = new AddressItem("龙傲天", "女",
//                "lat@abc.com", "18212341234", "1996-03-03");
//            $address_list = array($example1, $example2, $example3, $example4);
//
//            fwrite($myfile, serialize($address_list));
//
//            fclose($myfile);
        //测试用写入数据结束


            $myfile = fopen("tinyList.txt", "r") or die("Unable to open file!");
            $file_content = fread($myfile, filesize("tinyList.txt"));
            $address_list = unserialize($file_content);

            fclose($myfile);
        ?>
    </div>

    <div class="add__border" id="add-person">
        <div class="list_item__add">
            <form action="add.php" method="post">
                <input style="display: none" id="submit-add" type="submit">
                <ul class="mdl-list">
                    <li class="mdl-list__item">
                        <div class="mdl-list__item-primary-content">
                            <span>姓名：</span>
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" id="name-add" name="name-add" id="name-"/>
                                <label class="mdl-textfield__label" for="name-add">Text...</label>
                            </div>
                        </div>
                    </li>
                    <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <span>性别：</span>
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" type="text" id="gender-add" name="gender-add" id="gender-"/>
                                        <label class="mdl-textfield__label" for="gender-add">男|女</label>
                                    </div>
                            </span>
                    </li>
                    <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <span>邮箱：</span>
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" type="text" id="email-add" name="email-add" id="gender-"/>
                                        <label class="mdl-textfield__label" for="email-add">电子邮箱</label>
                                    </div>
                            </span>
                    </li>
                    <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <span>电话：</span>
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" type="text" id="phone-add" name="phone-add" id="gender-"/>
                                        <label class="mdl-textfield__label" for="phone-add">11位数字</label>
                                    </div>
                            </span>
                    </li>
                    <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <span>生日：</span>
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" type="text\" id="birthday-add" name="birthday-add" id="gender-"/>
                                        <label class="mdl-textfield__label" for="gender">1990-01-01</label>
                                    </div>
                            </span>
                    </li>
                </ul>
                <input type="button" value="取消" class="mdl-button mdl-js-button mdl-button--raised" onclick="cancelAdd()" />
                <input type="button" value="提交" class="mdl-button mdl-js-button mdl-button--raised" onclick="addSubmit()" />
            </form>
        </div>
    </div>
    <div class="btn__add">
        <input type="button" value="新建联系人"  class="mdl-button mdl-js-button mdl-button--raised" onclick="javascript:add()"/>
    </div>

    <div class="address_list">
        <div class="mdl-list">
            <?php
            $length = count($address_list);
            for($i = 0; $i < $length; $i++) {
                $item = $address_list[$i];
                echo "<div class=\"list_item\">";
                echo "  <input type=\"radio\" id=\"radio-" . $i . "\" name=\"radio-accordion\"" . ($i == 0 ? " checked=\"checked\"" : "") . "/>";
                echo "    <div class=\"mdl-list__item\">";
                echo "      <label for=\"radio-" . $i . "\">";
                echo "        <span class=\"mdl-list__item-primary-content\">";
                echo "            <i class=\"material-icons mdl-list__item-avatar\">person</i>";
                echo "            <span>" . $item->getName() . "</span>";
                echo "        </span>";
                echo "        <a class=\"mdl-list__item-secondary-action\" href=\"#\"><i class=\"material-icons\">star</i></a>";
                echo "      </label>";
                echo "    </div>";

                //显示部分
                echo "<div class=\"list_item__detail\" id=\"display-" . $i . "\">";
                echo "    <ul class=\"mdl-list\">";
                echo "        <li class=\"mdl-list__item\">";
                echo "            <span class=\"mdl-list__item-primary-content\">";
                echo "                <span>姓名：</span>";
                echo "                <span>" . $item->getName() . "</span>";
                echo "            </span>";
                echo "        </li>";
                echo "        <li class=\"mdl-list__item\">";
                echo "            <span class=\"mdl-list__item-primary-content\">";
                echo "                <span>性别：</span>";
                echo "                <span>" . $item->getGender() . "</span>";
                echo "            </span>";
                echo "        </li>";
                echo "        <li class=\"mdl-list__item\">";
                echo "            <span class=\"mdl-list__item-primary-content\">";
                echo "                <span>邮箱：</span>";
                echo "                <span>" . $item->getEmailAddress() . "</span>";
                echo "            </span>";
                echo "        </li>";
                echo "        <li class=\"mdl-list__item\">";
                echo "            <span class=\"mdl-list__item-primary-content\">";
                echo "                <span>电话：</span>";
                echo "                <span>" . $item->getPhone() . "</span>";
                echo "            </span>";
                echo "        </li>";
                echo "        <li class=\"mdl-list__item\">";
                echo "            <span class=\"mdl-list__item-primary-content\">";
                echo "                <span>生日：</span>";
                echo "                <span>" . $item->getBirthday() . "</span>";
                echo "            </span>";
                echo "        </li>";
                echo "    </ul>";
                echo "<button class=\"mdl-button mdl-js-button mdl-button--raised\" onclick=\"javascript:edit(" . $i . ")\">编辑</button>";
                echo "</div>";


                //编辑部分
                echo "<div class=\"list_item__edit\" id=\"edit-" . $i . "\">";
                echo "<form action=\"edit.php\" method=\"post\">";
                echo "<input style=\"display: none\" type=\"number\" name=\"index\" value=\"" . $i . "\" />";
                echo "<input style=\"display: none\" id=\"submit-" . $i . "\" type=\"submit\">";
                echo "    <ul class=\"mdl-list\">";
                echo "        <li class=\"mdl-list__item\">";
                echo "            <div class=\"mdl-list__item-primary-content\">";
                echo "                <span>姓名：</span>";
                echo "                    <div class=\"mdl-textfield mdl-js-textfield\">";
                echo "                        <input class=\"mdl-textfield__input\" type=\"text\" name=\"name\" id=\"name-" . $i . "\" value=\"" . $item->getName() . "\">";
                echo "                        <label class=\"mdl-textfield__label\" for=\"name\">Text...</label>";
                echo "                    </div>";
                echo "            </div>";
                echo "        </li>";
                echo "        <li class=\"mdl-list__item\">";
                echo "            <span class=\"mdl-list__item-primary-content\">";
                echo "                <span>性别：</span>";
                echo "                    <div class=\"mdl-textfield mdl-js-textfield\">";
                echo "                        <input class=\"mdl-textfield__input\" type=\"text\" name=\"gender\" id=\"gender-" . $i . "\" value=\"" . $item->getGender() . "\">";
                echo "                        <label class=\"mdl-textfield__label\" for=\"gender\">男|女</label>";
                echo "                    </div>";
                echo "            </span>";
                echo "        </li>";
                echo "        <li class=\"mdl-list__item\">";
                echo "            <span class=\"mdl-list__item-primary-content\">";
                echo "                <span>邮箱：</span>";
                echo "                    <div class=\"mdl-textfield mdl-js-textfield\">";
                echo "                        <input class=\"mdl-textfield__input\" type=\"text\" name=\"email\" id=\"email-" . $i . "\" value=\"" . $item->getEmailAddress() . "\">";
                echo "                        <label class=\"mdl-textfield__label\" for=\"email\">电子邮箱</label>";
                echo "                    </div>";
                echo "            </span>";
                echo "        </li>";
                echo "        <li class=\"mdl-list__item\">";
                echo "            <span class=\"mdl-list__item-primary-content\">";
                echo "                <span>电话：</span>";
                echo "                    <div class=\"mdl-textfield mdl-js-textfield\">";
                echo "                        <input class=\"mdl-textfield__input\" type=\"text\" name=\"phone\" id=\"phone-" . $i . "\" value=\"" . $item->getPhone() . "\">";
                echo "                        <label class=\"mdl-textfield__label\" for=\"phone\">11位数字</label>";
                echo "                    </div>";
                echo "            </span>";
                echo "        </li>";
                echo "        <li class=\"mdl-list__item\">";
                echo "            <span class=\"mdl-list__item-primary-content\">";
                echo "                <span>生日：</span>";
                echo "                    <div class=\"mdl-textfield mdl-js-textfield\">";
                echo "                        <input class=\"mdl-textfield__input\" type=\"text\" name=\"birthday\" id=\"birthday-" . $i . "\" value=\"" . $item->getBirthday() . "\">";
                echo "                        <label class=\"mdl-textfield__label\" for=\"birthday\">1996-01-01</label>";
                echo "                    </div>";
                echo "            </span>";
                echo "        </li>";
                echo "    </ul>";
                echo "<input type=\"button\" value='取消'  class=\"mdl-button mdl-js-button mdl-button--raised\" onclick=\"javascript:cancelEdit(" . $i . ")\"/>&nbsp;";
                echo "<input type=\"button\" value='提交' class=\"mdl-button mdl-js-button mdl-button--raised\" onclick=\"javascript:editSubmit(" . $i . ")\"/>";
                echo "</form>";
                echo "<form action=\"delete.php\" method=\"post\">";
                echo "<input style=\"display: none\" type=\"number\" name=\"index\" value=\"" . $i . "\" />";
                echo "<input type=\"button\" value='删除联系人' class=\"mdl-button mdl-js-button mdl-button--raised\" onclick=\"javascript:editDelete(" . $i . ")\"/>";
                echo "<input style=\"display: none\" id=\"delete-" . $i . "\" type=\"submit\">";
                echo "</form>";
                echo "</div>";


                echo "</div>";
            }

            ?>

        </div>
    </div>
</body>
<script src="./src/index.js"></script>
</html>