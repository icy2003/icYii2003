<?php

use backend\assets\AppAsset;
use backend\assets\LayuiAsset;

AppAsset::register($this);
LayuiAsset::register($this);

?>

<form class="layui-form" action="" method="POST">
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
            <input type="text" name="username" required lay-verify="required" placeholder="请输入用户名" autocomplete="off"
                class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
            <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off"
                class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<script>
layui.use('form', function() {
    var form = layui.form;
    //监听提交
    form.on('submit(formDemo)', function(data) {
        $.ajax({
            type: 'POST',
            data: data.field,
            success: function(res) {
                window.parent.location.reload();
                var index = parent.layer.getFrameIndex(window.name);
                parent.layer.msg('保存成功');
                parent.layer.close(index);
            }
        });
        return false;
    });
});
</script>