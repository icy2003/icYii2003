<?php

use common\utils\Y;

$viewUrl = Y::to(['member/manage/view']);
$listUrl = Y::to(['member/manage/list']);
$saveUrl = Y::to(['member/manage/save']);
$deleteUrl = Y::to(['member/manage/delete']);
?>

<table id="table" lay-filter="tableFilter"></table>

<form class="layui-form" id="formId" lay-filter="formFilter" style="display:none">
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
            <input type="text" name="username" required lay-verify="required" placeholder="请输入用户名" autocomplete="on"
                class="layui-input" id="username" style="width:100px">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-inline">
            <input type="password" name="password" required lay-verify="required" placeholder="不填则不改密码"
                autocomplete="on" class="layui-input">
        </div>
    </div>
    <button lay-submit lay-filter="submitFilter">提交</button>
</form>
<script type="text/html" id="barDemo">
<a class="layui-btn layui-btn-xs" lay-event="detail">查看</a>
<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="delete">删除</a>
</script>
<script>
var tableObject = {
    id: 'tableId',
    elem: '#table',
    height: 500,
    url: '<?php echo $listUrl ?>',
    page: true,
    cols: [
        [{
                field: 'id',
                title: 'ID',
                width: 80,
                sort: true,
                fixed: 'left'
            },
            {
                field: 'username',
                title: '用户名',
                width: 200
            },
            {
                field: 'created_at',
                title: '创建时间',
                width: 135,
                sort: true
            },
            {
                title: '操作',
                toolbar: '#barDemo'
            }
        ]
    ]
};

function openLayer(title, url) {
    layer.open({
        type: 2,
        title: title,
        area: ['80%', '60%'],
        shadeClose: true,
        id: (new Date()).valueOf(),
        content: url,
    });
}

function createTable(tableObject, fread, fedit, fdelete) {
    layui.use('table', function() {
        var table = layui.table;
        table.render(tableObject);
        table.on('tool(tableFilter)', function(obj) {
            if (obj.event == 'detail') {
                fread(obj);
            } else if (obj.event == 'delete') {
                layer.confirm('真的删除该行么？', function(index) {
                    obj.del();
                    layer.close(index);
                    $.ajax({
                        url: "<?php echo $deleteUrl; ?>?id=" + obj.data.id,
                        success: function(res) {
                            if (0 == res.code) {
                                layer.alert('删除成功');
                            }
                            table.reload('tableId', tableObject)
                        }
                    });
                    fdelete(obj);
                });
            } else if (obj.event == 'edit') {
                fedit(obj);
            }
        });

    });
}
createTable(tableObject, function(obj) {
    openLayer('查看', "<?php echo $viewUrl; ?>" + "?id=" + obj.data.id);
}, function(obj) {
    openLayer('编辑', "<?php echo $saveUrl; ?>" + "?id=" + obj.data.id);
}, function(obj) {
});
</script>